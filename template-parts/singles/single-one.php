<?php
$thumbnail_id = get_post_thumbnail_id( $post->ID ); // Post Image ID
$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); // Image SRC
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // The Alt Tag
$title = get_post(get_post_thumbnail_id())->post_title; //The Title
$caption = get_post(get_post_thumbnail_id())->post_excerpt; //The Caption
$description = get_post(get_post_thumbnail_id())->post_content; // The Description
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="container">
	<div class="col-lg-8 col-md-12 article-main">
			<h1 class="article-title"><?php the_title(); ?></h1>
			<p class="author-information">By <?php the_author(); ?> - <?php the_time('F jS, Y') ?> in <?php the_category(', ') ?></p>
			<?php if(has_post_thumbnail()) : ?>
				<div class="article-main-image">
					<img class="featured-image" src="<?php echo $img[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
				</div>
			<?php endif; ?>
			<?php the_content(); ?>
			<div class="share-article">
				<h4 class="share-title">Share This Article</h4>
				<!-- Facebook -->
				<a class="social-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
					<i class="ion-social-facebook"></i>
				</a>
				<!-- Google+ -->
				<a class="social-google" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank">
					<i class="ion-social-googleplus"></i>
				</a>
				<!-- Pinterest -->
				<a class="social-pinterest" href="//pinterest.com/pin/create/link/?url=<?php echo get_permalink();?>">
					<i class="ion-social-pinterest"></i>
				</a>
				<!-- Twitter -->
				<a class="social-twitter" href="https://twitter.com/share?url=<?php echo get_permalink(); ?>&amp;" target="_blank">
					<i class="ion-social-twitter"></i>
				</a>
			</div>
		<?php endwhile; endif; ?>
	</div>
	<div class="col-sm-4 hidden-md-down">
		<div class="sidebar blog-sidebar hidden-xs">
			<?php dynamic_sidebar( 'right_blog_sidebar' ); ?>
		</div>
	</div>
</section>
<?php
the_post();
$prevPost = get_previous_post();
$prevthumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($prevPost->ID), array( 5600,1000 ), false, '' );
$nextPost = get_next_post();
$nextthumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($nextPost->ID), array( 5600,1000 ), false, '' );
$prevUrl = get_permalink(get_adjacent_post(false,'',true));
$nextUrl = get_permalink(get_adjacent_post(false,'',false));
?>
<div class="colored-bg">
	<?php if ( is_a( $prevPost, 'WP_Post' ) && is_a( $nextPost, 'WP_Post' ) ) : ?>
	<a href="<?php echo $prevUrl; ?>" class="col-sm-6 blog-nav-block">
		<div class="blog-nav-image" style="background: url(<?php echo $prevthumbnail[0]; ?> ) no-repeat scroll center / cover !important; height: 300px;"></div>
		<div class="blog-nav-content">
			<span class="post-status">Previous Article</span>
			<h3><?php echo get_the_title( $prevPost->ID ); ?></h3>
		</div>
	</a>
	<a href="<?php echo $nextUrl; ?>" class="col-sm-6 blog-nav-block">
		<div class="blog-nav-image" style="background: url(<?php echo $nextthumbnail[0]; ?> ) no-repeat scroll center / cover !important; height: 300px;"></div>
		<div class="blog-nav-content">
			<span class="post-status">Next Article</span>
			<h3><?php echo get_the_title( $nextPost->ID ); ?></h3>
		</div>
	</a>
	<?php elseif ( is_a( $prevPost, 'WP_Post' ) && !is_a( $nextPost, 'WP_Post' ) ) : ?>
	<a href="<?php echo $prevUrl; ?>" class="col-sm-12 blog-nav-block">
		<div class="blog-nav-image" style="background: url(<?php echo $prevthumbnail[0]; ?> ) no-repeat scroll center / cover !important; height: 300px;"></div>
		<div class="blog-nav-content">
			<span class="post-status">Previous Article</span>
			<h3><?php echo get_the_title( $prevPost->ID ); ?></h3>
		</div>
	</a>
	<?php elseif ( !is_a( $prevPost, 'WP_Post' ) && is_a( $nextPost, 'WP_Post' ) ) : ?>
	<a href="<?php echo $nextUrl; ?>" class="col-sm-12 blog-nav-block">
		<div class="blog-nav-image" style="background: url(<?php echo $nextthumbnail[0]; ?> ) no-repeat scroll center / cover !important; height: 300px;"></div>
		<div class="blog-nav-content">
			<span class="post-status">Next Article</span>
			<h3><?php echo get_the_title( $nextPost->ID ); ?></h3>
		</div>
	</a>
	<?php endif; ?>
