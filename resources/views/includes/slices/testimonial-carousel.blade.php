<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
$num = count($slice->items);
?>
<!-- testimonial-carousel -->
<div class="container testimonial centered">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <div class="testimonialBlock">
                @for ($i = 0; $i < $num; $i++)
                    <div class="slide">
                        <p class="quote">{!! RichText::asText($slice->items[$i]->quote) !!}</p>
                        <p class="student">{!! RichText::asText($slice->items[$i]->name) !!}</p>
                        <p class="degree">{!! RichText::asText($slice->items[$i]->program) !!}</p>
                    </div>
                @endfor
                </div>
                <script>
                    $(document).ready(function(){
                        $('.testimonialBlock').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: true,
                            autoplay: true,
                            autoplaySpeed: 6000,
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>