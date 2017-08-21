jQuery(document).ready(function($) {

	// Sticky Navigation On Scroll
	$(window).scroll(function() {
		if ($(this).scrollTop() > 120) {
			$('header').addClass("sticky");
			$('.topbar').addClass("hidden");
		} else {
			$('header').removeClass("sticky");
			$('.topbar').removeClass("hidden");
		}
	});
});
