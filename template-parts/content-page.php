<main class="wrapper" role="main">
	<section class="container">
		<div class="row">
			<?php if (is_active_sidebar( 'left_sidebar' )) { ?>
				<!-- LEFT SIDEBAR -->
				<div class="col-md-4 sidebar sidebar_left hidden-sm-down">
					<div class="internal-sidebar">
						<?php dynamic_sidebar('left_sidebar'); ?>
					</div>
				</div>
				<div class="col-md-8 col-sm-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
				</div>
			<?php }  elseif (is_active_sidebar( 'right_sidebar' )) { ?>
				<!-- RIGHT SIDEBAR -->
				<div class="col-md-8 col-sm-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
				</div>
				<div class="col-md-4 sidebar sidebar_right hidden-sm-down">
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
