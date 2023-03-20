<?php add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
// Remove default image sizes here.
function prefix_remove_default_images( $sizes ) {
	//unset( $sizes['small']); // 150px
	//unset( $sizes['medium']); // 300px
	unset( $sizes['large']); // 1024px
	unset( $sizes['medium_large']); // 768px
	unset( $sizes['1536x1536']); // 2x medium-large
	unset( $sizes['2048x2048']); // 2x large
	return $sizes;
}

// Disable WordPRess responsive srcset images
//add_filter('max_srcset_image_width', create_function('', 'return 1;'));

function remove_extra_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
        if ( !in_array( $size, array( 'thumbnail', 'medium') ) ) {
            remove_image_size( $size );
        }
    }
}

add_action('init', 'remove_extra_image_sizes');
?>