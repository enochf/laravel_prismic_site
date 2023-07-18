<!-- request-information -->
<script type="text/javascript">
    // Validate form
    $(document).ready(function() {
        $('#goldiebot_btn').on('click', function(e) {
            $('.ivy-t-circle').click();
            e.preventDefault();
        });

        $("#rfiformfull").validate({
            errorClass: "invalid",
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                    // phoneUS: true
                }
            },
            submitHandler: function(form) {
                $('#rfi_submit').fadeOut('fast');
                $('form#rfiformfull').attr('action', '/handle/request/information');
                form.submit();
            },
            errorPlacement: function(error, element) {
                $('#rfiformfull-message').html('Please fill in all required fields.');
            }
        });
    });
</script>
<style>
    #rfiformfull label {
        display: none
    }
</style>
<div class="style-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center" style="padding:20px;">
                <h2>Give us a call!</h2>
                <p>Connect with one of our Enrollment Counselors during normal business hours by calling:<span style="display:block; font-size:26px; font-weight:700;"><a href="tel:800-462-7845">(800) 462-7845</a></span></p>
                <p>(Normal business hours: 7am-5pm M-F MST)</p>
            </div>
            <div class="col-sm-4 text-center" style="background-color:#f3f3f3; padding:20px;">
                <div id="rfifull" class="bl5 br5">
                    <h2>Ready to learn more?</h2>
                    <p><strong>Simply fill out the form below and one of our Enrollment Counselors will be in touch!</strong></p>
                    <div id="wrapper_rfiformfull" class="tblr5">
                        <form id="rfiformfull" class="rfiquickform form" action="" method="POST">
                            <p id="rfiformfull-message" class="clr msg">* Required Fields</p>
                            <input type="hidden" name="url" value="{{ request()->getPathInfo() }}" />
                            <input type="hidden" name="lead_source" value="web_rfi{{ isset($prismic->data->rfi_custom_employer) && $prismic->data->rfi_custom_employer == true ? '_employer' : '' }}{{ isset($prismic->data->rfi_custom_international) && $prismic->data->rfi_custom_international == true ? '_international' : '' }}{{ isset($prismic->data->rfi_custom_freshman) && $prismic->data->rfi_custom_freshman == true ? '_ftfyf' : '' }}{{ isset($prismic->data->rfi_custom_aps) && $prismic->data->rfi_custom_aps == true ? '_aps' : '' }}{{ isset($prismic->data->rfi_custom_collegetrack) && $prismic->data->rfi_custom_collegetrack == true ? '_collegetrack' : '' }}{{ isset($prismic->data->rfi_custom) && $prismic->data->rfi_custom ? '_'.$prismic->data->rfi_custom : '' }}" />
                            <input id="gclid" name="gclid" type="hidden" />
                            <input type="hidden" name="how_did_you_hear" value="{{ !empty(session('rfi.source')) ? session('rfi.source') : Cookie::get('sourceCode') }}">
                            <label for="first_name">First Name</label><input type="text" name="first_name" class="tblr3" placeholder="First Name *" value="" />
                            <label for="last_name">Last Name</label><input type="text" name="last_name" class="tblr3" placeholder="Last Name *" value="" />
                            <label for="email">Email</label><input type="text" name="email" class="tblr3" placeholder="Email *" value="" />
                            <label for="phone">Phone</label><input type="text" name="phone" class="tblr3" placeholder="Phone *" value="" />
                            <label for="program">Program</label><select name="program" title="Program Picklist">
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
                                <option value="MS - Military and Emergency Responder Psychology" data-tag="Master">MS - Military and Emergency Responder Psychology</option> 
                                <option value="MS - Military and Emergency Responder Psychology">M.S. - Military and Emergency Responder Psychology</option>
                                <option value="MS - Organizational Leadership">M.S. - Organizational Leadership</option>
                                <option value="MS – Organizational Leadership – Executive">M.S. - Organizational Leadership - Executive Express Path</option>
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
                            <input id="rfi_submit" class="btn rfi-submit" type="submit" value="Learn More" style="outline:none;" />
                        </form>
                        <div class="clr"></div>
                    </div>
                    <p class="disclaimer">By submitting this form, I agree that representatives of CSU Global may contact me about educational services via email, phone, or text message including automated technology. Message and data rates may apply.</p>
                </div>
            </div>
            <div class="col-sm-4 text-center" style="padding:20px;">
                <h2>Prefer to chat online?</h2>
                <?php
                date_default_timezone_set('America/Denver');

                $d = (int)date('N');
                $h = (int)date('G');

                if ( $d < 6 ) {
                    if ( $h >= 7 && $h <= 16 ) {
                        echo '
                        <p>Click the button below to chat with an Enrollment Counselor.</p>
                        <p><a href="#" class="btnBlue" onclick="window.open(\'https://home-c28.incontact.com/incontact/chatclient/chatclient.aspx?poc=fe583801-12a3-41b5-84b9-f949034df884&bu=4598395&P1=FirstName&P2=LastName&P3=first.last@company.com&P4=555-555-5555\',\'chatWindow\',\'location=no,height=630,menubar=no,status=no,width=410\',true); return false;">Click Here to Chat Live</a></p>';
                    } else {
                        echo '<p>Looks like we\'re outside of our Live Chat business hours. Click the button below to get help from our virtual assistant, GoldieBot.</p>';
                    }
                } else {
                    echo '<p>Looks like we\'re outside of our Live Chat business hours. Click the button below to get help from our virtual assistant, GoldieBot.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
