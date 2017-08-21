<?php
global $post;
$thumbnail_id = get_post_thumbnail_id( $post->ID ); // Post Image ID
$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); // Image SRC
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // The Alt Tag
$title = get_post(get_post_thumbnail_id())->post_title; //The Title
$caption = get_post(get_post_thumbnail_id())->post_excerpt; //The Caption
$description = get_post(get_post_thumbnail_id())->post_content; // The Description
?>

<section class="split-hero">
	<div class="col-md-6 split-left" style="background: url(<?php echo $img[0]; ?>) center / cover !important;">
		<img class="left-image" src="<?php echo $img[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
	</div>
	<div class="col-md-6 split-right">
		<div class="right-container">
			<h2><?php the_title(); ?></h2>
			<?php the_excerpt(); ?>
		</div>
	</div>
</section>
