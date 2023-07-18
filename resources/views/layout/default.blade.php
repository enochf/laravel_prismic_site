<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body>
        <div class="page{{ in_array('type_program', $prismic->tags) ? ' page_v2' : '' }}{{ in_array('type_home', $prismic->tags) ? ' home_v2' : '' }}">
            <header>
                @include('includes.header')
            </header>

            @if (isset($prismic->type) && $prismic->type == 'template_content_page')
                <div id="subheadercontainer" style="background-image:url({{ isset($prismic->data->image->url) ? $prismic->data->image->url : '' }})">           
                    <div id="subhead" class="container">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 {{ in_array('article', $prismic->tags) ? 'newsTitle' : '' }}">
                                    <h1>{{ $prismic->data->title_sm }}<span class="program">{{ $prismic->data->title }}</span></h1>
                                </div>
                                <div class="col-md-4">
                                    @if (in_array('type_program', $prismic->tags))
                                        <div class="sidebar-wrapper">
                                    @endif
                                    @if ($prismic->data->hide_rfi == false)
                                        @include('includes.rfi_short')
                                    @endif
                                    @if (in_array('type_program', $prismic->tags))
                                        @yield('sidebar')
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            @endif

            <main id="main">
                @yield('content')
            </main>

            <footer>
                @include('includes.footer')
            </footer>
        </div>
    </body>
</html>
