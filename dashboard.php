<?php
// ADD CUSTOM POST TYPES TO THE 'RIGHT NOW' DASHBOARD WIDGET
	function wph_right_now_content_table_end() {
		 $args = array(
		  'public' => true ,
		  '_builtin' => false
		 );
		 $output = 'object';
		 $operator = 'and';
		 $post_types = get_post_types( $args , $output , $operator );
		 foreach( $post_types as $post_type ) {
		  $num_posts = wp_count_posts( $post_type->name );
		  $num = number_format_i18n( $num_posts->publish );
		  $text = _n( $post_type->labels->singular_name, $post_type->labels->name , intval( $num_posts->publish ) );
		  if ( current_user_can( 'edit_posts' ) ) {
		   $num = "<a href='edit.php?post_type=$post_type->name'>$num</a>";
		   $text = "<a href='edit.php?post_type=$post_type->name'>$text</a>";
		  }
		  echo '<tr><td class="first num b b-' . $post_type->name . '">' . $num . '</td>';
		  echo '<td class="text t ' . $post_type->name . '">' . $text . '</td></tr>';
		 }
		 $taxonomies = get_taxonomies( $args , $output , $operator );
		 foreach( $taxonomies as $taxonomy ) {
		  $num_terms  = wp_count_terms( $taxonomy->name );
		  $num = number_format_i18n( $num_terms );
		  $text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name , intval( $num_terms ));
		  if ( current_user_can( 'manage_categories' ) ) {
		   $num = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$num</a>";
		   $text = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$text</a>";
		  }
		  echo '<tr><td class="first b b-' . $taxonomy->name . '">' . $num . '</td>';
		  echo '<td class="t ' . $taxonomy->name . '">' . $text . '</td></tr>';
		 }
	}
	add_action( 'right_now_content_table_end' , 'wph_right_now_content_table_end' );


//REMOVE UNWANTED DASHBOARD WIDGETS
	if(!function_exists('add_custom_dashboard_widget')){
		function add_custom_dashboard_widget() {
			global $wp_meta_boxes;
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['backwpup_dashboard_widget_logs']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['backwpup_dashboard_widget_activejobs']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
			wp_add_dashboard_widget('custom_right_now', 'Right Now', 'custom_right_now');
		}
		add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');
	}


?>