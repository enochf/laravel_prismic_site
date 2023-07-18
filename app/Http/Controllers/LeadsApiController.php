<?php
namespace App\Http\Controllers;

use App\Csu\Integrations\SalesForce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendLeadTest;
use App\Mail\SendLeadDuplicate;

class LeadsApiController extends Controller
{
    const SEARCH_BY_EMAIL = 1;

    const SEARCH_BY_PHONE = 2;

    protected $salesForce;

    protected $validApiKeys = array(
        '65f3f28ebc2e3b463ccb481340a2e7e2b91bae26', // csug
        '5ee3ea8f37e13bb7b76d5f9c7774b1b9085b1a7b', // csug blog
        'b96772d3e65ca041ced797e4eed4c335e77a7905', // usim
        'e1b1f3a1f8ea8e7771a86f363ed749ff16c46f93', // thruline
        '241d491cb17814b1f85be061239dbbf94058e9a6', // dmi
        '302872c47b0e41840fa17bcc4598adba167194f4', // higher education level
        '859243v61q8n33204jz01nwr8201hmac372082l1', // onlinedegree.com
        'cf6ea084c5c638c095dbffb5c19d8690ef0e5a81', // ventrix advertising
        '82311859238542a71e5cd8e63005c9e38a4ca2f4', // zu
        '7d825a58112ce05a48f491a77122d358a8c46e5a', // dms
        'b99a1d29f761adc41beb6dc989b4b2dedf6992d6', // edudyn
        '5baf092acd574520bbfccad28e26c7fa6e5f438e', // heg
        '0ab8352307a48de42c35f2fed9d2fd18a8c37c82', // ivy
        '1e869bc06db7a34aef2b1fc52b1d46a135fecc39', // study portals inc
        'd9e675247be9bfb0fbbdb7e666f5708723fcf2e0', // keystone academic solutions
        'e2d56561352e966a621fb4aa6a23e8a1413d71fb', // motimatic
        '9a136e0ba6ff5710ce26be3005ce5cbacc08b544', // ocelot
        '2abc050c2368e74f6d12db5922856a997f2e495b', // higher level education
        '472b5ce14ab4f5920e0d6d60c20ae960175e930e', // csu global direct
    );

    protected $fields = array(
        '00NF0000008WZsI' => 'How_Did_You_Hear_of_Us__c',
        '00N0G00000Do1hk' => 'Campaign_Medium__c',
        '00NF000000CoN4P' => 'VendorID__c',
        '00N0G00000Do1hp' => 'Campaign_Name__c',
        '00N0G00000Do1hu' => 'Campaign_Content__c',
        '00NF0000008XFgW' => 'Program__c',
        '00NF0000008XBQl' => 'DOB__c',
        '00NF0000008XBR0' => 'Gender__c',
        '00NF0000008XFgb' => 'Highest_Level_Completed__c',
        '00NF0000008uksu' => 'Military_Affiliation__c',
        '00NF0000008vU8U' => 'Military_Branch__c',
        '00NF0000008XBQW' => 'Employer__c',
        '00NF0000008XBTL' => 'Ok_to_Text_Me__c',
        '00N0G00000DnWpZ' => 'Current_School__c',
        '00N0G00000DnWpj' => 'Military_Base__c',
        '00NF000000C1j2D' => 'Campus__c',
        '00NF0000008v6Tl' => 'Estimated_Credits__c',
        '00N0G00000DJzuV' => 'High_School_Grad_Year__c',
        '00N4T00000628SP' => 'GCLID__c'

    );

    protected $url = '';

    public function __construct() {

        $this->salesForce = new SalesForce();

    }

    public function execute(Request $request) {

        $params = $request->all();

        if (isset($params['url'])) {
            $this->url = $params['url'];
            unset($params['url']);
        }

        $params = $this->convertOldIds($params);

        $params = $this->validateKey($params);

        $this->checkTest($params);

        if ($params['Email']) {
            $this->getLead($params['Email'], self::SEARCH_BY_EMAIL, $params);
        } else {
            
            $this->salesForce->responseMessage('failed', 100, 'Email address incorrect', null);

        }

    }

