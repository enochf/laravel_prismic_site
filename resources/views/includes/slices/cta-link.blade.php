<?php

use Prismic\Dom\RichText; 

// automated start schedule
include('../resources/views/includes/global_data.blade.php');

$now = new DateTime();

foreach ($g_start_dates as $d) {

    $date = new DateTime($d);

    if($date >= $now) {
        $start = date("F jS", strtotime($d));
        break;
    }
}

// dd($slice);
$num = count($slice->items);
?>

<!-- cta-link -->
<div class="container {{ $slice->primary->styles }}{{ in_array('type_home', $prismic->tags) ? ' cta_home' : '' }}">
    <div class="row">
        <div class="col-sm-12">
            <div class="row flex-container center">
                @if ($slice->primary->type == 'classes_start' || $slice->primary->type == '30/70')

                    @if (in_array('type_home', $prismic->tags))

                        <div class="col-md-12 centered">
                            {{ RichText::asText($slice->primary->title) }} {{ $start }} <a class="btnTeal" style="margin:20px;" href="{{ $slice->primary->button_link }}">{{ $slice->primary->button_text }}</a>
                        </div>

                    @else

                        <div class="col-md-4">
                            <h3 class="classesStart">{{ RichText::asText($slice->primary->title) }}<span class="larger">{{ $start }}</span></h3>
                        </div>
                        <div class="col-md-8">
                            <p><span class="callout">{{ RichText::asText($slice->primary->content) }}</span> <a class="btnBlue" style="margin:20px;" href="{{ $slice->primary->button_link }}">{{ $slice->primary->button_text }}</a></p>
                        </div>

                    @endif
                
                @elseif ($slice->primary->type == 'classes_start_simple')

                        <div class="col-md-12 centered">
                            <p class="programSheet">{{ RichText::asText($slice->primary->title) }} {{ $start }} <a class="btnTeal" style="margin:20px;" href="{{ $slice->primary->button_link }}">{{ $slice->primary->button_text }}</a></p>
                        </div>

                @elseif ($slice->primary->type == 'get_started')

                    <p class="programSheet" style="text-align:center; width:100%;">Ready to Get Started? <a class="btnOrange ctaBanner" id="getStarted">Learn More</a></p>

                @elseif ($slice->primary->type == '100')

                    <p class="programSheet">{{ RichText::asText($slice->primary->content) }}</p>
                    <p><a class="btnOrange ctaBanner" style="margin:20px;" href="{{ $slice->primary->button_link }}">{{ $slice->primary->button_text }}</a></p>

                @elseif ($slice->primary->type == 'download' || $slice->primary->type == '50/50')

                    <div class="col-sm-6">
                        <p class="classesStart">{{ RichText::asText($slice->primary->title) }}</p>
                    </div>
                    <div class="col-sm-6">
                        <p>{{ RichText::asText($slice->primary->content) }}</p>
                        <p><a class="btnBlue ctaBanner" style="margin:20px;" href="{{ $slice->primary->button_link }}">{{ $slice->primary->button_text }}</a></p>
                    </div>

                @elseif ($slice->primary->type == '30/40/30')

                    <div class="col-sm-4">
                        <h3 class="classesStart">{{ RichText::asText($slice->primary->title) }}</h3>
                    </div>
                    <div class="col-sm-4">
                        <p style="text-align: left;"><span class="callout">{{ RichText::asText($slice->primary->content) }}</span></p>
                    </div>
                    <div class="col-sm-4">
                        <p><a class="btnBlue downloadLink" href="{{ $slice->primary->button_link }}">{{ $slice->primary->button_text }}</a></p>
                        <p><a class="btnBlue downloadLink" href="{{ $slice->primary->button_2_link }}">{{ $slice->primary->button_2_text }}</a></p>
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>
<!-- end slice -->