<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- accolades-carousel -->
<div class="style-container padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <div class="awardBlock">
                        @if ($slice->primary->hide_hlc == false)
                        <div class="slide">
                            <div class="award">
                                <p align="center">
                                    <iframe style="border: 0px; margin: 0px; padding: 0px; backgroundcolor: transparent;" src="https://cdn.yoshki.com/iframe/54732.html" frameborder="0" scrolling="no" width="150" height="166" title="Higher Learning Commission accreditation seal"></iframe>
                                <h4>REGIONALLY ACCREDITED</h4>
                                <p><a href="/about/our-university/accreditation">Regional accreditation</a> by the Higher Learning Commission (HLC) means your degree comes from a top quality, trusted university.</p>
                            </div>
                        </div>
                        @endif
                        @for ($i = 0; $i < $num; $i++)
                            <div class="slide">
                                <div class="award">
                                    <p align="center"><img alt="{{ $slice->items[$i]->accolade->cr->data->image->alt }}" src="{{ $slice->items[$i]->accolade->cr->data->image->url }}" style="width:auto; height:166px"></p>
                                    <h4 class="credit">{!! RichText::asText($slice->items[$i]->accolade->cr->data->title) !!}  </h4>
                                    {!! RichText::asHTML($slice->items[$i]->accolade->cr->data->content) !!}
                                </div>
                            </div>
                        @endfor
                    </div>
                    <script>
                        $(document).ready(function(){
                            $('.awardBlock').slick({
                                dots: true,
                                infinite: true,
                                speed: 300,
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                autoplay: true,
                                autoplaySpeed: 5000,
                                responsive: [
                                    {
                                        breakpoint: 1024,
                                        settings: {
                                            slidesToShow: 3,
                                            slidesToScroll: 3,
                                            infinite: true,
                                            dots: true
                                        }
                                    },
                                    {
                                        breakpoint: 600,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 2
                                        }
                                    },
                                    {
                                        breakpoint: 480,
                                        settings: {
                                            slidesToShow: 1,
                                            slidesToScroll: 1
                                        }
                                    }
                                    // You can unslick at a given breakpoint now by adding:
                                    // settings: "unslick"
                                    // instead of a settings object
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>