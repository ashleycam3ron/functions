<?php function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDOKhI3_PBm0g_H0dMRJLpqODxskiYkrk0');
}
add_action('acf/init', 'my_acf_init');