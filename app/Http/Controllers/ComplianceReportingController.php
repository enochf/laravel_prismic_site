<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\ComplianceReport;
use App\Mail\SendComplianceReport;

class ComplianceReportingController extends Controller {

    public function execute(Request $request) {

        $params = $request->all();
        
        // Save compliance report
        $report = new ComplianceReport();
        $report->fill($params);
        $report->save();

        Mail::to('compliance@csuglobal.edu')
            ->bcc('enoch.fredericks@csuglobal.edu')
            ->send(new SendComplianceReport(json_encode($params)));

        return redirect('/compliance-reporting/thank-you');

    }

}
