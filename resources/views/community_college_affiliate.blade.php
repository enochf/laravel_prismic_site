<?php use Prismic\Dom\RichText; ?>
<?php
// dd($prismic);
?>

@extends('layout.default')

@section('content')

<div id="subheadercontainer" style="background-image:url(/imgs/header_cc_affiliates.jpg)">         
    <div id="subhead" class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <h1>Affiliate Community College<span class="program">{{ $prismic->data->college }}</span></h1>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    @include('includes.rfi_short')
                </div>
            </div>
        </div>
    </div>  
</div>
<div class="style-container ccm-custom-style-maincontent-2406 padding centered">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Take your career even further by using the credits you've already earned to finish your bachelor's degree 100% online.</h2>
                    <p>You've finished your associate's, or you're well on your way. But have you given any thought to your next step? You can achieve your goal of earning your bachelor's degree from a public university that employers trust while working full-time.</p>

                @if ( $prismic->data->associate_transfer == 1)

                    <p>CSU&nbsp;Global works with {{ $prismic->data->college }} to provide you with a clear path to your next degree and professional advancement. CSU&nbsp;Global may accept up to 64 total transfer credits from your associate’s, associate of arts, or associates of general studies degree at {{ $prismic->data->college }}. Conferred degrees with a 2.3 GPA or better, will even be guaranteed admission to CSU&nbsp;Global with junior standing.</p>

                @endif

                    <div class="style-container ccm-custom-style-maincontent47-523 icons centered">
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
<div class="style-container ccm-custom-style-maincontent-2160 gray centered">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <p class="large">We are committed to your success, and we look forward to helping you achieve it.<br />
                    &nbsp;
                    </p>
                    <div class="style-container ccm-custom-style-maincontent374-2398 flex-row">
                        <div class="row">
                            
                        @php
                            if ($prismic->data->articulation == 0 || $prismic->data->discount == 0) {
                                $columns = 12;
                            } else {
                                $columns = 6;
                            }
                        @endphp

                        @if ($prismic->data->articulation == 1)

                            <div class="col-sm-{{ $columns }}">
                                <div class="style-container ccm-custom-style-maincontent374446-2399 whitebox">
                                    <h3>Maximize Your Transfer Credit</h3>
                                    <p>Up to 90 total credits (and 64 from community colleges) can be accepted into a bachelor's degree at CSU-Global. Request a Transcript Evaluation Summary to see how close you already are to graduation!</p>
                                    <p><a class="btnBlue" href="/admissions/admissions-process/summary-credit-evaluation">Learn More</a></p>
                                </div>
                            </div>

                        @endif

                        @if ($prismic->data->discount != 0) 
                            
                            <div class="col-sm-{{ $columns }}">
                                <div class="style-container ccm-custom-style-maincontent374447-2400 whitebox">
                                    <h3>Take Advantage of Exclusive Tuition Discounts</h3>
                                    <p>If you graduated with your associate's degree from one of our affiliate community colleges within the past 3 years, and earned a 2.30 cumulative GPA or better, you could be eligible to receive a {{ $prismic->data->discount }}% tuition discount at CSU-Global!</p>
                                    <p><a class="btnBlue" href="/cost/tuition-discounts/affiliate-college-tuition-discount">Learn More</a></p>
                                </div>
                            </div>

                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@if ($prismic->data->fixed_tuition == 1)

    <div class="style-container ccm-custom-style-maincontent-2401 centered">
        <div class="container">
            <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Fixed Tuition, Starting Now</h2>
                        <p>Through our Commitment to Colorado program, you can lock in your tuition rate as long as you are within 30 credits or 12 months of finishing your degree at {{ $prismic->data->college }}. Fill out the form on the right to request more information or call 1-800-920-6723.</p>
                        <p>&nbsp;</p>
                    <p><a href="/admissions/transfer-info/affiliate-community-colleges/ccc-system" class="btnBlue">Request Information</a></p>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endif

@stop