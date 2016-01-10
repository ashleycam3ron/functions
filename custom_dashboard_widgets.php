<?php
function custom_dashboard_widgets(){
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	add_meta_box('custom_help_widget', 'Theme Support', 'custom_dashboard_help', 'dashboard', 'normal', 'high');
}
add_action('wp_dashboard_setup', 'custom_dashboard_widgets');
function custom_dashboard_help($post){
	$value = get_current_user();
	_e('<h4>This custom widget is under Construction</h4>', 'minnowproject' );
}
?>