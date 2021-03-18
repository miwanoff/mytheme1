<?php
/*
Plugin Name: Advertisement Widget Plugin
Plugin URI: http://ex.com
Description: Simple Advertisement Widget Plugin including banner image and link
Version: 1.0
Author: MAI
Author URI: http://ex.com
License: GPL2
 */

// The widget class
class Advertisement_Widget extends WP_Widget
{
    // Main constructor
    public function __construct()
    {
        $widget_ops = array('classname' => 'Advertisement_Widget', 'description' => 'Displays Ads');
        $this->WP_Widget('Advertisement_Widget', 'Advertisement Widget', $widget_ops);
    }

    // The widget form (for the backend) public function form( $instance) {
    /* ... */

    // Update widget settings
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['message'] = $new_instance['message'];
        $instance['link'] = $new_instance['link'];
        return $instance;

    }
    // Display the widget
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $message = $instance['message'];
        $link = $instance['link'];
        ?>
<?php echo $before_widget; ?>
<?php if ($title) {
            echo $before_title . $title . $after_title;
        }
        ?>

<?php echo '<a href="' . $link . '" target="_blank"><img src=' . $message . " '/>"; ?></a>

<?php echo $after_widget; ?>
<?php
}

    // Form for the widget
    public function form($instance)
    {
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $title = $instance['title'];
        $message = esc_attr($instance['message']);
        $link = esc_attr($instance['link']);
        ?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat"
            id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
            type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Advertisement Banner');?></label>
    <textarea rows="4" cols="50" class="widefat" id="<?php echo $this->get_field_id('message'); ?>"
        name="<?php echo $this->get_field_name('message'); ?>"><?php echo ($message); ?> </textarea>
</p>
<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Ads Link');?></label>
<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>"
    name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
</p>
<?php

    }
}
// Register the widget
function my_register_custom_widget()
{
    register_widget('Advertisement_Widget');
}
add_action('widgets_init', 'my_register_custom_widget');