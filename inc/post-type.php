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

// membuat post type project
function create_post_type_project()
//project
{
    register_post_type(
        'project',
        array(
            'labels' => array(
                'name' => __('Project'),
                'singular_name' => __('Project')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'project'),
            'supports' => array('title', 'thumbnail'),
            'show_in_rest' => false,
            'menu_icon'   => 'dashicons-building'
        )
    );

}
add_action('init', 'create_post_type_project');
