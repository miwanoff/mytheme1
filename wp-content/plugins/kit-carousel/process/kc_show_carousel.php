<?php

function kc_show_carousel($content)
{

    $args = [
        'post_type' => get_option('kc_post_type') ? get_option('kc_post_type') : 'post',
        'showposts' => get_option('kc_count'),
        'category_name' => get_option('kc_category_name'),
        //'post_type' => 'recipe',
        //'post_type' => 'movies',
        'tag' => get_option('kc_tag'),
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $html =
            '<section id="demos">
        <div class="row">
            <div class="large-12 columns">
                <div class="owl-carousel owl-theme">';
        while ($query->have_posts()) {
            $query->the_post();

            $html .= '<div class="item" style="background:url(' . get_the_post_thumbnail_url($query->post->ID, 'thumbnail') . ' ) #80808078;"><h5>';
            $html .= '<a href="' . get_permalink($query->post->ID) . '" style="color:white;">' . $query->post->post_title . '</a>';
            $html .= '</h5></div>';
        }
        $html .= '</div>
<!-- Place for buttons -->
            </div>
        </div>
    </section>';
    }
    return $html . $content;
}