<?php

// Register Artwork Custom Post Type
function artworks_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Artworks', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Artwork', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Artworks', 'text_domain' ),
		'name_admin_bar'        => __( 'Artwork', 'text_domain' ),
		'archives'              => __( 'Artworks Archives', 'text_domain' ),
		'attributes'            => __( 'Artworks Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Artwork:', 'text_domain' ),
		'all_items'             => __( 'All Artworks', 'text_domain' ),
		'add_new_item'          => __( 'Add New Artwork', 'text_domain' ),
		'add_new'               => __( 'Add New Artwork', 'text_domain' ),
		'new_item'              => __( 'New Artwork', 'text_domain' ),
		'edit_item'             => __( 'Edit Artwork', 'text_domain' ),
		'update_item'           => __( 'Update Artwork', 'text_domain' ),
		'view_item'             => __( 'View Artwork', 'text_domain' ),
		'view_items'            => __( 'View Artwork', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Artwork', 'text_domain' ),
		'items_list'            => __( 'Artworks list', 'text_domain' ),
		'items_list_navigation' => __( 'Artworks list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Artworks list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Artwork', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'menu_icon'             => 'dashicons-admin-customizer',
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'artworks', $args );

}
add_action( 'init', 'artworks_custom_post_type', 0 );

// Add Artist Featured Image support
add_post_type_support( 'artworks', 'thumbnail' );


if ( ! function_exists('events_custom_post_type') ) {

// Register Custom Post Type
function events_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Events', 'text_domain' ),
		'name_admin_bar'        => __( 'Events', 'text_domain' ),
		'archives'              => __( 'Event Archives', 'text_domain' ),
		'attributes'            => __( 'Event Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Event:', 'text_domain' ),
		'all_items'             => __( 'All Events', 'text_domain' ),
		'add_new_item'          => __( 'Add New Event', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Event', 'text_domain' ),
		'edit_item'             => __( 'Edit Event', 'text_domain' ),
		'update_item'           => __( 'Update Event', 'text_domain' ),
		'view_item'             => __( 'View Event', 'text_domain' ),
		'view_items'            => __( 'View Events', 'text_domain' ),
		'search_items'          => __( 'Search Event', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Events list', 'text_domain' ),
		'items_list_navigation' => __( 'Eventss list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter events list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'text_domain' ),
		'description'           => __( 'Event Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'events_custom_post_type', 0 );

}