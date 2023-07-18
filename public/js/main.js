var mainnav = {
	subopen: !1,
	scrollPos: 0,
	clear: !1,
	curSection: null,
	curSub: null,
	hamburger: function () {
		$('header').toggleClass('open');
		if ($('header').hasClass('open')) {
			$('body').css('overflow', 'hidden')
		} else {
			$('body').css('overflow', 'auto')
		}
		$('#subheader_desktop_container:visible').fadeOut('fast');
		$('.section.active:visible').removeClass('active');
		$('#mobile-header-bottom-row').fadeToggle('fast');
		$('#rfi_short').slideUp('fast');
		$('#requestArrow').removeClass('rotate')
	},
	back: function (level) {
		if (level == 2) {
			$('#subheader_desktop_container:visible').fadeOut('fast');
			$('.section.active:visible:last').removeClass('active')
		} else if (level == 3) {
			$('.subsub.active').removeClass('active').fadeOut()
		}
	},
	open: function (id) {
		if (g.mobile == 0) {
			if (mainnav.clear == !0) {
				$('#header_desktop_container').removeClass('clear')
			}
			$('#subheader_desktop_container').slideDown('fast', function () {
				mainnav.getSection(id)
			});
			mainnav.subopen = !0
		} else {
			$('#subheader_desktop_container').show('fast', function () {
				mainnav.getSection(id)
			});
			mainnav.subopen = !0
		}
	},
	close: function () {
		if (mainnav.clear == !0) {
			$('#header_desktop_container').addClass('clear')
		}
		$('#subheader_desktop_container').slideUp('fast');
		$('.section').fadeOut('fast');
		$('#subheader_desktop .sectiontitle').fadeOut('fast');
		mainnav.subopen = !1
	},
	getSection: function (id) {
		$('.snav').removeClass('active');
		$('.section, .subsub').fadeOut('fast', function () {
			if (g.mobile == 0) {
				var sectionLink;
				var sectionTitle;
				if (id == 'UG') {
					sectionLink = "/undergraduate";
					sectionTitle = 'UNDERGRADUATE'
				} else if (id == 'GR') {
					sectionLink = "/graduate";
					sectionTitle = 'GRADUATE'
				} else if (id == 'AM') {
					sectionLink = "/admissions";
					sectionTitle = 'ADMISSIONS'
				} else if (id == 'CO') {
					sectionLink = "/cost";
					sectionTitle = 'COST'
				} else if (id == 'RS') {
					sectionLink = "/resources";
					sectionTitle = 'RESOURCES'
				} else if (id == 'AB') {
					sectionLink = "/about";
					sectionTitle = 'ABOUT'
				} else if (id == 'SE') {
					sectionLink = "#";
					sectionTitle = 'SEARCH'
				}
				$('#subheader_desktop .sectiontitle').html(sectionTitle + ' »').attr('href', sectionLink).fadeIn('fast');
				$('#' + id + ' .col1 a.snav').first().addClass('active');
				setTimeout(function () {
					$('#' + id).fadeIn('fast');
					var sub = $('#' + id + ' .subsub').first().attr('id');
					mainnav.getSub(sub, !0);
					$('#' + id + ' .col1 a:first').focus()
				}, 300)
			} else {
				$('#' + id).show();
				var sub = $('#' + id + ' .subsub').first().attr('id');
				$('#' + id + ' .col1 a:first').focus();
				$('#' + id).addClass('active')
			}
		})
	},
	getSub: function (id, main) {
		if (g.mobile == 0) {
			$('.subsub').fadeOut('fast');
			setTimeout(function () {
				$('#' + id).fadeIn('fast');
				if (main != !0) {
					$('#' + id + ' a.mainpage').focus()
				}
			}, 300)
		} else {
			$('.subsub').removeClass('active');
			$('#' + id).show();
			if ($('.section').is(':visible')) {
				$('.subsub').addClass('active')
			}
			if (main != !0) {
				$('#' + id + ' a.main').focus()
			}
		}
	},
	focusMain: function () {
		$(mainnav.curSection).focus()
	},
	focusSub: function () {
		$(mainnav.curSub).focus()
	},
	focusSubBack: function () {
		$('.col1:visible .active').focus()
	},
    showAppWaiver: function() {
        $('#app_code_container').slideToggle('fast');
    },
    showInformationForMenu: function(el) {
        var $this = $(el),
            $button = $( '.button-information-for' ),
            $informationFor = $('#header-information-for-container-nav');

        // Let screen readers know if it's open or closed
        $this.css('outline','none').blur().attr( 'aria-expanded', function ( i, attr ) {
            return attr == 'true' ? 'false' : 'true'
        } );

        // Animate the menu open/closed
        $informationFor.slideToggle(0);

        // Rotate the chevron 180 degrees
        $button.toggleClass('open');
    },
    toggleSearch: function(state) {
        var $openSearch = $('#st-search-input-open'),
            $closeSearch = $('#st-search-input-close'),
            $searchForm = $('#desktop-search'),
            $searchInput = $('#st-search-input');

        // Let screen readers know if the search form is hidden or visible
        $openSearch.attr( 'aria-pressed', function ( i, attr ) {
            return attr == 'true' ? 'false' : 'true'
        } );

        if ( state == 'open' ) {
            // hide the search open button
            $openSearch.toggleClass('open');

            // Animate the search form open
            $searchForm.show().addClass('show-form').animate({
                width: '100%'
            }, {
                complete: function() {
                    // Place focus in the search text input
                    $searchInput.focus();
                }
            });
        } else {
            // Animate the search form closed
            $searchForm.animate({
                width: '0'
            }, 100, 'linear',
                function() {
                    // hide the search form and show the search open button
                    $searchForm.hide();
                    $openSearch.toggleClass('open');
                }
            );
        }
    }
};
var popupWindow = null;

