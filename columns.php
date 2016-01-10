<?php
//add columns in admin to bikes
	add_action("manage_all-bikes_posts_custom_column",  "show_bikes_column");
	add_filter("manage_edit-all-bikes_columns", "bikes_columns");
	
	function bikes_columns($columns){
	  $columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Title",
		"all-bikes" => "Bikes",
		"date" => __( 'Date' )
	  );
	 return $columns;
	}
	
	function show_bikes_column($new_column){
	  global $post;
	  switch ($new_column) {
		case "all-bikes":
		  echo get_the_term_list($post->ID,'bikes','',', ','');
		  break;
	  }
	}
	
	
//Make columns sortable
	add_filter( 'manage_edit-all-bikes_sortable_columns', 'bikes_sortable_columns' );
	
	function bikes_sortable_columns( $columns ) {
		$columns['all-bikes'] = 'Types of Bikes';
		return $columns;
	}
	
	/* Only run our customization on the 'edit.php' page in the admin. */
	add_action( 'load-edit.php', 'my_edit_bikes_load' );
	function my_edit_bikes_load() {
		add_filter( 'request', 'my_sort_bikes' );
	}
	
	/* Sorts the bikes. */
	function my_sort_bikes( $vars ) {
		if ( isset( $vars['post_type'] ) && 'all-bikes' == $vars['post_type'] ) {
			if ( isset( $vars['orderby'] ) && 'status' == $vars['orderby'] ) {
				$vars = array_merge(
					$vars,
					array(
						'meta_key' => 'status',
						'orderby' => 'meta_value'
					));
			}
		}
		return $vars;
	}
	
	
	//dropdown sort media
	add_action( 'restrict_manage_posts', 'todo_restrict_manage_posts' );
	add_filter('parse_query','todo_convert_restrict');
	function todo_restrict_manage_posts() {
		global $typenow;
		$args   =   array( 'public' => true, '_builtin' => false );
		$post_types = get_post_types($args);
		if ( in_array($typenow, $post_types) ) {
			$filter = get_object_taxonomies($typenow);
			foreach ($filter as $tax_slug) {
					$tax_obj = get_taxonomy($tax_slug);
					wp_dropdown_categories(array(
						'show_option_all' => __('Show All '.$tax_obj->label ),
						'taxonomy' => $tax_slug,
						'name' => $tax_obj->name,
						'orderby' => 'name',
						'selected' => $_GET[$tax_obj->query_var],
						'hierarchical' => $tax_obj->hierarchical,
						'show_count' => true,
						'hide_empty' => false
					));
			}
		}
	}
	function todo_convert_restrict($query) {
		global $pagenow;
		global $typenow;
		if ($pagenow=='edit.php') {
			$filters = get_object_taxonomies($typenow);
			foreach ($filters as $tax_slug) {
				$var = &$query->query_vars[$tax_slug];
				if ( isset($var) ) {
					$term = get_term_by('id',$var,$tax_slug);
					$var = $term->slug;
				}
			}
		}
	}
	function override_is_tax_on_post_search($query) {
		global $pagenow;
		$qv = &$query->query_vars;
		if ($pagenow == 'edit.php' && isset($qv['taxonomy']) && isset($qv['s'])) {
			$query->is_tax = true;
		}
	}
	add_filter('parse_query','override_is_tax_on_post_search');
	
	/**/
?>