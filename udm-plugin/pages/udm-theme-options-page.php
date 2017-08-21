<!-- Theme Options Styles -->
<style>
  input, select {
  	margin: 1px;
  	padding: 5px 8px;
  	color: #555;
  	border: none;
  	outline: none;
  }
  #tab-3 td input {
  	width: 100% !important;
  }
  tbody {
  	border-right: 1px solid #efefef;
  }
  tr {
  	border-top: 1px solid #efefef;
  }
  tr:last-child {
  	border-bottom: 1px solid #efefef;
  }
  .wp-picker-container {
  	margin-left: 18px;
  }
  .form-table th {
  	color: #333;
  	background: #f9f9f9;
  	padding-left: 15px;
  	border-right: 1px solid #efefef;
  	border-left: 1px solid #efefef;
  }
  .form-table input[type=radio] {
  	margin-left: 20px;
  }
  .form-table input[type=radio]:nth-child(1) {
  	margin-left: 10px;
  }
  ul.tabs {
  	margin: 0px;
  	padding: 0px;
  	list-style: none;
  }
  ul.tabs li {
  	background: none;
  	color: #222;
  	display: inline-block;
  	padding: 20px 15px;
  	cursor: pointer;
  	margin-bottom: 0px;
  	margin-top: 22px;
  }
  ul.tabs li.current {
  	background: #ffffff;
  	color: #333;
  }
  .tab-content {
  	display: none;
  	background: #fff;
  	padding: 15px;
  }
  .tab-content.current {
  	display: inherit;
  }
  .tab-content textarea {
  	width: 100%;
  	height: 150px;
  	border: none !important;
  }
  .tab-content input[type="color"] {
  	width: 40px;
  	height: 44px;
  	padding: 0px;
  	box-shadow: none !important;
  	border: none !important;
  	vertical-align: middle;
  	margin-right: 10px;
  }
</style>

<!-- Theme Options JS -->

<script>
  jQuery(document).ready(function($) {
  	$('ul.tabs li').click(function() {
  		var tab_id = $(this).attr('data-tab');
  		$('ul.tabs li').removeClass('current');
  		$('.tab-content').removeClass('current');
  		$(this).addClass('current');
  		$("#" + tab_id).addClass('current');
  	});
  	$('.udm_color_picker').wpColorPicker();
  });
</script>

<!-- Theme Options Page Wrap -->

<div class="wrap udm-opt">
  <h1>Theme Options</h1>
  <ul class="tabs">
    <li class="tab-link current" data-tab="tab-1">General Settings</li>
    <li class="tab-link" data-tab="tab-5">Company Info</li>
    <li class="tab-link" data-tab="tab-2">Layout Settings</li>
    <li class="tab-link" data-tab="tab-3">Social Settings</li>
    <li class="tab-link" data-tab="tab-4">Color Options</li>
  </ul>
  <form method="post" action="options.php">
      <?php
      settings_fields("section");
      echo '<div id="tab-1" class="tab-content current">';
      do_settings_sections("theme-options");
      echo '</div>';
      echo '<div id="tab-2" class="tab-content">';
      do_settings_sections("home-options");
      echo '</div>';
      echo '<div id="tab-3" class="tab-content">';
      do_settings_sections("social-options");
      echo '</div>';
      echo '<div id="tab-4" class="tab-content">';
      do_settings_sections("brand-options");
      echo '</div>';
      echo '<div id="tab-5" class="tab-content">';
      do_settings_sections("company-info-options");
      echo '</div>';
      submit_button();
      ?>
  </form>
</div>


<?php

// Logo Url
function display_topbar_text() {
?>
  <input name="topbar_text" id="topbar_text" value="<?php echo get_option('topbar_text',UDM_TOPBAR_TEXT_DEFAULT); ?>" style="width:100%" />
<?php
}

// Header Code
function display_header_code() {
?>
  <textarea name="header_code" id="header_code"/><?php echo get_option('header_code'); ?></textarea>
<?php
}

// Footer Code
function display_footer_code() {
?>
  <textarea name="footer_code" id="footer_code"><?php echo get_option('footer_code'); ?></textarea>
<?php
}

// Header Type
function display_header_choice() {
?>
  <input name="header_choice" type="radio" value="one" <?php checked( 'one', get_option( 'header_choice' ) ); ?> >Header One</input>
  <input name="header_choice" type="radio" value="two" <?php checked( 'two', get_option( 'header_choice' ) ); ?> >Header Two</input>
  <input name="header_choice" type="radio" value="three" <?php checked( 'three', get_option( 'header_choice' ) ); ?> >Header Three</input>
  <input name="header_choice" type="radio" value="four" <?php checked( 'four', get_option( 'header_choice' ) ); ?> >Header Four</input>
<?php
}

