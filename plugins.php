<?php
//Remove Plugin Update Notice ONLY for INACTIVE plugins
	function update_active_plugins($value = '') {
	    /*
	    The $value array passed in contains the list of plugins with time
	    marks when the last time the groups was checked for version match
	    The $value->reponse node contains an array of the items that are
	    out of date. This response node is use by the 'Plugins' menu
	    for example to indicate there are updates. Also on the actual
	    plugins listing to provide the yellow box below a given plugin
	    to indicate action is needed by the user.
	    */
	    if ((isset($value->response)) && (count($value->response))) {

	        // Get the list cut current active plugins
	        $active_plugins = get_option('active_plugins');
	        if ($active_plugins) {

	            //  Here we start to compare the $value->response
	            //  items checking each against the active plugins list.
	            foreach($value->response as $plugin_idx => $plugin_item) {

	                // If the response item is not an active plugin then remove it.
	                // This will prevent WordPress from indicating the plugin needs update actions.
	                if (!in_array($plugin_idx, $active_plugins))
	                    unset($value->response[$plugin_idx]);
	            }
	        }
	        else {
	             // If no active plugins then ignore the inactive out of date ones.
	            foreach($value->response as $plugin_idx => $plugin_item) {
	                unset($value->response);
	            }
	        }
	    }
	    return $value;
	}
	add_filter('transient_update_plugins', 'update_active_plugins');    // Hook for 2.8.+
	//add_filter( 'option_update_plugins', 'update_active_plugins');    // Hook for 2.7.x