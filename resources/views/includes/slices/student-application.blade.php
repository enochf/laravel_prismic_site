<?php
use Illuminate\Support\Facades\Cookie;


if (Cookie::get('csug_utm')) {
    $utm = unserialize(Cookie::get('csug_utm'));
} else {
    $utm = ['utm_medium' => null, 'utm_campaign' => null, 'utm_content' => null];
}

$source = (session()->get('rfi.source')) ? session()->get('rfi.source') : Cookie::get('sourceCode')
?>

@include('includes.global_data')

@extends('layout.default')

@section('content')

<!-- student-application -->
<div class="style-container padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="centered">
                    <h2>Ready to Move Forward?</h2>
                    <p>Summer is for celebrations, including the start of new opportunities! What better time to move forward toward your education and career goals?</p>
                    <p><strong>To help you take the first step, we're waiving all application fees with the code below:</strong></p>
                    <p style="font-size:24px;"><strong>DIVEINTOSUMMER</strong></p>
                    <p>&nbsp;</p>
                </div>
                <style>
                    input, select {font-family:'Source Sans Pro', sans-serif; font-size:14px; padding:5px; border:solid 1px #ccc; border-radius:5px; width:100%; -webkit-transition: all .3s;
                        transition: all .3s;
                        margin-top:5px}
                    .informational {position:relative}
                    .various {display:block; font-size:16px;
                        font-weight:600 !important;
                        text-decoration:none;
                        background-color:#70a1e6;
                        color:#fff !important; padding:3px 13px; position:absolute; right:5px; top:10px; border-radius:50%}
                    .infoBox {
                        max-width: 700px;
                    }
                    .infoBox ul {list-style-type: disc;
                        margin: 0 30px;}
                    .infoBox p, .infoBox li {
                        font-size: 14px;
                        line-height: 20px;
                        margin: 10px 0;
                    }
                    .revewMessage {display:none}
                    .hidden, #main form label {display:none}
                    #spinner_01, #spinner_02 {display:none; margin:0 auto;}
                    #spinner_01.show, #spinner_02.show {display:block;}
                    #main form h2 {margin-top:40px}
                    #main form label.show {display:block}
                    input#military_affiliation {float:left}
                    #main form input#next, #main form input#submit_application, #main form input.addmore {
                        display: inline-block;
                        width: auto;
                        padding: 10px 20px;
                        background-color: #70a1e6; color:#fff; text-transform: uppercase;
                        font-weight: 700; border:0}
                    #main form.confirm input#go_back {background-color: #70a1e6; color: #fff; text-transform: uppercase;
                        font-weight: 700;}
                    #main form input#next:hover, #main form input#submit_application:hover, #main form.confirm input#go_back:hover {background-color:#e3ecfb; color:#1c2333}

                    #main form.confirm label {display:block; width:170px; float:left; margin:0}
                    #main form.confirm input[type=text], .confirm select {color:#000; width:230px !important; float:right; border:0;
                        background-color:#fff !important; padding:0; font-size:14px; margin:0 !important}
                    #main form.confirm select {appearance: none; -webkit-appearance: none;padding: 0;
                        height: auto;color: #000;
                        opacity: 1;}
                    #main form.confirm p {width:100%; display:inline-block; float:none; clear:both; padding-bottom:10px; border-bottom:1px solid #e3ecfb}
                    #main form.confirm p:after {content:" "; clear:both;}
                    #main form.confirm p.noborder {border-bottom:0}
                    #main form.confirm .various {display:none}
                    #main form.confirm .revewMessage {display:block}
                    #main form.confirm label:after {content:":"}
                    #main form.confirm .required {display:none}
                    #main form.confirm input[type=button] {width: 45% !important;
                        float: left;
                        margin: 0 2%;}
                    #main form .invalid {border-color:#cc0000; text-align:left}
                    p.invalid {border-color:#cc0000}
                    #main form label.invalid {color:#cc0000; margin:0;}
                    #main #previousToggle {    float: left;
                        margin: 5px 10px 5px;
                        vertical-align: text-bottom;
                        width: auto;    height: 20px;}
                    #main form .extraBottom {padding-bottom:15px}
                    #main form .race_wrapper {height: 45px;
                        color: #666;
                        overflow: hidden;
                        border: solid 1px #999;
                        border-radius: 5px;
                        padding: 7px 8px;
                        margin-bottom: 10px;
                    }
                    #main form .race_wrapper input[type=checkbox] {width:auto; margin-right:10px}
                    #main form select option[disabled] {
                        display: none;
                    }
                    #main form #previous_name {display:none}
                    #main form p#previousFields select, #main form p.inactive select {width:23%}
                    #main form p#previousFields input[type=text], #main form p.inactive input[type=text] {width:65%}
                    #main form p#previousFields input.addmore {width:10%; padding:9px 10px !important;}
                    html #main form input[disabled] {
                        cursor: default;
                        display: inline-block;
                        width: auto;
                        padding: 10px 20px;
                        background-color: #f2f2f2;
                        color: #ccc;
                        text-transform: uppercase;
                        font-weight: 700;
                        border: 0;
                        width:10%;
                        padding:9px 10px !important;
                    }
                    #main form #errormessage { display:none; color:#cc0000; padding:15px 0px; }
                    @media only screen and (max-width: 600px) {
                        #main form p#previousFields select, #main form p.inactive select {width:85%}
                        #main form p#previousFields input[type=text], #main form p.inactive input[type=text] {width:85%}
                    }
                </style>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $.support.placeholder = (function() {
                            var i = document.createElement( 'input' );
                            return 'placeholder' in i;
                        })();
                        $.validator.addMethod('required2', function(value, element, param) {
                            return (value != '' && value != $(element).attr('placeholder'));
                        }, 'This field is required');
                        $.validator.addMethod(
                            "mySSN",
                            function(value, element) {
                                // yyyy-mm-dd
                                var re = /^\d{3}-\d{2}-\d{4}$/;
                                //var re = /^([0-6]\d{2}|7[0-6]\d|77[0-2])([ \-]?)(\d{2})\2(\d{4})$/;

                                // valid if optional and empty OR if it passes the regex test
                                return value == $(element).attr('placeholder') || re.test(value) || value == "";
                            }, "Please enter a valid Social Security Number, ex: 123-45-6789"
                        );
                        $.validator.addMethod('newDOB',
                            function(value) {
                                return (value.match(/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/)); },
                            'Please enter a valid Birthdate, ex: mm/dd/yyyy');
                        $.validator.addMethod('decimalPlace',
                            function(value) {
                                if (value) {
                                    return (value.match(/^[0-9]{1,3}(?:\.[0-9]{1,3})?$/));
                                } else {
                                    return false;
                                }
                            },
                            'Please enter a valid decimal number, ex: 4.0');
                        $.validator.addMethod('customPhone',
                            function(value) {
                                return (value.match(/[0-9\(\)\.\-\_\s]+/)); },
                            'Please enter a valid phone number');
                        // jquery validate for form 1
                        $("#altstudentapp").validate({
                            errorClass: "invalid",
                            rules: {
                                first_name: "required2",
                                last_name: "required2",
                                previous_toggle: "required2",
                                email: {
                                    required: true,
                                    email: true
                                },
                                phone: "required",
                                Program: "required2",
                                Degree: "required2"
                            },
                            messages: {
                                highschool: "Please enter a valid year, ex: 2019",
                                email: "Please provide a valid email address"
                            }
                        });

                        // force number for GPA
                        $('.force_num').keyup(function () { 
                            this.value = this.value.replace(/[^0-9\.]/g,'');
                        });

                        // General scripts
                        $('#noncitizen').hide();
                        $('#militaryBranch').hide();

                        $("#next").click(function(){  // capture the click
                            if($("#altstudentapp").valid()){   // test for validity
                                // do stuff if form is valid
                                $('#spinner_01').addClass('show');
                                $('#next').hide();
                                console.log("I clicked submit, it's valid, now confirm");
                                confirmInfo();
                            } else {
                                // do stuff if form is not valid
                                console.log("I clicked submit, but it's not valid");
                            }
                        });
                        $("#submit_application").click(function(){  // capture the click
                            if($("#altstudentapp").valid()){   // test for validity
                                // do stuff if form is valid
                                $('#errormessage').hide();
                                $('#spinner_02').addClass('show');
                                $('#submit_application').hide();
                                console.log("I clicked submit again, it's valid");
                                //$('#submit_application').prop('disabled', true).css('opacity','.2');
                                $('form#altstudentapp').attr('action', '/handle/student/application');
                                $('form#altstudentapp').submit();
                            } else {
                                // do stuff if form is not valid
                                $('#errormessage').fadeOut('fast', function () {
                                    $('#errormessage').fadeIn('fast');
                                });
                                console.log("I clicked submit, but it's not valid");
                            }
                        });
                    });
                </script>
                <form id="altstudentapp" class="form" action="" method="POST">
                    <p id="altstudentapp-message" class="clr msg noborder">* Required Fields</p>
                    <!-- <input id="lead_id" name="lead_id" type="hidden" value="" /> -->
                    <input name="source" type="hidden" value="Student Application" />
                    <input name="Campus" type="hidden" value="CSU-Global" />
                    <input name="Type" id="Type" type="hidden" value="" />
                    <input type="hidden" name="how_did_you_hear" value="{{ $source }} Student App2">
                    <input name="utm_medium" type="hidden" value="{{ isset($utm['utm_medium']) ? $utm['utm_medium'] : '' }}">
                    <input name="utm_campaign" type="hidden" value="{{ isset($utm['utm_campaign']) ? $utm['utm_campaign'] : '' }}">
                    <input name="utm_content" type="hidden" value="{{ isset($utm['utm_content']) ? $utm['utm_content'] : '' }}">
                    <input id="gclid" name="gclid" type="hidden" />

                    <h3>Basic Information</h3>
                    <!-- visible form elements -->

                    <p><label>Legal First Name</label>
                        <input id="first_name" name="first_name" class="tblr3" type="text" placeholder="Legal First Name *" value="" /></p>
                    <p><label>Legal Last Name</label>
                        <input id="last_name" name="last_name" class="tblr3" type="text" placeholder="Legal Last Name *" value="" /></p>

                    <p><label>Previous Name <span class="required">*</span></label>
                        <select id="previous_toggle" name="previous_toggle" onchange="setPrevious();">
                            <option value="">--  Do you have a previous name? * --</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select></p>
                    <p><input type="text" name="previous_name" id="previous_name" placeholder="Previous Name *" value="" /></p>

                    <p><label>Email</label>
                        <input id="email" name="email" class="tblr3" type="text" placeholder="Email *" value="" /></p>
                    <p><label>Phone</label>
                        <input id="phone" name="phone" class="tblr3 customPhone" type="text" placeholder="Phone Number *" value="" /></p>

                    <p><label>Degree Type <span class="required">*</span></label>
                        <select id="Degree" name="Degree" >
                            <option value="">--  Degree Type * --</option>
                            <option value="Undergraduate Certificate">Undergraduate Certificate</option>
                            <option value="Bachelor of Science">Bachelor's Degree</option>
                            <option value="Graduate Certificate">Graduate Certificate</option>
                            <option value="Master">Master's Degree</option>
                            <option value="Non-Degree Seeking">Non-Degree Seeking</option>
                        </select></p>

                    <p><label>Program <span class="required">*</span></label>
                        <select id="Program" name="Program">
                            <option value="">--  Program * --</option>
                            <option value="BS - Accounting" data-tag="Bachelor of Science">BS - Accounting</option>
                            <option value="BS - Business Management" data-tag="Bachelor of Science">BS - Business Management</option>
                            <option value="BS - Computer Science" data-tag="Bachelor of Science">BS - Computer Science</option>
                            <option value="BS - Criminal Justice" data-tag="Bachelor of Science">BS - Criminal Justice</option>
                            <option value="BS - Cybersecurity" data-tag="Bachelor of Science">BS - Cybersecurity</option>
                            <option value="BS - Finance" data-tag="Bachelor of Science">BS - Finance</option>
                            <option value="BS - Healthcare Administration and Management" data-tag="Bachelor of Science">BS - Healthcare Administration and Management</option>
                            <option value="BS - Human Resource Management" data-tag="Bachelor of Science">BS - Human Resource Management</option>
                            <option value="BS - Human Services" data-tag="Bachelor of Science">BS - Human Services</option>
                            <option value="BS - Information Technology" data-tag="Bachelor of Science">BS - Information Technology</option>
                            <option value="BS - Interdisciplinary Professional Studies" data-tag="Bachelor of Science">BS - Interdisciplinary Professional Studies</option>
                            <option value="BS - Management Information Systems and Business Analytics" data-tag="Bachelor of Science">BS - Management Information Systems and Business Analytics</option>
                            <option value="BS - Marketing" data-tag="Bachelor of Science">BS - Marketing</option>
                            <option value="BS - Organizational Leadership" data-tag="Bachelor of Science">BS - Organizational Leadership</option>
                            <option value="BS - Project Management" data-tag="Bachelor of Science">BS - Project Management</option>
                            <option value="DS - Degree Seeking Freshman" data-tag="Bachelor of Science">DS - Degree Seeking Freshman</option>
                            <option value="Graduate Certificate in Business Analytics" data-tag="Graduate Certificate">Graduate Certificate in Business Analytics</option>
                            <option value="Graduate Certificate in Cyber Security" data-tag="Graduate Certificate">Graduate Certificate in Cyber Security</option>
                            <option value="Graduate Certificate in Digital Instructional Architecture" data-tag="Graduate Certificate">Graduate Certificate in Digital Instructional Architecture</option>
                            <option value="Graduate Certificate in Educational Leadership - Principal Licensure" data-tag="Graduate Certificate">Graduate Certificate in Educational Leadership - Principal Licensure</option>
                            <option value="Graduate Certificate in Human Resource Management" data-tag="Graduate Certificate">Graduate Certificate in Human Resource Management</option>
                            <option value="Graduate Certificate in Project Management" data-tag="Graduate Certificate">Graduate Certificate in Project Management</option>
                            <option value="Master - Business Administration" data-tag="Master">Master - Business Administration</option>
                            <option value="Master - Criminal Justice" data-tag="Master">Master - Criminal Justice</option>
                            <option value="Master - Finance" data-tag="Master">Master - Finance</option>
                            <option value="Master - Healthcare Administration" data-tag="Master">Master - Healthcare Administration</option>
                            <option value="Master - Human Resource Management" data-tag="Master">Master - Human Resource Management</option>
                            <option value="Master - Information Technology Management" data-tag="Master">Master - Information Technology Management</option>
                            <option value="Master - Interdisciplinary Professional Studies" data-tag="Master">Master - Interdisciplinary Professional Studies</option>
                            <option value="Master - Professional Accounting" data-tag="Master">Master - Professional Accounting</option>
                            <option value="Master - Project Management" data-tag="Master">Master - Project Management</option>
                            <option value="MS - Artificial Intelligence and Machine Learning" data-tag="Master">MS - Artificial Intelligence and Machine Learning</option>
                            <option value="MS - Data Analytics" data-tag="Master">MS - Data Analytics</option>
                            <option value="MS - Marketing" data-tag="Master">MS - Marketing</option>
                            <option value="MS - Management" data-tag="Master">MS - Management</option>
                            <option value="MS - Military and Emergency Responder Psychology" data-tag="Master">MS - Military and Emergency Responder Psychology</option>
                            <option value="MS - Organizational Leadership" data-tag="Master">MS - Organizational Leadership</option>
                            <option value="MS - Organizational Leadership - Executive Express Path" data-tag="Master">MS - Organizational Leadership - Executive Express Path</option>
                            <option value="MS - Teaching and Learning" data-tag="Master">MS - Teaching and Learning</option>
                            <option value="MS - Teaching and Learning - TeacherReady" data-tag="Master">MS - Teaching and Learning (TeacherReady)</option>
                            <option value="MS - Teaching and Learning - Principal Licensure" data-tag="Master">MS - Teaching and Learning - Principal Licensure</option>
                            <option value="NDS - Credit Development" data-tag="Non-Degree Seeking">NDS - Credit Development</option>
                            <option value="NDS - GEM" data-tag="Non-Degree Seeking">NDS - GEM</option>
                            <option value="NDS - New Jersey Center for Teaching and Learning" data-tag="Non-Degree Seeking">NDS - New Jersey Center for Teaching and Learning</option>
                            <option value="NDS - Non-Degree Seeking" data-tag="Non-Degree Seeking">NDS - Non-Degree Seeking</option>
                            <option value="NDS - Non-Degree Seeking (Undergraduate)" data-tag="Non-Degree Seeking">NDS - Non-Degree Seeking (Undergraduate)</option>
                            <option value="NDS - Non-Degree Seeking (Graduate)" data-tag="Non-Degree Seeking">NDS - Non-Degree Seeking (Graduate)</option>
                            <option value="NDS - High School Dual Enrollment" data-tag="Non-Degree Seeking">NDS - High School Dual Enrollment</option>
                            <option value="Undergraduate Certificate in Business Administration" data-tag="Undergraduate Certificate">Undergraduate Certificate in Business Administration</option>
                            <option value="Undergraduate Certificate in Computer Programming" data-tag="Undergraduate Certificate">Undergraduate Certificate in Computer Programming</option>
                            <option value="Undergraduate Certificate in Cyber Security" data-tag="Undergraduate Certificate">Undergraduate Certificate in Cyber Security</option>
                            <option value="Undergraduate Certificate in Data Management and Analysis" data-tag="Undergraduate Certificate">Undergraduate Certificate in Data Management and Analysis</option>
                            <option value="Undergraduate Certificate in Digital Marketing" data-tag="Undergraduate Certificate">Undergraduate Certificate in Digital Marketing</option>
                            <option value="Undergraduate Certificate in Fundraising" data-tag="Undergraduate Certificate">Undergraduate Certificate in Fundraising</option>
                            <option value="Undergraduate Certificate in Information Technology Operations" data-tag="Undergraduate Certificate">Undergraduate Certificate in Information Technology Operations</option>
                            <option value="Undergraduate Certificate in Marketing" data-tag="Undergraduate Certificate">Undergraduate Certificate in Marketing</option>
                            <option value="Undergraduate Certificate in Networking" data-tag="Undergraduate Certificate">Undergraduate Certificate in Networking</option>
                            <option value="Undergraduate Certificate in Project Management" data-tag="Undergraduate Certificate">Undergraduate Certificate in Project Management</option>
                            <option value="Undergraduate Certificate in Web Application Development" data-tag="Undergraduate Certificate">Undergraduate Certificate in Web Application Development</option>
                        </select></p>

                    <p>If you received a Referral Code from your employer or organization, please enter it now to ensure proper routing of your application. Please note, this is not an application fee waiver code. Fee waiver codes are entered at the end of the application.</p>

                    <p><label>Partnership Referral Code</label>
                        <input id="referral_code" name="referral_code" class="tblr3" type="text" placeholder="Partnership Referral Code" value="" /></p>

                    <input id="next" type="button" name="next" class="btn_lblue_white rfi-submit" value="Complete the Application">
                    <img src="{{ asset('/imgs/spinner_01.gif') }}" alt="loading student information" width="30" id="spinner_01" />
                    <p id="disclaimer">By submitting this form, I agree that CSU-Global may contact me about educational services by phone/text message. Message and data rates may apply. I understand that my consent is not required to attend CSU-Global.</p>
                    <div id="addFields"></div>
                    <div id="formPart2" class="hidden">
                        <h3>Personal Information</h3>

                        <p><label>Address</label>
                            <input id="addressone" name="addressone" class="required2 toValidate " type="text" placeholder="Address One *" value="" /></p>
                        <p><label>Address 2</label>
                            <input id="addresstwo" name="addresstwo" type="text" placeholder="Address Two" value="" /></p>
                        <p><label>City</label>
                            <input id="city" name="city" class="required2 toValidate " type="text" placeholder="City *" value="" /></p>

                        <p><label>Country <span class="required">*</span></label>
                            <select id="country" name="country" class="required2 toValidate">
                                <option value="">Country *</option>
                                <option value="United States">United States</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Bassas da India">Bassas da India</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Virgin Islands">British Virgin Islands</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burma">Burma</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Europa Island">Europa Island</option>
                                <option value="Falkland Islands (Islas Malvinas)">Falkland Islands (Islas Malvinas)</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Gaza Strip">Gaza Strip</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guam">Guam</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia">Micronesia</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="North Korea">North Korea</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of the Congo">Republic of the Congo</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Korea">South Korea</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard">Svalbard</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks &amp; Caicos Islands">Turks &amp; Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands">Virgin Islands</option>
                                <option value="West Bank">West Bank</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                                <option value="Not Selected">Not Selected</option>
                            </select>
                        </p>
                        <p><label>State <span class="required">*</span></label>
                            <select id="state" name="state" class="required2 toValidate">
                                <option value="">State *</option>
                                <option value="AL" class="unitedStates">Alabama</option>
                                <option value="AK" class="unitedStates">Alaska</option>
                                <option value="AS" class="unitedStates">American Samoa</option>
                                <option value="AZ" class="unitedStates">Arizona</option>
                                <option value="AR" class="unitedStates">Arkansas</option>
                                <option value="AA" class="unitedStates">Armed Forces Americas</option>
                                <option value="AE" class="unitedStates">Armed Forces Europe</option>
                                <option value="AP" class="unitedStates">Armed Forces Pacific</option>
                                <option value="CA" class="unitedStates">California</option>
                                <option value="CO" class="unitedStates">Colorado</option>
                                <option value="CT" class="unitedStates">Connecticut</option>
                                <option value="DE" class="unitedStates">Delaware</option>
                                <option value="DC" class="unitedStates">District of Columbia</option>
                                <option value="FM" class="unitedStates">Federated States of Micronesia</option>
                                <option value="FL" class="unitedStates">Florida</option>
                                <option value="GA" class="unitedStates">Georgia</option>
                                <option value="GU" class="unitedStates">Guam</option>
                                <option value="HI" class="unitedStates">Hawaii</option>
                                <option value="ID" class="unitedStates">Idaho</option>
                                <option value="IL" class="unitedStates">Illinois</option>
                                <option value="IN" class="unitedStates">Indiana</option>
                                <option value="IA" class="unitedStates">Iowa</option>
                                <option value="KS" class="unitedStates">Kansas</option>
                                <option value="KY" class="unitedStates">Kentucky</option>
                                <option value="LA" class="unitedStates">Louisiana</option>
                                <option value="ME" class="unitedStates">Maine</option>
                                <option value="MH" class="unitedStates">Marshall Islands</option>
                                <option value="MD" class="unitedStates">Maryland</option>
                                <option value="MA" class="unitedStates">Massachusetts</option>
                                <option value="MI" class="unitedStates">Michigan</option>
                                <option value="MN" class="unitedStates">Minnesota</option>
                                <option value="MS" class="unitedStates">Mississippi</option>
                                <option value="MO" class="unitedStates">Missouri</option>
                                <option value="MT" class="unitedStates">Montana</option>
                                <option value="NE" class="unitedStates">Nebraska</option>
                                <option value="NV" class="unitedStates">Nevada</option>
                                <option value="NH" class="unitedStates">New Hampshire</option>
                                <option value="NJ" class="unitedStates">New Jersey</option>
                                <option value="NM" class="unitedStates">New Mexico</option>
                                <option value="NY" class="unitedStates">New York</option>
                                <option value="NC" class="unitedStates">North Carolina</option>
                                <option value="ND" class="unitedStates">North Dakota</option>
                                <option value="MP" class="unitedStates">Northern Mariana Islands</option>
                                <option value="OH" class="unitedStates">Ohio</option>
                                <option value="OK" class="unitedStates">Oklahoma</option>
                                <option value="OR" class="unitedStates">Oregon</option>
                                <option value="PW" class="unitedStates">Palau</option>
                                <option value="PA" class="unitedStates">Pennsylvania</option>
                                <option value="PR" class="unitedStates">Puerto Rico</option>
                                <option value="RI" class="unitedStates">Rhode Island</option>
                                <option value="SC" class="unitedStates">South Carolina</option>
                                <option value="SD" class="unitedStates">South Dakota</option>
                                <option value="TN" class="unitedStates">Tennessee</option>
                                <option value="TX" class="unitedStates">Texas</option>
                                <option value="UT" class="unitedStates">Utah</option>
                                <option value="VT" class="unitedStates">Vermont</option>
                                <option value="VI" class="unitedStates">Virgin Islands</option>
                                <option value="VA" class="unitedStates">Virginia</option>
                                <option value="WA" class="unitedStates">Washington</option>
                                <option value="WV" class="unitedStates">West Virginia</option>
                                <option value="WI" class="unitedStates">Wisconsin</option>
                                <option value="WY" class="unitedStates">Wyoming</option>
                                <option value="Not Selected" class="NonunitedStates">Not Selected</option>
                                <option value="FO" class="NonunitedStates">Outside of the US</option>
                                <option value="AA" class="NonunitedStates">Armed Forces Americas</option>
                                <option value="AE" class="NonunitedStates">Armed Forces Europe</option>
                                <option value="AP" class="NonunitedStates">Armed Forces Pacific</option>

                            </select>
                        </p>
                        <p><label>Zip/Postal Code</label>
                            <input id="zip" name="zip" class="required2 toValidate " type="text" placeholder="Zip/Postal Code *" value="" /></p>

                        <h3>Additional Information</h3>

                        <p><label>Date of Birth (mm/dd/yyyy) <span class="required">*</span></label>
                            <input id="dob" name="dob" class="required2 toValidate newDOB" type="text" placeholder="Date of Birth (mm/dd/yyyy) *" value="" /></p>

                        <p><label>I am a U.S. Citizen <span class="required">*</span></label>
                            <select id="uscitizen" name="uscitizen" onChange="setCitizenship();" class="required2 toValidate">
                                <option value="" class="noShow">--  I am a U.S. Citizen * --</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select></p>

                        <div id="noncitizen">
                            <p><label>If you selected no</label>
                                <select id="NoncitizenStatus" name="NoncitizenStatus" class="required2 toValidate">
                                    <option value="" class="noShow">--  If you selected no --</option>
                                    <option value="Non-Citizen">Non-Citizen</option>
                                    <option value="Eligible Non-Citizen">Eligible Non-Citizen</option>
                                    <option value="US Citizen">US Citizen</option>
                                    <option value="N/A">N/A</option>
                                </select></p>
                        </div>
                        <div class="informational">
                            <p><label>Social Security Number</label>
                                <input id="social" name="social" class="mySSN tblr3 noShow" type="text" placeholder="Social Security Number *" value="" />
                                <a href="#ssn" class="various">?</a>
                                <br><i>*required for financial aid or deferred payments</i></p>
                            <div style="display:none">
                                <div id="ssn" class="infoBox">
                                    <h3>Why SSN?</h3>
                                    <p>You are <strong>required</strong> to provide your SSN if you plan to:</p>
                                    <ul>
                                        <li>Apply for financial aid</li>
                                        <li>Apply for deferred payment options</li>
                                    </ul>
                                    <p class="small">If you complete the application without providing your SSN, but are required to based on your payment
                                        method, the university may require you to provide a faxed copy of your SSN card and/or additional documents to verify
                                        and enter this information during the admissions process.</p>
                                </div>
                            </div>
                        </div>
                        <p><label>Marital Status</label>
                            <select id="marital_status" name="marital_status" class="required2 toValidate">
                                <option value="" class="noShow" selected>-- Marital Status * --</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Separated">Separated</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Unknown">Unknown</option>
                                <option value="I prefer not to answer">I prefer not to answer</option>
                            </select>
                        </p>
                        <p><label>Employer</label>
                            <input id="employer" name="employer" type="text" placeholder="Employer" value="" />
                        </p>

                        <p><label>Gender</label>
                            <select id="gender" name="gender" class="required2 toValidate">
                                <option value="" class="noShow" selected>-- Gender * --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Not specified">Not specified</option>
                                <option value="I prefer not to answer">I prefer not to answer</option>
                            </select>
                        </p>
                        <p><label>Hispanic/Latino</label>
                            <select id="Hispanic" name="Hispanic" class="required2 toValidate">
                                <option value="" class="noShow">--  Do you identify as Hispanic or Latino? * --</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </p>

                        <div class="race_wrapper">
                            <p><label>Race</label>
                                --  Please select one or more races with which you identify --<br clear="all">
                                <input type="checkbox" value="Asian" name="race[]">Asian</option><br>
                                <input type="checkbox" value="Black or African American" name="race[]">Black or African American</option><br>
                                <input type="checkbox" value="Native American or Alaska Native" name="race[]">Native American or Alaska Native</option><br>
                                <input type="checkbox" value="Native Hawaiian or Pacific Islander" name="race[]">Native Hawaiian or Pacific Islander</option><br>
                                <input type="checkbox" value="White" name="race[]">White</option>
                                </select></p>
                        </div>

                        <p><label>Parents attended college</label>
                            <select id="parents_college" name="parents_college" class="required2 toValidate">
                                <option value="" class="noShow">--  Did your parents attend college? * --</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="I prefer not to answer">I prefer not to answer</option>
                            </select>
                        </p>
                        <p><label>Work Experience</label>
                            <select id="work_experience" name="work_experience" class="required2 toValidate">
                                <option value="" class="noShow">--  How many years of work experience do you have (including volunteer work)? * --</option>
                                <option value="Less Than Year">Less than 1 year</option>
                                <option value="1 Year">Between 1 year - 2 years</option>
                                <option value="2+ Years">More than 2 years</option>
                                <option value="I prefer not to answer">I prefer not to answer</option>
                            </select>
                        </p>
                        <p><label>Military Affiliation</label>
                            <select name="military_affiliation" id="military_affiliation" title="Military Affiliation" onChange="setMilitary();">
                                <option value="">-- Military Affiliation --</option>
                                <option value="Active">Active</option>
                                <option value="Guard">Guard</option>
                                <option value="Reserve">Reserve</option>
                                <option value="Veteran">Veteran</option>
                                <option value="Spouse/Dep of Active">Spouse or Dependent - Active</option>
                                <option value="Spouse/Dep of Veteran">Spouse or Dependent - Veteran</option>
                            </select></p>

                        <div id="militaryBranch"><p><label>Military Branch</label>
                                <select name="military_branch" id="military_branch" title="Military Branch">
                                    <option value="">-- Military Branch --</option>
                                    <option value="Army">U.S. Army</option>
                                    <option value="Navy">U.S. Navy</option>
                                    <option value="Marines">U.S. Marines</option>
                                    <option value="Air Force">U.S. Air Force</option>
                                    <option value="Coast Guard">U.S. Coast Guard</option>
                                    <option value="Spouse">U.S. Military Spouse</option>
                                    <option value="Dependent">U.S. Military Dependent</option>
                                </select></p></div>
                        <h3>Educational Information</h3>
                        <p>Add each of the colleges in which you have previously attended. Click the add button once you have entered the state and college name in the boxes below. These are the colleges from whom we will expect to receive transcripts.</p>
                        <p id="previousFields">
                            <select name="previous_state">
                                <option value="">--  State --</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AS">American Samoa</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="AA">Armed Forces Americas</option>
                                <option value="AE">Armed Forces Europe</option>
                                <option value="AP">Armed Forces Pacific</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District of Columbia</option>
                                <option value="FM">Federated States of Micronesia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="GU">Guam</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PW">Palau</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VI">Virgin Islands</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                                <option value="FO">Outside of the US</option>
                            </select>
                            <input type="text" id="collegname" name="previous_collegename" placeholder="College Name" value="" />
                            <input class="addmore" type="button" name="nextCollege" class="btn_lblue_white rfi-submit" value="Add">
                        </p>

                        <p><label>Start Date <span class="required">*</span></label>
                            <select id="startdate" name="startdate" class="required2 toValidate">
                                <option value="">--  Start Date * --</option>
                                <!-- standard dates -->

                                <x-start-dates-application />

                                <!-- MSOL EEP specific dates -->
                                <option value="7/11/2022" class="msolEep">7/11/2022</option>
                            </select></p>

                        <p><label>Primary Method of Tuition Payment <span class="required">*</span></label>
                            <select id="primarymethod" name="primarymethod" class="required2 toValidate">
                                <option value="">--  Primary Method of Tuition Payment * --</option>
                                <option value="CSU-Study Privilege">CSU-Study Privilege</option>
                                <option value="Employer Reimbursement">Employer Reimbursement</option>
                                <option value="Financial Aid">Financial Aid</option>
                                <option value="Military Tuition Assistance (Federal)">Military Tuition Assistance (Federal)</option>
                                <option value="Military Tuition Assistance (State)">Military Tuition Assistance (State)</option>
                                <option value="Self Paid">Self Paid</option>
                                <option value="Third Party Payment">Third Party Payment</option>
                                <option value="VA Benefits">VA Benefits</option>
                            </select></p>

                        <p><label>Year of Highschool Graduation or GED  <span class="required">*</span></label>
                            <input id="highschool" name="highschool" class="toValidate" type="text" placeholder="Year of Highschool Graduation or GED *" value="" /></p>

                        <p><label>High School GPA</label>
                            <input id="highschoolGPA" name="highschoolGPA" class="force_num" type="text" placeholder="High School GPA" value="" /></p>

                        <p><label>Highest Education Level Completed <span class="required">*</span></label>
                            <select name="previous_education" id="previous_education" title="Highest Level Completed" class="required2 toValidate">
                                <option value="">-- Highest Level of Education Completed * --</option>
                                <option value="High School or GED">High School or GED</option>
                                <option value="1-30 credits completed (Freshman)">1-30 credits completed (Freshman)</option>
                                <option value="31-60 credits completed (Sophomore)">31-60 credits completed (Sophomore)</option>
                                <option value="61-90 credits completed (Junior)">61-90 credits completed (Junior)</option>
                                <option value="91+ credit completed (Senior)">91+ credit completed (Senior)</option>
                                <option value="Associate's Degree">Associate's Degree</option>
                                <option value="Associates Degree with Designation">Associates Degree with Designation</option>
                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                <option value="Master's Degree">Master's Degree</option>
                                <option value="Doctoral Degree">Doctoral Degree</option>
                            </select></p>


                        <p><label>I am registered with Selective Services <span class="required">*</span></label>
                            <select name="selectiveservices" id="selectiveservices" class="required2 toValidate">
                                <option value="">-- I am registered with Selective Services * --</option>
                                <option value="TRUE">Yes</option>
                                <option value="FALSE">No</option>
                            </select>
                        </p>
                        <br /><br />
                        <input id="submit_application" type="button" name="submitApp" class="btn_lblue_white rfi-submit"  value="SUBMIT APPLICATION" />
                        <div id="errormessage">There is an error with your information. Please scroll up and correct any highlighted fields.</div>
                        <img src="{{ asset('/imgs/spinner_01.gif') }}" alt="loading student information" width="30" id="spinner_02" />

                    </div>
                </form>
                <script>
                    //$('#previousToggle').click(function() {
                    //$('#previousNames').toggleClass("hidden");
                    //});
                    // function setDenroll() {
                    //     if ($('#direct option:selected').val() !== "none") {
                    //         $('#Type').val('DIRECTENROLL');
                    //     } else {
                    //         $('#Type').val('');
                    //     }
                    // }
                    function setPrevious() {
                        if ($('#previous_toggle option:selected').val() == 'No') {
                            $('#previous_name').hide();
                        } else {
                            $('#previous_name').show();
                            $('#previous_name').rules('add',{required: true});
                        }
                    }
                    function setCitizenship() {
                        if ($('#uscitizen option:selected').val() == 'No') {
                            $('#noncitizen').show();
                        } else {
                            $('#noncitizen').hide();
                            $('#NoncitizenStatus').val('US Citizen');
                        }
                    }
                    function setMilitary() {
                        if ($('#military_affiliation').val() !== "") {
                            $('#militaryBranch').show();
                        } else {
                            $('#militaryBranch').hide();
                        }
                    }
                    $('form .race_wrapper').on('click', function() {
                        $(this).css("height","auto");
                    });
                    $('#Degree').on('change', function() {
                        var selected = $(this).val();
                        $("#Program option").each(function(){
                            var element =  $(this);
                            if (element.data("tag") != selected){
                                element.prop('disabled', true).hide();
                            }else{
                                element.prop('disabled', false).show();
                            }
                        }) ;
                        $("#Program").val($("#Program option:visible:first").val());

                    });
                    $('#country').on('change', function() {
                        var selected = $(this).val();
                        $("#state option").each(function(item){
                            var element =  $(this).attr('class');
                            //console.log(element) ;
                            if (selected == "United States") {
                                //console.log("selected us");
                                if (element == "unitedStates"){
                                    $(this).prop('disabled', false).show();
                                } else {
                                    $(this).prop('disabled', true).hide();
                                }
                            } else if (selected !== "United States") {
                                if (element == "unitedStates"){
                                    $(this).prop('disabled', true).hide();
                                } else {
                                    $(this).prop('disabled', false).show();
                                }
                            }
                        }) ;

                        $("#state").val($("#state option:visible:first").val());

                    });
                    $('#Program').on('change', function() {
                        var selected = $(this).val();
                        if (selected == 'MS - Organizational Leadership - Executive Express Path') {
                            $('.standard').hide();
                            $('.msolEep').show();
                        } else {
                            $('.standard').show();
                            $('.msolEep').hide();
                        }
                        $("#startdate").val($("#startdate option:visible:first").val());
                    });
                    function confirmInfo() {
                        // console.log('inside confirmInfo()')
                        // Serialize the form data.
                        var formData = $('#altstudentapp').serialize();
                        // Submit the form using AJAX.
                        $.ajax({
                            type: 'POST',
                            url: "/handle/get/lead/info",
                            data: formData,
                            cache: false
                        })
                        .done(function( response ) {
                            console.log('AJAX Response:');
                            console.log(response);
                            if (response == 200) {
                                // console.log('response: 200');
                                window.location = "/student-application/existing-account";
                            } else if (response == 100) {
                                // console.log('response: 100');
                                window.location = "/student-application/error";
                            } else if (response == 120) {
                                // console.log('response: 120');
                                window.location = "/student-application/error?code=120";
                            } else {
                                // console.log('in else statement');
                                // console.log(response);
                                // $('#lead_id').val(response);
                                $('input#next').hide();
                                $('p#disclaimer').hide();
                                $('#spinner_01').removeClass('show');
                                $('#formPart2').removeClass("hidden");
                                $("#formPart2 .toValidate").each(function () {
                                    $(this).rules('add', {
                                        required: true
                                    });
                                });
                                $('#formPart2 #highschool').rules('add',{required: true, number: true});
                            }
                        });
                    }

                    $("body").on("click", ".addmore", function() {  // capture the click
                        var collegeField = $('#previousFields input[name="previous_collegename"]').val();
                        if (collegeField == '') {
                            $('#previousFields').after('<p class=invalid>You must enter the name of the college</p>');
                            $('#previousFields input[name="previous_collegename"]').focus();
                            return false;
                        } else {
                            $('#previousFields').next('p.invalid').fadeOut();
                            var html = $('#previousFields').clone();
                            // Serialize the form data.
                            var collegeData = $('#altstudentapp #email, p#previousFields :input').serialize();
                            // Submit the form using AJAX.
                            $.ajax({
                                type: 'POST',
                                url: "/handle/previous/college",
                                data: collegeData,
                                cache: false
                            })
                                .done(function( response ) {
                                    console.log(response);
                                    if (response == 200) {
                                        window.location = "/student-application/error";
                                    }
                                    else if (response == 100) {
                                        window.location = "/student-application/error";
                                    }
                                    else {
                                        //success
                                        $( html ).insertAfter( "#previousFields" );
                                        $(this).removeClass('addmore').attr('disabled','true');
                                        $(this).parent().removeAttr('id').addClass('inactive');
                                        $('#previousFields input[name=previous_collegename]').val('');
                                    }
                                });
                            $( html ).insertAfter( "#previousFields" );
                            $(this).removeClass('addmore').attr('disabled','true');
                            $(this).parent().removeAttr('id').addClass('inactive');
                            $('#previousFields input[name=previous_collegename]').val('');
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>

@stop
