<?php

// ADD CUSTOM POST TYPE MANUALLY
	/*
	'show_ui' => true,
	'public' => true,
	'supports' => array('title', 'editor', 'thumbnail'),
	'publicly_queryable' => true,
	'query_var' => true,
	'exclude_from_search' => false,
	'capability_type' => 'page',
	'has_archive' => true,
	'description' => 'description',
	'show_in_nav_menus' => true,
	'show_in_menu' => true,
	'show_in_admin_bar' => true,
	'menu_position' => 10,
	'menu_icon' => NULL,
	'can_export' => true,
	'rewrite' => array('slug' => 'heartart', 'with_front' => false),
	'labels' => array(
		'name' => 'Heartart',
		'singular_name' => 'singular_name',
		'add_new' => 'Add new',
		'all_items' => 'All Heartart',
		'add_new_item' => 'New Heartart',
		'edit_item' => 'Edit Heartart',
		'new_item' => 'new_item',
		'view_item' => 'View',
		'search_items' => 'Search',
		'not_found' => 'empty',
		'not_found_in_trash' => 'empty',
		'menu_name' => 'Heartart'
	)
	sld_register_taxonomy( $taxonomy_slug, $post_types, $optional_singular_name, $optional_args, $optional_plural_name );
	*/


// MAKE CUSTOM POST TYPES SEARCHABLE
	function searchAll( $query ) {
	 if ( $query->is_search ) { $query->set( 'post_type', array( 'site', 'plugin', 'theme', 'person' )); }
	 return $query;
	}
	add_filter( 'the_search_query', 'searchAll' );

// ADD CUSTOM POST TYPES TO THE DEFAULT RSS FEED
	function custom_feed_request( $vars ) {
	 if (isset($vars['feed']) && !isset($vars['post_type']))
	  $vars['post_type'] = array( 'post', 'site', 'plugin', 'theme', 'person' );
	 return $vars;
	}
	add_filter( 'request', 'custom_feed_request' );
