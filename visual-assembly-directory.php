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
