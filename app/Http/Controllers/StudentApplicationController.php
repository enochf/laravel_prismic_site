<?php
namespace App\Http\Controllers;

use App\Csu\Integrations\SalesForce;
use Illuminate\Http\Request;
// use App\Mail\SendSalesForceError;

class StudentApplicationController extends Controller {
    const SEARCH_BY_EMAIL = 1;

    const SEARCH_BY_PHONE = 2;

    protected $salesForce;

    public function __construct() {

        $this->salesForce = new SalesForce();

    }

    public function execute(Request $request) {

        if ($request->cookie('csug_utm')) {
            $utm = unserialize($request->cookie('csug_utm'));
        } else {
            $utm = ['utm_medium' => null, 'utm_campaign' => null, 'utm_content' => null];
        }

        return view('student_application', [
            'utm' => $utm,
            'source' => (session()->get('rfi.source')) ? session()->get('rfi.source') : $request->cookie('sourceCode')
        ]);

    }

    public function handleApplication(Request $request) {

        if (empty(session('lead_id'))) {
            return redirect('/student-application/error?code=130');
        } else {
            $params = $request->all();

            session()->put('app', $params);

            // $sfLead = $this->salesForce->getLead($params['email']);

            // if(!$sfLead->ok()) {
            //     $email = new SendSalesForceError($sfLead->body(). json_encode($sfLead->headers()));
            //     $email->build()->send();

            //     $msg = [
            //         'status' => 'failed',
            //         'code' => $sfLead->status(),
            //         'message' => 'Unable to connect to Salesforce'
            //     ];

            //     die(print_r(json_encode($msg), true));
            // }

            $res = $this->salesForce->updateLead(session('lead_id'), $params);

            // session()->put('flag_update', $sfLead->status());

            if ( $res->status() != 204 ) {
                return redirect()->route('student-application/error', ['code' => '140-' . $queryResponse->status()]);
            } else {
                return redirect('/student-application/payment');
            }
        }
        // } else {
        //     $msg = [
        //         'status' => 'failed',
        //         'code' => 100,
        //         'message' => 'ID not found or invalid'
        //     ];

        //     $email = new SalesForceError('Student Application Submission Process - '. $msg);
        //     $email->build()->send();

        //     return redirect('/student-application/error');
        // }

    }

    public function getPreviousCollege(Request $request) {

        $params = $request->all();

        session()->put('app', $params);

        if(session('lead_id')) {
            $this->salesForce->updatePreviousCollege(session('lead_id'), $params);
        } else {
            die('No ID');
        }

    }

    public function applicationPaymentCoupon(Request $request) {

        $params = $request->all();

        if($params['coupon']) {
            $res = $this->salesForce->getCoupon(session('lead_id'), $params['coupon']);
            if(!$res->ok()) {
                die("<div class=\"invalid\"><p>Error 150: We are unable to process your request at this time. Please try again later.</p></div>");
            }

            $couponResponse = $res->json();

            if(isset($couponResponse[0]) && !empty(($couponResponse[0]))) {
                if ($couponResponse[0]['Status__c'] == "Active") {
                    $res = $this->salesForce->updateLeadCoupon(session('lead_id'), $params['coupon']);
                    if ( $res->status() != 204 ) {
                        die("<div class=\"invalid\"><p>Error 150: We are unable to process your request at this time. Please try again later.</p></div>");
                    } else {
                        die("<div class=\"success\"><p>Success!</p><p><a href=\"/student-application/thank-you\" class=\"btnBlue\">Submit Your Application</a></p></div>");
                    }
                } else {
                    die("<div class=\"invalid\"><p>Error 155: We're sorry, that coupon has expired. Please try another.</p></div>");
                }
            } else {
                die("<div class=\"invalid\"><p>Error 160: Invalid Code. Please try another.</p></div>");
            }
        }

    }

    public function applicationPaymentPayPal(Request $request) {

        if(session('lead_id')) {
            $res = $this->salesForce->updateLeadPayPal(session('lead_id'));

            if ( $res->status() != 204 ) {
                return redirect('/student-application/error?code=180');
            } else {
                return redirect('/student-application/thank-you');
            }
        } else {
            return redirect('/student-application');
        }

    }

