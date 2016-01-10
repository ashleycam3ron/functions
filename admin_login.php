<?php
//CUSTOMIZE LOGIN LOGO
	function custom_login_logo(){
		$logo = get_stylesheet_directory_uri().'/image/logo.svg';
		$images = get_stylesheet_directory_uri().'/image/';
		echo '<style type="text/css">
				h1 a { background-image:url("'. $logo .'") !important; background-size:100% !important;width:295px !important;height:75px !important;margin: 0 auto !important;}
				/* body.login {background:url("'. $images .'stripe1.png") !important;} */
				.login form {background: #fff !important;border: 1px solid #EEE !important;}
			</style>';
	}
	add_action('login_head','custom_login_logo');

//logo's default link is changed to the site url
	function login_header_url() {
	    return home_url();
	}
	add_filter('login_headerurl', 'login_header_url');

//logo's default title is changed to the site title
	function login_header_title() {
	    return get_bloginfo('name');
	}
	add_filter('login_headertitle', 'login_header_title');