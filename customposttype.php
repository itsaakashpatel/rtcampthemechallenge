<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* Ourpartners Custom Post type */

function partners_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('OurPartners', 'Post Type General Name', 'onetheme'),
        'singular_name' => _x('Ourpartner', 'Post Type Singular Name', 'onetheme'),
        'menu_name' => __('OurPartners', 'onetheme'),
        'all_items' => __('All Partners', 'onetheme'),
        'view_item' => __('View Partner', 'onetheme'),
        'add_new_item' => __('Add New Partner', 'onetheme'),
        'add_new' => __('Add New', 'onetheme'),
        'edit_item' => __('Edit Partner', 'onetheme'),
        'update_item' => __('Update Partner', 'onetheme'),
        'search_items' => __('Search Partner', 'onetheme'),
        'not_found' => __('Not Found', 'onetheme'),
        'not_found_in_trash' => __('Not found in Trash', 'onetheme'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('OurPartners', 'onetheme'),
        'description' => __('List of partners', 'onetheme'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('OurPartners', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'partners_post_type', 0);

/* Glimpses of Exhibition */

function exhibition_functions_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Exhibition', 'Post Type General Name', 'onetheme'),
        'singular_name' => _x('Exhibition', 'Post Type Singular Name', 'onetheme'),
        'menu_name' => __('Exhibitions', 'onetheme'),
        'all_items' => __('All Exhibition', 'onetheme'),
        'view_item' => __('View Exhibition', 'onetheme'),
        'add_new_item' => __('Add New Exhibition', 'onetheme'),
        'add_new' => __('Add New', 'onetheme'),
        'edit_item' => __('Edit Exhibition', 'onetheme'),
        'update_item' => __('Update Exhibition', 'onetheme'),
        'search_items' => __('Search Exhibition', 'onetheme'),
        'not_found' => __('Not Found', 'onetheme'),
        'not_found_in_trash' => __('Not found in Trash', 'onetheme'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('Exhibitions', 'onetheme'),
        'description' => __('List of Exhibitions', 'onetheme'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('exhibition', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'exhibition_functions_type', 0);

/* Main Slider (Our Work ) */

function work_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Our Work', 'Post Type General Name', 'onetheme'),
        'singular_name' => _x('Our Work', 'Post Type Singular Name', 'onetheme'),
        'menu_name' => __('Our Works', 'onetheme'),
        'all_items' => __('All Works', 'onetheme'),
        'view_item' => __('View Our Work', 'onetheme'),
        'add_new_item' => __('Add New Work', 'onetheme'),
        'add_new' => __('Add New', 'onetheme'),
        'edit_item' => __('Edit Work', 'onetheme'),
        'update_item' => __('Update Work', 'onetheme'),
        'search_items' => __('Search Work', 'onetheme'),
        'not_found' => __('Not Found', 'onetheme'),
        'not_found_in_trash' => __('Not found in Trash', 'onetheme'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => __('OurWorks', 'onetheme'),
        'description' => __('List of works', 'onetheme'),
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type('OurWorks', $args);
}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */

add_action('init', 'work_post_type', 0);
