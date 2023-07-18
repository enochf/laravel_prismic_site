<?php
namespace App\Csu\Integrations;

use Illuminate\Support\Facades\Http;

class SalesForce {

    protected $clientId;

    protected $clientSecret;

    protected $userName;

    protected $password;

    protected $tokenUrl;

    protected $types_array = array(
        'AMAZON' => 'AMAZON',
        'ATTAFFIL' => 'ATTAFFIL',
        'BALLAFFIL' => 'BALLAFFIL',
        'BBUYAFFIL' => 'BBUYAFFIL',
        'BHEAFFIL' => 'BHEAFFIL',
        'COCHLEAR-AFFIL' => 'COCH-AFFIL',
        'CSPDAFFIL' => 'CSPDAFFIL',
        'DVAFFIL' => 'DVAFFIL',
        'DHHAAFIL' => 'DHHAAFIL',
        'SCLHAFFIL' => 'SCLHAFFIL',
        'SMFRAFFIL' => 'SMFRAFFIL',
        'TRIMBLE-AFFIL' => 'TRMBL-AFFIL',
        'USBANKAFFIL' => 'USBNKAFFIL',
        'USVENTAFFIL' => 'USVNTAFFIL',
        'USPSAFFIL' => 'USPSAFFIL',
        'HUBSPOT-ECA' => 'HUBSPOT-ECA',
        'STUDYAFFIL' => 'STUDYAFFIL',
        'ONDAFFIL' => 'ONDAFFIL',
        'SLAFFIL' => 'SLAFIL',
        'BENESYSTORG' => 'BENESYST',
        'EDASSISTORG' => 'EDAS',
        'HCAAFFIL' => 'HCAEDAS',
        'IECRMPARTNER' => 'IECRM',
        'ISTSORG' => 'ISTS',
        'FAAPARTNER' => 'FAA',
        'SAMAFFIL' => 'SCHOLAM',
        'ACCELERATOR-PARTNER' => 'ACCSCH',
        'ADVANCE-EDU-PARTNER' => 'ADEDU',
        'SNHU-CFA-PARTNER' => 'ADEDU&SNHU',
        'APS-PARTNER' => 'APS',
        'BOCES' => 'BOCES',
        'CDE-PARTNER' => 'CDEGRANT',
        'COGOV' => 'COGOV',
        'CWDCS' => 'CWDCS',
        'CWDCW' => 'CWDCW',
        'DPS-HS' => 'DPS-HS',
        'DPS-TE' => 'DPS-TE',
        'PF-PARTNER' => 'PATHFINDER',
        'GOV-PARTNER' => 'NSA',
        'NJCTL-PARTNER' => 'NJCTL',
        'PEARSON' => 'PEARSONAP',
        'PEARSON-EMP' => 'PEARSONAP',
        'PEARSON-EMP' => 'PEARSONAP',
        'PINNACOL' => 'PINNACOL',
        'SCBOCES' => 'SCBOCES',
        'SNHU-CFA-PARTNER' => 'SNHU',
        'TLP-PARTNER' => 'TLP',
        'VERTO-PARTNER' => 'VERTO',
        'GV-AFFIL' => 'CITYGVAFFIL',
        'PEBC' => 'PEBC',
        'SAMORG' => 'SAMORG',
        'REGO-AFFIL' => 'REGO',
        'WAHCA-AFFIL' => 'WAHCA'
    );

    public function __construct() {

        $this->clientId = env('SALES_FORCE_CLIENT_ID');
        $this->clientSecret = env('SALES_FORCE_CLIENT_SECRET');
        $this->userName = env('SALES_FORCE_USER_NAME');
        $this->password = env('SALES_FORCE_PASSWORD');
        $this->tokenUrl = env('SALES_FORCE_TOKEN_URL');

    }

    public function show() {
        return $this->getCompany("csu", 5);
    }

    protected function getAuthToken() {
        $response = Http::asForm()->post($this->tokenUrl, [
            'grant_type' => 'password',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'username' => $this->userName,
            'password' => $this->password
        ]);

        $data = $response->object();

        if($response->ok() && $this->validateToken($data)) {
            return [
                'token' => $data->access_token,
                'instance_url' => $data->instance_url
            ];
        } else {
            return redirect()->route('student-application/error', ['code' => '135-' . $response->status()]);
        }
    }

    protected function validateToken($data) {
        $hash = hash_hmac('sha256', $data->id . $data->issued_at, $this->clientSecret, true);

        if(base64_encode($hash) === $data->signature) {
            return true;
        } else {
            return false;
        }
    }

