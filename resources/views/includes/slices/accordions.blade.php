<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- accordions -->
<div class="container {{ $slice->primary->styles }}">
    <div class="row">
        <div class="col-md-12">
            <div class="accordion">
            @for ($i = 0; $i < $num; $i++)
                <h3 id="{{ isset($slice->items[$i]->name) ? 'accordion_'.$slice->items[$i]->name : '' }}">{!! RichText::asText($slice->items[$i]->header) !!}</h3>
                <div class="accordion_content">
                    {!! RichText::asHTML($slice->items[$i]->content) !!}
                </div>
            @endfor
            </div>
        </div>
    </div>
</div>