<?php
// CUSTOMIZE ADMIN MENU LABELS
	function custom_menu($t) {
		#remove menu items
		remove_menu_page('link-manager.php');
		//remove_menu_page('tools.php');
		remove_menu_page('edit-comments.php');

		#custom menu labels
		global $menu;
		global $submenu;

	    foreach($menu as $k=>$v){
		    switch($v[0]){
			    case 'Posts':
					$menu[$k][0] = 'Blog';
					break;
				/*
					case 'Appearance':
					$menu[$k][0] = 'Theme';
					break;
				*/
		    }
	    }
	}
	add_action('admin_menu', 'custom_menu' ,9999);

// CUSTOMIZE ADMIN MENU ORDER
   function custom_menu_order($menu_ord) {
       if (!$menu_ord) return true;
       return array(
        'index.php', // this represents the dashboard link
        'edit.php?post_type=events', // this is a custom post type menu
        'edit.php?post_type=news',
        'edit.php?post_type=articles',
        'edit.php?post_type=faqs',
        'edit.php?post_type=mentors',
        'edit.php?post_type=testimonials',
        'edit.php?post_type=services',
        'edit.php?post_type=page', // this is the default page menu
        'edit.php', // this is the default POST admin menu
    );
   }
   add_filter('custom_menu_order', 'custom_menu_order');
   add_filter('menu_order', 'custom_menu_order');
   add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');