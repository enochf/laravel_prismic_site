<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\CollegeAffiliate;
use App\Mail\SendCollegeAffiliate;

class CollegeAffiliatesController extends Controller {

    public function execute(Request $request) {

        $params = $request->all();
        
        // Save a new lead
        $advocate = new CollegeAffiliate();
        $advocate->fill($params);
        $advocate->save();

        Mail::to('CCOutreach@CSUGlobal.edu')
            ->bcc('enoch.fredericks@csuglobal.edu')
            ->send(new SendCollegeAffiliate(json_encode($params)));

        return redirect('/about/partnerships/become-affiliate-college/thank-you');

    }

}
