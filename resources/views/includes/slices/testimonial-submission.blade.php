<!-- testimonial-submission -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#relationship').on('change', function() {
            if ($(this).val() == 'Student' || $(this).val() == 'Alumni') {
                $('.secStaffFac').hide();
                $('.secStudAlum').show();
            } else if ($(this).val() == 'Staff' || $(this).val() == 'Faculty') {
                $('.secStudAlum').hide();
                $('.secStaffFac').show();
            } else {
                $('.secStudAlum, .secStaffFac').hide();
            }
        });

        $.validator.addMethod("requireGlobalEmail", function(value, element) {
            var re = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
            if (re.test(value)) {
                if (value.indexOf("@csuglobal.edu", value.length - "@csuglobal.edu".length) !== -1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }, "Please enter your @csuglobal.edu email");

        $("#testimonial_form").validate({
            errorClass: "invalid",
            rules: {
                first_name: "required",
                last_name: "required",
                email_csug: {
                    required: true,
                    email: true
                },
                state: "required",
                city: "required",
                relationship: "required",
                military: "required",
                first_in_family: "required",
                program: "required",
                grad_year: "required",
                csug_experience: "required",
                department: "required",
                csug_love: "required",
                photo1: "required",
                consent: "required"
            },
            submitHandler: function(form) {
                $('#submit').fadeOut('fast');
                $('#spinner_02').fadeIn('fast');
                $('form#testimonial_form').attr('action', '/handle/testimonial/submission');
                form.submit();
            },
            errorPlacement: function(error, element) {
                $('#testimonial_form-message').html('Please fill in all required fields.');
            }
        });

    });
