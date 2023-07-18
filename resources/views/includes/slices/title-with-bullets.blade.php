<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- title-with-bullets -->
<div class="container {{ $slice->primary->styles }}">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                {!! RichText::asHTML($slice->primary->title) !!}
                {!! RichText::asHTML($slice->primary->content) !!}
                @for ($i = 0; $i < $num; $i++)
                    @if ($i % 2 == 0)
                        <div class="row">
                    @endif
                    <div class="col-sm-6 ranking">
                        <p><span class="dot">{{ $slice->items[$i]->bullet }}</span> <span class="allcaps">{!! RichText::asText($slice->items[$i]->subtitle) !!}</span></p>
                        {!! RichText::asHTML($slice->items[$i]->content) !!}
                    </div>
                    @if ($i % 2 != 0 OR $i == ($num-1))
                        </div>
                    @endif
                @endfor
                <p><a class="btndBlue" href="{{ $slice->primary->button_link }}">{{ $slice->primary->button_text }}</a></p>
            </div>
        </div>
    </div>
</div>