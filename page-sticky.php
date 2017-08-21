<?php get_header();
// Template Name: Sticky Sidebar
get_template_part( 'template-parts/content', 'hero' ); ?>
<main class="wrapper" role="main">
	<section class="container">
		<div class="row">
			<?php if (is_active_sidebar( 'left_sidebar' )) { ?>
				<!-- LEFT sticky-sidebar-->
				<div class="col-md-4 sticky-sidebar_left">
					<div class="internal-sidebar">
						<?php dynamic_sidebar('left_sidebar'); ?>
					</div>
				</div>
				<div class="col-md-8 col-sm-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
				</div>
			<?php }  elseif (is_active_sidebar( 'right_sidebar' )) { ?>
				<!-- RIGHT sticky-sidebar-->
				<div class="col-md-8 col-sm-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
				</div>
				<div class="col-md-4 sticky-sidebar_right">
					<div class="internal-sidebar">
						<?php dynamic_sidebar( 'right_sidebar' ); ?>
					</div>
				</div>
			<?php }  else {
					if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif;
		 		}
		 	?>
		</div>
	</section>
</main>
<div class="sticky-sidebar-trigger">
	<button>Request Estimate</button>
</div>
<i class="close-modal ion-ios-close-outline"></i>
<?php get_footer(); ?>
