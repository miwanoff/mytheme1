<?php
/**
 * Plugin Name: Recipe
 * Description: Creating the recipes and rate those recipes
 * Version: 1.0
 * Author: M.A.I.
 * Author URI: https://kitit/com.ua
 * Text Domain: recipe
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

// Setup

// Includes
include 'includes/activate.php';
include 'includes/init.php';
include 'process/save-post.php';
include 'process/filter-content.php';

// Hooks
register_activation_hook(__FILE__, 'r_activate_plugin');
add_action('init', 'recipe_init');
add_action('save_post_recipe', 'r_save_post_admin', 10, 3);
add_filter('the_content', 'r_filter_recipe_content');

// Shortcodes