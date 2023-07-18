<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- whitebox-carousel -->
<div class="ccm-custom-style-container ccm-custom-style-maincontent-12255 padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="awardBlock">
                @for ($i = 0; $i < $num; $i++)
                    <div class="slide">
                        <div class="award" style="text-align:left"><img alt="{{ $slice->items[$i]->image->alt }}" src="{{ $slice->items[$i]->image->url }}" style="width:100%; height:auto">
                            {!! RichText::asHTML($slice->items[$i]->content) !!}
                        </div>
                    </div>
                @endfor
                </div>
                <script>
                    $(document).ready(function(){
                    $('.awardBlock').slick({
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        arrows: true,
                        dots: true,
                        autoplay: true,
                        autoplaySpeed: 6000,
                        responsive: [
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>