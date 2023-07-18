<!-- outreach-advocates -->
<script type="text/javascript">
    // Validate form
    $(document).ready(function() {
        $("#outreach_advocates_form").validate({
            errorClass: "invalid",
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                program: "required",
                connections: "required"
                // "teach_subjectid[]": {
      	        //     require_from_group: [1, ".subject-group"]
    	        // },
            },
            // groups: {
            //     'form-group-type': "teach_subjectid[] research_subjectid[]"
  	        // },
            submitHandler: function(form) {
                $('#oa_submit').fadeOut('fast');
                $('form#outreach_advocates_form').attr('action', '/handle/outreach/advocates');
                form.submit();
            },
            errorPlacement: function(error, element) {
                $('#outreach_advocates_form-message').html('Please fill in all required fields.');
            }
        });
    });
 </script>
<div class="style-container padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 style="text-align:center;">Become a CSU Global Advocate!</h2>
                <p style="text-align: center;"><a href="mailto:mailto:community.engagement@csuglobal.edu">Contact us now</a>&nbsp;to learn more. Advocates are eligible to receive reimbursements for speaking. Terms and conditions apply.</p>
                <p>&nbsp;</p>
                <div class="ccm-block-express-form">
                    <div class="ccm-form">
                        <form id="outreach_advocates_form" method="post" action="">
                            <div class="ccm-dashboard-express-form">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label" for="first_name">First Name:</label>
                                        <span class="text-muted small">Required</span>
                                        <input type="text" id="first_name" name="first_name" value="" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="last_name">Last Name:</label>
                                        <span class="text-muted small">Required</span>
                                        <input type="text" id="last_name" name="last_name" value="" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email:</label>
                                        <span class="text-muted small">Required</span>
                                        <input type="email" id="email" name="email" value="">
                                    </div>
                                    <div class="form-group-type">
                                        <label class="control-label" for="type">I am:</label>
                                        <span class="text-muted small">Required</span>
                                        <div class="checkbox"><label>
                                                <input type="checkbox" id="student" name="student" value="1"> A current student </label>
                                        </div>
                                        <div class="checkbox"><label>
                                                <input type="checkbox" id="alumni" name="alumni" value="1"> An alum </label>
                                        </div>
                                        <div class="checkbox"><label>
                                                <input type="checkbox" id="staff" name="staff" value="1"> A staff member </label>
                                        </div>
                                        <div class="checkbox"><label>
                                                <input type="checkbox" id="faculty" name="faculty" value="1"> A faculty member </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="program">Program (or Department if staff):</label>
                                        <input type="text" id="program" name="program" value="" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="city">City:</label>
                                        <input type="text" id="city" name="city" value="" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="state">State:</label>
                                        <input type="text" id="state" name="state" value="" placeholder="">
                                    </div>
                                    <div class="form-group-method">
                                        <label class="control-label" for="akID[70][atSelectOptionValue]">Which method(s) of advocacy are you interested in performing?</label>
                                        <span class="text-muted small">Required</span>
                                        <div class="checkbox"><label>
                                                <input type="checkbox" id="video" name="video" value="1"> Video Testimonial </label>
                                        </div>
                                        <div class="checkbox"><label>
                                                <input type="checkbox" id="written" name="written" value="1"> Written Testimonial </label>
                                        </div>
                                        <div class="checkbox"><label>
                                                <input type="checkbox" id="blog" name="blog" value="1"> Blog about a positive CSU-Global experience </label>
                                        </div>
                                        <div class="checkbox"><label>
                                                <input type="checkbox" id="speak" name="speak" value="1"> Speak about a positive CSU-Global experience </label>
                                        </div>
                                        <div class="checkbox"><label>
                                                <input type="checkbox" id="social" name="social" value="1"> Share a positive CSU-Global experience on social media </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="connections">Do you belong to any business or community organizations that you would be willing to speak about your positive experience at CSU-Global? If so, please list them in the box below along with any other ideas you'd like us to consider:</label>
                                        <span class="text-muted small">Required</span>
                                        <textarea id="connections" name="connections" rows="5" class="form-control"></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="form-actions">
                                <input id="oa_submit" class="btn" type="submit" value="SUBMIT" />
                            </div>
                            <div id="outreach_advocates_form-message"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>