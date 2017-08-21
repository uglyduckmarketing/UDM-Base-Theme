jQuery(document).ready(function($) {

	// HOMEPAGE SLIDER
	$('.hero-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		arrows: false,
		dots: true,
		infinite: true,
	});

	// MOBILE TRIGGER
	$('.menu-button').click(function() {
		$('.mobile-navigation').toggleClass('visible-menu');
		if ($('.menu-button i').hasClass('ion-navicon')) {
			$('.menu-button i').toggleClass('ion-navicon ion-ios-close-outline');
		} else {
			$('.menu-button i').toggleClass('ion-ios-close-outline ion-navicon');
		}
	});

	// FULL HEIGHT BLOG SIDEBAR
	$wrapperHeight = $('.article-main').height();
	$('.blog-sidebar').height($wrapperHeight);

	// MOBILE DROPDOWNS
	$('#mobile-menu .menu-item-has-children > a').click(function(e) {
		e.preventDefault();
		$(this).next().slideToggle();
	});

	// STICKY SIDEBAR ON SCROLL
	var $elementOffset = $('.sticky-sidebar_right').offset().top; // Distance from the top of the window
	var $footerHeight = $('.site-footer').height() + 800; // Height of the footer
	var body = document.body,
  html = document.documentElement;
	var $fullHeight = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight ); // Full Page Height
	var $footerOffset = $fullHeight - $footerHeight; // Full Page Height Minus The Footer
	var $stickyOffset = $('.hero-background').height() + $('header').height(); $stickyOffset = $stickyOffset - 150; // Positioning the sidebar element based on hero and header

	$('.sticky-sidebar_right').css( "top", $stickyOffset );

	$(window).scroll(function() {
		var $scrollTop = $(window).scrollTop();

    if ($scrollTop >= $stickyOffset) {
    	$('.sticky-sidebar_right').addClass("stuck-sidebar");

			if ($scrollTop >= $footerOffset) {
				$('.sticky-sidebar_right').removeClass("stuck-sidebar").css( "top", $footerOffset + 'px' );
			} else {
				$('.sticky-sidebar_right').addClass("stuck-sidebar");
			}

		} else {
			$('.sticky-sidebar_right').removeClass("stuck-sidebar").css( "top", $stickyOffset );
		}
	});
	// SIDEBAR MODAL POPUP (MOBILE)
	$('.sticky-sidebar-trigger button').click(function() {
		$('.sticky-sidebar_right, .close-modal').show();
	});
	$('.close-modal').click(function() {
		$('.sticky-sidebar_right, .close-modal').hide();
	});

	// PARALLAX EFFECT
	$('div[data-type="background"]').each(function() {
		var $bgobj = $(this); // assigning the object
		var $bgimg = $(this).children('img'); // assigning the object
		var yPos = (($(window).scrollTop() - $bgobj.offset().top) / $bgobj.data('speed'));
		$bgobj.css({
			top: yPos + 'px'
		});
		$(window).scroll(function() {
			var yPos = (($(window).scrollTop() - $bgobj.offset().top) / $bgobj.data('speed'));
			var yPos2 = ($(window).scrollTop() - $bgobj.offset().top) * ($bgobj.data('speed'));
			// Put together our final background position
			var coords = '50% ' + yPos + 'px';
			// Move the background
			$bgobj.css({
				top: yPos + 'px'
			});
		});
	});
});
