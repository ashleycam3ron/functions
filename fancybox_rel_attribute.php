<?php
/* ------------------------------------------------------------------*/
/* ADD REL ATTRIBUTE FOR LIGHTBOX */
/* ------------------------------------------------------------------*/

add_filter('wp_get_attachment_link', 'rc_add_rel_attribute');
function rc_add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a rel="ag" href', $link);
}