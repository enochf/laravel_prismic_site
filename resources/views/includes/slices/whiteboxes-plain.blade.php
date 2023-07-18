<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- whiteboxes-plain -->
<div class="container style-container flex-row {{ $slice->primary->styles }}">
    <div class="row">

    @for ($i = 0; $i < $num; $i++)

        <div class="col-md-{{ 12 / $num }}">
            <div class="style-container {{ !empty($slice->items[$i]->content) ? 'whitebox' : ''}}">
                {!! RichText::asHTML($slice->items[$i]->content) !!}
                @if(isset($slice->items[$i]->link_text))
                    <p><a class="{{ $slice->items[$i]->link_style }}" href="{{ $slice->items[$i]->link }}">{{ $slice->items[$i]->link_text }}</a></p>
                @endif
            </div>
        </div>

    @endfor

    </div>
</div>