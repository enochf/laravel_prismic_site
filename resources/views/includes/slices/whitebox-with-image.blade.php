<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- whitebox-with-image -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="style-container whitebox">
                        <div class="row">
                            <div class="col-sm-5">
                                <h3 class="classesStart"><img src="{{ $slice->primary->image->url }}" alt="{{ $slice->primary->image->alt }}" width="{{ $slice->primary->image->dimensions->width }}" height="{{ $slice->primary->image->dimensions->height }}"></h3>
                            </div>
                            <div class="col-sm-7">
                                <p class="large" style="margin-top:20px; line-height:1.5em">{{ RichText::asText($slice->primary->title) }}</p>
                                <p style="margin-top:40px"><a class="btnBlue" href="{{ $slice->primary->link->url }}">LEARN MORE</a></p>
                            </div>
                        </div>
                    </div>
                    <p><br />&nbsp;</p>
                    <div class="row">
                        <div class="col-sm-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>