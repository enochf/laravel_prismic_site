<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
// $num = count($slice->items);
// print_r($slice);
?>

<!-- download-box -->
<div class="calloutBlock {{ isset($slice->primary->styles) ? $slice->primary->styles : '' }}">

    @if (isset($slice->primary->image->url))

    <img src="{{ $slice->primary->image->url }}" class="calloutBlock__img" alt="{{ $slice->primary->image->alt }}" />

    @endif

    <div class="calloutBlock__wrapper">
        <h3 class="calloutBlock__header">{{ $slice->primary->title }}</h3>
        {!! RichText::asHTML($slice->primary->content) !!}
    </div>
    <a class="calloutBlock__btn btnOrange" href="{{ $slice->primary->button_link }}">{{ $slice->primary->button_text }}</a>
</div>