</script>
<form id="testimonial_form" enctype="multipart/form-data" class="form-stacked" method="post" action="javascript:return false;">
    <fieldset>
        <h3>Personal Information</h3>
        <div class="form-group">
            <label class="control-label" for="first_name">First Name</label>
            <span class="text-muted small">Required</span>
            <input type="text" id="first_name" name="first_name" value="" placeholder="">
        </div>
        <div class="form-group">
            <label class="control-label" for="last_name">Last Name</label>
            <span class="text-muted small">Required</span>
            <input type="text" id="last_name" name="last_name" value="" placeholder="">
        </div>
        <div class="form-group">
            <label class="control-label" for="email_csug">CSU Global Email Address</label>
            <span class="text-muted small">Required (ex. your.name@csuglobal.edu)</span>
            <input type="email" id="email_csug" name="email_csug" value="" class="requireGlobalEmail">
        </div>
        <div class="form-group">
            <label class="control-label" for="email_personal">Personal Email Address</label>
            <input type="email" id="email_personal" name="email_personal" value="">
        </div>
        <div class="form-group">
            <label class="control-label" for="city">City</label>
            <span class="text-muted small">Required</span>
            <input type="text" id="city" name="city" value="" placeholder="">
        </div>
        <div class="form-group">
            <label class="control-label" for="state">State</label>
            <span class="text-muted small">Required</span>
            <input type="text" id="state" name="state" value="" placeholder="">
        </div>
        <div class="form-group">
            <label class="control-label" for="relationship">Relationship to CSU Global</label>
            <span class="text-muted small">Required</span>
            <select id="relationship" name="relationship">
                <option value="" selected="selected">-- Please select --</option>
                <option value="Student">Student</option>
                <option value="Alumni">Alumni</option>
                <option value="Staff">Staff</option>
                <option value="Faculty">Faculty</option>
            </select>
        </div>
        <h3 style="display: none;" class="secStudAlum secStaffFac">Testimonial</h3>
        <div class="form-group secStudAlum" style="display: none;">
            <label class="control-label" for="first_in_family">Are you the first in your family to attend college?</label>
            <span class="text-muted small">Required</span>
            <select id="first_in_family" name="first_in_family">
                <option value="" selected="selected">-- Please select --</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group secStudAlum secStaffFac" style="display: none;">
            <label class="control-label" for="military">What is your military affiliation?</label>
            <span class="text-muted small">Required</span>
            <select id="military" name="military">
                <option value="" selected="selected">-- Please select --</option>
                <option value="Active Duty">Active Duty</option>
                <option value="Reserve Duty">Reserve Duty</option>
                <option value="Veteran">Veteran</option>
                <option value="Spouse or dependent of military member ">Spouse or dependent of military member </option>
                <option value="No military affiliation">No military affiliation</option>
                <option value="">I prefer not to respond</option>
            </select>
        </div>
        <div class="form-group secStudAlum" style="display: none;">
            <label class="control-label" for="program">Degree Program</label>
            <span class="text-muted small">Required</span>
            <select id="program" name="program">
                <option value="" selected="selected">-- Please select --</option>
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
                <option value="Graduate Certificate in Strategic Digital Information Marketing" data-tag="Graduate Certificate">Graduate Certificate in Strategic Digital Information Marketing</option>
                <option value="Master - Criminal Justice" data-tag="Master">Master - Criminal Justice</option>
                <option value="Master - Finance" data-tag="Master">Master - Finance</option>
                <option value="Master - Healthcare Administration" data-tag="Master">Master - Healthcare Administration</option>
                <option value="Master - Human Resource Management" data-tag="Master">Master - Human Resource Management</option>
                <option value="Master - Information Technology Management" data-tag="Master">Master - Information Technology Management</option>
                <option value="Master - Professional Accounting" data-tag="Master">Master - Professional Accounting</option>
                <option value="Master - Project Management" data-tag="Master">Master - Project Management</option>
                <option value="MS - Artificial Intelligence and Machine Learning" data-tag="Master">MS - Artificial Intelligence and Machine Learning</option>
                <option value="MS - Data Analytics" data-tag="Master">MS - Data Analytics</option>
                <option value="MS - Management" data-tag="Master">MS - Management</option>
                <option value="MS - Organizational Leadership" data-tag="Master">MS - Organizational Leadership</option>
                <option value="MS - Organizational Leadership - Executive Express Path" data-tag="Master">MS - Organizational Leadership - Executive Express Path</option>
                <option value="MS - Teaching & Learning - Dual Enrollment" data-tag="Master">MS - Teaching & Learning - Dual Enrollment</option>
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
                <option value="Undergraduate Certificate in Human Resource Management" data-tag="Undergraduate Certificate">Undergraduate Certificate in Human Resource Management</option>
                <option value="Undergraduate Certificate in Information Technology Operations" data-tag="Undergraduate Certificate">Undergraduate Certificate in Information Technology Operations</option>
                <option value="Undergraduate Certificate in Marketing" data-tag="Undergraduate Certificate">Undergraduate Certificate in Marketing</option>
                <option value="Undergraduate Certificate in Networking" data-tag="Undergraduate Certificate">Undergraduate Certificate in Networking</option>
                <option value="Undergraduate Certificate in Project Management" data-tag="Undergraduate Certificate">Undergraduate Certificate in Project Management</option>
                <option value="Undergraduate Certificate in Web Application Development" data-tag="Undergraduate Certificate">Undergraduate Certificate in Web Application Development</option>
            </select>
        </div>
        <div class="form-group secStudAlum" style="display: none;">
            <label class="control-label" for="grad_year">Graduation Year or Anticipated Graduation Year</label>
            <span class="text-muted small">Required</span>
            <input type="text" id="grad_year" name="grad_year" value="" placeholder="">
        </div>
        <div class="form-group secStudAlum" style="display: none;">
            <label class="control-label" for="csug_experience">How did your education from CSU Global positively impact your life or career? </label>
            <span class="text-muted small">Required</span>
            <textarea id="csug_experience" name="csug_experience" rows="5"></textarea>
        </div>
        <div class="form-group secStudAlum" style="display: none;">
            <label class="control-label" for="why_csug">Why did you choose CSU Global? What were your goals when you started?</label>
            <textarea id="why_csug" name="why_csug" rows="5"></textarea>
        </div>
        <div class="form-group secStudAlum" style="display: none;">
            <label class="control-label" for="challenges">What specific challenges did you have to overcome to earn your degree or certificate? How did you do it and do you have any advice for others? </label>
            <textarea id="challenges" name="challenges" rows="5"></textarea>
        </div>
        <div class="form-group secStaffFac" style="display: none;">
            <label class="control-label" for="department">Department or Program Area</label>
            <span class="text-muted small">Required</span>
            <input type="text" id="department" name="department" value="" placeholder="">
        </div>
        <div class="form-group secStaffFac" style="display: none;">
            <label class="control-label" for="csug_love">What do you love about CSU Global? </label>
            <span class="text-muted small">Required</span>
            <textarea id="csug_love" name="csug_love" rows="5"></textarea>
        </div>
        <h3>Photo Upload</h3>
        <p>Professional or individual photos of yourself are preferred.</p>
        <p>(Files must be JPG, GIF or PNG, less than 5MB)</p>
        <div class="form-group">
            <label class="control-label" for="photo1">Upload Your Photo</label>
            <span class="text-muted small">Required</span>
            <input type="file" name="photo1" id="photo1">
        </div>
        <div class="form-group">
            <label class="control-label" for="photo2">Upload Alternate Photo (<span class="text-muted small">Optional</span>)</label>
            <input type="file" name="photo2" id="photo2">
        </div>
        <div class="form-group">
            <label class="control-label" for="photo3">Upload Alternate Photo (<span class="text-muted small">Optional</span>)</label>
            <input type="file" name="photo3" id="photo3">
        </div>
        <h3>Consent and Release</h3>
        <div class="form-group">
            <label class="control-label" for="consent">I agree that CSU Global can use my submission for marketing purposes.</label>
            <span class="text-muted small">Required</span>
            <div class="checkbox"><label>
                <input type="checkbox" id="consent" name="consent" class="ccm-input-checkbox" value="1" data-msg-required="Please provide your consent to use this information"> Yes </label>
            </div>
        </div>
    </fieldset>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    <img src="{{ asset('/imgs/spinner_01.gif') }}" alt="loading student information" width="30" id="spinner_01" style="display:none;" />
    <div id="testimonial_form-message"></div>
</form>