var cat = {}
$(document).ready(function() {

    if (g.mobile == 0) {
        $('#catalog #catalog_content').addClass('flex-container');
    }

    $('#catalog #versions_open').on('click', function(e) {
        $('#catalog #versions_container').slideToggle('fast');
        e.preventDefault();
    });

    // main nav click
    $('.cat_nav_t1').not('#cat_nav_home, #cat_nav_courses').on('click', function(e) {
        var id = $(this).attr('id');
        // show/hide sub menu
        $('#cat_nav ul').slideUp('fast');
        $(this).siblings('ul').slideDown('fast');
        // stop page reload on link
        e.preventDefault();
    });

    // navigation click
    $('#cat_nav ul a, #cat_nav_home, #cat_nav_courses').on('click', function(e) {
        var id = $(this).attr('id').replace('cat_nav_','');
        if (g.mobile == 1) {
            $('#catalog #cat_nav').removeClass('mobile_open');
            $('#mobile_collapse').slideUp('fast');
        }
        scrollCalendar();
        t = setTimeout(function() {
            $('.cat_content').removeClass('active');
            $('#catalog #rs_nav li').addClass('hidden');
            t = setTimeout(function() {
                $('#catalog #cat_' + id).addClass('active');
                $('.rs_nav_' + id).removeClass('hidden');
            },800);
        },500);
        e.preventDefault();
    });

    // fix catalog navigation
    var navpos = $('#cat_nav').offset().top;
    $(window).scroll(function() {
        if (g.mobile == 0) {
            if (($(window).scrollTop() + 150) > navpos) {
                var pWidth = $('#catalog #cat_nav').parent().width();
                $('#catalog #cat_nav').addClass('sticky').width(pWidth);
            } else {
                $('#catalog #cat_nav').removeClass('sticky').width('100%');
            }
            // check for end of catalog
            if ($('#catalog #cat_nav').offset().top + $('#catalog #cat_nav').height() >= $('#catalog_end').offset().top - 10) {
                $('#catalog #cat_nav').addClass('end');
            }
            if ($('#catalog #cat_nav').hasClass('end') && $(document).scrollTop() < $('#catalog #cat_nav').offset().top - 150) {
                $('#catalog #cat_nav').removeClass('end');
            }
        }

    });
    
    $('#cat_hamburger').on('click', function(e) {
        $('#catalog #cat_nav').toggleClass('mobile_open');
        $('#mobile_collapse').slideToggle('fast');
    });
    
    // $.getJSON("http://localhost:8080/redesign19/application/themes/csug/js/catalog.json", function(data) {
    //     cat = data;
    //     console.log(cat);
    // });

});

function scrollCalendar() {
    if (g.mobile) {
        var extra = 50;
    } else {
        var extra = 0;
    }
	$('html, body').animate({
		scrollTop: $('#subhead h1').offset().top - extra
	}, 400);
}