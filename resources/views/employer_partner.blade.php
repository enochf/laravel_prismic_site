<?php use Prismic\Dom\RichText; ?>
<?php
// dd($prismic);
?>

@extends('layout.default')

@section('content')

<div id="subheadercontainer" style="background-image:url(/imgs/header_affiliates.jpg)">           
    <div id="subhead" class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <h1>EMPLOYER PARTNER<span class="program">{{ $prismic->data->partner }}</span></h1>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    @include('includes.rfi_short')
                </div>
            </div>
        </div>
    </div>  
</div>
<div class="style-container padding centered">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Get {{ $prismic->data->discount }}% off standard tuition rates to further your education and advance your career.</h2>
                    <p>{{ $prismic->data->partner }} and Colorado State University Global recognize that the long-term success of any organization depends on educated, motivated, and dedicated employees.</p>
                    <p>That&rsquo;s why CSU Global, the first and only 100% online public university in the United States, is proud to offer you a {{ $prismic->data->discount }}% discount on your tuition as an employee of {{ $prismic->data->partner }}. Our university was built for working adults just like you, so your busy schedule won&rsquo;t stand in the way of your educational and professional goals.</p>
                    <div class="style-container icons centered">
                    <div class="row">
                        <div class="col-sm-3">
                            <p><img src="/imgs/icon-100percent.png" alt="desktop icon" width="90" height="93"></p>
                            <p>ONLINE ACCREDITED DEGREES</p>
                        </div>
                        <div class="col-sm-3">
                            <p><img src="/imgs/icon-nosettimes.png" alt="clock icon" width="90" height="93"></p>
                            <p>NO SET TIMES OR LOCATIONS</p>
                        </div>
                        <div class="col-sm-3">
                            <p><img src="/imgs/icon-monthly.png" alt="calendar icon" width="90" height="93"></p>
                            <p>MONTHLY CLASS START</p>
                        </div>
                        <div class="col-sm-3">
                            <p><img src="/imgs/icon-accelerated.png" alt="stopwatch icon" width="90" height="93"></p>
                            <p>ACCELERATED COURSES</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="style-container gray centered">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <p class="large">We are committed to your success, and we look forward to helping you achieve it.<br />
                    &nbsp;
                    </p>
                    <div class="style-container flex-row"
                    >
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="style-container whitebox"
                                >
                                <h3>Low Tuition Rates That Stay Low</h3>
                                <p>Eligible {{ $prismic->data->partner }} employees receive a {{ $prismic->data->discount }}% discount on our already low&nbsp;standard tuition, and our Tuition Guarantee means that as long as you remain enrolled, your rates will&nbsp;never increase. Get in touch today to discuss our flexible financing options, including federal financial&nbsp;aid and deferred payment plans.</p>
                                <p><a class="btnBlue" href="/cost">Learn More</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="style-container whitebox"
                                >
                                <h3>Too Busy For School?</h3>
                                <p>Our courses are offered in a flexible 100% online environment and&nbsp;start 12 times every year, meaning you won&rsquo;t have to commit to any kind of set schedule. You do your&nbsp;work when you have the time, from anywhere you have an internet connection. At CSU Global, you earn&nbsp;your degree on your terms.</p>
                                <p><a class="btnBlue" href="/resources">Learn More</a></p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="style-container centered">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Start Your Academic Journey Right Now</h2>
                    <p>If you have questions, don&#39;t wait to get in touch. Simply fill out&nbsp;the form above for more information, or call 800-920-6723 to speak with an Enrollment Counselor&nbsp;directly. Be sure to specify that you work for {{ $prismic->data->partner }} in order to take advantage of this exclusive {{ $prismic->data->discount }}% discount.</p>
                    <p>&nbsp;</p>
                <p><a href="/request-information" class="btnBlue">Request Information</a></p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@stop