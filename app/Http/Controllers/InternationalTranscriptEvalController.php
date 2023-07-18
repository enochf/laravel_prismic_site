<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Csu\Integrations\SalesForce;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInternationalTranscriptEval;

class InternationalTranscriptEvalController extends Controller {

    protected $salesForce;

    public function __construct() {

        $this->salesForce = new SalesForce();

    }

    public function getRecord(Request $request) {

        $params = $request->all();
        
        if (!isset($params['email'])) {
            return redirect('/international-transcript-evaluation-application?code=100');
        } else {
            session()->put('int_app', $params);

            $sfLead = $this->salesForce->getLead($params['email']);

            $myLead = $sfLead->json();

            if ( $sfLead->status() != 200 || $myLead[0]['Status'] == 'Converted' ) {
                $sfAccount = $this->salesForce->getAccount($params['email']);

                if ( $sfAccount->status() != 200 ) {
                    die('No lead record found');
                } else {
                    $myAccount = $sfAccount->json();
                    session()->put('int_app.Id', $myAccount[0]['Id']);
                    session()->put('int_app.owner', $myAccount[0]['Account_Owner_Email__c']);
                    session()->put('int_app.type', 'account');

                    Mail::to(session('int_app.owner'))
                        ->bcc('enoch.fredericks@csuglobal.edu')
                        ->send(new SendInternationalTranscriptEval(json_encode(session('int_app'))));

                    die('success');
                }
            } else {
                session()->put('int_app.Id', $myLead[0]['Id']);
                session()->put('int_app.owner', $myLead[0]['Lead_Owner_Email__c']);
                session()->put('int_app.type', 'lead');

                Mail::to(session('int_app.owner'))
                    ->bcc('enoch.fredericks@csuglobal.edu')
                    ->send(new SendInternationalTranscriptEval(json_encode(session('int_app'))));
                
                die('success');
            }

        }

    }

    public function recordPayment() {

        if (empty(session('int_app.Id'))) {
            return redirect('/international-transcript-evaluation-application?code=105');
        } else {
            if (session('int_app.type') == 'lead') {
                $res = $this->salesForce->updateLeadIntEval(session('int_app.Id'));

                if ( $res->status() != 204 ) {
                    die('We coudn\'t update your lead');
                } else {
                    return redirect('/international-transcript-evaluation-application/thank-you');
                }
            } else if (session('int_app.type') == 'account') {
                $res = $this->salesForce->updateAccountIntEval(session('int_app.Id'));

                if ( $res->status() != 204 ) {
                    die('We coudn\'t update your account');
                } else {
                    return redirect('/international-transcript-evaluation-application/thank-you');
                }
            }
        }

    }

}
