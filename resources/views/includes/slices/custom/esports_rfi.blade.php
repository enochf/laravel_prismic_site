<script type="text/javascript">
	$(document).ready(function() {

        // jquery validate
        $("#esports").validate({
            errorClass: "invalid",
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: "required",
                program: "required",
                start_date: "required",
                games: "required",
                discord: "required",
                twitch_url: "required",
                consent: "required"
            }      
        });

    });
</script>

<form id="esports" class="form" action="https://info.csuglobal.edu/l/109362/2021-02-25/921hbf" method="POST">
    <input type="hidden" name="oid" value="00DA0000000Jdty">
    <input type="hidden" name="lead_source" id="lead_source" value="web_esports">

    <p id="esports-message" class="clr msg">* All Fields Required</p>

    <label for="first_name">First Name</label>
    <input id="first_name" name="first_name" class="tblr3 placeholder" type="text" placeholder="First Name *" value=""><br /><br />

    <label for="last_name">Last Name</label>
    <input id="last_name" name="last_name" class="tblr3 placeholder" type="text" placeholder="Last Name *" value=""><br /><br />

    <label for="email">Email</label>
    <input id="email" name="email" class="tblr3 placeholder" type="text" placeholder="Email *" value=""><br /><br />

    <label for="phone">Phone</label>
    <input id="phone" name="phone" class="tblr3 placeholder" type="text" placeholder="Phone *" value=""><br /><br />

    <label for="program">Program of Interest</label>
    <select id="program" name="program">
        <option value="">-- Please Select the Program You're Interesed In -- *</option>
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
        <option value="MS - Military and Emergency Responder Psychology" data-tag="Master">MS - Military and Emergency Responder Psychology</option>
        <option value="MS - Nursing" data-tag="Master">MS - Nursing</option>
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
        <option value="Undergraduate Certificate in Information Technology Operations" data-tag="Undergraduate Certificate">Undergraduate Certificate in Information Technology Operations</option>
        <option value="Undergraduate Certificate in Marketing" data-tag="Undergraduate Certificate">Undergraduate Certificate in Marketing</option>
        <option value="Undergraduate Certificate in Networking" data-tag="Undergraduate Certificate">Undergraduate Certificate in Networking</option>
        <option value="Undergraduate Certificate in Project Management" data-tag="Undergraduate Certificate">Undergraduate Certificate in Project Management</option>
        <option value="Undergraduate Certificate in Web Application Development" data-tag="Undergraduate Certificate">Undergraduate Certificate in Web Application Development</option>
    </select><br /><br />

    <label for="start_date">Start Date</label>
    <select id="start_date" name="start_date">
        <option value="">--  Start Date * --</option>
        <!-- standard dates -->

        <x-start-dates-application />

    </select><br /><br />

    <label for="discord">Discord Username</label>
    <input id="discord" name="discord" class="tblr3 placeholder" type="text" placeholder="Discord Username *" value=""><br /><br />
    
    <label for="twitch_url">Stats Page/Twitch URL</label>
    <input id="twitch_url" name="twitch_url" class="tblr3 placeholder" type="text" placeholder="Stats Page/Twitch URL *" value=""><br /><br />

    <label for="games">Games of Interest</label><br />
    <input type="checkbox" id="games1" name="games" value="Fortnite"> Fortnite<br />
    <input type="checkbox" id="games2" name="games" value="Valorant"> Valorant<br />
    <input type="checkbox" id="games3" name="games" value="League of Legends"> League of Legends<br />
    <input type="checkbox" id="games4" name="games" value="Rocket League"> Rocket League<br />
    <input type="checkbox" id="games5" name="games" value="Overwatch"> Overwatch<br />
    <input type="checkbox" id="games6" name="games" value="Other"> Other<br /><br />

    <label for="comments">Why should you be considered for CSU Global's Esports Program?</label>
    <textarea id="comments" name="comments" class="tblr3 placeholder"></textarea><br /><br />

    <label for="consent">Acknowledgement</label><br />
    <input type="checkbox" id="consent" name="consent" value="1"> By submitting this form, I agree that representatives of CSU Global may contact me about educational services via email, phone, or text message including automated technology. Message and data rates may apply.<br /><br />

    <input id="submit_esports" name="submit" class="btn_lblue_white rfi-submit" type="submit" value="SUBMIT">
</form>