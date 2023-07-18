<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Csu\Integrations\SalesForce;

class UpdateCompanyController extends Controller
{
    const SEARCH_BY_EMAIL = 1;

    const SEARCH_BY_PHONE = 2;

    protected $salesForce;

    public function __construct() {
        $this->salesForce = new SalesForce();
    }

    public function execute(Request $request) {
        $params = $request->all();

        session()->put('app', $params);

        if($params['email']) {
            $this->getLead($params['email'], self::SEARCH_BY_EMAIL, $params);
        } else {
            die(100);
        }
    }

    public function validatePhone($phone) {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if(strlen($phone) < 10) {
            return false;
        } else {
            return true;
        }
    }

    public function getAccount($searchTerm, $flag, $params) {
        if($flag == self::SEARCH_BY_PHONE) {
            if($this->validatePhone($searchTerm)) {
                return $this->salesForce->createLead($params);
            }
        }

        $response = $this->salesForce->getAccount($searchTerm);

        if(!$response->ok()) {
            die(115);
        }

        $responseArray = $response->object();

        if(count($responseArray)) {
            foreach($responseArray as $responses) {
                //do this for each record
                // if this is the first time around - match using email
                if ($flag == self::SEARCH_BY_EMAIL) {
                    $accountEmail1 = $responses['PersonEmail'];
                    $accountEmail2 = $responses['Other_Email__c'];
                    $enteredAccount = strtolower($params['email']);
                    // check email entered vs either email in the record
                    if ($accountEmail1 == $enteredAccount || $accountEmail2 == $enteredAccount) {
                        // it matched so they're already have an account
                        die('200');
                    } else {
                        // Email didn't match, so search by phone
                        $this->getAccount($params['phone'], self::SEARCH_BY_PHONE);
                    }
                } else {
                    // this is the second search, based on an exisiting phone, they exist as account
                    die('200');
                }
            }
        } else {
            if ($flag == self::SEARCH_BY_PHONE) {
                // No records were found via phone or email in leads, so create a lead
                $this->salesForce->createLead($params);
            } else {
                // No email was found so look by phone
                $this->getAccount($params['phone'], self::SEARCH_BY_PHONE);
            }
        }
    }

    public function getLead($searchTerm, $flag, $params) {
        if($flag == self::SEARCH_BY_PHONE) {
            if($this->validatePhone($searchTerm)) {
                return $this->salesForce->createLead($params);
            }
        }

        $response = $this->salesForce->getLead($searchTerm);

        if(!$response->ok()) {
            die(110);
        }

        $responseArray = $response->object();

        if(count($responseArray)) {
            foreach($responseArray as $responses) {
                //do this for each record
                // if this is the first time around - match using email
                if ($flag == self::SEARCH_BY_EMAIL) {
                    $accountEmail1 = $responses['PersonEmail'];
                    $accountEmail2 = $responses['Other_Email__c'];
                    $enteredAccount = strtolower($params['email']);
                    // check email entered vs either email in the record
                    if ($accountEmail1 == $enteredAccount || $accountEmail2 == $enteredAccount) {
                        // it matched so they're already have an account
                        $this->salesForce->updateLead($params);
                        die;
                    } else {
                        // Email didn't match, so search by phone
                        $this->getLead($searchTerm, self::SEARCH_BY_PHONE, $params);
                    }
                } else {
                    // this is the second search, based on an exisiting phone, they exist as account
                    $this->salesForce->updateLead($responses[0]['Id'], $params);
                }
            }
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
}
