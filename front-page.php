<?php get_header();

// If Activated, Show Slider
if(get_option('slider')) {
  echo do_shortcode('[udm_slider]');
}
get_template_part( 'template-parts/content', 'fullwidth' );
get_footer();
?>
