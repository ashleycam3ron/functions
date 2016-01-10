<?php
function has_children($child_of = NULL){
	if(is_null($child_of)) {
		global $post;
		$child_of = ($post->post_parent != '0') ? $post->post_parent : $post->ID;
	}
	return (wp_list_pages("child_of=$child_of&echo=0")) ? true : false;
}
?>