// Footer Type
function display_footer_choice() {
?>
  <input name="footer_choice" type="radio" value="one" <?php checked( 'one', get_option( 'footer_choice' ) ); ?> >Footer One</input>
  <input name="footer_choice" type="radio" value="two" <?php checked( 'two', get_option( 'footer_choice' ) ); ?> >Footer Two</input>
<?php
}

// Hero Type
function display_hero_choice() {
?>
  <input name="hero_choice" type="radio" value="none" <?php checked( 'none', get_option( 'hero_choice' ) ); ?> >None</input>
  <input name="hero_choice" type="radio" value="one" <?php checked( 'one', get_option( 'hero_choice' ) ); ?> >Hero One</input>
  <input name="hero_choice" type="radio" value="three" <?php checked( 'three', get_option( 'hero_choice' ) ); ?> >Split Screen</input>
<?php
}

// Blog Type
function display_blog_choice() {
?>
  <input name="blog_choice" type="radio" value="one" <?php checked( 'one', get_option( 'blog_choice' ) ); ?> >Blog One</input>
  <input name="blog_choice" type="radio" value="two" <?php checked( 'two', get_option( 'blog_choice' ) ); ?> >Blog Two</input>
<?php
}

// Post Page Type
function display_post_choice() {
?>
  <input name="post_choice" type="radio" value="one" <?php checked( 'one', get_option( 'post_choice' ) ); ?> >Post Page One</input>
<?php
}

// Contact Page Type
function display_contact_choice() {
?>
  <input name="contact_choice" type="radio" value="one" <?php checked( 'one', get_option( 'contact_choice' ) ); ?> >Contact Page One</input>
<?php
}

// Show Or Hide Slider?
function display_slider() {
?>
<label>
  <input type="checkbox" name="slider" value="Yes"<?php checked( 'Yes' == get_option('slider') ); ?> />
  Display Slider On Homepage?
</label>
<?php
}

// Show Or Hide Topbar?
function display_topbar() {
?>
<label>
  <input type="checkbox" name="topbar" value="Yes"<?php checked( 'Yes' == get_option('topbar') ); ?> />
  Display Topbar Above Navigation?
</label>
<?php
}

// Show sticky nav
function display_nav_sticky(){
?>
<label>
  <input type="checkbox" name="sticky_nav" value="Yes"<?php checked( 'Yes' == get_option('sticky_nav') ); ?> />
  Display Sticky Nav?
</label>
<?php
}

// Company Name
function company_name() {
?>
  <input name="company_name" id="company_name" value="<?php echo get_option('company_name'); ?>" />
<?php
}

// Phone Number
function display_phone() {
?>
  <input name="phone_number" id="phone_number" value="<?php echo get_option('phone_number'); ?>" />
<?php
}

// Fax Number
function display_fax() {
?>
  <input name="fax_number" id="fax_number" value="<?php echo get_option('fax_number'); ?>" />
<?php
}

// Address
function display_address() {
?>
  <input name="udm_address" id="udm_address" value="<?php echo get_option('udm_address'); ?>" />
<?php
}

// City
function display_city() {
?>
  <input name="udm_city" id="udm_city" value="<?php echo get_option('udm_city'); ?>" />
<?php
}

// State
function display_state() {
?>
  <input name="udm_state" id="udm_state" value="<?php echo get_option('udm_state'); ?>" />
<?php
}

// Zip Code
function display_zip() {
?>
  <input name="udm_zip" id="udm_zip" value="<?php echo get_option('udm_zip'); ?>" />
<?php
}

// Email Addess
function display_email() {
?>
  <input name="udm_email" id="udm_email" value="<?php echo get_option('udm_email'); ?>" />
<?php
}

// Form (For Contact Page)
function display_ninjaform() {
?>
  <input name="ninj_form" id="ninj_form" value='<?php echo get_option('ninj_form'); ?>' />
<?php
}

// Twitter
function display_twitter() {
?>
  <input name="udm_twitter" id="udm_twitter" value="<?php echo get_option('udm_twitter'); ?>" />
<?php
}

// Instagram
function display_instagram() {
?>
  <input name="udm_ig" id="udm_ig" value="<?php echo get_option('udm_ig'); ?>" />
<?php
}

// Facebook
function display_facebook() {
?>
  <input name="udm_fb" id="udm_fb" value="<?php echo get_option('udm_fb'); ?>" />
<?php
}

// Google Plus
function display_google() {
?>
  <input name="udm_google" id="udm_google" value="<?php echo get_option('udm_google'); ?>" />
<?php
}

// Pinterest
function display_pinterest() {
?>
  <input name="udm_pin" id="udm_pin" value="<?php echo get_option('udm_pin'); ?>" />
<?php
}

