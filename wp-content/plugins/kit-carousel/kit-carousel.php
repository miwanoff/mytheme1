<?php
/*
 * Plugin Name: Kit Carousel
 * Plugin URI:
 * Description: Simple carousel
 * Version: 1.0
 * Author: MAI
 * Author URI: https://github.com/miwanoff/
 * License:           GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Setup
define('KC_PLUGIN_URL', __FILE__);

// Includes
include 'includes/front/enqueue.php';
include 'process/kc_show_carousel.php';
include 'includes/admin/admin.php';

// Hooks
add_action('wp_enqueue_scripts', 'kc_enqueue_scripts', 100);
//add_filter('the_content', 'kc_show_carousel');
add_action('admin_menu', 'kc_create_menu');

// Shortcodes

function kc_show_carousel_shortcode($atts)
{
    return kc_show_carousel($content);
}
add_shortcode('kc_show_carousel', 'kc_show_carousel_shortcode');