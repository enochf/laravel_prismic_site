<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- text-data-points -->
<div class="container {{ $slice->primary->styles }}">
    <div class="row">
    @for ($i = 0; $i < $num; $i++)
        <div class="col-sm-{{ 12 / $num }}">
            <div class="numbers">
                <h2><span class="numscroller">{{ $slice->items[$i]->stat }}</h2>
                {!! RichText::asHTML($slice->items[$i]->description) !!}
            </div>
        </div>
    @endfor
    </div>
</div>