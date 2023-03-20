<?php
/* Output images with alt and optional title text */
function acd_add_img_title( $attr, $attachment = null ) {
	$img_title = trim( strip_tags( $attachment->post_title ) );
	$img_title = str_replace("-", " ", $img_title); //remove hyphens
	$img_title = str_replace("_", " ", $img_title); //remove underscores
	$img_title = preg_replace('/[0-9]+/', '', $img_title); //remove numbers
	$img_title = ucwords($img_title); //capitalize first letter of each word

	$attr['title'] = $img_title; //add image title attribute
	// or get the title instead of image title $attr['title'] = the_title_attribute( 'echo=0' );
	$attr['alt'] = $img_title; //add alt attribute
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes','acd_add_img_title', 10, 2 );