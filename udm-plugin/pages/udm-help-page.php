<div class="wrap udm-opt">
  <h1>Help Page</h1>
  <h2>Custom Widgets</h2>
  <?php
  $udm_cta = new UDM_CTA();
  $udm_company_info = new UDM_Company_Info();
  $udm_company_info_card = new UDM_Company_Info_Card();
  $udm_social = new UDM_Social();

  ?>
  <ul>
    <li><strong><?php echo $udm_cta->name; ?></strong><br /><?php echo $udm_cta->widget_options['description']; ?></li>
    <li><strong><?php echo $udm_company_info->name; ?></strong><br /><?php echo $udm_company_info->widget_options['description']; ?></li>
    <li><strong><?php echo $udm_company_info_card->name; ?></strong><br /><?php echo $udm_company_info_card->widget_options['description']; ?></li>
    <li><strong><?php echo $udm_social->name; ?></strong><br /><?php echo $udm_social->widget_options['description']; ?></li>
    <?php
    //$widgets = wp_get_sidebars_widgets(); var_dump($widgets);
    //$sidebars_widgets = get_option( 'sidebars_widgets' ); var_dump($sidebars_widgets);

        /*
        object(UDM_Social)#1260 (9) {
        ["id_base"]=> string(17) "udm_social_widget"
        ["name"]=> string(23) "UDM Social Medial Links"
        ["option_name"]=> string(24) "widget_udm_social_widget"
        ["alt_option_name"]=> NULL
        ["widget_options"]=> array(3) {
          ["classname"]=> string(24) "widget_udm_social_widget"
          ["customize_selective_refresh"]=> bool(false)
          ["description"]=> string(30) "Social media links for footer." }
        ["control_options"]=> array(1) {
          ["id_base"]=> string(17) "udm_social_widget" }
        ["number"]=> bool(false)
        ["id"]=> bool(false)
        ["updated"]=> bool(false) }

        */

    ?>
    <a href="<?php echo get_admin_url(); ?>widgets.php">Widgets</a>
  </ul>
  <h2>Classes</h2>
  <h2>Short Codes</h2>
  <ul>
  <?php
  global $shortcode_tags;
  $other_shortcodes = array();
  foreach($shortcode_tags as $shorcode => $shorcode_func){
    if(substr( $shorcode, 0, 4 ) !== "udm_"){
      $other_shortcodes[$shorcode] = $shorcode_func;
    }
    else{
      echo "<li>{$shorcode}</li>";
    }
  }
  foreach($other_shortcodes as $shorcode => $shorcode_func){
    echo "<li>{$shorcode}</li>";
  }
?>
</ul>
</div>
