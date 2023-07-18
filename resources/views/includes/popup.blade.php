<!-- popup -->
<!-- rfi popup validation -->
<script type="text/javascript">
    // Validate form
    $(document).ready(function() {
        $("#rfi_popup_form").validate({
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
                $('#rfi_pop_submit').fadeOut('fast');
                $('form#rfi_popup_form').attr('action', '/handle/request/information');
                $('form#rfi_popup_form').submit();
            },
            errorPlacement: function(error, element) {
                $('#rfi_popup_form-message').html('Please fill in all required fields.');
            }
        });
    });
</script>

<style>
    #rfi_popup_form label {display:none}
</style>

<div id="rfi_popup" class="bl5 br5" style="display:none">
	<!-- <img src="/application/themes/csug/imgs/popup_anniversary.png" alt="10 Years - A decade of leadership in online education" /> -->
    <h3>Make 2022 The Year You Move Forward</h3>
    <p class="large">Application Fee Waiver Code</p>
    <p class="highlight-message"><span style="display:block; font-size:18px; line-height:24px; padding-bottom:10px">
    <strong>Are you ready to move forward with your education? We’re here to help.</strong>
    <br>Complete the form below and we’ll email you a code waiving the $25 application fee.</span>
    </p>
    <div id="wrapper_rfi_popup" class="tblr5">
        <form id="rfi_popup_form" class="rfipopupform" action="" method="POST">
            <p id="rfi_popup_form-message" class="clr msg"></p>
            <input type="hidden" name="url" value="{{ request()->getPathInfo() }}" />
            <input type="hidden" name="lead_source" value="web_rfi_popup" />
            <input type="hidden" name="how_did_you_hear" value="{{ !empty(session('rfi.source')) ? session('rfi.source') : Cookie::get('sourceCode') }} : web_rfi_popup">
            <label for="first_name">First Name</label><input type="text" name="first_name" class="tblr3" placeholder="First Name *" value="" />
            <label for="last_name">Last Name</label><input type="text" name="last_name" class="tblr3" placeholder="Last Name *" value="" />
            <label for="email">Email</label><input type="text" name="email" class="tblr3" placeholder="Email *" value="" />
            <label for="phone">Phone</label><input type="phone" name="phone" class="tblr3" placeholder="Phone *" value="" />
            <br clear="all">
            <input id="rfi_pop_submit" class="btn rfi-submit" type="submit" value="Email Me My Code" />
        </form>
    </div>
    <p class="small">By submitting this form, I agree that representatives of CSU Global may contact me about educational services via email, phone, or text message including automated technology. Message and data rates may apply.</p>
    <p class="small" id="rfi_popup_required" class="clr msg">* Required Fields</p>
</div>