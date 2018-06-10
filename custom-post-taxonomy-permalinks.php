<?php

/*

Term Archive Pages:
 - http://example.com/recipes/dinner/
 - http://example.com/recipes/breakfast,brunch/

Single Recipe Pages:
 - http://example.com/recipes/dinner/soup-title/
 - http://example.com/recipes/breakfast,brunch/egg-dish-title/

*/

add_action( 'init', 'register_my_types' );

function register_my_types() {

	register_post_type( 'recipes',
		array(
			'labels' => array(
				'name' => __( 'Recipes' ),
				'singular_name' => __( 'Recipee' )
			),
			'public' => true,
			'has_archive' => true,
		)
	);

	register_taxonomy( 'occasion', array( 'recipes' ), array( 
			'hierarchical' => true, 
			'label' => 'Occasions'
		)
	);
}

// Add our custom permastructures for custom taxonomy and post
add_action( 'wp_loaded', 'add_clinic_permastructure' );

function add_clinic_permastructure() {
	global $wp_rewrite;

	add_permastruct( 'occasion', 'recipes/%occasion%', false );
	add_permastruct( 'recipes', 'recipes/%occasion%/%recipes%', false );
}

// Make sure that all links on the site, include the related texonomy terms
add_filter( 'post_type_link', 'recipe_permalinks', 10, 2 );

function recipe_permalinks( $permalink, $post ) {
	if ( $post->post_type !== 'recipes' )
		return $permalink;

	$terms = get_the_terms( $post->ID, 'occasion' );
	
	if ( ! $terms )
		return str_replace( '%occasion%/', '', $permalink );

	$post_terms = array();
	foreach ( $terms as $term )
		$post_terms[] = $term->slug;

	return str_replace( '%occasion%', implode( ',', $post_terms ) , $permalink );
}

// Make sure that all term links include their parents in the permalinks
add_filter( 'term_link', 'add_term_parents_to_permalinks', 10, 2 );

function add_term_parents_to_permalinks( $permalink, $term ) {
	$term_parents = get_term_parents( $term );

	foreach ( $term_parents as $term_parent )
		$permlink = str_replace( $term->slug, $term_parent->slug . ',' . $term->slug, $permalink );

	return $permlink;
}

// Helper function to get all parents of a term
function get_term_parents( $term, &$parents = array() ) {
	$parent = get_term( $term->parent, $term->taxonomy );
	
	if ( is_wp_error( $parent ) )
		return $parents;
	
	$parents[] = $parent;

	if ( $parent->parent )
		get_term_parents( $parent, $parents );

    return $parents;
}