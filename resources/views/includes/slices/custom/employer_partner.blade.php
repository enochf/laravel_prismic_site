<?php
if (!empty(Cookie::get('csug_utm'))) {
    $utm = unserialize(Cookie::get('csug_utm'));
} else {
    $utm = array('utm_medium' => null, 'utm_campaign' => null, 'utm_content' => null);
}
?>
<!-- employer_partner -->
<div class="ccm-custom-style-container ccm-custom-style-maincontent-96 padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <style>
                    #existingCompany {
                        display: none
                    }
                </style>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $.support.placeholder = (function() {
                            var i = document.createElement('input');
                            return 'placeholder' in i;
                        })();
                        $.validator.addMethod('required2', function(value, element, param) {
                            return (value != '' && value != $(element).attr('placeholder'));
                        }, 'This field is required');
                        $.validator.addMethod('customPhone',
                            function(value) {
                                return (value.match(/[0-9\(\)\.\-\_\s]+/));
                            },
                            'Please enter a valid phone number');
                        $("#employerRfi").validate({
                            errorClass: "invalid",
                            rules: {
                                company_name: "required2"
                            },
                            messages: {
                                //email: "Please provide a vaid email address"
                            }
                        });
                        // General scripts
                        $("#next").click(function() { // capture the click
                            if ($("#employerRfi").valid()) { // test for validity
                                // do stuff if form is valid
                                console.log("I clicked submit, it's valid, now confirm");
                                confirmInfo();
                            } else {
                                // do stuff if form is not valid
                                console.log("I clicked submit, but it's not valid");
                            }
                        });
                        $("#submit_rfi").click(function() { // capture the click
                            if ($("#employerRfi").valid()) { // test for validity
                                // do stuff if form is valid
                                console.log("I clicked submit again, it's valid");
                                //$('#submit_application').prop('disabled', true).css('opacity','.2');
                                $('form#employerRfi').attr('action', '/handle/employer/partner');
                                $('form#employerRfi').submit();
                            } else {
                                // do stuff if form is not valid
                                console.log("I clicked submit, but it's not valid");
                            }
                        });
                    });
                </script>
                <form id="employerRfi" class="form" action="" method="POST">

                    <p id="employerRfi-message" class="clr msg noborder">* Required Fields</p>

                    <input name="source" type="hidden" value="Employer_RFI" />
                    <input name="Campus" type="hidden" value="CSU-Global" />
                    <input type="hidden" name="how_did_you_hear" value="{{ !empty(session('rfi.source')) ? session('rfi.source') : Cookie::get('sourceCode') }}">
                    <input name="utm_medium" type="hidden" value="{{ isset($utm['utm_medium']) ? $utm['utm_medium'] : '' }}">
                    <input name="utm_campaign" type="hidden" value="{{ isset($utm['utm_campaign']) ? $utm['utm_campaign'] : '' }}">
                    <input name="utm_content" type="hidden" value="{{ isset($utm['utm_content']) ? $utm['utm_content'] : '' }}">

                    <!-- visible form elements -->
                    <h3>Company Information</h3>
                    <p><label>Company Name</label>
                        <input id="company_name" name="company_name" class="tblr3" type="text" placeholder="Company Name *" value="" /></p>

                    <input id="next" type="button" name="next" class="btn_lblue_white rfi-submit" value="Continue">
                    <div id="existingCompany">
                        <p>We've already partnered with this employer or have begun discussions to establish a partnership. Please contact outreach@csuglobal.edu to confirm the status of your organization's partnership status.</p>
                    </div>
                    <div id="addFields"></div>

                    <div id="formPart2" class="hidden">
                        <p><label>Industry</label>
                            <select id="Industry" name="Industry" class="toValidate">
                                <option value="">-- Please Select --</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Apparel">Apparel</option>
                                <option value="Banking">Banking</option>
                                <option value="Biotechnology">Biotechnology</option>
                                <option value="Chemicals">Chemicals</option>
                                <option value="Communications">Communications</option>
                                <option value="Construction">Construction</option>
                                <option value="Consulting">Consulting</option>
                                <option value="Education">Education</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Energy">Energy</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Environmental">Environmental</option>
                                <option value="Finance">Finance</option>
                                <option value="Food & Beverage">Food & Beverage</option>
                                <option value="Government">Government</option>
                                <option value="Healthcare">Healthcare</option>
                                <option value="Hospitality">Hospitality</option>
                                <option value="Insurance">Insurance</option>
                                <option value="Machinery">Machinery</option>
                                <option value="Manufacturing">Manufacturing</option>
                                <option value="Media">Media</option>
                                <option value="Military">Military</option>
                                <option value="Not For Profit">Not For Profit</option>
                                <option value="Recreation">Recreation</option>
                                <option value="Retail">Retail</option>
                                <option value="Shipping">Shipping</option>
                                <option value="Technology">Technology</option>
                                <option value="Telecommunications">Telecommunications</option>
                                <option value="Transportation">Transportation</option>
                                <option value="Utilities">Utilities</option>
                                <option value="Other">Other</option>
                            </select>
                            <p><label>Number of Employees</label>
                                <input id="NumberOfEmployees" name="NumberOfEmployees" class="toValidate" type="text" placeholder="Number of Employees *" value="" /></p>

                            <h3>Contact Information</h3>
                            <p><label>Name</label>
                                <input id="first_name" name="first_name" class="toValidate" type="text" placeholder="First Name *" value="" /><br>
                                <input id="last_name" name="last_name" class="toValidate" type="text" placeholder="Last Name *" value="" /></p>
                            <p><label>Email</label>
                                <input id="email" name="email" class="toValidate" type="text" placeholder="Email *" value="" /></p>
                            <p><label>Phone</label>
                                <input id="phone" name="phone" class="toValidate customPhone" type="text" placeholder="Phone Number *" value="" /></p>

                            <br /><br />
                            <input id="submit_rfi" type="button" name="submitRfi" class="btn_lblue_white rfi-submit" value="SUBMIT" />
                    </div>
                </form>
                <script>
                    function confirmInfo() {
                        // Serialize the form data.
                        var formData = $('#employerRfi').serialize();
                        // Submit the form using AJAX.
                        $.ajax({
                                type: 'POST',
                                url: "/handle/get/company",
                                data: formData,
                                cache: false
                            })
                            .done(function(response) {
                                response = JSON.parse(response);
                                // console.log(response);
                                if (response.code == 200) {
                                    $('input#next').hide();
                                    $('#existingCompany').show();
                                } else if (response.code == 100) {
                                    window.location = "/cost/tuition-discounts/employer-partners/error";
                                } else {
                                    $('input#next').hide();
                                    $('#formPart2').removeClass("hidden");
                                    $("#formPart2 .toValidate").each(function() {
                                        $(this).rules('add', {
                                            required: true
                                        });
                                    });
                                    $('#formPart2 #email').rules('add', {
                                        required: true,
                                        email: true
                                    });
                                    $('#formPart2 #NumberOfEmployees').rules('add', {
                                        required: true,
                                        number: true
                                    });
                                }
                            });
                    }
                </script>
            </div>
        </div>
    </div>
</div>