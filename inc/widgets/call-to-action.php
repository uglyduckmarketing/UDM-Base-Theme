<?php

class UDM_CTA extends WP_Widget{

  function UDM_CTA(){
  	$widget_ops = array('description' => 'This creates a call to action block inside the  call to action section.');
  	$this->WP_Widget('UDM_CTA_widget', 'UDM Call To Action', $widget_ops);
  }

	function form($instance){
		// outputs the options form on admin
		$title = esc_attr($instance['title']);
    $button_link = esc_attr($instance['button_link']);
    $button_text = esc_attr($instance['button_text']);
    $cta_image = esc_attr($instance['cta_image']);
		$call_to_action_content = esc_attr($instance['call_to_action_content']);
    if(empty($call_to_action_content)){
      $call_to_action_content = "[udm_company_name]<br/>\n";
    }
    /*
    Content
    Header
    Text Area
    Button
    Placement Options
    Above Footer

    Use default
    */
	?>

  <p>
  	<label for="<?php echo $this->get_field_id('title'); ?>">Heder:
  		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
  	</label>
  	<label for="<?php echo $this->get_field_id('button_link'); ?>">Button Link:
  		<input class="widefat" id="<?php echo $this->get_field_id('button_link'); ?>" name="<?php echo $this->get_field_name('button_link'); ?>" type="text" value="<?php echo attribute_escape($button_link); ?>" />
  	</label>
  	<label for="<?php echo $this->get_field_id('button_text'); ?>">Button Text:
  		<input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo attribute_escape($button_text); ?>" />
  	</label>
  	<label for="<?php echo $this->get_field_id('cta_image'); ?>">Image URL:
  		<input class="widefat" id="<?php echo $this->get_field_id('cta_image'); ?>" name="<?php echo $this->get_field_name('cta_image'); ?>" type="text" value="<?php echo attribute_escape($cta_image); ?>" />
  	</label>
  	<label for="<?php echo $this->get_field_id('call_to_action_content'); ?>">Content:
      <textarea class="widefat" id="<?php echo $this->get_field_id('call_to_action_content'); ?>" name="<?php echo $this->get_field_name('call_to_action_content'); ?>" ><?php echo attribute_escape($call_to_action_content); ?></textarea>
  	</label>
  </p>

	<?php

	}

	function update($new_instance, $old_instance) {
	  // processes widget options to be saved
	  $instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['button_text'] = strip_tags($new_instance['button_text']);
		$instance['button_link'] = strip_tags($new_instance['button_link']);
		$instance['cta_image'] = strip_tags($new_instance['cta_image']);

		$instance['call_to_action_content'] = strip_tags($new_instance['call_to_action_content']);
	  return $new_instance;
	}

	function widget($args, $instance) {
    // outputs the content of the widget
		extract($args, EXTR_SKIP);
    echo '<div class="cta_widget_section">';
		echo $args['before_widget'];

    if (!empty($instance['cta_image'])) {
      echo "<img class=\"cta_image\" src=\"{$instance['cta_image']}\" />";
    };

    // Header Title
		if (!empty($instance['title'])) {
      echo $args['before_title'] . "<h1>{$instance['title']}</h1>". $args['after_title'];
    };
    // Widget Content
		if(!empty($instance['call_to_action_content'])){
      echo do_shortcode($instance['call_to_action_content']);
    }
    echo "<p><a href=\"{$instance['button_link']}\" class=\"button\">{$instance['button_text']}</a></p>";
		echo $args['after_widget'];
    echo '</div>';
  }
}

// Add the new widget to WordPress
register_widget('UDM_CTA');
?>
