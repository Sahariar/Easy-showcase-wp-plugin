<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://sahariarkabir.com/
 * @since      1.0.0
 *
 * @package    Easy_Work_Showcase
 * @subpackage Easy_Work_Showcase/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
if ( ! function_exists('ews_post_type') ) {

// Register Custom Post Type
function ews_post_type() {

	$labels = array(
		'name'                  => _x( 'Works', 'Post Type General Name', 'easy-work-showcase' ),
		'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'easy-work-showcase' ),
		'menu_name'             => __( 'Work Showcase List', 'easy-work-showcase' ),
		'name_admin_bar'        => __( 'Work Showcase List', 'easy-work-showcase' ),
		'archives'              => __( 'Work Showcase Archives', 'easy-work-showcase' ),
		'attributes'            => __( 'Item Attributes', 'easy-work-showcase' ),
		'parent_item_colon'     => __( 'Parent Item:', 'easy-work-showcase' ),
		'all_items'             => __( 'All Items', 'easy-work-showcase' ),
		'add_new_item'          => __( 'Add New Item', 'easy-work-showcase' ),
		'add_new'               => __( 'Add New Work', 'easy-work-showcase' ),
		'new_item'              => __( 'New Work Showcase', 'easy-work-showcase' ),
		'edit_item'             => __( 'Work Showcase Item', 'easy-work-showcase' ),
		'update_item'           => __( 'Update Item', 'easy-work-showcase' ),
		'view_item'             => __( 'View Item', 'easy-work-showcase' ),
		'view_items'            => __( 'View Items', 'easy-work-showcase' ),
		'search_items'          => __( 'Search Item', 'easy-work-showcase' ),
		'not_found'             => __( 'Not found', 'easy-work-showcase' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'easy-work-showcase' ),
		'featured_image'        => __( 'Featured Image', 'easy-work-showcase' ),
		'set_featured_image'    => __( 'Set featured image', 'easy-work-showcase' ),
		'remove_featured_image' => __( 'Remove featured image', 'easy-work-showcase' ),
		'use_featured_image'    => __( 'Use as featured image', 'easy-work-showcase' ),
		'insert_into_item'      => __( 'Insert into item', 'easy-work-showcase' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'easy-work-showcase' ),
		'items_list'            => __( 'Items list', 'easy-work-showcase' ),
		'items_list_navigation' => __( 'Items list navigation', 'easy-work-showcase' ),
		'filter_items_list'     => __( 'Filter items list', 'easy-work-showcase' ),
	);
	$args = array(
		'label'                 => __( 'Work', 'easy-work-showcase' ),
		'description'           => __( 'Works showcase', 'easy-work-showcase' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-desktop',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'Work Showcase', $args );

}
add_action( 'init', 'ews_post_type', 0 );

}