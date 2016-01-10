<?php
// enqueue styles
	if( !function_exists("theme_styles") ) {  
	    function theme_styles() {
		    wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), '1.0', 'all' );
		    wp_register_style( 'bootstrap-responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array(), '1.0', 'all' );
		    wp_register_style( 'theme', get_stylesheet_directory_uri(), array(), '1.0', 'all' );
		    wp_register_style( 'countdown', get_stylesheet_directory_uri() . '/css/jquery.countdown.css');
			wp_register_style( 'fancybox', get_stylesheet_directory_uri().'/js/source/jquery.fancybox.css', NULL, '2.1.4');
		     
		    wp_enqueue_style(array('bootstrap','bootstrap-responsive','theme','fancybox'));
	    }
	}
	add_action( 'wp_enqueue_scripts', 'theme_styles' );
	


// enqueue javascript
	if( !function_exists( "theme_js" ) ) {  
		function theme_js(){
			wp_deregister_script('jquery');
			wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
			wp_register_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.2' );
			wp_register_script( 'wpbs-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.2' );
			wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/js/modernizr.full.min.js', array('jquery'), '1.2' );
			wp_register_script( 'functions', get_stylesheet_directory_uri().'/js/functions.js', array('jquery'), '1.0');
			wp_register_script( 'countdown', get_stylesheet_directory_uri().'/js/jquery.countdown.min.js');
		    wp_register_script( 'fancybox', get_stylesheet_directory_uri().'/js/source/jquery.fancybox.js', NULL, '2.1.4');
		    wp_register_script( 'cycle', get_stylesheet_directory_uri().'/js/jquery.cycle2.min.js');
		    wp_register_script( 'carousel', get_stylesheet_directory_uri().'/js/jquery.cycle2.carousel.min.js');
			
			wp_enqueue_script(array('bootstrap','modernizr','functions','fancybox'));
			
			if (is_page(7)){
				wp_enqueue_script(array('cycle','carousel'));
			}
		}
	}
	add_action( 'wp_enqueue_scripts', 'theme_js' );

// dequeue twentythirteen js
function remove_scripts() {
    //wp_dequeue_style( 'screen' );
    wp_deregister_style( 'screen' );

    wp_dequeue_script( array('jquery-masonry','twentythirteen-script') );
    wp_deregister_script( array('jquery-masonry','twentythirteen-script') );

    // Now register your styles and scripts here
}
add_action( 'wp_enqueue_scripts', 'remove_scripts', 20 );


?>