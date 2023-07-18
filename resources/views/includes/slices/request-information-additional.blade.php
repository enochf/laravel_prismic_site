<?php
if (!empty(session()->get('rfi.rfi_id'))) {
    $leadRfiId = session()->get('rfi.rfi_id');
    $leadSource = session()->get('rfi.rfi_lead_source');
    $lead = App\RfiLead::where('rfi_id', $leadRfiId)->first();
    $leadSent = ($lead && $lead->sent !== NULL);
    $leadEmail = $lead->email;
    $leadEmployer = $lead->employer;
} else {
    return redirect('/request-information');
}
?>
<!-- request-information-additional -->
<div class="style-container ccm-custom-style-maincontent-96 rfi-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                @if($leadSent)
                    <h2 align="center">Your Information Has Been Sent</h2>
                    <p align="center">Thank you for your interest in CSU-Global. Your information has already been sent to our enrollment team and they will be reaching out to you shortly.</p>
                @else
                    <script type="text/javascript">
                        // C3 RFI ID
                        var c3_id = <?php echo ($leadEmail ? "'".$leadEmail."'" : "''"); ?>;

                        // Validate form
                        $(document).ready(function() {
                            $("#rfi_long_form").validate({
                                errorClass: "invalid",
                                rules: {},
                                submitHandler: function(form) {
                                    $('#rfi_submit').fadeOut('fast');
                                    $('form#rfi_long_form').attr('action', '/handle/request/information');
                                    form.submit();
                                },
                                errorPlacement: function(error, element) {
                                    $('#rfi_long_form-message').html('Please fill in all required fields.');
                                }
                            });

                            // show / hide military branch
                            $(':checkbox[id="military_affiliation"]').on('change', function() {
                                $('#military_branch').toggleClass('hidden');
                            });
                        });
                    </script>
                <h2 align="center">Thank you! One more step:</h2>
                <p align="center">An Enrollment Counselor will reach out to you soon to discuss your goals and how CSU Global can help you reach them. In the meantime, please complete the information below so they can be sure to address your specific needs and prepare answers to any questions you might have.</p>

                @if($leadSource == 'web_rfi_popup')
                    <p align=center>When you're ready to apply, use the code <strong>GLOBAL22</strong> to waive the application fee. We'll also email you a copy for reference.</p>
                @endif

                <style>
                    #rfi_long_form label {display:none}
                </style>
                <div id="rfi_long" class="bl5 br5">
                    <div id="wrapper_rfi_long" class="tblr5">
                        <form id="rfi_long_form" class="rfilongform" action="" method="POST">
                            <p id="rfi_long_form-message" class="clr msg"></p>
                            <input type="hidden" name="rfi_id" value="{{ $leadRfiId }}" />
                            <input type="hidden" name="email" id="rfi_email" value="{{ $leadEmail  }}" />
                            <label for="city">City</label><input type="text" class="input textBased" name="city" placeholder="City"  />
                            <label for="state">State</label><select name="state" title="State">
                                <option value="">-- State --</option>
                                <option value="">Outside of the US</option>
                                <option value="ALASKA">ALASKA</option>
                                <option value="AL">ALABAMA</option>
                                <option value="AR">ARKANSAS</option>
                                <option value="American Samoa">AMERICAN SAMOA</option>
                                <option value="AZ">ARIZONA</option>
                                <option value="CA">CALIFORNIA</option>
                                <option value="CO">COLORADO</option>
                                <option value="CT">CONNECTICUT</option>
                                <option value="DC">DISTRICT OF COLUMBIA</option>
                                <option value="DE">DELAWARE</option>
                                <option value="FL">FLORIDA</option>
                                <option value="Federated States of Micronesia">FEDERATED STATES OF MICRONESIA</option>
                                <option value="GA">GEORGIA</option>
                                <option value="Guam">GUAM</option>
                                <option value="HI">HAWAII</option>
                                <option value="IO">IOWA</option>
                                <option value="ID">IDAHO</option>
                                <option value="IL">ILLINOIS</option>
                                <option value="IN">INDIANA</option>
                                <option value="KS">KANSAS</option>
                                <option value="KY">KENTUCKY</option>
                                <option value="LA">LOUISIANA</option>
                                <option value="MA">MASSACHUSETTS</option>
                                <option value="MD">MARYLAND</option>
                                <option value="ME">MAINE</option>
                                <option value="Marshall Islands">MARSHALL ISLANDS</option>
                                <option value="MI">MICHIGAN</option>
                                <option value="MN">MINNESOTA</option>
                                <option value="MO">MISSOURI</option>
                                <option value="Northern Mariana Islanda">NORTHERN MARIANA ISLANDS</option>
                                <option value="MS">MISSISSIPPI</option>
                                <option value="MT">MONTANA</option>
                                <option value="NC">NORTH CAROLINA</option>
                                <option value="ND">NORTH DAKOTA</option>
                                <option value="NE">NEBRASKA</option>
                                <option value="NH">NEW HAMPSHIRE</option>
                                <option value="NJ">NEW JERSEY</option>
                                <option value="NM">NEW MEXICO</option>
                                <option value="NV">NEVADA</option>
                                <option value="NY">NEW YORK</option>
                                <option value="OH">OHIO</option>
                                <option value="OK">OKLAHOMA</option>
                                <option value="OR">OREGON</option>
                                <option value="PA">PENNSYLVANIA</option>
                                <option value="PR">PUERTO RICO</option>
                                <option value="PALAU">PALAU</option>
                                <option value="RI">RHODE ISLAND</option>
                                <option value="SC">SOUTH CAROLINA</option>
                                <option value="SD">SOUTH DAKOTA</option>
                                <option value="TN">TENNESSEE</option>
                                <option value="TX">TEXAS</option>
                                <option value="UT">UTAH</option>
                                <option value="VA">VIRGINIA</option>
                                <option value="Virgin Islands">VIRGIN ISLANDS</option>
                                <option value="VT">VERMONT</option>
                                <option value="WA">WASHINGTON</option>
                                <option value="WI">WISCONSIN</option>
                                <option value="WV">WEST VIRGINIA</option>
                                <option value="WY">WYOMING</option>
                            </select>
                            <label for="zip">Zip Code</label><input type="text" class="input" name="zip" placeholder="Zip Code" />
                            <label for="gender">Gender</label><select name="gender" title="Gender">
                                <option value="">-- Gender --</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <label for="previous_education">Previous Education</label>
                            <select name="previous_education" title="Highest Level Completed">
                                <option value="">-- Highest Level of Education Completed --</option>
                                <option value="High School or GED">High School or GED</option>
                                <option value="1-30 credits completed (Freshman)">1-30 credits completed (Freshman)</option>
                                <option value="31-60 credits completed (Sophomore)">31-60 credits completed (Sophomore)</option>
                                <option value="61-90 credits completed (Junior)">61-90 credits completed (Junior)</option>
                                <option value="91+ credit completed (Senior)">91+ credit completed (Senior)</option>
                                <option value="Associate's Degree">Associate's Degree</option>
                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                <option value="Master's Degree">Master's Degree</option>
                                <option value="Doctoral Degree">Doctoral Degree</option>
                            </select>
                            <label for="employer">Employer</label><input type="text" name="employer" class="input textBased" placeholder="Employer" maxlength="255" value="{{ $leadEmployer  }}" />
                            <p>
                                <label for="military_affiliation">Military Affiliation</label>
                                <input type="checkbox" name="military_affiliation" id="military_affiliation" class="input" title="Military Affiliation" value="Military Related"/>
                                I am active duty, reserve or retired U.S. military or I am the spouse or dependent of a U.S. military service member.
                            </p>
                            <label for="military_branch">Military Branch</label>
                            <select name="military_branch" id="military_branch" title="Military Branch" class="hidden">
                                <option value="">-- Military Branch --</option>
                                <option value="Army">U.S. Army</option>
                                <option value="Navy">U.S. Navy</option>
                                <option value="Marines">U.S. Marines</option>
                                <option value="Air Force">U.S. Air Force</option>
                                <option value="Coast Guard">U.S. Coast Guard</option>
                                <option value="Spouse">U.S. Military Spouse</option>
                                <option value="Dependent">U.S. Military Dependent</option>
                            </select>
                            <p>
                                <label for="text_permission">Permission</label>
                                <input type="checkbox" name="text_permission" value="1" class="input" title="Ok to Text Me" /> CSU-Global can use this number to contact me via text to discuss educational opportunities. I understand that any charges incurred are my responsibility and I am able to opt out at any time.
                            </p>
                            <input id="rfi_submit" class="btn rfi-submit" type="submit" value="SUBMIT" />
                            <div class="clr"></div>
                            <p>By submitting this form, I agree that representatives of CSU Global may contact me about educational services via email, phone, or text message including automated technology. Message and data rates may apply.</p>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
