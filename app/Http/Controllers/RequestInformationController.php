<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RfiLead;

class RequestInformationController extends Controller
{
    public function execute(Request $request) {
        return view('rfi.request_information');
    }

    public function handleRfi(Request $request) {

        $params = $request->all();

        $lead = (isset($params['email']))? RfiLead::where('email', $params['email'])->first() : false;

        $params = $this->setUtmCookie($request, $params);

        if(empty($lead) && !isset($params['rfi_id'])) {

            // Save a new lead
            $lead = new RfiLead();
            $lead->fill($params);
            $lead->save();

            if (isset($lead->rfi_id)) session()->put('rfi.rfi_id', $lead->rfi_id);
            if (isset($params['lead_source'])) session()->put('rfi.rfi_lead_source', $params['lead_source']);
            if (isset($params['email'])) session()->put('rfi.rfi_email', $params['email']);

            if (isset($params['lead_source'])) {
                if ($params['lead_source'] == 'LearningSolutions_Corporate') {
                    return redirect()->away('http://rfi.csuglobal.edu/thankyou.html');
                } else if ($params['lead_source'] == 'LearningSolutions_Military') {
                    return redirect()->away('http://rfi.csuglobal.edu/military/thankyou.html');
                } else if ($params['lead_source'] == 'LearningSolutions_Community') {
                    return redirect()->away('http://rfi.csuglobal.edu/community/thankyou.html');
                } else if ($params['lead_source'] == 'web_rfi_campus_tour') {
                    return redirect('/thankyou/additional-information');
                } else if ($params['lead_source'] == 'web_rfi_blog') {
                    return redirect('/blog/request-information-thank-you');
                } else {
                    return redirect('/thankyou/additional-information');
                }
            }

        } elseif(isset($params['rfi_id']) && !empty($params['rfi_id'])) {
            // Lead exists and needs to be updated
            $lead->fill($params);
            $lead->save();

            return redirect('/thankyou/complete');
        } elseif(!empty($lead)) {
            return redirect('/contact-enrollment');
        }
    }

    public function additionalInformation(Request $request) {
        $rfiId = session()->get('rfi.rfi_id');
        $lead = RfiLead::where('rfi_id', $rfiId)->first();

        return view('rfi.additional_information', [
            'leadSent' => ($lead && $lead->sent !== NULL),
            'leadEmail' => $lead->email,
            'leadSource' => session()->get('rfi.rfi_lead_source'),
            'leadRfiId' => $rfiId,
            'leadEmployer' => $lead->employer
        ]);
    }

    public function setUtmCookie($request, $params) {
        if($request->cookie('csug_utm')) {
            $codes = unserialize($request->cookie('csug_utm'));
            $utm_codes = [
                'utm_medium' => (isset($codes['utm_medium']) ? $codes['utm_medium'] : null),
                'utm_campaign' => (isset($codes['utm_campaign']) ? $codes['utm_campaign'] : null),
                'utm_content' => (isset($codes['utm_content']) ? $codes['utm_content'] : null)
            ];
            return array_merge($params, $utm_codes);
        } else {
            return array_merge([
                'utm_medium' => null,
                'utm_campaign' => null,
                'utm_content' => null
            ], $params);
        }
    }
}
