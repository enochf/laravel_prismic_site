@extends('layout.default')

@section('content')
<!-- student-application-payment -->
<div class="ccm-custom-style-container ccm-custom-style-maincontent-96 padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                global $_POST;
                ?>
                <style>
                    .hidden {
                        display: none;
                    }

                    .col-content form button {
                        display: inline-block;
                        width: auto;
                        padding: 10px 20px;
                        background-color: #70a1e6;
                        color: #fff;
                        text-transform: uppercase;
                        font-weight: 700;
                        border: 0;
                        border-radius: 5px
                    }

                    .col-content form button#submit-paypal {
                        background-color: #d5ce4a;
                    }

                    .col-content form button:hover,
                    .col-content form button#submit-paypal:hover {
                        background-color: #1c2333
                    }

                    #maincontent .col-content div.invalid {
                        display: block;
                        padding: 20px 20px 0 20px;
                        margin: 20px 10px;
                        background-color: #f9f0f0;
                        text-align: center;
                        border: solid 1px #cc0000;
                        border-radius: 5px;
                    }

                    #maincontent .col-content div.invalid p {
                        color: #cc0000;
                        font-weight: bold;
                    }

                    #maincontent .col-content div.success {
                        display: block;
                        padding: 20px 20px 0 20px;
                        margin: 20px 10px;
                        background-color: #e4f1e9;
                        text-align: center;
                        border: solid 1px #018937;
                        border-radius: 5px;
                    }

                    #maincontent .col-content div.success p {
                        color: #018937;
                        font-weight: bold;
                    }

                    #maincontent .col-content div.success p a {
                        display: inline-block;
                        width: auto;
                        padding: 10px 20px;
                        background-color: #70a1e6;
                        color: #fff;
                        text-transform: uppercase;
                        font-weight: 700;
                        border: 0;
                        border-radius: 5px
                    }
                </style>
                <div class="payment">
                    <div class="row">
                        <div class="col-md-12" style="text-align:center">
                            <h2>Checkout Information / Discount Code</h2>
                            <p>Summer is for celebrations, including the start of new opportunities! What better time to move forward toward your education and career goals?</p>
                            <p><strong>To help you take the first step, we're waiving all application fees with the code below:</strong></p>
                            <p style="font-size:24px;"><strong>DIVEINTOSUMMER</strong></p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form method="get" action="" id="discountCode">
                                <label for="coupon" class="control-label">Discount Code Entry</label>
                                <input type="text" name="email" value="{{ session('app')['email'] ?? '' }}" class="hidden" />
                                <input type="text" class="form-control" name="coupon" />
                                <button class="btn btn-default btn-info" id="add-coupon" type="button" onClick="checkCoupon();">Add Discount</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="JVP4X993KP7JN">

                                {{-- PayPal Sandbox Settings

                                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="99ULDHMBBMZ2L">

                                --}}

                                <!-- apply to all -->
                                <input type="hidden" name="address1" value="{{ session('app')['addressone'] ?? '' }}"/>
                                <input type="hidden" name="city" value="{{ session('app')['city'] ?? '' }}"/>
                                <input type="hidden" name="email" value="{{ session('app')['email'] ?? '' }}"/>
                                <input type="hidden" name="first_name" value="{{ session('app')['first_name'] ?? '' }}"/>
                                <input type="hidden" name="last_name" value="{{ session('app')['last_name'] ?? '' }}"/>
                                <input type="hidden" name="state" value="{{ session('app')['state'] ?? '' }}"/>
                                <input type="hidden" name="zip" value="{{ session('app')['zip'] ?? '' }}"/>
                                <input type="hidden" name="H_PhoneNumber" value="{{ session('app')['phone'] ?? '' }}"/>
                                <label for="amount" class="control-label">Application Fee</label>
                                <input type="text" class="form-control" disabled="disabled" value="25.00" />
                                <button class="btn btn-default btn-success" id="submit-paypal" type="submit">Submit Payment</button>
                                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                            <p>&nbsp;</p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="container">
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function checkCoupon() {
                        console.log("Button clicked");
                        $("#container").load("/student/application/payment/coupon", $('#discountCode').serialize(), function(response) {
                            console.log(response);
                            if (response == "Sorry, we have encountered an error.") {
                                window.location = "/student-application/error";
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</div>
@stop