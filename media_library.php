<?php
	//New Media Library Column to Re-Attach Images
	add_filter("manage_upload_columns", 'upload_columns');
	add_action("manage_media_custom_column", 'media_custom_columns', 0, 2);

	function upload_columns($columns) {
	    unset($columns['parent']);
	    $columns['better_parent'] = "Parent";
	    return $columns;
	}
	function media_custom_columns($column_name, $id) {
	    $post = get_post($id);
	    if($column_name != 'better_parent')
	        return;
	        if ( $post->post_parent > 0 ) {
	            if ( get_post($post->post_parent) ) {
	                $title =_draft_or_post_title($post->post_parent);
	            }
	            ?>
	            <strong><a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a></strong>, <?php echo get_the_time(__('Y/m/d')); ?>
	            <br />
	            <a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Re-Attach'); ?></a>
	            <?php
	        } else {
	            ?>
	            <?php _e('(Unattached)'); ?><br />
	            <a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Attach'); ?></a>
	            <?php
	        }
	}