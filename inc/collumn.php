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

//KOLOM KARYAWAN
// Add the custom columns to the book post type:
add_filter('manage_karyawan_posts_columns', 'set_custom_edit_karyawan_columns');
function set_custom_edit_karyawan_columns($columns)
{
    $columns['jabatan'] = __('Jabatan', 'your_text_domain');
    $columns['no_telephone'] = __('No. Telephon', 'your_text_domain');
    $columns['divisi'] = __('Divisi', 'your_text_domain');
    $columns['gaji'] = __('Gaji', 'your_text_domain');
    $columns['tanggal_mulai_kerja'] = __('Lama Bekerja', 'your_text_domain');

    return $columns;
}
// Add the data to the custom columns for the book post type:
add_action('manage_karyawan_posts_custom_column', 'custom_karyawan_column', 10, 2);
function custom_karyawan_column($column, $post_id)
{
    switch ($column) {
        case 'jabatan':
            echo get_post_meta($post_id, 'jabatan', true);
            break;
        case 'no_telephone':
            echo get_post_meta($post_id, 'no_telephone', true);
            break;
        case 'divisi':
            echo get_post_meta($post_id, 'divisi', true);
            break;
        case 'gaji':
            $gaji = get_post_meta($post_id, "gaji", true);
            $gaji = $gaji != '' ? number_format($gaji, 2, ',', '.') : '-';
            echo '@Rp ' . $gaji;

            break;
        case 'tanggal_mulai_kerja':
            $waktu1 = get_post_meta($post_id, 'tanggal_mulai_kerja', true);
            $waktu2 = date('Y-m-d');
            $lama = $waktu1 ? get_date_diff(strtotime($waktu1), strtotime($waktu2), $precision = 2) : '-';
            echo $lama;
            break;
    }
}