<?php
add_action( 'after_setup_theme','remove_twentythirteen_all_widgets', 100 );
function remove_twentythirteen_all_widgets() {

remove_filter( 'widgets_init', 'twentythirteen_widgets_init' );
}

function twentythirteen_widgets_init1() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentythirteen' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the Home page', 'twentythirteen' ),
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
    	'name' => __( 'Call for Speakers Sidebar', 'twentythirteen' ),
		'id' => 'call-sidebar',
		//'description' => __( 'Blog widget area', 'twentythirteen' ),
    ));
    
	register_sidebar(array(
    	'name' => __( 'Footer Widgets', 'twentythirteen' ),
		'id' => 'footer-widgets',
		'description' => __( 'Footer widget area', 'twentythirteen' ),
    ));
}
add_action( 'widgets_init', 'twentythirteen_widgets_init1' );

?>