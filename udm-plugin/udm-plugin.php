<?php

################################################################################
#
################################################################################

// Add menus to admin side navigation
function add_theme_menu_item(){
  add_menu_page('UDM Options', 'UDM Options', 'manage_options', 'theme-panel', 'theme_settings_page', null, 99);
  //add_submenu_page('theme-panel', 'Options', 'Options','manage_options', 'udm-theme-options-page','udm_theme_options_page_func');
  add_submenu_page('theme-panel', 'Help Page', 'Help','manage_options', 'udm-help-page','udm_help_page_func');

}
add_action("admin_menu", "add_theme_menu_item");

################################################################################
# Functions to include pages
################################################################################

// Help Page
function udm_help_page_func(){
  include(dirname(__FILE__) .'/pages/udm-help-page.php');
}

// Options Page
function udm_theme_options_page_func(){
  //include(dirname(__FILE__) .'/pages/udm-theme-options-page.php');
}

################################################################################
# Helper functions
################################################################################

function udm_register_field_settings($slug,$label,$function,$section,$panel){
  add_settings_field($slug,$label,$function,$section,$panel);
  // Save Settings For Each Options
  register_setting("section",$slug);
}

?>