function centeredPopup(url, winName, w, h, scroll) {
	lPos = (window.width) ? (window.width - w) / 2 : 0;
	tPos = (window.height) ? (window.height - h) / 2 : 0;
	settings = 'height=' + h + ',width=' + w + ',top=' + tPos + ',left=' + lPos + ',scrollbars=' + scroll + ',resizable';
	popupWindow = window.open(url, winName, settings)
}

function scrollWin(name) {
	$('html, body').animate({
		scrollTop: $('[name=' + name + ']').offset().top - 150
	}, 500)
}
$(document).ready(function () {
	var images = ['BTL_Headers_home1.jpg', 'BTL_Headers_home2.jpg'];
	$('#btlHeader').css({
		'background-image': 'url(/application/themes/csug/images/' + images[Math.floor(Math.random() * images.length)] + ')'
	});
	$(window).resize(function () {
		if ($(window).width() > 768) {
			g.mobile = 0
		} else {
			g.mobile = 1
		}
	});
	$('#rfi_short #expand').click(function () {
		$('#rfi_short #extraForm').toggleClass('open');
		$('#rfi_short #expand i').toggleClass('rotate');
		$('div.page #rfi_short').toggleClass('fullForm')
	});
	$('#requestInfo').on('click', function () {
		if (window.location.pathname == '/') {
			window.location.href = "/request-information"
		} else {
			$('header').removeClass('open');
			$('.section.active:visible').removeClass('active');
			$('#mobileHidden').fadeOut('fast');
			$('#rfi_short').slideToggle('fast', function () {
				if ($('#rfi_short').is(':visible')) {
					$('#requestArrow').addClass('rotate');
					$('body').css('overflow', 'hidden')
				} else {
					$('#requestArrow').removeClass('rotate');
					$('body').css('overflow', 'auto')
				}
			})
		}
	});
	$('#getStarted').click(function () {
		if (g.mobile == 0) {
			$("html, body").animate({
				scrollTop: 0
			}, 300);
			$("#rfi_short_form input[name='email']").focus();
			return !1
		} else {
			$('#requestInfo').trigger('click')
		}
	});
	$(window).scroll(function () {
		if (g.mobile == 0) {
			if ($(this).scrollTop() > 1) {
				$('header,.page').addClass('sticky')
			} else {
				$('header,.page').removeClass('sticky')
			}
		}
	});
	$("#rfi_short_form input[name='email']").focus(function () {
		if (g.type_program == false) {
			if (!$('#rfi_short #extraForm').hasClass("open")) {
				$('#rfi_short #extraForm').toggleClass('open');
				$('#rfi_short #expand i').toggleClass('rotate');
				$('div.page #rfi_short').toggleClass('fullForm')
			}
		}
	});
	$('#hamburger').on('click', function () {
		mainnav.hamburger()
	});
	$('.associationList').hover(function () {
		if ($('.associationList .courseDescription').is(':visible')) {
			$('.associationList .courseDescription').fadeOut()
		}
	});
	$('.specializations').hover(function () {
		if ($('.specializations .description').is(':visible')) {
			$('.specializations .description').fadeOut()
		}
	});
	$('.specializationList li').hover(function () {
		if ($('.specializationList .courseDescription').is(':visible')) {
			$('.specializationList .courseDescription').fadeOut()
		}
	});
	$('#main').find('.faculty dt').click(function () {
		$(this).next('dd').slideToggle('fast');
		$(this).toggleClass('faculty-active');
		$(this).siblings().next('dd').slideUp('fast');
		$(this).siblings().removeClass('faculty-active')
	});
	$(document).on('click', function (event) {
		if ($('#ctapanel').is(':visible')) {
			if (!$(event.target).closest('#ctapanel').length) {
				mobinav.ctapanel()
			}
		}
		if (!$(event.target).closest('#header_desktop #search').length) {
			$('.ctalink').fadeIn('fast');
			$('#header_desktop #search').removeClass('active');
			$('#header_desktop #search #st-search-input').val('')
		}
	});
	$('#mainnav').on('click', function () {
		$('#mainnav, .subnav').slideUp('fast');
		mobinav.openstate = !1
	});
	$('#mainnav .mnav, #mainnav a').on('click', function (e) {
		e.stopPropagation()
	});
	$('.mnav').on('click', function () {
		$('.subnav').slideUp('fast');
		var snav = $(this).next('.subnav');
		if ($(snav).is(':visible')) {
			$(snav).slideUp('fast')
		} else {
			$(snav).slideDown('fast')
		}
		mainnav.curSection = this
	});
	$('.snav').on('click', function () {
		$('.snav').removeClass('active');
		$(this).addClass('active');
		mainnav.curSub = this
	});
	$('.snav').keydown(function (e) {
		var key = e.keyCode;
		if (e.shiftKey && key == 9) {
		} else if (key == 9) {
			if (this === $('.col1:visible .snav:last')[0]) {
				mainnav.focusMain()
			} else {
				// console.log('not last one, do nothing!!!')
			}
		}
	});
	$('.mainpage, .ssnav').keydown(function (e) {
		var key = e.keyCode;
		if (e.shiftKey && key == 9) {
			if (this === $('.subsub:visible .mainpage')[0]) {
				mainnav.focusSubBack()
			}
		} else if (key == 9) {
			if (this === $('.subsub:visible .ssnav:last')[0]) {
				mainnav.focusSub()
			} else {
				// console.log('not last one, do nothing!!!')
			}
		}
	});
	$('input[name="query"]').keydown(function (e) {
		var key = e.keyCode;
		if (!e.shiftKey && key == 9) {
			$('.ctalink').fadeIn('fast');
			$('#header_desktop #search').removeClass('active');
			$('#header_desktop #search #sitesearch').val('')
		}
	});
	$(document).keyup(function (e) {
		if (e.keyCode == 27) {
			if (mainnav.subopen == !0) {
				mainnav.close();
				$('ol.breadcrumb a:first').focus()
			}
		}
	});
	$('#header_desktop #search *').on('focus', function () {
		$('.ctalink').fadeOut('fast');
		$('#header_desktop #search').addClass('active')
	});
	$('.fancybox').fancybox({
		beforeShow: function () {
			var win = null;
			var content = $('.fancybox-inner');
			$('.fancybox-wrap').append('<div id="fancy_print"></div>');
			$('#fancy_print').bind("click", function () {
				win = window.open("width=200,height=200");
				self.focus();
				win.document.open();
				win.document.write('<' + 'html' + '><' + 'head' + '><' + 'style' + '>');
				win.document.write('body, td { font-family: \'Whitney SSm A\',Verdana; font-size: 10pt;}');
				win.document.write('.table {margin-bottom: 20px;}');
				win.document.write('th, td {font-size: 14px;line-height: 22px;padding: 10px;vertical-align:top;}');
				win.document.write('th {background-color: #70a1e6;color: #FFF;font-weight: 700;}');
				win.document.write('tr {background-color:#fff;}');
				win.document.write('td {color: #666;}');
				win.document.write('.totals {background: #fff !important;border-top: 1px solid #666;font-weight: bold;text-transform: uppercase;}');
				win.document.write('.totals-title {text-align: right;}');
				win.document.write('.table-striped tr:nth-child(odd) {background-color: #E3ECFB;}');
				win.document.write('<' + '/' + 'style' + '><' + '/' + 'head' + '><' + 'body' + '>');
				win.document.write(content.html());
				win.document.write('<' + '/' + 'body' + '><' + '/' + 'html' + '>');
				win.document.close();
				win.print();
				win.close()
			})
		}
	});
	$(".various").fancybox({
		fitToView: !0,
		width: '800',
		height: '650',
		autoSize: !0,
		closeClick: !1,
		openEffect: 'none',
		closeEffect: 'none',
	});
	if ($.cookie('privacySlide') == null) {
		$.cookie('privacySlide', 'yes', {
			expires: 10000,
			path: '/'
		});
		setTimeout(function () {
			privacySlide.open()
		}, 3000);
		$('#closeSlide').click(function (e) {
			privacySlide.close();
			e.stopPropagation();
			$.cookie('privacySlide', 'yes', {
				expires: 10000,
				path: '/'
			})
		})
	}
	if ($.cookie('appWaiver') == null) {
		$.cookie('appWaiver', 'yes', {
			expires: 90,
			path: '/'
		});
		setTimeout(function () {
			$.fancybox.open($('#rfi_popup'))
		}, 4000)
	}
	$('.rfipopupform').submit(function (e) {
		$.cookie('appWaiver', 'yes', {
			expires: 90,
			path: '/'
		})
	});
	$("#SE #search").submit(function () {
		if ($('.autocomplete ul li:eq(0)').hasClass("noResults")) {
			document.location.href = "/"
		} else {
			var goEntry = $('.autocomplete ul li:eq(0) a').attr('href');
			document.location.href = goEntry;
			return !1
		}
	});
	$('.associationListAOS li').click(function () {
		var topHeight = $('.associationListAOS li .courseTitle').height() + 10;
		$(this).children('.associationListAOS div.courseDescription').css('top', topHeight);
		$(this).children('.associationListAOS div.courseDescription').slideToggle();
		$(this).siblings().children('.associationListAOS div.courseDescription').fadeOut()
	});
	if ($(window).width() <= 768) {
		$('<div id=expandMenu>â˜°</div>').insertBefore($('h3#sectionTitle'));
		$('#expandMenu').on('click', function () {
			$('.ccm-custom-style-container.inpage_nav').slideToggle();
			return !1
		})
	}
	$('.accordion h3').on('click', function(e) {
		$(this).toggleClass('active');
		$(this).next('.accordion_content').slideToggle('fast');
	});
});
var privacySlide = {
	height: 0,
	openstate: !1,
	open: function () {
		$('#privacySlide').animate({
			bottom: 0
		}, 400).removeClass('link');
		$('#closeSlide').fadeIn('fast');
		privacySlide.openstate = !0;
		if (privacySlide.height == 0) {
			privacySlide.height = $('#privacySlide').height()
		}
	},
	close: function () {
		if ($(window).width() > 768) {
			var size = privacySlide.height + 45
		} else {
			var size = ($(window).height() * .85) + 35
		}
		$('#privacySlide').animate({
			bottom: '-' + size + 'px'
		}, 400).addClass('link');
		$('#closeSlide').fadeOut('fast');
		privacySlide.openstate = !1
	}
}
var surveySlide = {
	height: 0,
	openstate: !1,
	open: function () {
		$('#surveySlide').animate({
			bottom: 0
		}, 400).removeClass('link');
		$('#closesSlide').fadeIn('fast');
		privacySlide.openstate = !0;
		if (privacySlide.height == 0) {
			privacySlide.height = $('#surveySlide').height()
		}
	},
	close: function () {
		if ($(window).width() > 768) {
			var size = privacySlide.height + 45
		} else {
			var size = ($(window).height() * .85) + 35
		}
		$('#surveySlide').animate({
			bottom: '-' + size + 'px'
		}, 400).addClass('link');
		$('#closesSlide').fadeOut('fast');
		surveySlide.openstate = !1
	}
}
$('.associationListAOS li').hover(function () {
	$(this).siblings().children('.associationListAOS div.courseDescription').fadeOut()
})

