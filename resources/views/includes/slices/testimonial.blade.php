<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- testimonial -->
<div class="container testimonial centered">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <p class="quote">{!! RichText::asText($slice->primary->quote) !!}</p>
                <p class="student">{{ $slice->primary->name }}</p>
                <p class="degree">{{ $slice->primary->program }}</p>
            </div>
        </div>
    </div>
</div>