    public function getCompany($searchTerm, $limit = 10) {
        $token = $this->getAuthToken();

        $searchTerm = rawurlencode($searchTerm);

        $url = "{$token['instance_url']}/services/data/v36.0/parameterizedSearch/?q=$searchTerm&sobject=Account&Account.fields=id,Name,RecordTypeId&in=NAME";

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->get($url);
    }

    public function updatePreviousCollege($leadId, $params) {
        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Previous_College__c/";

        $content = [
            'Lead__c' => $leadId,
            'Name' => $params['previous_collegename'],
            'State__c' => $params['previous_state']
        ];

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->post($url, $content);
    }

    public function updateLeadCoupon($leadId, $coupon) {
        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Lead/$leadId";

        $content = [
            'Coupon_Code_Used__c' => $coupon,
            'paid__c' =>  true,
            'Application_Status__c' =>  "Paid Application - Pending Conversion to CampusVue"
        ];

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->patch($url, $content);
    }

    public function updateLeadPayPal($leadId) {
        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Lead/$leadId";

        $content = [
            'paid__c' => true,
            'PayPalInfo__c' => 'Paid using PayPal',
            'Application_Status__c' => 'Paid Application - Pending Conversion to CampusVue'
        ];

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->patch($url, $content);
    }

    public function updateLead($leadId, $params = []) {
        if ((isset($params['gender']) && $params['gender'] == "I prefer not to answer") || !isset($params['gender'])) {
            $params['gender'] = '';
        }

        if ((isset($params['marital_status']) && $params['marital_status'] == "I prefer not to answer") || !isset($params['marital_status'])) {
            $params['marital_status'] = '';
        }

        if ((isset($params['parents_college']) && $params['parents_college'] == "I prefer not to answer") || !isset($params['parents_college'])) {
            $params['parents_college'] = '';
        }

        if ((isset($params['work_experience']) && $params['work_experience'] == "I prefer not to answer") || !isset($params['work_experience'])) {
            $params['work_experience'] = '';
        }

        $params = $this->setType($params);

        $content = [
            'Application_Status__c' =>  "Application Submitted Pending Payment",
            'type__c' => (isset($params['Type']))? $params['Type'] : '',
            'FirstName' => (isset($params['first_name']))? $params['first_name'] : '',
            'LastName' => (isset($params['last_name']))? $params['last_name'] : '',
            'Phone' => (isset($params['phone']))? $params['phone'] : '',
            'Organization_Referral_Code__c' => (isset($params['referral_code']))? $params['referral_code'] : '',
            'street' => (isset($params['addressone']))? $params['addressone'] : '',
            'City' => (isset($params['city']))? $params['city'] : '',
            'State' => (isset($params['state']))? $params['state'] : '',
            'PostalCode' => (isset($params['zip']))? $params['zip'] : '',
            'country' => (isset($params['country']))? $params['country'] : '',
            'DOB__c' => date("Y-m-d", strtotime((isset($params['dob']))? $params['dob'] : '')),
            'US_Citizen__c' => (isset($params['uscitizen']))? $params['uscitizen'] : '',
            'Citizenship_Status__c' => (isset($params['NoncitizenStatus']))? $params['NoncitizenStatus'] : '',
            'SSN__c' => (isset($params['social']))? $params['social'] : '',
            'Gender__c' => (isset($params['gender']))? $params['gender'] : '',
            'Race__c' => (isset($params['race'])) ? (is_array($params['race'])) ? join(", ", $params['race']) : $params['race'] : '',
            'Hispanic__c' => (isset($params['Hispanic']))? $params['Hispanic'] : '',
            'Parents_Attended_College__c' => (isset($params['parents_college']))? $params['parents_college'] : '',
            'Work_Experience__c' => (isset($params['work_experience']))? $params['work_experience'] : '',
            'Marital_Status__c' => (isset($params['marital_status']))? $params['marital_status'] : '',
            'Employer__c' => (isset($params['employer']))? $params['employer'] : '',
            'Military_Affiliation__c' => (isset($params['military_affiliation']))? $params['military_affiliation'] : '',
            'Military_Branch__c' => (isset($params['military_branch']))? $params['military_branch'] : '',
            'Degree__c' => (isset($params['Degree']))? $params['Degree'] : '',
            'Program_Picklist__c' => (isset($params['Program']))? $params['Program'] : '',
            'Start_Date__c' => (isset($params['startdate']))? $params['startdate'] : '',
            'Primary_Method_of_Tuition_Payment__c' => (isset($params['primarymethod']))? $params['primarymethod'] : '',
            'High_School_Grad_Year__c' => (isset($params['highschool']))? $params['highschool'] : '',
            'High_School_GPA__c' => (isset($params['highschoolGPA']))? $params['highschoolGPA'] : '',
            'Highest_Level_Completed__c' => (isset($params['previous_education']))? $params['previous_education'] : '',
            'Selective_Service__c' => ((isset($params['selectiveservices']) && $params['selectiveservices'] == 'TRUE')? true : false),
            'GCLID__c' => (isset($params['gclid']))? $params['gclid'] : ''
        ];

        foreach($content as $key => $field) {
            if(empty($field)) unset($content[$key]);
        }

        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Lead/$leadId";

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->patch($url, $content);
    }

