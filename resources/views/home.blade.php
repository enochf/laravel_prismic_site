@extends('layout.default')

@section('content')
    <!-- This part will be inserted in the yield area of the layout page -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/accordion.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/autocomplete.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/autocomplete-min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap-modified.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap-modified-min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/catalog.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/faculty.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/footer.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/forms.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/header.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/home.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/kuali-overrides.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/lightgallery-min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/main.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/mixins.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/popups-slides.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/responsive.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/timeline-min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/variables.less') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/video-gallery.css') }}" />
    <div id="home-hero" class="row">
        @include('includes.slices.home-hero')
    </div>
    
    <div class="page-intro row">
        @include('includes.slices.page-intro')
</div>

    <div class="even-height-whitebox row">
        @include('includes.slices.even-height-whitebox')
</div>

    <div class="graduation-congratulations row">
        @include('includes.slices.graduation-congratulations')
</div>

    <div class="icon-row row">
        @include('includes.slices.icon-row')
</div>

    <div class="whitebox-w-blue-divider row">
        @include('includes.slices.whitebox-w-blue-divider')
</div>

    <div class="even-height-whitebox-w-image row">
        @include('includes.slices.even-height-whitebox-w-image')
</div>

    <div class="personalized-learning-paths-block row">
        @include('includes.slices.personalized-learning-paths-block')
</div>

    <div class="gray-cta-banner-classes-start row">
        @include('includes.slices.gray-cta-banner-classes-start')
</div>

    <div class="whitebox-carousel row">
        @include('includes.slices.whitebox-carousel')
</div>

    <div class="image-block-text-right row">
        @include('includes.slices.image-block-text-right')
</div>

    <div class="white-bg-testimonial row">
        @include('includes.slices.white-bg-testimonial')
</div>

    <div class="rankings-text-box row">
        @include('includes.slices.rankings-text-box')
</div>

    <div class="white-cta-banner-classes-start row">
        @include('includes.slices.white-cta-banner-classes-start')
</div>

    <div class="stats-text-row row">
        @include('includes.slices.stats-text-row')
</div>

    <div class="csu-global-blog row">
        @include('includes.slices.csu-global-blog')
</div>

@stop
