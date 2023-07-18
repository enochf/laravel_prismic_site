<!-- rfi_short -->
<script type="text/javascript">
    // Validate form
    $(document).ready(function() {
        $("#rfi_short_form").validate({
            errorClass: "invalid",
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                {!!isset($prismic->data->rfi_custom_employer) && $prismic->data->rfi_custom_employer == true ? 'employer: "required",' : ''!!}
                {!!isset($prismic->data->rfi_custom_freshman) && $prismic->data->rfi_custom_freshman == true ? 'estimated_credits: "required",' : ''!!}
                {!!isset($prismic->data->rfi_custom_international) && $prismic->data->rfi_custom_international == true ? 'country: "required",' : ''!!}
                {!!isset($prismic->data->rfi_custom_aps) && $prismic->data->rfi_custom_aps == true ? 'aps_type: "required",' : ''!!}
                phone: {
                    required: true
                    // phoneUS: true
                }
            },
            submitHandler: function(form) {
                $('#rfi_submit').fadeOut('fast');
                $('form#rfi_short_form').attr('action', '/handle/request/information');
                form.submit();
            },
            errorPlacement: function(error, element) {
                $('#rfi_short_form-message').html('Please fill in all required fields.');
            }
        });
        @if (isset($prismic->data->rfi_custom_aps) && $prismic->data->rfi_custom_aps == true)
        $('#rfi_short_form #aps_type').change(function() {
            if ($('#aps_type').val() == 'aps_alumni') {
                $('#hs_graduation').slideDown('fast');
                $('#employer').val('');
                $("input[name='lead_source']").val('web_rfi_aps_alumni');
                $('#hs_graduation').rules('add', {
                    required: true
                });
            } else {
                $('#hs_graduation').slideUp('fast');
                $('#employer').val('Aurora Public Schools');
                $("input[name='lead_source']").val('web_rfi_employer_aps');
                $('#hs_graduation').rules('add', {
                    required: false
                });
            }
        });
        @endif
    });
</script>
<style>
    #rfi_short_form label {
        display: none
    }
