<?php use Prismic\Dom\RichText; ?>
<!-- page-intro -->

@if (in_array('type_program', $prismic->tags))

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ RichText::asText($slice->primary->title) }}</h2>
            {!! RichText::asHTML($slice->primary->content) !!}
            <p>&nbsp;</p>
        </div>
    </div>
</div>

@elseif (in_array('type_home', $prismic->tags))

<div class="container {{ $slice->primary->styles }}">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <h2>{{ RichText::asText($slice->primary->title) }}</h2>
                {!! RichText::asHTML($slice->primary->content) !!}
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>

@else

<div class="container {{ $slice->primary->styles }}">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <h2>{{ RichText::asText($slice->primary->title) }}</h2>
                {!! RichText::asHTML($slice->primary->content) !!}
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>

@endif