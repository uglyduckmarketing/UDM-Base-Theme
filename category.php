<?php get_header();
get_template_part( 'template-parts/content', 'hero' ); ?>
<main class="wrapper" role="main">
	<section class="container" style="padding-bottom: 45px;">
		<div class="row">
			<div class="blog">
				<?php get_template_part( 'template-parts/content', 'home' ); ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
