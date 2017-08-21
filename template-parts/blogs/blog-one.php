<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>
<a class="col-lg-4 col-md-4 col-sm-12 blog-card-container" href="<?php the_permalink(); ?>">
	<div class="blog-card">
		<div class="card-image" style="background: url(<?php echo $src[0]; ?> ) no-repeat scroll center / cover !important"></div>
		<div class="card-inner">
			<h3><?php the_title(); ?></h3>
			<span class="the-date"><i class="ion-android-time"> </i> <?php echo get_the_date(); ?></span>
		</div>
	</div>
</a>

<?php endwhile; endif; ?>
<div class="navigation">
	<p><?php posts_nav_link(); ?></p>
</div>
