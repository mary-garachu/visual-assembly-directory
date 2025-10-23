<?php
/**
 * Plugin Name: Visual Assembly Directory
 * Description: A simple plugin that registers a custom post type "visual_assembly" and displays posts in a directory layout.
 * Version: 1.0
 * Author: Sonie
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register Custom Post Type: Visual Assembly
function vad_register_custom_post_type() {
    $labels = array(
        'name'               => __( 'Visual Assemblies', 'vad' ),
        'singular_name'      => __( 'Visual Assembly', 'vad' ),
        'add_new'            => __( 'Add New Assembly', 'vad' ),
        'add_new_item'       => __( 'Add New Visual Assembly', 'vad' ),
        'edit_item'          => __( 'Edit Visual Assembly', 'vad' ),
        'new_item'           => __( 'New Visual Assembly', 'vad' ),
        'view_item'          => __( 'View Visual Assembly', 'vad' ),
        'search_items'       => __( 'Search Visual Assemblies', 'vad' ),
        'not_found'          => __( 'No assemblies found', 'vad' ),
        'menu_name'          => __( 'Visual Assemblies', 'vad' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-layout',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true, // enables block editor
    );

    register_post_type( 'visual_assembly', $args );
}
add_action( 'init', 'vad_register_custom_post_type' );

// Enqueue plugin stylesheet
function vad_enqueue_styles() {
    wp_enqueue_style(
        'vad-styles',
        plugin_dir_url(__FILE__) . 'assets/css/style.css',
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'vad_enqueue_styles');

// Load plugin archive template for Visual Assembly CPT
function vad_load_archive_template($template) {
    if (is_post_type_archive('visual_assembly')) {
        $plugin_template = plugin_dir_path(__FILE__) . 'templates/archive-visual_assembly.php';
        if (file_exists($plugin_template)) {
            return $plugin_template;
        }
    }
    return $template;
}
add_filter('archive_template', 'vad_load_archive_template');