</style>
<div id="rfi_short" class="{{ in_array('type_program', $prismic->tags) ? 'fullForm' : '' }}">
    <div id="wrapper_rfi_short">
    @if (in_array('type_program', $prismic->tags))
        <h3>Request More Information</h3>
    @else
        <h3>Want to learn more?</h3>
        <p>Fill out the form below and we'll contact you and answer all of your questions.</p>
    @endif
        <form id="rfi_short_form" class="rfishortform" action="" method="POST">
            <input type="hidden" name="url" value="{{ request()->getPathInfo() }}" />

            <input type="hidden" name="lead_source" value="web_rfi{{ isset($prismic->data->rfi_custom_employer) && $prismic->data->rfi_custom_employer == true ? '_employer' : '' }}{{ isset($prismic->data->rfi_custom_international) && $prismic->data->rfi_custom_international == true ? '_international' : '' }}{{ isset($prismic->data->rfi_custom_freshman) && $prismic->data->rfi_custom_freshman == true ? '_ftfyf' : '' }}{{ isset($prismic->data->rfi_custom_aps) && $prismic->data->rfi_custom_aps == true ? '_aps' : '' }}{{ isset($prismic->data->rfi_custom_collegetrack) && $prismic->data->rfi_custom_collegetrack == true ? '_collegetrack' : '' }}{{ isset($prismic->data->rfi_custom) && $prismic->data->rfi_custom ? '_'.$prismic->data->rfi_custom : '' }}" />

            <input id="gclid" name="gclid" type="hidden" />

            <input type="hidden" name="how_did_you_hear" value="{{ !empty(session('rfi.source')) ? session('rfi.source') : Cookie::get('sourceCode') }}">
            <label for="email">Email</label>
            <input type="text" name="email" class="tblr3" placeholder="Email *" value="" />
            <div id="extraForm" class="{{ in_array('type_program', $prismic->tags) ? 'open' : '' }}">
                <label for="first_name">First Name</label><input type="text" name="first_name" class="tblr3" placeholder="First Name *" value="" />
                <label for="last_name">Last Name</label><input type="text" name="last_name" class="tblr3" placeholder="Last Name *" value="" />
                <label for="phone">Phone</label><input type="phone" name="phone" class="tblr3" placeholder="Phone *" value="" />
                <label for="program">Program</label>
                <select name="program" title="Program Picklist">
                    <option value="">-- Program of Interest --</option>
                    <option value="BS - Accounting">Bachelors - Accounting</option>
                    <option value="BS - Business Management">Bachelors - Business Management</option>
                    <option value="BS - Computer Science">Bachelors - Computer Science</option>
                    <option value="BS - Criminal Justice">Bachelors - Criminal Justice</option>
                    <option value="BS - Cybersecurity">Bachelors - Cybersecurity</option>
                    <option value="BS - Finance">Bachelors - Finance</option>
                    <option value="BS - Healthcare Administration and Management">Bachelors - Healthcare Administration and Management</option>
                    <option value="BS - Human Resource Management">Bachelors - Human Resource Management</option>
                    <option value="BS - Human Services">Bachelors - Human Services</option>
                    <option value="BS - Information Technology">Bachelors - Information Technology</option>
                    <option value="BS - Interdisciplinary Professional Studies">Bachelors - Interdisciplinary Professional Studies</option>
                    <option value="BS - Management Information Systems and Business Analytics">Bachelors - Management Information Systems and Business Analytics</option>
                    <option value="BS - Marketing">Bachelors - Marketing</option>
                    <option value="BS - Organizational Leadership">Bachelors - Organizational Leadership</option>
                    <option value="BS - Project Management">Bachelors - Project Management</option>
                    <option value="Master - Business Administration">Master - Business Administration</option>
                    <option value="Master - Criminal Justice">Master - Criminal Justice</option>
                    <option value="Master - Finance">Master - Finance</option>
                    <option value="Master - Healthcare Administration and Management">Master - Healthcare Administration and Management</option>
                    <option value="Master - Human Resource Management">Master - Human Resource Management</option>
                    <option value="Master - Information Technology Management">Master - Information Technology Management</option>
                    <option value="Master - Interdisciplinary Professional Studies">Master - Interdisciplinary Professional Studies</option>
                    <option value="Master - Professional Accounting">Master - Professional Accounting</option>
                    <option value="Master - Project Management">Master - Project Management</option>
                    <option value="MS - Artificial Intelligence and Machine Learning">M.S. - Artificial Intelligence and Machine Learning</option>
                    <option value="MS - Data Analytics">M.S. - Data Analytics</option>
                    <option value="MS - Marketing">M.S. - Marketing</option>
                    <option value="MS - Management">M.S. - Management</option>
                    <option value="MS - Military and Emergency Responder Psychology">M.S. - Military and Emergency Responder Psychology</option>
                    <option value="MS - Organizational Leadership">M.S. - Organizational Leadership</option>
                    <option value="MS - Organizational Leadership - Executive Express Path">M.S. - Organizational Leadership - Executive Express Path</option>
                    <option value="MS - Teaching and Learning">M.S. - Teaching and Learning</option>
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
                    <option value="Graduate Certificate in Business Analytics" data-tag="Graduate Certificate">Graduate Certificate in Business Analytics</option>
                    <option value="Graduate Certificate in Cyber Security" data-tag="Graduate Certificate">Graduate Certificate in Cyber Security</option>
                    <option value="Graduate Certificate in Digital Instructional Architecture" data-tag="Graduate Certificate">Graduate Certificate in Digital Instructional Architecture</option>
                    <option value="Graduate Certificate in Educational Leadership - Principal Licensure" data-tag="Graduate Certificate">Graduate Certificate in Educational Leadership - Principal Licensure</option>
                    <option value="Graduate Certificate in Human Resource Management" data-tag="Graduate Certificate">Graduate Certificate in Human Resource Management</option>
                    <option value="Graduate Certificate in Project Management" data-tag="Graduate Certificate">Graduate Certificate in Project Management</option>
                    <option value="NDS - Non-Degree Seeking">Non-Degree Seeking</option>
                </select>
                @if (isset($prismic->data->rfi_custom_aps) && $prismic->data->rfi_custom_aps == true)
                <select id="aps_type" name="aps_type" title="APS Relationship">
                    <option value="">-- Relationship with APS --</option>
                    <option value="aps_employee">Employee/Faculty</option>
                    <option value="aps_alumni">Recent APS Graduate</option>
                </select>
                <select id="hs_graduation" name="hs_graduation" title="Graduation Year" style="display:none;">
                    <option value="">-- Graduation Year --</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                </select>
                <input type="hidden" id="employer" name="employer" class="tblr3" placeholder="Employer *" value="" />
                @endif
                @if (isset($prismic->data->rfi_custom_employer) && $prismic->data->rfi_custom_employer == true)
                <input type="text" name="employer" class="tblr3" placeholder="Employer *" value="" />
                @endif
                @if (isset($prismic->data->rfi_custom_freshman) && $prismic->data->rfi_custom_freshman == true)
                <input type="text" name="estimated_credits" class="tblr3" placeholder="Est. Transfer Credits *" value="" maxlength="3" />
                @endif
                @if (isset($prismic->data->rfi_custom_international) && $prismic->data->rfi_custom_international == true)
                <select id="country" name="country" class="required2 toValidate">
                    <option value="">Country of Origin *</option>
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
                    <option value="Cote d\'Ivoire">Cote d\'Ivoire</option>
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
                @endif
                <input id="rfi_submit" class="btn rfi-submit" type="submit" value="SUBMIT" />
                <p class="disclaimer">By submitting this form, I agree that representatives of CSU Global may contact me about educational services via email, phone, or text message including automated technology. Message and data rates may apply.</p>
            </div>
        </form>
        @if (!in_array('type_program', $prismic->tags))
        <button id="expand" class="closed"><i class="fa fa-chevron-down icon-rotate"></i></button>
        @endif
    </div>
</div>