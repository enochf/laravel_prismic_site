<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Csu\Integrations\SalesForce;

class GetCompanyController extends Controller
{
    public function execute(Request $request) {
        $params = $request->all();

        session()->put('app', $params);

        if(!$params['company_name']) {
            die('100');
        }

        $salesForce = new SalesForce();

        $response = $salesForce->getCompany($_POST['company_name']);

        if(!$response->ok()) {
            die('100');
        }

        $responseJson = $response->object();

        foreach($responseJson as $searchResults) {
            $companyName = $searchResults['Name'];

            if ($companyName == $_POST['company_name']) {
                die('200');
            }
        }
    }
}
