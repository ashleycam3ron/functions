<?php
function post_word_count() {
	global $post;
    $words = str_word_count( strip_tags( get_post_field( 'post_content', get_the_ID() ) ) );
    $time = $words/250;

	if ( $time < 1) {
		echo 1;
	} else {
		echo round($time, 1, PHP_ROUND_HALF_UP);
	}
}