    public function getCoupon($leadId, $coupon) {
        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/parameterizedSearch/?q=". $coupon ."&sobject=Discount_Code__c&Discount_Code__c.fields=Id,Status__c&Discount_Code__c.limit=10";

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->get($url);
    }

    public function createLead($params) {
        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Lead/";

        $params = $this->setType($params);

        $content = [
            'LeadSource' => (isset($params['source']))? $params['source'] : '',
            'type__c' => (isset($params['Type']))? $params['Type'] : '',
            'How_Did_You_Hear_of_Us__c' => (isset($params['how_did_you_hear']))? $params['how_did_you_hear'] : '',
            'FirstName' => (isset($params['first_name']))? $params['first_name'] : '',
            'LastName' => (isset($params['last_name']))? $params['last_name'] : '',
            'Maiden_Name__c' => (isset($params['previous_name']))? $params['previous_name'] : '',
            'Email' => (isset($params['email']))? $params['email'] : '',
            'Phone' => (isset($params['phone']))? $params['phone'] : '',
            'Degree__c' => (isset($params['Degree']))? $params['Degree'] : '',
            'Program_Picklist__c' => (isset($params['Program']))? $params['Program'] : '',
            'Organization_Referral_Code__c' => (isset($params['referral_code']))? $params['referral_code'] : '',
            'Application_Status__c' =>  "Application Started",
            'Campaign_Medium__c' => (isset($params['utm_medium']))? $params['utm_medium'] : '',
            'Campaign_Name__c' => (isset($params['utm_campaign']))? $params['utm_campaign'] : '',
            'Campaign_Content__c' => (isset($params['utm_content']))? $params['utm_content'] : '',
            'GCLID__c' => (isset($params['gclid']))? $params['gclid'] : ''
        ];

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->post($url, $content);
    }

    public function createLeadFromApi($params) {

        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Lead/";

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->post($url, $params);
    }

    public function getLead($searchTerm, $limit = 10) {

        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/parameterizedSearch/?q=". rawurlencode($searchTerm) ."&sobject=Lead&Lead.fields=id,Email,Other_Email__c,Lead_Owner_Email__c,Status&Lead.limit=$limit";

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->get($url);
    }

    public function getAccount($term, $limit = 10) {

        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/parameterizedSearch/?q=". $term ."&sobject=Account&Account.fields=id,PersonEmail,Other_Email__c,Account_Owner_Email__c&Account.limit=$limit";

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->get($url);
    }

    public function createCompany($params) {

        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Account/";

        $content = [
            'RecordTypeId' => '012F0000000jCoUIAU',
            'Business_Account_Lead_Source__c' => 'RFI Form',
            'Bussiness_Account_Status__c' => 'Prospect',
            'Name' => $params['company_name'],
            'Industry' => $params['Industry'],
            'NumberOfEmployees' => $params['NumberOfEmployees']
        ];

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->post($url, $content);

    }

    public function createContact($id, $params) {

        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Contact/";

        $content = [
            'AccountId' => $id,
            'FirstName' => $params['first_name'],
            'LastName' => $params['last_name'],
            'Email' => $params['email'],
            'Phone' => $params['phone']
        ];

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->post($url, $content);
        
    }

    public function updateLeadIntEval($id) {

        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Lead/$id";

        $content = [
            'International_Eval_Paid__c' => true
        ];

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->patch($url, $content);

    }

    public function updateAccountIntEval($id) {

        $token = $this->getAuthToken();

        $url = "{$token['instance_url']}/services/data/v36.0/sobjects/Account/$id";

        $content = [
            'International_Eval_Paid__c' => true
        ];

        return Http::withHeaders([
            'Authorization' => "OAuth {$token['token']}",
            'Content-type' => 'application/json'
        ])->patch($url, $content);

    }

    public function responseMessage($status, $code, $message, $id) {

        $response = array(
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'salesforceId' => $id
        );
        die( print_r(json_encode($response), true) );

    }

    public function setType($params) {
        if (array_key_exists(strtoupper($params['referral_code']), $this->types_array)) {
            $params['Type'] = $this->types_array[strtoupper($params['referral_code'])];
        }
        return $params;
    }
}
