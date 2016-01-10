<?php
function enqueue(){
	wp_enqueue_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js', NULL, '2.8.3');
	wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js', NULL, '3.3.4');
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', NULL, '2.1.4');
	wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css', NULL, '3.3.4');
	wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css', NULL, '4.4.0');
	wp_enqueue_style('styles', get_stylesheet_uri(), array('bootstrap', 'fontawesome'), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'enqueue');
?>