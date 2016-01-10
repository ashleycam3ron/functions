<?php
// REMOVE META BOXES FROM DEFAULT POSTS SCREEN
   function remove_default_post_screen_metaboxes() {
	 remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
	 remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
	 remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
	 remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
	 remove_meta_box( 'slugdiv','post','normal' ); // Slug Metabox
	 remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
	 }
   add_action('admin_menu','remove_default_post_screen_metaboxes');

// REMOVE META BOXES FROM DEFAULT PAGES SCREEN
   function remove_default_page_screen_metaboxes() {
	 remove_meta_box( 'postcustom','page','normal' ); // Custom Fields Metabox
	 remove_meta_box( 'postexcerpt','page','normal' ); // Excerpt Metabox
	 remove_meta_box( 'commentstatusdiv','page','normal' ); // Comments Metabox
	 remove_meta_box( 'trackbacksdiv','page','normal' ); // Talkback Metabox
	 remove_meta_box( 'slugdiv','page','normal' ); // Slug Metabox
	 remove_meta_box( 'authordiv','page','normal' ); // Author Metabox
	 }
   add_action('admin_menu','remove_default_page_screen_metaboxes');