<?php
/**
 * Plugin Name: Hooks example
 * Description: Filter and action hooks examples
 * Version: 1.0
 * Author: M.A.I.
 * Author URI: https://kitit/com.ua
 */

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

// function hooked_title($title)
// {
//     return 'My ' . $title . " was written by me";
// }

// add_filter('the_title', 'hooked_title');

// function remove_hooked_title()
// {
//     if (date("l") === "Thursday") {
//         remove_filter("the_title", "hooked_title");
//     }
// }
// add_action("wp_head", "remove_hooked_title");

function added_footer()
{
    //if (date("l") === "Thursday") {
    echo 'Added to footer by hook-example plugin !!!';
    // }
}

add_action('wp_footer', 'added_footer');

function remove_added_footer()
{
    if (date("l") === "Thursday") {
// Target the 'wp_footer' action, remove the 'added_footer' function from it
        remove_action("wp_footer", "added_footer");
    }
}

add_action("wp_head", "remove_added_footer");

// function my_footer()
// {
//     do_action('dolly_hook_footer');
// }

// add_action('wp_footer', 'my_footer');

// function hello_footer()
// {
//     echo '***Hello Dolly***';
// }

// add_action('dolly_hook_footer', 'hello_footer');