<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\RfiLead;

class SendLeads extends Command {

    protected $postUrl = 'https://csuglobal.edu/handle/leads';

    protected $rfiSent = 0;

    protected $last = 0;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:leads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends new leads to CSU Global lead API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {

        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {

        $leads = RfiLead::whereNull('sent')->get();

        foreach($leads as $v) {

            // get inputs
            $params = array(
                'key' => '65f3f28ebc2e3b463ccb481340a2e7e2b91bae26',
                'LeadSource' => $v['lead_source'],
                'FirstName' => $v['first_name'],
                'LastName' => $v['last_name'],
                'Email' => $v['email'],
                'Phone' => $v['phone'],
                'City' => $v['city'],
                'State' => $v['state'],
                'PostalCode' => $v['zip'],
                'Gender__c' => $v['gender'],
                'Program__c' => $v['program'],
                'Highest_Level_Completed__c' => $v['previous_education'],
                'Military_Affiliation__c' => $v['military_affiliation'],
                'Military_Branch__c' => $v['military_branch'],
                'Employer__c' => $v['employer'],
                'Ok_to_Text_Me__c' => ($v['text_permission'] == 1 ? true : false),
                'Current_School__c' => $v['current_school'],
                'Military_Base__c' => $v['military_base'],
                'How_Did_You_Hear_of_Us__c' => $v['how_did_you_hear'],
                'Campus__c' => 'CSU-Global', // campus
                'Estimated_Credits__c' => $v['estimated_credits'],
                'High_School_Grad_Year__c' => $v['hs_graduation'],
                'Campaign_Medium__c' => $v['utm_medium'],
                'Campaign_Name__c' => $v['utm_campaign'],
                'Campaign_Content__c' => $v['utm_content'],
                'GCLID__c' => $v['gclid'],
                'url' => $v['url']
            ); 

            if ($v['lead_source'] == 'web_rfi_minicourse_msda') {
                $params['MSDA_Mini_Course__c'] = true;
            }

            $response = Http::post($this->postUrl, $params);
            $newLead = $response->json();

            if ($newLead['status'] == 'success') {
                $this->rfiSent++;
                $this->last = $v['rfi_id'];
            }

            RfiLead::where('rfi_id', $v['rfi_id'])->update([
                'sent' => NOW(),
                'message' => $newLead
            ]);
        }

        if ($this->rfiSent > 0) {
            echo 'Sent: '.$this->rfiSent.'; Leads: '.$leads[0]['rfi_id'].'-'.$this->last.';
';
        } else {
            echo 'No new Leads to send;
';
        }     
    }
}
