<?php

/**
 * Velocity Main Site Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Custom Plugin
 * @since 1.0.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

function post_meta_images_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'size' => 'thumbnail',
            'class' => ''
        ),
        $atts,
        'post_meta_images'
    );

    $images = get_post_meta(get_the_ID(), 'gallery', false);
    $html = '';
    if (!empty($images)) {
        $html .= '<div id="gallery">';
        foreach ($images as $image) {
            $image_url = wp_get_attachment_image_src($image, $atts['size'])[0];
            $html .= '<img src="' . $image_url . '" class="' . $atts['class'] . '">';
        }
        $html .= '</div>';
    }
    return $html;
}
add_shortcode('post_meta_images', 'post_meta_images_shortcode');
