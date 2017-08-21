<?php
/**
 * uglyduck Functions and Definitions.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package uglyduck
**/

//Include the option default values
require_once(dirname(__FILE__) .'/inc/default-options.php');

// Run this on install/update
function dklegends_activate(){
	include_once(dirname(__FILE__) .'/inc/activate.php');
}
register_activation_hook( __FILE__, 'dklegends_activate' );

// Enable the use of shortcodes in text widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Setup Basic Theme Support

if ( ! function_exists( 'uglyduck_setup' ) ) :
	function uglyduck_setup() {
		load_theme_textdomain( 'uglyduck', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'uglyduck_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		//Declare WooCommerce support ** added by Jeremy 3/15/17
		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'uglyduck_setup' );

// Navigation Locations

if(get_option('header_choice') == 'four') {
	register_nav_menus(
		array(
			'right' => esc_html__( 'Right', 'uglyduck' ),
			'left' => esc_html__( 'Left', 'uglyduck' ),
			'mobile' => esc_html__( 'Mobile', 'uglyduck' ),
		)
	);
} else {
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'uglyduck' ),
			'services' => esc_html__( 'Services', 'uglyduck' ),
			'mobile' => esc_html__( 'Mobile', 'uglyduck' ),
		)
	);
}

// Create Theme Widgets

function create_widget( $name, $id, $description ) {
	$args = array(
	'name'          => __($name ),
	'id'            => $id,
	'description'   => $description,
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h5 class="widget">',
	'after_title'   => '</h5>'
	);
	register_sidebar( $args );
}
create_widget( 'Default Sidebar', 'sidebar_1', 'This will hold the default WP widget' );
create_widget( 'Footer Section One', 'footer_one', 'Displays in the first section of the footer' );
create_widget( 'Footer Section Two', 'footer_two', 'Displays in the second section of the footer' );
create_widget( 'Footer Section Three', 'footer_three', 'Displays in the third section of the footer' );
create_widget( 'Footer Section Four', 'footer_four', 'Displays in the fourth section of the footer' );
if(get_option('footer_choice') == 'two') { create_widget( 'Footer Section Five', 'footer_five', 'Displays in the fifth section of the footer' ); }
create_widget( 'Call To Action', 'call_to_action', 'Displays Call To Action' );
create_widget( 'Header Widget', 'header_widget', 'Displays In Header Section' );
create_widget( 'Woocommerce Sidebar', 'woo_sidebar', 'Displays items in Woocommerce Sidebar' );
create_widget( 'Left Sidebar', 'left_sidebar', 'Use this to display a sidebar on left side (Choose left or right only)' );
create_widget( 'Right Sidebar', 'right_sidebar', 'Use this to display a sidebar on right side (Choose left or right only)' );
create_widget( 'Left Blog Sidebar', 'left_blog_sidebar', 'Use this to display a sidebar on left side of the blog (Choose left or right only)' );
create_widget( 'Right Blog Sidebar', 'right_blog_sidebar', 'Use this to display a sidebar on right side of the blog (Choose left or right only)' );


// Enqueue jQuery

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
	 if(get_option('sticky_nav',false)){

	   wp_enqueue_script( 'udm-sticky-nav', get_template_directory_uri().'/js/sticky-nav.js', array(), false, true );
	 }
}

// Enqueue Scripts & Styles

function uglyduck_scripts() {
	wp_enqueue_style( 'uglyduck-style', get_stylesheet_uri() );
	wp_enqueue_script( 'uglyduck-js', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true );
	//wp_enqueue_script( 'map-js', get_template_directory_uri() . '/js/map.js', array(), '1.0.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'uglyduck_scripts' );

// Enqueue Colorpicker

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

// Enqueue Theme Option Stylesheet

add_action('wp_head', 'my_custom_css');
function my_custom_css(){
require_once( get_template_directory() . '/style.php' );
}

// Add PHP Functionality To Widgets

function php_execute($html){
if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
$html=ob_get_contents();
ob_end_clean();
}
return $html;
}
add_filter('widget_text','php_execute',100);

// Open Graph Functionality
add_filter('language_attributes', 'add_og_xml_ns');
function add_og_xml_ns($content) {
  return ' xmlns:og="http://ogp.me/ns#" ' . $content;
}

add_filter('language_attributes', 'add_fb_xml_ns');
function add_fb_xml_ns($content) {
  return ' xmlns:fb="https://www.facebook.com/2008/fbml" ' . $content;
}

// To give Editors access to the ALL Forms menu
function my_custom_change_ninja_forms_all_forms_capabilities_filter( $capabilities ) {
    $capabilities = "edit_pages";
    return $capabilities;
}
add_filter( 'ninja_forms_admin_parent_menu_capabilities', 'my_custom_change_ninja_forms_all_forms_capabilities_filter' );
add_filter( 'ninja_forms_admin_all_forms_capabilities', 'my_custom_change_ninja_forms_all_forms_capabilities_filter' );

// To give Editors access to ADD New Forms
function my_custom_change_ninja_forms_add_new_capabilities_filter( $capabilities ) {
    $capabilities = "edit_pages";
    return $capabilities;
}
add_filter( 'ninja_forms_admin_parent_menu_capabilities', 'my_custom_change_ninja_forms_add_new_capabilities_filter' );
add_filter( 'ninja_forms_admin_add_new_capabilities', 'my_custom_change_ninja_forms_add_new_capabilities_filter' );

function nf_subs_capabilities( $cap ) {
    return 'edit_posts';
}
add_filter( 'ninja_forms_admin_submissions_capabilities', 'nf_subs_capabilities' );
add_filter( 'ninja_forms_admin_parent_menu_capabilities', 'nf_subs_capabilities' );
add_filter( 'ninja_forms_admin_menu_capabilities', 'nf_subs_capabilities' );

// Disable Wordpress Auto Emails

add_filter( 'auto_core_update_send_email', 'wpb_stop_auto_update_emails', 10, 4 );

function wpb_stop_update_emails( $send, $type, $core_update, $result ) {
if ( ! empty( $type ) && $type == 'success' ) {
	return false;
}
	return true;
}

// Add Excerpt To Pages
add_action( 'init', 'add_excerpts_to_pages' );
function add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

// Load Other Files

require get_template_directory() . '/inc/customizer.php'; // Customizer
require_once(dirname(__FILE__) . '/udm-plugin/udm-plugin.php');
require_once(dirname(__FILE__) . '/posttypes.php');
require_once(dirname(__FILE__) . '/whitelabel.php');
require_once(dirname(__FILE__) . '/udm-options.php');
require_once(dirname(__FILE__) . '/udm-shortcodes.php');
require_once(dirname(__FILE__) . '/inc/widgets/social-media.php');
require_once(dirname(__FILE__) . '/inc/widgets/company-info.php');
require_once(dirname(__FILE__) . '/inc/widgets/call-to-action.php');
