<?php

// Color Variables
$header_background = get_option('udm_header_color');
$footer_background = get_option('udm_footer_color');
$header_link_color = get_option('udm_header_a_color');
$brandColor = get_option('udm_color');
$navbarColor = get_option('udm_navbar_color');
$linkColor = get_option('udm_link_color');
$linkHover = get_option('udm_link_hover_color');
$footer_link_color = get_option('udm_footer_a_color');
$footer_text_color = get_option('udm_footer_text_color');
$submenuBackground = get_option('udm_submenu_color');
$submenuLink = get_option('udm_submenu_a_color');
$heroColor = get_option('udm_hero_color');
?>

<style type="text/css">
	a, a:focus {
		color: <?php echo $linkColor; ?>;
	}
	a:hover {
		color: <?php echo $linkHover; ?>;
	}
	#primary-menu .sub-menu li a:hover {
		color: <?php echo $linkColor; ?> !important;
	}
	header, .mobile-bar {
	  background: <?php echo $header_background; ?>;
	}
	header a {
		color: <?php echo $header_link_color; ?>;
		transition: all .3s ease;
	}
	header a:hover {
		color: <?php echo $linkColor; ?>;
	}
	header.header-two .nav-section {
		background: <?php echo $navbarColor; ?>;
	}
	.button, button, input[type="button"] {
		background: <?php echo $brandColor; ?>;
		color: #ffffff;
	}
	.button:hover, button:hover, input[type="button"]:hover {
		background: <?php echo $linkHover; ?>;
	}
	.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {
		background: <?php echo $brandColor; ?>;
		color: #ffffff;
		transition: all .3s ease;
	}
	.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover {
		background: <?php echo $linkHover; ?>;
	}
	.woocommerce-message {
    border-top-color: <?php echo $brandColor; ?>;
	}
	.sub-menu {
		background: <?php echo $submenuBackground; ?>;
	}
	.sub-menu:after {
		border-bottom-color: <?php echo $submenuBackground; ?>;
	}
	.sub-menu a {
		color: <?php echo $submenuLink; ?> !important;
	}
	footer {
		background: <?php echo $footer_background; ?> ;
		color: <?php echo $footer_text_color; ?> ;
	}
	footer .widget {
		color: <?php echo $brandColor; ?>;
	}
	footer a {
		color: <?php echo $footer_link_color; ?>;
	}
	.basic-header {
		background-color: <?php echo $heroColor; ?>
	}
	<?php if(get_option('hero_choice') == 'none') : ?>
		.header-basic {
			display: none;
		}
		header {
			margin-bottom: 25px;
		}
		.home header {
			margin-bottom: 0px !important;
		}
		@media (max-width: 768px) {
			main {
				padding-top: 88px !important;
			}
		}
	<?php endif; ?>
</style>
