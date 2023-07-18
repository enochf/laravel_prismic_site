<?php use Prismic\Dom\RichText; ?>
<!-- head -->
<title>{{ $prismic->data->{'meta-title'} ? $prismic->data->{'meta-title'} : "" }}</title>

<!-- canonical info -->
<link rel="canonical" href="https://csuglobal.edu{{ str_replace('https://csuglobal.edu', '', $prismic->data->path) }}">

<!-- meta information -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8" />
<meta name="description" content="{{ $prismic->data->{'meta-description'} ? $prismic->data->{'meta-description'} : "" }}" />
<meta name="keywords" content="{{ $prismic->data->{'meta-keywords'} ? $prismic->data->{'meta-keywords'} : "" }}"/>
<meta name="p:domain_verify" content="54530c95f9178b9467b2df97124270c7"/>

<!-- exclude from search -->
<meta name="robots" content="noindex">

<!-- favicon -->
<link rel="shortcut icon" href="{{ asset('/favicon.png') }}" type="image/x-icon"/>
<link rel="icon" href="{{ asset('/favicon.png') }}" type="image/x-icon"/>

<!-- css -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i,900,900i&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}?v={{ env('CSS_VERSION') }}" />

<!-- js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!-- extra header content -->
{!! isset($prismic->data->extra_header_content) && $prismic->data->extra_header_content ? RichText::asHTML($prismic->data->extra_header_content) : "" !!}

<!-- in-page js -->
<script type="text/javascript">
    $(function() {
        var customRenderFunction = function(document_type, item) {
            var out = '<a href="' + Swiftype.htmlEscape(item['url']) + '" class="st-search-result-link">' + item.highlight['title'] + '</a>';
            return out.concat('<p class="genre">' + Swiftype.htmlEscape(item['url']) + '</p>');
        };
        $('.header-input').swiftype({
            renderFunction: customRenderFunction,
            noResultsMessage: 'No results found',
            fetchFields: { 'page': ['title', 'url','body'] },
            //searchFields: {'page': ['title','url','body']},
            highlightFields: { 'page': { 'title': { 'size': 60, 'fallback': true }, 'url': { 'size': 60, 'fallback': true }}},
            engineKey: 'ZsZRpfiFJX786ro8gM8y'
        });
    });
</script>
<script type="text/javascript">
    var g = {
        home: !1,
        path: '/',
        tabnav: [],
        campaign: null,
        utm_source: null,
        type_program: {{ in_array('type_program', $prismic->tags) ? 'true' : 'false' }},
        num: {}
    };
    if ($(window).width() > 768) {
        g.mobile = 0;
    } else {
        g.mobile = 1;
    }
    g.path = "/application/themes/csug";
    var subheaderBg = "{{ isset($prismic->data->image->url) ? $prismic->data->image->url : "" }}";
    var subheaderBgMobile = "{{ isset($prismic->data->image_mobile->url) ? $prismic->data->image_mobile->url : "" }}";
    $(document).ready(function() {
        $('.days').text('');
    });
</script>

<!-- Google Adwords Click ID -->
<script> 
    window.onload = function getGclid() {        
        document.getElementById("gclid").value = (name = new    
        RegExp('(?:^|;\\s*)gclid=([^;]*)').exec(document.cookie)) ? 
        name.split(",")[1] : "";
    }
</script>
<!-- End Google Adwords Click ID -->

<!-- Google Optimize Async Loader -->
<style>.async-hide { opacity: 0 !important} </style>
<script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
})(window,document.documentElement,'async-hide','dataLayer',4000,
{'GTM-N84RZH':true});</script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N84RZH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N84RZH');</script>
<!-- End Google Tag Manager -->

<!-- Pardot Tracking Code -->
<script type="text/javascript">
piAId = '110362';
piCId = '8790';
(function() {
function async_load(){
var s = document.createElement('script'); s.type = 'text/javascript';
s.src = ('https:' == document.location.protocol ? 'https://pi' : 'http://cdn') + '.pardot.com/pd.js';
var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
}
if(window.attachEvent) { window.attachEvent('onload', async_load); }
else { window.addEventListener('load', async_load, false); }
})();
</script>
<!-- End Pardot Tracking Code -->