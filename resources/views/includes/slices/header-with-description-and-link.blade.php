<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- header-with-description-and-link -->
@for ($i = 0; $i < $num; $i++)
<div class="container style-container landing">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    <h3>{!! RichText::asText($slice->items[$i]->title) !!}</h3>

                    @if ($slice->items[$i]->link_text)

                        <p><a class="landingLink" href="{{ $slice->items[$i]->link }}">{{ $slice->items[$i]->link_text }}</a></p>

                    @endif
                    
                </div>
                <div class="col-sm-8">
                    {!! RichText::asHTML($slice->items[$i]->content) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endfor