<?php
//Custom Favicon WP-Admin
	function admin_favicon() {
	 echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_bloginfo('template_directory') . '/images/favicon.ico" />';
	}
	add_action( 'admin_head', 'admin_favicon' );