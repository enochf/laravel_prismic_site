<?php use Prismic\Dom\RichText; ?>
<!-- announcement-text -->
<div class="container {{ $slice->primary->styles }}">
    <div class="row">
        <div class="col-sm-12">
            {!! RichText::asHTML($slice->primary->title) !!}
            {!! RichText::asHTML($slice->primary->content) !!}
        </div>
    </div>
</div>