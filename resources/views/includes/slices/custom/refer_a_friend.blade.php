<style>
#referral,
.referrer,
.referee {
    display:none;
}
</style>

<script type="text/javascript">
	$(document).ready(function() {
        // set today's date
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm}
        today = yyyy+"-"+mm+"-"+dd;
        document.getElementById("ReferralDate").value = today;
        
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

        // jquery validate
        $("#referral").validate({
            errorClass: "invalid",
            rules: {
                ReferrerFirstName: "required",
                ReferrerLastName: "required",
                //ReferrerEmail: {
                //    required: true,
                //    email: true
                //},
                Referrer_Affiliation: "required",
                RefereeFirstName: "required",
                RefereeLastName: "required",
                ReferreeEmail: {
                    required: true,
                    email: true
                },
                consent: "required"
            }
            //submitHandler: function(form) {
                //$('#submit_referral').prop('disabled', true).css('opacity','.2');
                //$('form#referral').attr('action', 'https://go.pardot.com/l/109362/2018-06-22/6336sq');
                //form.submit();
            //},
            //errorPlacement: function(error, element) {
              //  $('#referral-message').html('<span style="color:#ee5356;">Please fill in all required fields.</span>');
            //}       
        });

        $('input[name="who"]').change(function() {
            $('#referral').fadeOut('fast', function() {
                if ($('input[name="who"]:checked').val() == 'referrer') {
                    $('.referee').hide();
                    $('.referrer').show();
                    $('#ReferralType').val('referrer');
                } else if ($('input[name="who"]:checked').val() == 'referee') {
                    $('.referee').show();
                    $('.referrer').hide();
                    $('#ReferralType').val('referee');
                }
                $('#referral').fadeIn('fast');
            });
        });
    });
</script>


<form id="introduction">
    <h3>Step #1: What brought you here?</h3>
    <input type="radio" id="referrer" name="who" value="referrer">
    <label for="referrer">I would like to refer someone to CSU Global</label><br>
    <input type="radio" id="referee" name="who" value="referee">
    <label for="referee">Someone referred me to CSU Global</label><br>
</form><br />

<form id="referral" class="form" action="https://info.csuglobal.edu/l/109362/2018-06-22/6336sq" method="POST">
    <input type="hidden" name="ReferralDate" id="ReferralDate" value="">
    <input type="hidden" name="oid" value="00DA0000000Jdty">
    <input type="hidden" name="lead_source" id="lead_source" value="web_referral_form">
    <input type="hidden" name="ReferralType" id="ReferralType" value="">

    <!-- visible form elements -->
    <h3 class="referrer">Step #2: Your Information</h3>
    <h3 class="referee">Step #2: Contact Information of the person who referred you to CSU Global</h3>

    <p id="referral-message" class="clr msg">* All Fields Required</p>

    <label for="ReferrerFirstName">First Name</label>
    <input id="ReferrerFirstName" name="ReferrerFirstName" class="tblr3 placeholder" type="text" placeholder="First Name *" value="">

    <label for="ReferrerLastName">Last Name</label>
    <input id="ReferrerLastName" name="ReferrerLastName" class="tblr3 placeholder" type="text" placeholder="Last Name *" value="">

    <label for="ReferrerEmail">Email</label>
    <input id="ReferrerEmail" name="ReferrerEmail" class="requireGlobalEmail tblr3 placeholder" type="text" placeholder="Email *" value="">

    <label for="Referrer_Affiliation">Affiliation with CSU Global</label>
    <select id="Referrer_Affiliation" name="Referrer_Affiliation">
        <option value="">-- Please Select Your Affiliation * --</option>
        <option value="CSUG Student">Student</option>
        <option value="CSUG Alumni">Alumni</option>
        <option value="CSUG Staff">Staff</option>
        <option value="CSUG Faculty">Faculty</option>
        <option value="CSUG Affiliate Partner">Affiliate Partner</option>
        <option value="CSUG Stakeholder">Stakeholder</option>
        <option value="None of the above">None of the above</option>
    </select>

    <label for="ReferrerEC" class="referrer">Enrollment Counselor's Name (optional)</label>
    <input id="ReferrerEC" name="ReferrerEC" class="tblr3 placeholder referrer" type="text" placeholder="Your Enrollment Counselor's Name" value=""><br /><br />

    <h3 class="referrer">Step #3: Referral Contact Information</h3>
    <h3 class="referee">Step #3: Your Information</h3>

    <label for="RefereeFirstName">First Name</label>
    <input id="RefereeFirstName" name="RefereeFirstName" class="tblr3 placeholder" type="text" placeholder="First Name *" value="">

    <label for="RefereeLastName">Last Name</label>
    <input id="RefereeLastName" name="RefereeLastName" class="tblr3 placeholder" type="text" placeholder="Last Name *" value="">

    <label for="ReferreeEmail">Email</label>
    <input id="ReferreeEmail" name="ReferreeEmail" class="tblr3 placeholder" type="text" placeholder="Email *" value="">

    <label for="phone">Phone</label>
    <input id="phone" name="phone" class="tblr3 placeholder" type="text" placeholder="Phone" value="">
    <br><br>

    <h3>Step #4: Acknowledgement</h3>

    <input type="checkbox" id="consent" name="consent" value="1">
    <label for="vehicle1" class="referrer"> By submitting this form, I acknowledge that I received express consent to give CSU Global the contact information provided, and have notified the individual that they will be contacted about educational services via email, phone, or text message including automated technology. Message and data rates may apply.</label>
    <label for="vehicle1" class="referee"> By submitting this form, I agree that representatives of CSU Global may contact me about educational services via email, phone, or text message including automated technology. Message and data rates may apply.</label>
    
    <br /><br />

    <input id="submit_referral" name="submit" class="btn_lblue_white rfi-submit" type="submit" value="SUBMIT">
</form>