// Linkedin
function display_linkedin() {
?>
  <input name="udm_li" id="udm_li" value="<?php echo get_option('udm_li'); ?>" />
<?php
}

// Brand Main Color
function display_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_color" id="udm_color" value="<?php echo get_option('udm_color',UDM_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_COLOR_DEFAULT; ?>"/>
<?php
}

// Link Color
function display_link_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_link_color" id="udm_link_color" value="<?php echo get_option('udm_link_color',UDM_LINK_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_LINK_COLOR_DEFAULT; ?>" />
<?php
}

// Link Hover Color
function display_link_hover_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_link_hover_color" id="udm_link_hover_color" value="<?php echo get_option('udm_link_hover_color',UDM_LINK_HOVER_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_LINK_HOVER_COLOR_DEFAULT; ?>" />
<?php
}

// Hero Background Color
function display_hero_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_hero_color" id="udm_hero_color" value="<?php echo get_option('udm_hero_color',UDM_HERO_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_HERO_COLOR_DEFAULT; ?>" />
<?php
}

// Header Color
function display_header_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_header_color" id="udm_header_color" value="<?php echo get_option('udm_header_color',UDM_HEADER_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_HEADER_COLOR_DEFAULT; ?>" />
<?php
}

// Header Link Color
function display_header_a_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_header_a_color" id="udm_header_a_color" value="<?php echo get_option('udm_header_a_color',UDM_HEADER_A_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_HEADER_A_COLOR_DEFAULT; ?>" />
<?php
}

// Navbar Color
function display_navbar_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_navbar_color" id="udm_navbar_color" value="<?php echo get_option('udm_navbar_color',UDM_NAVBAR_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_NAVBAR_COLOR_DEFAULT; ?>" />
<?php
}

// Dropdown Color
function display_submenu_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_submenu_color" id="udm_submenu_color" value="<?php echo get_option('udm_submenu_color',UDM_SUBMENU_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_SUBMENU_COLOR_DEFAULT; ?>" />
<?php
}

// Dropdown Link Color
function display_submenu_a_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_submenu_a_color" id="udm_submenu_a_color" value="<?php echo get_option('udm_submenu_a_color',UDM_SUBMENU_A_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_SUBMENU_A_COLOR_DEFAULT; ?>" />
<?php
}

// Footer Background Color
function display_footer_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_footer_color" id="udm_footer_color" value="<?php echo get_option('udm_footer_color',UDM_FOOTER_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_FOOTER_COLOR_DEFAULT; ?>" />
<?php
}

// Footer Link Color
function display_footer_a_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_footer_a_color" id="udm_footer_a_color" value="<?php echo get_option('udm_footer_a_color',UDM_FOOTER_A_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_FOOTER_A_COLOR_DEFAULT; ?>" />
<?php
}

// Footer Link Color
function display_footer_text_color() {
?>
  <input class="udm_color_picker" type="text" name="udm_footer_text_color" id="udm_footer_text_color" value="<?php echo get_option('udm_footer_text_color',UDM_FOOTER_TEXT_COLOR_DEFAULT); ?>" data-default-color="<?php echo UDM_FOOTER_TEXT_COLOR_DEFAULT; ?>" />
<?php
}

