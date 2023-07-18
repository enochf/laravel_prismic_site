<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\OutreachAdvocate;
use App\Mail\SendOutreachAdvocate;

class OutreachAdvocatesController extends Controller {

    public function execute(Request $request) {

        $params = $request->all();
        
        // Save a new lead
        $advocate = new OutreachAdvocate();
        $advocate->fill($params);
        $advocate->save();

        Mail::to('sandra.jones@csuglobal.edu')
            ->bcc('enoch.fredericks@csuglobal.edu')
            ->send(new SendOutreachAdvocate(json_encode($params)));

        return redirect('/about/our-university/spread-word/outreach-advocates-program/thank-you');

    }

}