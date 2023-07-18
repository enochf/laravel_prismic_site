<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Csu\Integrations\SalesForce;

class EmployerPartnersController extends Controller {
    
    const SEARCH_BY_EMAIL = 1;

    const SEARCH_BY_PHONE = 2;

    protected $salesForce;

    public function __construct() {

        $this->salesForce = new SalesForce();

    }

    public function getCompany(Request $request) {
        
        $params = $request->all();

        if(!$params['company_name']) {
            
            $this->salesForce->responseMessage('failed', 100, 'Company Name Invalid', null);

        }

        $response = $this->salesForce->getCompany($_POST['company_name']);

        if(!$response->ok()) {
            
            $this->salesForce->responseMessage('failed', 110, 'Could not connect to Salesforce', null);

        }

        $responseJson = $response->json();

        foreach($responseJson as $searchResults) {

            $companyName = strtolower($searchResults['Name']);

            if ($companyName == strtolower($_POST['company_name']) && $searchResults['RecordTypeId'] == '012F0000000jCoUIAU') { // 012F0000000jCoUIAU is the Business Account RecordTypeId
                
                $this->salesForce->responseMessage('success', 200, 'Company Found', $searchResults['Id']);

            }
        }

        $this->salesForce->responseMessage('not found', 404, 'Company Not Found', null);

    }

    public function createPartner(Request $request) {
        
        $params = $request->all();

        if ($params['company_name']) {

            $response = $this->salesForce->createCompany($params);
            
            if ($response->status() != 201) {
                
                return redirect('cost/tuition-discounts/employer-partners/error?code=120');
                
            }
            
            $company = $response->json();

            $response = $this->salesForce->createContact($company['id'], $params);

            if ($response->status() != 201) {
                
                return redirect('cost/tuition-discounts/employer-partners/error?code=130');
                
            }

            $contact = $response->json();

            if (isset($contact['id'])) {

                return redirect('cost/tuition-discounts/employer-partners/thank-you');

            } else {

                return redirect('cost/tuition-discounts/employer-partners/error?code=140');

            }
        }
    }
}