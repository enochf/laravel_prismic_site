<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- whiteboxes-with-image-lg -->
<div class="container style-container flex-row {{ $slice->primary->styles }}">
    <div class="row">
    @for ($i = 0; $i < $num; $i++)
        <div class="col-md-{{ 12 / $num }}">
            <div class="whitebox {{ $slice->items[$i]->styles }}">
                <img src="{{ $slice->items[$i]->image->url }}" alt="{{ $slice->items[$i]->image->alt }}" width="{{ $slice->items[$i]->image->dimensions->width }}" height="{{ $slice->items[$i]->image->dimensions->height }}">
                {!! RichText::asHTML($slice->items[$i]->content) !!}
            </div>
        </div>
    @endfor
    </div>
</div>