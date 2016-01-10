<?php
function pre($a){
	echo '<pre>' . htmlentities( utf8_encode( print_r( $a, true ) ), ENT_QUOTES, 'utf-8' ) . '</pre>';
}
?>