    public function handleGetLeadInfo(Request $request) {
        
        $params = $request->all();

        if($params['email']) {
            $this->getAccount($params['email'], self::SEARCH_BY_EMAIL, $params);
        } else {
            die('100');
        }

    }

    public function getLead($searchTerm, $flag, $params) {

        // if($flag == self::SEARCH_BY_PHONE) {
        //     if($this->validatePhone($searchTerm)) {
        //         $this->getAccount($searchTerm, self::SEARCH_BY_EMAIL, $params);
        //         return;
        //     }
        // }

        $response = $this->salesForce->getLead($searchTerm);

        if(!$response->ok()) {
            die(110);
        }

        $responseArray = $response->json();

        if(count($responseArray)) {
            foreach($responseArray as $searchResultLead) {
                //do this for each record
                // if this is the first time around - match using email
                if ($flag == self::SEARCH_BY_EMAIL) {
                    $leadEmail1 = $searchResultLead['Email'];
                    $leadEmail2 = $searchResultLead['Other_Email__c'];
                    $enteredLead = strtolower($params['email']);
                    // check email entered vs either email in the record
                    if ($leadEmail1 == $enteredLead || $leadEmail2 == $enteredLead) {
                        // it matched so they're already a lead
                        session()->put('lead_id', $searchResultLead['Id']);
                        $this->salesForce->updateLead($searchResultLead['Id'], $params);
                        echo $searchResultLead['Id'];
                    } else {
                        // Email didn't match, so search by phone
                        $this->getLead($searchTerm, self::SEARCH_BY_PHONE, $params);
                    }
                } else {
                    // this is the second search, based on an exisiting phone, so update the lead
                    $this->salesForce->updateLead($searchResultLead['Id'], $params);
                    session()->put('lead_id', $searchResultLead['Id']);
                    echo $searchResultLead['Id'];
                }
            }
        } else {
            if ($flag == self::SEARCH_BY_PHONE) {
                // No records were found via phone or email in leads, so create a lead
                $newLead = $this->salesForce->createLead($params);
                $id = $newLead->json()['id'];
                session()->put('lead_id', $id);

                echo $id;
            } else {
                // No email was found so look by phone
                $this->getLead($searchTerm, self::SEARCH_BY_PHONE, $params);
            }
        }
        
    }

    public function getAccount($searchTerm, $flag, $params) {

        // if($flag == self::SEARCH_BY_PHONE) {
        //     if($this->validatePhone($searchTerm)) {
        //         $newLead = $this->salesForce->createLead($params);
        //         session()->put('lead_id', $newLead->json()['id']);

        //         return $newLead;
        //     }
        // }

        $response = $this->salesForce->getAccount($searchTerm);

        if(!$response->ok()) {
            die(115);
        }

        $responseArray = $response->json();

        if(count($responseArray)) {
            foreach($responseArray as $searchResultAccount) {
                //do this for each record
                // if this is the first time around - match using email
                if ($flag == self::SEARCH_BY_EMAIL) {
                    $accountEmail1 = $searchResultAccount['PersonEmail'];
                    $accountEmail2 = $searchResultAccount['Other_Email__c'];
                    $enteredAccount = strtolower($params['email']);
                    // check email entered vs either email in the record
                    if ($accountEmail1 == $enteredAccount || $accountEmail2 == $enteredAccount) {
                        // it matched so they're already have an account
                        die('200');
                    } else {
                        // Email didn't match, so search by phone
                        $this->getAccount($params['phone'], self::SEARCH_BY_PHONE, $params);
                    }
                } else {
                    // this is the second search, based on an exisiting phone, they exist as account
                    die('200');
                }
            }
        } else {
            if ($flag == self::SEARCH_BY_PHONE) {
                // No records were found via phone or email in leads, so create a lead
                $this->getLead($searchTerm, self::SEARCH_BY_EMAIL, $params);
            } else {
                // No email was found so look by phone
                $this->getAccount($params['phone'], self::SEARCH_BY_PHONE, $params);
            }
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
}
