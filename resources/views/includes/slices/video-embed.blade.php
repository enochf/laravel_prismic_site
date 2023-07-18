<?php use Prismic\Dom\RichText; ?>

<?php
// print_r($slice);
// dd($slice);
?>
<!-- video-embed -->
<div class="container youTube">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="container video-container">
                    <iframe class="youtube-player" src="{{ $slice->primary->embed_link }}" frameborder="0" allowfullscreen="true"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>