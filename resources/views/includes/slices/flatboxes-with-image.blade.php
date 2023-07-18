<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- flatboxes-with-image -->
<div class="container style-container flex-row blog {{ $slice->primary->styles }}">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <h2>CSU Global Blog</h2>
                <div class="style-container flex-row">
                    <div class="row">
                        @for ($i = 0; $i < $num; $i++)
                        <div class="col-md-{{ 12 / $num }}">
                            <p><a href="{{ $slice->items[$i]->image->url }}" target="_blank"><img src="{{ $slice->items[$i]->image->url }}" alt="{{ $slice->items[$i]->image->alt }}" width="100%"></a></p>
                            <div class="style-container flex-row blogBox">
                                {!! RichText::asHTML($slice->items[$i]->content) !!}
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>