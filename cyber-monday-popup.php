<?php
	//cyber monday
	date_default_timezone_set ( 'America/Chicago' ); //set timezone
	$cybermonday= date( 'm-d-y'); //set cyber monday date

	if ( $cybermonday=='11-30-15' ) { ?>

	<img id="cyber" style="display:none;" src="<?php echo get_stylesheet_directory_uri(); ?>/dir/graphics/cybermonday.jpg"></a>

<!-- Make sure fancybox source files are in theme -->
	<script type="text/javascript">
	  jQuery(document).ready(function() {
		        jQuery("#cyber").fancybox({'padding':0}).trigger('click');
		    });
	</script>
<?php } ?>