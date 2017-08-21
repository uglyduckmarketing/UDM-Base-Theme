<?php get_header(); ?>
<main class="wrapper" role="main">
<?php
if(get_option('post_choice')) {
	get_template_part( 'template-parts/singles/single', get_option('post_choice') );
} else {
	get_template_part( 'template-parts/singles/single', 'one' );
}
?>
</main>
<?php get_footer(); ?>
