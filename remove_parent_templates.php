<?php
$_templates_to_remove = array();

function remove_template( $files_to_delete = array() ){
    if ( is_scalar( $files_to_delete ) ) $files_to_delete = array( $files_to_delete );

	global $_templates_to_remove;
	$_templates_to_remove = array_unique(array_merge($_templates_to_remove, $files_to_delete));

	add_action('admin_print_footer_scripts', '_remove_template_footer_scripts');
}

function _remove_template_footer_scripts() {
	global $_templates_to_remove;

	if ( ! $_templates_to_remove ) { return; }
	?>
	<script type="text/javascript">
	jQuery(function($) {
		var tpls = <?php echo json_encode($_templates_to_remove); ?>;
		$.each(tpls, function(i, tpl) {
			$('select[name="page_template"] option[value="'+ tpl +'"]').remove();
		});
	});
	</script>
	<?php
}

// Usage
add_action('admin_head-post.php', 'remove_parent_templates');
add_action('admin_head-post-new.php', 'remove_parent_templates');

function remove_parent_templates() {
	remove_template(array(
		'page-templates/front-page.php',
		'page-templates/full-width.php',
	));
} ?>