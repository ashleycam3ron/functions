<?php
//add_action( 'admin_footer', 'radio_category' );
function radio_category(){
	echo '<script type="text/javascript">';
	echo 'jQuery("#categorychecklist input, #categorychecklist-pop input, .cat-checklist input").each(function(){this.type="radio"});</script>';
}
?>