<?php
/**
 * Plugin Name: Time to Post Title_
 * Plugin URI: https://example.com/
 * Version: 1.0
 * Author: M.A.I.
 * Author URI: https://example.com/
 * Text Domain: time-to-post-title
 * License: GPL2
 **/
// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

function time_to_post_content($content)
{
    return $content . '<div class="time">' . __('Time of post creation: ') . get_the_time() . " " . get_the_date() . '</div>';
}
add_filter('the_content', 'time_to_post_content');

add_action('plugins_loaded', 'true_load_plugin_textdomain');

function true_load_plugin_textdomain()
{
    load_plugin_textdomain('time-to-post-title', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}