// course list script

// if (typeof noColumns === 'undefined' || noColumns == false) {
// 	$(function($) {
// 		var num_cols = 2,
// 		container = $('.associationList'),
// 		listItem = 'li',
// 		listClass = 'sub-list';
// 		container.each(function() {
// 			var items_per_col = new Array(),
// 			items = $(this).find(listItem),
// 			min_items_per_col = Math.floor(items.length / num_cols),
// 			difference = items.length - (min_items_per_col * num_cols);
// 			for (var i = 0; i < num_cols; i++) {
// 				if (i < difference) {
// 					items_per_col[i] = min_items_per_col + 1;
// 				} else {
// 					items_per_col[i] = min_items_per_col;
// 				}
// 			}
// 			for (var i = 0; i < num_cols; i++) {
// 				$(this).append($('<ul ></ul>').addClass(listClass));
// 				for (var j = 0; j < items_per_col[i]; j++) {
// 					var pointer = 0;
// 					for (var k = 0; k < i; k++) {
// 						pointer += items_per_col[k];
// 					}
// 					$(this).find('.' + listClass).last().append(items[j + pointer]);
// 				}
// 			}
// 		});
// 	});
// }

$('.associationList li').click(function(){
	var topHeight = $('.associationList li .courseTitle').height() + 10;
	$(this).children('div.courseDescription').css('top',topHeight);
	$(this).children('div.courseDescription').slideToggle();
	$(this).siblings().children('div.courseDescription').fadeOut();
});
$('.associationList li').hover(function(){
	$(this).siblings().children('div.courseDescription').fadeOut();
});