// Set Panel Area
function display_theme_panel_fields() {

  /*
    Function: display_theme_panel_fields()
    Display the section panels in the admin section
    1. Declare the panels
    2. Set Field In Appropriate Panel
  */

  // Declare Section Panels
  add_settings_section("section", "General Settings", null, "theme-options");
  add_settings_section("section", "Home Settings", null, "home-options");
  add_settings_section("section", "Social Settings", null, "social-options");
  add_settings_section("section", "Brand Settings", null, "brand-options");
  add_settings_section("section", "Company Information", null, "company-info-options");

  // General Settings Section
  add_settings_field("header_code", "Add Code To Header", "display_header_code", "theme-options", "section");
  add_settings_field("footer_code", "Add Scripts To Footer", "display_footer_code", "theme-options", "section");
  add_settings_field("topbar_text", "Topbar Text", "display_topbar_text", "theme-options", "section");

  // Company Info Section
  add_settings_field("company_name", "Company Name", "company_name", "company-info-options", "section");
  add_settings_field("phone_number", "Phone Number", "display_phone", "company-info-options", "section");
  add_settings_field("fax_number", "Fax Number", "display_fax", "company-info-options", "section");
  add_settings_field("udm_address", "Address", "display_address", "company-info-options", "section");
  add_settings_field("udm_city", "City", "display_city", "company-info-options", "section");
  add_settings_field("udm_state", "State", "display_state", "company-info-options", "section");
  add_settings_field("udm_zip", "Zip code", "display_zip", "company-info-options", "section");
  add_settings_field("udm_email", "Email Address", "display_email", "company-info-options", "section");

  // Layout Settings Section
  add_settings_field("sticky_nav", "Sticky Nav", "display_nav_sticky", "home-options", "section");
  add_settings_field("topbar", "Topbar Navigation", "display_topbar", "home-options", "section");
  add_settings_field("slider", "Homepage Slider", "display_slider", "home-options", "section");
  add_settings_field("header_choice", "Select Header Type", "display_header_choice", "home-options", "section");
  add_settings_field("footer_choice", "Select Footer Type", "display_footer_choice", "home-options", "section");
  add_settings_field("hero_choice", "Select Hero Type", "display_hero_choice", "home-options", "section");
  add_settings_field("blog_choice", "Select Blog Main Type", "display_blog_choice", "home-options", "section");
  add_settings_field("post_choice", "Select Post Page Type", "display_post_choice", "home-options", "section");
  add_settings_field("contact_choice", "Select Contact Page Type", "display_contact_choice", "home-options", "section");

  //Social Settings
  add_settings_field("ninj_form", "Contact Form Shortcode", "display_ninjaform", "social-options", "section");
  add_settings_field("udm_twitter", "Twitter URL", "display_twitter", "social-options", "section");
  add_settings_field("udm_fb", "Facebook URL", "display_facebook", "social-options", "section");
  add_settings_field("udm_pin", "Pinterest URL", "display_pinterest", "social-options", "section");
  add_settings_field("udm_google", "Google+ URL", "display_google", "social-options", "section");
  add_settings_field("udm_ig", "Instagram URL", "display_instagram", "social-options", "section");
  add_settings_field("udm_li", "LinkedIn URL", "display_linkedin", "social-options", "section");

  // Color Options Section
  add_settings_field("udm_color", "Brand Main Color", "display_color", "brand-options", "section");
  add_settings_field("udm_link_color", "Links Color", "display_link_color", "brand-options", "section");
  add_settings_field("udm_link_hover_color", "Links Hover Color", "display_link_hover_color", "brand-options", "section");
  add_settings_field("udm_hero_color", "Hero Background Color", "display_hero_color", "brand-options", "section");
  add_settings_field("udm_header_color", "Header Background Color", "display_header_color", "brand-options", "section");
  add_settings_field("udm_header_a_color", "Header Link Color", "display_header_a_color", "brand-options", "section");
  add_settings_field("udm_navbar_color", "Navbar Background Color", "display_navbar_color", "brand-options", "section");
  add_settings_field("udm_submenu_color", "Submenu Background Color", "display_submenu_color", "brand-options", "section");
  add_settings_field("udm_submenu_a_color", "Submenu Link Color", "display_submenu_a_color", "brand-options", "section");
  add_settings_field("udm_footer_color", "Footer Background Color", "display_footer_color", "brand-options", "section");
  add_settings_field("udm_footer_text_color", "Footer Text Color", "display_footer_text_color", "brand-options", "section");
  add_settings_field("udm_footer_a_color", "Footer Link Color", "display_footer_a_color", "brand-options", "section");

  // Save Settings For Each Options
  register_setting("section", "topbar_text");
  register_setting("section", "header_code");
  register_setting("section", "footer_code");
  register_setting("section", "slider");
  register_setting("section", "topbar");
  register_setting("section", "sticky_nav");
  register_setting("section", "company_name");
  register_setting("section", "phone_number");
  register_setting("section", "fax_number");
  register_setting("section", "udm_address");
  register_setting("section", "udm_city");
  register_setting("section", "udm_state");
  register_setting("section", "udm_zip");
  register_setting("section", "udm_email");
  register_setting("section", "udm_twitter");
  register_setting("section", "udm_fb");
  register_setting("section", "udm_pin");
  register_setting("section", "udm_google");
  register_setting("section", "udm_ig");
  register_setting("section", "ninj_form");
  register_setting("section", "udm_li");
  register_setting("section", "udm_color");
  register_setting("section", "udm_navbar_color");
  register_setting("section", "udm_footer_color");
  register_setting("section", "udm_footer_a_color");
  register_setting("section", "udm_footer_text_color");
  register_setting("section", "udm_hero_color");
  register_setting("section", "udm_header_color");
  register_setting("section", "udm_header_a_color");
  register_setting("section", "udm_submenu_color");
  register_setting("section", "udm_submenu_a_color");
  register_setting("section", "udm_link_color");
  register_setting("section", "udm_link_hover_color");
  register_setting("section", "header_choice");
  register_setting("section", "footer_choice");
  register_setting("section", "hero_choice");
  register_setting("section", "blog_choice");
  register_setting("section", "contact_choice");
  register_setting("section", "post_choice");
}

// Add Theme Options to Admin Init
add_action("admin_init", "display_theme_panel_fields");
?>
