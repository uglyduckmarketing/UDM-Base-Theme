<?php get_header(); ?>
<main class="wrapper" role="main">
	<section class="container">
		<div class="blog-main-container col-xs-12">
			<?php
			if(get_option('blog_choice')) {
				get_template_part( 'template-parts/blogs/blog', get_option('blog_choice') );
			} else {
				get_template_part( 'template-parts/blogs/blog', 'one' );
			}
			?>
		</div>
	</section>
</main>
<?php get_footer(); ?>
