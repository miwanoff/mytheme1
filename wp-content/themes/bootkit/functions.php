<?php

// Setup
define('BOOTKIT_DEV_MODE', true);

//add_theme_support('menus');

// Includes
include get_theme_file_path('includes/enqueue.php');
include get_theme_file_path('includes/setup.php');
include get_theme_file_path('includes/custom-nav-wolker.php');
include get_theme_file_path('includes/widgets.php');
include get_theme_file_path('includes/taxonomies.php');
include get_theme_file_path('includes/custom-post-types.php');
include get_theme_file_path('includes/theme-customizer.php');
include get_theme_file_path('includes/customizer/social.php');
include get_theme_file_path('includes/customizer/misc.php');
// include get_theme_file_path('includes/custom-massages.php');
// Hooks
add_action('wp_enqueue_scripts', 'bootkit_enqueue');
add_action('after_setup_theme', 'bootkit_setup_theme');
add_action('widgets_init', 'bootkit_widgets');
add_action('init', 'bootkit_taxonomies');
add_action('init', 'bootkit_register_post_type_init');

// Shortcodes

// add_filter('init', 'bootkit_post_type_messages');

function bootkit_custom_fields()
{
    add_post_type_support('movies', 'custom-fields');
}

add_action('init', 'bootkit_custom_fields');

// $bootkit_args = array(
//     'meta_query' => array(
//         array(
//             'key' => 'Mood',
//             'value' => 'Happy',
//         ),
//     ),
// );
// $bootkit_query = new WP_Query($bootkit_args);
//print_r($bootkit_query);

//add_action('customize_register', 'bootkit_customize_register');

//--------------customizer--------

add_action('customize_register', 'bootkit_customize_register');

add_action('wp_head', 'bootkit_customizer_css');
function bootkit_customizer_css()
{
    ?>
<style type="text/css">
a {
    color: #<?php echo get_theme_mod('bootkit_link_color', '#fff');
    ?>;
}
</style>
<?php
}

//--Load languages to time-to-post-title-----
// add_action('after_setup_theme', 'time_to_post_title_load_plugin_textdomain');

// function time_to_post_title_load_plugin_textdomain()
// {
//     load_plugin_textdomain('time-to-post-title', false, dirname(plugin_basename(__FILE__)) . '/languages/');
// }

add_action('after_setup_theme', 'bootkit_load_theme_textdomain');

function bootkit_load_theme_textdomain()
{
    load_theme_textdomain('bootkit', get_template_directory() . '/languages');
}

function foobar_func($atts)
{
    return "foo and bar";
}

add_shortcode('foobar', 'foobar_func');

function bartag_func($atts)
{
    extract(shortcode_atts(array(
        'foo' => 'значение по умолчанию 1',
        'bar' => 'значение по умолчанию 2',
    ), $atts));

    return "foo = {$foo}";
}

add_shortcode('bartag', 'bartag_func');

function site_url_shortcode($atts)
{
    return site_url();
}

add_shortcode('myurl', 'site_url_shortcode');

// Ajax
add_action('wp_ajax_bootkit', 'bootkit_ajax');
add_action('wp_ajax_nopriv_bootkit', 'bootkit_ajax');

function bootkit_ajax()
{
    $summa = $_POST['param1'] + $_POST['param2']; // сумма двух чисел

    echo $summa;
    die;
}

//Create Sidebar Area Bootkit
if (function_exists('register_sidebars')) {
    register_sidebar(array(
        'name' => 'Bootkit',
        'before_widget' => '<div id="%1$s" class="backgroundlist %2$s"><div class="listtitle">',
        'after_widget' => '</div></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2></div><div class="contentbox">',
    ));
}