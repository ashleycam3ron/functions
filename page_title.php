<?php
function page_title($a=''){
	if(empty($a)){
		global $page, $paged;
		wp_title('-',true,'right');
		bloginfo( 'name' );
		$site_description = get_bloginfo('description','display');
		if($site_description && (is_home() || is_front_page())) echo " - ".$site_description;
		if($paged > 1 || $page > 1) echo ' - ' . sprintf( __( 'Page %s', 'twentytwelve' ), max($paged, $page));
	}
}
?>