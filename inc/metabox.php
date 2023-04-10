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

// METABOX CUSTOM PACKAGE
add_filter('rwmb_meta_boxes', 'your_prefix_register_meta_boxes');

function your_prefix_register_meta_boxes($meta_boxes)
{
    $prefix = '';

    $meta_boxes[] = [
        'title'      => esc_html__('Data project', 'online-generator'),
        'id'         => 'data_project',
        'post_types' => ['project'],
        'context'    => 'normal',
        'fields'     => [
            [
                'type'       => 'post',
                'name'       => esc_html__('Penanggung Jawab', 'online-generator'),
                'id'         => $prefix . 'penanggung_jawab',
                'post_type'  => 'karyawan',
                'field_type' => 'select',
            ],
            [
                'type' => 'text',
                'name' => esc_html__('Alamat', 'online-generator'),
                'id'   => $prefix . 'alamat',
            ],
            [
                'type' => 'text',
                'name' => esc_html__('Nilai Kontrak', 'online-generator'),
                'id'   => $prefix . 'nilai_kontrak',
            ],
        ],
    ];

    return $meta_boxes;
}