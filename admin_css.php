<?php
if(!function_exists('base_admin_css')){
	function base_admin_css(){
		wp_enqueue_style('base-admin-css', get_stylesheet_directory_uri() .'/css/admin.css', true, '1.0', 'all');
	}
	add_action('admin_print_styles', 'base_admin_css');
}
 
add_filter('mce_css', 'editor_stylesheet');
function editor_stylesheet($url){
	if(!empty($url)){
		$url .= ',';
	}
    $url .= get_stylesheet_uri();
    return $url;
}
 
function add_editor_style_select($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'add_editor_style_select');
  
function add_editor_styles($settings) {
    if(!empty($settings['theme_advanced_styles'])){
    	$settings['theme_advanced_styles'] .= ';';
    }else{
	    $settings['theme_advanced_styles'] = '';
    }
        
    $classes = array(
        //__('Red') => 'rojo',
        //__('Header Break') => 'headbreak',
        //__('Block Link') => 'blocklink',
    );

    $class_settings = '';
    foreach ( $classes as $name => $value ){
    	$class_settings .= "{$name}={$value};";
    }

    $settings['theme_advanced_styles'] .= trim($class_settings, '; ');
    return $settings;
} 

add_filter('tiny_mce_before_init', 'add_editor_styles');
?>
