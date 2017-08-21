<?php
$logoPath = get_theme_mod('logo_image');
$lightlogoPath = get_theme_mod('solutions_image');
?>
<?php if(get_option('sticky_nav',false)) : ?>
<?php endif; ?>
<div class="container">
	<div class="row">
		<div class="logo-section col-lg-4 col-md-3 col-xs-12">
			<?php if ($logoPath) { ?>
				<a id="logo" href="<?php bloginfo("url"); ?>"><img src="<?php echo $logoPath ?>"/></a>
			<?php } ?>
		</div>
		<div class="col-lg-8 col-md-9 hidden-sm-down nav-section">
			<nav id="site-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
		</div>
		<div class="col-xs-2 hidden-md-up">
			<a class="menu-button"><i class="ion-navicon"></i></a>
		</div>
	</div>
</div>
