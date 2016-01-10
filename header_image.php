<?php
function custom_header(){
	$img = '<a href="'. esc_url(home_url('/')) .'">';
	$header_image = get_header_image();
	if(!empty($header_image) && is_singular() && has_post_thumbnail($post->ID) && ($image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID ), array(HEADER_IMAGE_WIDTH,HEADER_IMAGE_WIDTH))) && $image[1] >= HEADER_IMAGE_WIDTH){
		$img .=  get_the_post_thumbnail($post->ID, 'post-thumbnail');
	}else{
		$img .= '<img src="'. get_header_image() .'" width="'. HEADER_IMAGE_WIDTH .'" height="'. HEADER_IMAGE_HEIGHT .'" alt="'. get_bloginfo('name') .'" />';
	}
	$img .= '</a>';
	return $img;
}
?>