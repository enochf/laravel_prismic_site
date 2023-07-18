<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- hover-info-boxes -->

@if (!in_array('type_program', $prismic->tags))

<div class="container style-container centered career">
    <div class="row">
        <div class="col-sm-12">
            {!! RichText::asHTML($slice->primary->title) !!}
            <div class="container flex-row">
                <div class="row">
                @for ($i = 0; $i < $num; $i++)
                    <div class="col-sm-{{ 12 / $num }}">
                        <div class="style-container careerBlock">
                            <h3>{{ $slice->items[$i]->subtitle }}</h3>
                            <p class="description">{{ $slice->items[$i]->description }}</p>
                        </div>
                    </div>
                @endfor
                </div>
            </div>
        </div>
    </div>
</div>

@else

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3 class="no-border">{!! RichText::asTEXT($slice->primary->title) !!}</h3>
            @for ($i = 0; $i < $num; $i++)
                <p class="outlook-item"><em>{{ $slice->items[$i]->subtitle }}</em> {{ $slice->items[$i]->description }}</p>
            @endfor
        </div>
    </div>
</div>

@endif