    public function convertOldIds($params) {

        foreach ($params as $k => $v) {
            if (key_exists($k, $this->fields)) {
                $params[$this->fields[$k]] = $params[$k];
                unset($params[$k]);
            }
        }

        return $params;

    }

    public function validateKey($params) {

        if (!in_array($params['key'], $this->validApiKeys)) {

            $this->salesForce->responseMessage('failed', 150, 'Invalid API key', null);

        } else {
            unset($params['key']);
            return $params;
        }

    }

    public function checkTest($params) {

        if (strpos($params['Email'], '@test.com') !== false) {
            $params['url'] = $this->url;
            Mail::to('enoch.fredericks@csuglobal.edu')
                ->send(new SendLeadTest(json_encode($params)));
        }

    }

    public function getLead($searchTerm, $flag, $params) {

        // if ($flag == self::SEARCH_BY_PHONE) {
        //     if ($this->validatePhone($searchTerm)) {
        //         $this->getAccount($searchTerm, self::SEARCH_BY_EMAIL, $params);
        //         return;
        //     }
        // }

        $response = $this->salesForce->getLead($searchTerm);
        $responseArray = $response->json();

        if (!$response->ok()) {
            
            $this->salesForce->responseMessage('failed', 110, 'Unable to connect to Salesforce', null);

        }

        if (count($responseArray)) {
            $params['Id'] = $responseArray[0]['Id'];
            $params['term'] = $searchTerm;
            $params['url'] = $this->url;
            Mail::to('enoch.fredericks@csuglobal.edu')
                ->cc($responseArray[0]['Lead_Owner_Email__c'])
                ->send(new SendLeadDuplicate(json_encode($params)));

            $this->salesForce->responseMessage('failed', 120, 'Duplicate lead fournd for term: '.$searchTerm, null);

        } else {
            if ($flag == self::SEARCH_BY_PHONE) {
                // No records were found via phone or email in leads, so create a lead
                $this->getAccount($searchTerm, self::SEARCH_BY_EMAIL, $params);
            } else {
                // No email was found so look by phone
                $this->getLead($searchTerm, self::SEARCH_BY_PHONE, $params);
            }
        }
        
    }

    public function getAccount($searchTerm, $flag, $params) {

        // if ($flag == self::SEARCH_BY_PHONE) {
        //     if ($this->validatePhone($searchTerm)) {
        //         $newLead = $this->salesForce->createLeadFromApi($params);
        //         if (isset($newLead['id'])) {
                    
        //         }
        //     }
        // }

        $response = $this->salesForce->getAccount($searchTerm);
        $responseArray = $response->json();

        if (!$response->ok()) {
            
            $this->salesForce->responseMessage('failed', 130, 'Unable to connect to Salesforce', null);

        }


        if (count($responseArray)) {
            Mail::to('enoch.fredericks@csuglobal.edu')
                ->send(new SendLeadDuplicate(json_encode($params)));

            $this->salesForce->responseMessage('failed', 140, 'Duplicate lead fournd for term: '.$searchTerm, null);
            
        } else {
            if ($flag == self::SEARCH_BY_PHONE) {
                // No records were found via phone or email in leads, so create a lead
                $newLead = $this->salesForce->createLeadFromApi($params);
                if (isset($newLead['id'])) {

                    $this->salesForce->responseMessage('success', 200, 'Lead successfully created', $newLead['id']);
                    
                }
            } else {
                // No email was found so look by phone
                $this->getAccount($params['Phone'], self::SEARCH_BY_PHONE, $params);
            }
        }

    }

    public function validatePhone($phone) {

        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (strlen($phone) < 10) {
            return true;
        } else {
            return false;
        }

    }

}