$(function($) {
    var num_cols = 2,
    container = $('.specializations'),
    listItem = 'li',
    listClass = 'sub-list';
    container.each(function() {
        var items_per_col = new Array(),
        items = $(this).find(listItem),
        min_items_per_col = Math.floor(items.length / num_cols),
        difference = items.length - (min_items_per_col * num_cols);
        for (var i = 0; i < num_cols; i++) {
            if (i < difference) {
                items_per_col[i] = min_items_per_col + 1;
            } else {
                items_per_col[i] = min_items_per_col;
            }
        }
        for (var i = 0; i < num_cols; i++) {
            $(this).append($('<ul></ul>').addClass(listClass));
            for (var j = 0; j < items_per_col[i]; j++) {
                var pointer = 0;
                for (var k = 0; k < i; k++) {
                    pointer += items_per_col[k];
                }
                $(this).find('.' + listClass).last().append(items[j + pointer]);
            }
        }
    });
});

$('.specializations li').click(function(){
	var topHeight = $('.specializations li').height() + 0;
	$(this).children('div.description').css('top',topHeight);
	$(this).children('div.description').slideToggle();
	$(this).siblings().children('div.description').fadeOut();
});
$('.specializations li').hover(function(){
	$(this).siblings().children('div.description').fadeOut();
});