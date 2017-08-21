<!DOCTYPE html>
<!--

 __  __             ___                ____                      __
/\ \/\ \           /\_ \              /\  _`\                   /\ \
\ \ \ \ \      __  \//\ \    __  __   \ \ \/\ \   __  __    ___ \ \ \/'\
 \ \ \ \ \   /'_ `\  \ \ \  /\ \/\ \   \ \ \ \ \ /\ \/\ \  /'___\\ \ , <
  \ \ \_\ \ /\ \_\ \  \_\ \_\ \ \_\ \   \ \ \_\ \\ \ \_\ \/\ \__/ \ \ \\`\
   \ \_____\\ \____ \ /\____\\/`____ \   \ \____/ \ \____/\ \____\ \ \_\ \_\
    \/_____/ \/___\ \\/____/ `/___/> \   \/___/   \/___/  \/____/  \/_/\/_/
               /\____/           /\___/
               \_/__/            \/__/


Created With ♥ By Ugly Duck Marketing
https://uglyduckmarketing.com/

-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Noto+Sans:400,400i,700,700i" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
<?php
echo get_option('header_code');
$currentHeader = get_option('header_choice');
wp_head();
?>
</head>
<body <?php body_class(); ?> id="header-<?php echo $currentHeader; ?>">
<header class="header-<?php echo $currentHeader; ?>" role="banner">
<?php if(get_option('topbar')) : ?>
	<div class="topbar">
		<div class="container">
			<div class="col-xs-9 topbar-contact">
				<p>
					<!--
					<span><?php echo get_option('phone_number'); ?></span>
					<span><?php echo get_option('udm_email'); ?></span>
					-->
					<?php echo do_shortcode(get_option('topbar_text',UDM_TOPBAR_TEXT_DEFAULT)); ?>
				</p>
			</div>
			<div class="col-xs-3 topbar-social">
				<p>
					<?php if(get_option('udm_fb')) { echo '<a href="' . get_option('udm_fb') . '" target=_blank><i class="ion-social-facebook"></i></a>'; } ?>
					<?php if(get_option('udm_twitter')) { echo '<a href="' . get_option('udm_twitter') . '" target=_blank><i class="ion-social-twitter"></i></a>'; } ?>
					<?php if(get_option('udm_ig')) { echo '<a href="' . get_option('udm_ig') . '" target=_blank><i class="ion-social-instagram"></i></a>'; } ?>
					<?php if(get_option('udm_google')) { echo '<a href="' . get_option('udm_google') . '" target=_blank><i class="ion-social-googleplus"></i></a>'; } ?>
					<?php if(get_option('udm_pin')) { echo '<a href="' . get_option('udm_pin') . '" target=_blank><i class="ion-social-pinterest"></i></a>'; } ?>
				</p>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php
	if($currentHeader) {
		get_template_part( 'template-parts/headers/header', $currentHeader );
	} else {
		get_template_part( 'template-parts/headers/header', 'one' );
	}
?>
</header>
<div class="mobile-navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
	<p class="contact-section"><?php echo get_option('udm_address'); ?><br /><?php echo get_option('udm_city'); ?>, <?php echo get_option('udm_state'); ?>
		<br /><?php echo get_option('phone_number'); ?><br />
	</p>
	<div class="social-section">
		<?php if(get_option('udm_fb')) { echo '<a href="' . get_option('udm_fb') . '" target=_blank><i class="ion-social-facebook"></i></a>'; } ?>
		<?php if(get_option('udm_twitter')) { echo '<a href="' . get_option('udm_twitter') . '" target=_blank><i class="ion-social-twitter"></i></a>'; } ?>
		<?php if(get_option('udm_ig')) { echo '<a href="' . get_option('udm_ig') . '" target=_blank><i class="ion-social-instagram"></i></a>'; } ?>
		<?php if(get_option('udm_google')) { echo '<a href="' . get_option('udm_google') . '" target=_blank><i class="ion-social-googleplus"></i></a>'; } ?>
		<?php if(get_option('udm_pin')) { echo '<a href="' . get_option('udm_pin') . '" target=_blank><i class="ion-social-pinterest"></i></a>'; } ?>
	</div>
</div>
