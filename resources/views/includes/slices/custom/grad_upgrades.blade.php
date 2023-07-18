<script type="text/javascript">
	$(document).ready(function() {

        // jquery validate
        $("#gradupgrades").validate({
            errorClass: "invalid",
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                program: "required",
                start_date: "required",
                consent: "required"
            }      
        });

    });
</script>

<form id="gradupgrades" class="form" action="https://info.csuglobal.edu/l/109362/2021-02-23/91gqds" method="POST">
    <input type="hidden" name="oid" value="00DA0000000Jdty">
    <input type="hidden" name="lead_source" id="lead_source" value="web_alumni">

    <p id="gradupgrades-message" class="clr msg">* All Fields Required</p>

    <label for="first_name">First Name</label>
    <input id="first_name" name="first_name" class="tblr3 placeholder" type="text" placeholder="First Name *" value="">

    <label for="last_name">Last Name</label>
    <input id="last_name" name="last_name" class="tblr3 placeholder" type="text" placeholder="Last Name *" value="">

    <label for="email">Email</label>
    <input id="email" name="email" class="tblr3 placeholder" type="text" placeholder="Email *" value="">

    <label for="program">Program of Interest</label>
    <select id="program" name="program">
        <option value="">-- Please Select the Program You're Interesed In -- *</option>
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
        <option value="MS - Military and Emergency Responder Psychology" data-tag="Master">MS - Military and Emergency Responder Psychology</option>
        <option value="MS - Nursing" data-tag="Master">MS - Nursing</option>
        <option value="MS - Organizational Leadership" data-tag="Master">MS - Organizational Leadership</option>
        <option value="MS - Organizational Leadership - Executive Express Path" data-tag="Master">MS - Organizational Leadership - Executive Express Path</option>
        <option value="MS - Teaching & Learning - Dual Enrollment" data-tag="Master">MS - Teaching & Learning - Dual Enrollment</option>
        <option value="MS - Teaching and Learning" data-tag="Master">MS - Teaching and Learning</option>
        <option value="MS - Teaching and Learning - TeacherReady" data-tag="Master">MS - Teaching and Learning (TeacherReady)</option>
        <option value="MS - Teaching and Learning - Principal Licensure" data-tag="Master">MS - Teaching and Learning - Principal Licensure</option>
        <option value="Graduate Certificate in Business Analytics" data-tag="Graduate Certificate">Graduate Certificate in Business Analytics</option>
        <option value="Graduate Certificate in Cyber Security" data-tag="Graduate Certificate">Graduate Certificate in Cyber Security</option>
        <option value="Graduate Certificate in Digital Instructional Architecture" data-tag="Graduate Certificate">Graduate Certificate in Digital Instructional Architecture</option>
        <option value="Graduate Certificate in Educational Leadership - Principal Licensure" data-tag="Graduate Certificate">Graduate Certificate in Educational Leadership - Principal Licensure</option>
        <option value="Graduate Certificate in Human Resource Management" data-tag="Graduate Certificate">Graduate Certificate in Human Resource Management</option>
        <option value="Graduate Certificate in Project Management" data-tag="Graduate Certificate">Graduate Certificate in Project Management</option>
        <option value="Graduate Certificate in Strategic Digital Information Marketing" data-tag="Graduate Certificate">Graduate Certificate in Strategic Digital Information Marketing</option>
    </select>

    <label for="start_date">Start Date <span class="required">*</span></label>
    <select id="start_date" name="start_date">
        <option value="">--  Start Date * --</option>
        <!-- standard dates -->

        <x-start-dates-application />

        <!-- MSOL EEP specific dates -->
        <option value="7/19/2021" class="msolEep">7/19/2021</option>
    </select>

    <input type="checkbox" id="consent" name="consent" value="1">
    <label for="consent"> By submitting this form, I agree that representatives of CSU Global may contact me about educational services via email, phone, or text message including automated technology. Message and data rates may apply.</label>
    
    <br /><br />

    <input id="submit_gradupgrades" name="submit" class="btn_lblue_white rfi-submit" type="submit" value="SUBMIT">
</form>