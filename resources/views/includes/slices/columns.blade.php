<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
// print_r($slice);
?>
<!-- columns -->
<div class="container {{ $num > 1 ? 'flex-row' : '' }} {{ $slice->primary->styles }}">
    <div class="row">

    @for ($i = 0; $i < $num; $i++)

        @if (!empty($slice->items[$i]->content))

            <div class="col-md-{{ 12 / $num }}">
                <div class="{{ isset($slice->items[$i]->styles) ? $slice->items[$i]->styles : '' }}">
                    
                        {!! RichText::asHTML($slice->items[$i]->content) !!}
                    
                </div>
            </div>

        @else

            <div class="col-md-{{ 12 / $num }}">
            </div>

        @endif

    @endfor

    </div>
</div>