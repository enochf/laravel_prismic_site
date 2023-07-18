<?php use Prismic\Dom\RichText; ?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body>
        <?php //dd($prismic); ?>
        {!! RichText::asText($prismic->data->content) !!}
    </body>
</html>