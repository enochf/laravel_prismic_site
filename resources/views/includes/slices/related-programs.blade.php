<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- related-programs -->
<div class="container centered related">
    <div class="row">
        <div class="col-sm-12">
            {!! RichText::asHTML($slice->primary->title) !!}
            <div class="style-container flex-row">
                <div class="row">
                @for ($i = 0; $i < $num; $i++)
                    <div class="col-sm-{{ 12 / $num }}">
                        <div class="style-container1 relatedBox">
                            <h3>{{ $slice->items[$i]->program }}</h3>
                        </div>
                        <div class="style-container relatedBtn">
                            <p><a class="btnTeal" href="{{ $slice->items[$i]->button_link }}">{{ $slice->items[$i]->button_text }}</a></p>
                        </div>
                    </div>
                @endfor
                </div>
            </div>
        </div>
    </div>
</div>