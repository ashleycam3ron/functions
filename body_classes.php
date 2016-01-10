<?php
//Short Body Classes For Page Templates
	function my_short_page_template_body_classes( $classes ){
		if( is_page() ){
			$template = get_page_template_slug(); // returns an empty string if it's loading the default template (page.php)
			if( $template === '' ){
				$classes[] = 'default-page';
			} else {
				$classes[] = sanitize_html_class( str_replace( '.php', '', $template ) );
			}
		}
		return $classes;
	}
	add_filter( 'body_class', 'my_short_page_template_body_classes' );