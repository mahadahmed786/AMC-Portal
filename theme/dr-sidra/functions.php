<?php
/**
 * Dr. Sidra theme setup.
 */

if (!defined('ABSPATH')) {
    exit;
}

require get_template_directory() . '/inc/config.php';

function dr_sidra_setup() {
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    register_nav_menus(array(
        'primary' => __('Primary', 'dr-sidra'),
    ));
}
add_action('after_setup_theme', 'dr_sidra_setup');

function dr_sidra_assets() {
    wp_enqueue_style(
        'dr-sidra-fonts',
        'https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Source+Serif+4:opsz,wght@8..60,500;8..60,600&display=swap',
        array(),
        null
    );
    wp_enqueue_style('dr-sidra', get_stylesheet_uri(), array('dr-sidra-fonts'), '1.5.0');
    wp_enqueue_script('dr-sidra', get_template_directory_uri() . '/assets/theme.js', array(), '1.3.0', true);
}
add_action('wp_enqueue_scripts', 'dr_sidra_assets');

function dr_sidra_ensure_page($title, $slug, $template) {
    $existing = get_page_by_path($slug);
    if ($existing) {
        if ($template && get_page_template_slug($existing->ID) !== $template) {
            update_post_meta($existing->ID, '_wp_page_template', $template);
        }
        return (int) $existing->ID;
    }
    $id = wp_insert_post(array(
        'post_title' => $title,
        'post_name' => $slug,
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_content' => '',
    ));
    if ($id && $template) {
        update_post_meta($id, '_wp_page_template', $template);
    }
    return (int) $id;
}

function dr_sidra_install_content() {
    dr_sidra_ensure_page('All Courses', 'courses', 'page-templates/courses.php');
    dr_sidra_ensure_page('Contact', 'contact', 'page-templates/contact.php');
    dr_sidra_ensure_page('Terms and Conditions', 'terms', 'page-templates/terms.php');
    dr_sidra_ensure_page('Privacy Policy', 'privacy', 'page-templates/privacy.php');

    $home = get_page_by_path('home');
    if (!$home) {
        $home_id = wp_insert_post(array(
            'post_title' => 'Home',
            'post_name' => 'home',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => '',
        ));
    } else {
        $home_id = (int) $home->ID;
    }
    if ($home_id) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_id);
    }
}
add_action('after_switch_theme', 'dr_sidra_install_content');

function dr_sidra_nav_current($path) {
    if ($path === '/' && (is_front_page() || is_home())) {
        return ' aria-current="page"';
    }
    if ($path !== '/' && is_page($path)) {
        return ' aria-current="page"';
    }
    return '';
}
