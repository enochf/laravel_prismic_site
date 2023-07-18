<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Csu\Integrations\SalesForce;

class HandleEmployerController extends Controller
{
    public function execute(Request $request) {
        $params = $request->all();

        session()->put('empRfi', $params);

        if($params['company_name']) {
            $salesForce = new SalesForce();

            $response = $salesForce->createCompany($params);
            if($response->status() != 201) {
                return redirect('cost/tuition-discounts/employer-partners/error');
            } else {
                $response = $salesForce->getCompany($params['company_name']);
                if(!$response->ok()) {
                    return redirect('cost/tuition-discounts/employer-partners/error');
                }

                $arCompanies = $response->object();

                if(count($arCompanies)) {
                    foreach($arCompanies as $company) {
                        $companyName = $company['name'];
                        $companyId = $company['Id'];

                        if($companyName == $params['company_name']) {
                            $salesForce->createContact($companyId, $params);
                        }
                    }
                }
            }
        }
    }
}
