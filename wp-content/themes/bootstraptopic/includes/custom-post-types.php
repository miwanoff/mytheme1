<?php

function bootstraptopic_register_post_type_init()
{
    $labels = array(
        'name' => 'Movies',
        'singular_name' => 'Movie', // show in admin panel add->Movie
        'add_new' => 'Add movie',
        'add_new_item' => 'Add new movie', // <title>
        'edit_item' => 'Edit movie',
        'new_item' => 'New movie',
        'all_items' => 'All movies',
        'view_item' => 'View movies',
        'search_items' => 'Search movies',
        'not_found' => 'Movies not found.',
        'not_found_in_trash' => 'Movies not found in trash.',
        'menu_name' => 'Movies',
    );
    $args = array(
        'labels' => $labels,
        'public' => true, //for all users - true
        'show_in_menu' => true,
        'show_ui' => true, // show in admin panel
        'has_archive' => true,
        'menu_icon' => get_stylesheet_directory_uri() . '/img/function_icon.png', // иконка в меню
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'comments', 'author', 'thumbnail'),
    );
    register_post_type('movies', $args);
}