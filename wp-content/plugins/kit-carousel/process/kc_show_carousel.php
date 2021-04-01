<?php

function kc_show_carousel($content)
{

    $args = [
        //'post_type' => 'post',
        'showposts' => 8,
        //'category_name' => 'cooking',
        //'post_type' => 'recipe',
        'post_type' => 'movies',
        //'tag' => 'cooking',
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

            $html .= '<div class="item"><h5>';
            $html .= '<a href="' . get_permalink($query->post->ID) . '">' . $query->post->post_title . '</a>';
            $html .= '</h5></div>';
        }
        $html .= '</div>
<!-- Place for buttons -->
            </div>
        </div>
    </section>';
    }
    return $content . $html;
}