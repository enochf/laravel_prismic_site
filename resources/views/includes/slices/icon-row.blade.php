<?php

use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- icon-row -->

@if (!in_array('type_program', $prismic->tags))

<div class="container {{ $slice->primary->styles }}">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                {!! RichText::asHTML($slice->primary->title) !!}
                {!! RichText::asHTML($slice->primary->content) !!}
                <div class="row">
                @for ($i = 0; $i < $num; $i++)
                    <div class="col-sm-{{ 12 / $num }}">
                        <p><img src="{{ $slice->items[$i]->icon->url }}" alt="{{ $slice->items[$i]->icon->alt }}" width="{{ $slice->items[$i]->icon->dimensions->width }}" height="{{ $slice->items[$i]->icon->dimensions->height }}"></p>
                        {!! RichText::asHTML($slice->items[$i]->description) !!}
                    </div>
                @endfor
                </div>
            </div>
        </div>
    </div>
</div>

@else

<div class="container {{ $slice->primary->styles }}">
    <div class="row">
        <div class="col-md-8">
            {!! RichText::asHTML($slice->primary->title) !!}
            {!! RichText::asHTML($slice->primary->content) !!}
            @for ($i = 0; $i < $num; $i++)
                @if ($i % 2 == 0)
                    <div class="row">
                @endif
                    <div class="col-sm-6 icon-block">
                        <p><img src="{{ $slice->items[$i]->icon->url }}" alt="{{ $slice->items[$i]->icon->alt }}" width="{{ $slice->items[$i]->icon->dimensions->width }}" height="{{ $slice->items[$i]->icon->dimensions->height }}"></p>
                        {!! RichText::asHTML($slice->items[$i]->description) !!}
                    </div>
                @if ($i % 2 != 0)
                    </div>
                @endif
            @endfor
        </div>
    </div>
</div>

@endif