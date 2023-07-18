<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ------------------------------------------------------------------------------
// TESTING
// ------------------------------------------------------------------------------

// lead api test form
Route::get('/leadtest', function () {
    return view('leadtest');
});


// ------------------------------------------------------------------------------
// HOMEPAGE
// ------------------------------------------------------------------------------

// homepage
Route::get('/', 'GeneralController@home');


// ------------------------------------------------------------------------------
// LEADS & APPLICATIONS
// ------------------------------------------------------------------------------

// handle leads api
Route::post('/handle_leads', 'LeadsApiController@execute');
Route::post('/handle/leads', 'LeadsApiController@execute');

// rfi
Route::post('/handle/request/information', 'RequestInformationController@handleRfi');

// student application
Route::post('/handle/get/lead/info', 'StudentApplicationController@handleGetLeadInfo');
Route::post('/handle/previous/college', 'StudentApplicationController@getPreviousCollege');
Route::post('/handle/student/application', 'StudentApplicationController@handleApplication');
Route::get('/student/application/payment/coupon', 'StudentApplicationController@applicationPaymentCoupon');
Route::get('/student/application/payment/paypal', 'StudentApplicationController@applicationPaymentPayPal');

// international transcript eval
Route::post('/handle/international/transcript/eval', 'InternationalTranscriptEvalController@getRecord');
Route::get('/handle/international/transcript/eval/paid', 'InternationalTranscriptEvalController@recordPayment');


// ------------------------------------------------------------------------------
// AFFILIATES
// ------------------------------------------------------------------------------

// employer partner referral form
Route::post('/handle/get/company', 'EmployerPartnersController@getCompany');
Route::post('/handle/employer/partner', 'EmployerPartnersController@createPartner');

// affiliate partners
Route::get('/cost/tuition-discounts/employer-partners/{employer}', 'GeneralController@employer');
Route::get('/admissions/transfer-info/affiliate-community-colleges/{college}', 'GeneralController@college');

// community college affiliate request
Route::post('/handle/college/affiliate', 'CollegeAffiliatesController@execute');


// ------------------------------------------------------------------------------
// FORM HANDLERS
// ------------------------------------------------------------------------------

// outreach advocates
Route::post('/handle/outreach/advocates', 'OutreachAdvocatesController@execute');

// testimonial submission
Route::post('/handle/testimonial/submission', 'TestimonialSubmissionsController@execute');

// compliance reporting
Route::post('/handle/compliance/reporting', 'ComplianceReportingController@execute');

// pardot success page for refer-a-friend
Route::post('/about/our-university/spread-word/refer-friend/thank-you', 'GeneralController@execute');


// ------------------------------------------------------------------------------
// BLANK TEMPLATES
// ------------------------------------------------------------------------------

// certificate disclosures
Route::get('/consumer-information/certificate-program-disclosures/{cert}', 'GeneralController@blank');

// career academy
Route::get('/personalized-learning-paths/career-academy', 'GeneralController@blank');

// seu
Route::get('/seu-orientation', 'GeneralController@blank');


// ------------------------------------------------------------------------------
// KUALI CATALOG
// ------------------------------------------------------------------------------

// certificate disclosures
Route::get('/handle/get/kuali', function () {
    return view('kuali');
});


// ------------------------------------------------------------------------------
// CATCH ALL
// ------------------------------------------------------------------------------

// catch all
Route::fallback('GeneralController@execute');