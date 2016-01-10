<?php
//Disable update notification for individual plugins
/*
function filter_plugin_updates( $value ) {
	unset( $value->response['wunderground/wunderground.php'] );
	return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );
*/