@extends('layout.default')

@section('content')
<script type="text/javascript">
    $(document).ready(function() {
        $("#int_eval").validate({
            errorClass: "invalid",
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                H_PhoneNumber: "required",
                address1: "required",
                city: "required",
                country: "required",
                state: "required",
                zip: "required",
                institution1: "required",
                inst1_address: "required"
            },
            messages: {
                email: "Please provide a vaid email address"
            },
            submitHandler: function(form) {
                $.post('/handle_int_transcript_eval', $('#int_eval').serialize())
                    .done(function(data) {
                        console.log(data);
                        if (data == 'success') {
                            // $('#int_eval').attr('action', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
                            $('#int_eval').attr('action', '//www.paypal.com/cgi-bin/webscr');
                            form.submit();
                        } else {
                            $('#int_eval-message_error').html('The email address you provided is not in our records. Please enter the same email address you orginally contact us with. Thank you.');
                        }
                    });
            },
            errorPlacement: function(error, element) {
                $('#int_eval-message').html('Please fill in all required fields.');
            }
        });
    });

</script>

<form id="int_eval" class="form" action="" method="post" target="_top">

    <h3>Application Information</h3>

    <p id="int_eval-message" class="clr msg noborder">* Required Fields</p>

    <!-- paypal button fields -->
    <input type="hidden" name="cmd" value="_s-xclick" />
    <!-- <input type="hidden" name="hosted_button_id" value="TU7GLKHVNLK2J" /> -->
    <input type="hidden" name="hosted_button_id" value="FGZRJFQHWZSYW" />
    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" />

    <!-- application fields fields -->
    <input id="first_name" name="first_name" class="tblr3" type="text" placeholder="First Name *" value="" />
    <input id="last_name" name="last_name" class="tblr3" type="text" placeholder="Last Name *" value="" />
    <input id="email" name="email" class="tblr3" type="text" placeholder="Email *" value="" />
    <input id="phone" name="H_PhoneNumber" class="tblr3 phoneUS" type="text" placeholder="Phone Number *" value="" />
    <input id="address1" name="address1" class="tblr3 " type="text" placeholder="Address One *" value="" />
    <input id="address2" name="address2" class="tblr3" type="text" placeholder="Address Two" value="" />
    <input id="city" name="city" class="tblr3 " type="text" placeholder="City *" value="" />
    <!-- Start new code -->

    <select id="country" name="country">
        <option value="">--  Country * --</option>
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

    <select id="state" name="state">
        <option value="">--  State * --</option>
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

    <!-- end new code -->

    <input id="zip" name="zip" class="tblr3 " type="text" placeholder="Zip/Postal Code *" value="" />
    <p>&nbsp;</p>
    <h2>International School Information</h2>
    <input type="text" name="institution1" placeholder="Institution #1 *" />
    <input type="text" name="inst1_address" placeholder="Address *" />
    <input type="text" name="institution2" placeholder="Institution #2" />
    <input type="text" name="inst2_address" placeholder="Address" />
    <input type="text" name="institution3" placeholder="Institution #3" />
    <input type="text" name="inst3_address" placeholder="Address" />

    <input id="submit_application" type="submit" name="submitApp" class="btn_lblue_white rfi-submit"  value="SUBMIT" />
    <p id="int_eval-message_error" class="clr msg noborder"></p>
</form>
<script>
    $('#country').on('change', function() {
        var selected = $(this).val();
        $("#state option").each(function(item){
            var element =  $(this).attr('class');
            //console.log(element) ;
            if (selected == "United States") {
                //console.log("selected us");
                if (element == "unitedStates"){
                    $(this).show();
                } else {
                    $(this).hide();
                }
            } else if (selected !== "United States") {
                if (element == "unitedStates"){
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        }) ;

        $("#state").val($("#state option:visible:first").val());

    });
</script>
@stop
