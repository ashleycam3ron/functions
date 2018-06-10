<?php 
/**
 * Embed Gists with a URL
 *
 * Usage:
 * Paste a gist link into a blog post or page and it will be embedded eg:
 * https://gist.github.com/2926827
 *
 * If a gist has multiple files you can select one using a url in the following format:
 * https://gist.github.com/2926827?file=embed-gist.php
 *
 * Updated this code on June 14, 2014 to work with new(er) Gist URLs
 */
 
	wp_embed_register_handler( 'gist', '/https?:\/\/gist\.github\.com\/([a-z0-9]+)(\?file=.*)?/i', 'bhww_embed_handler_gist' );

	function bhww_embed_handler_gist( $matches, $attr, $url, $rawattr ) {

		$embed = sprintf(
				'<script src="https://gist.github.com/%1$s.js%2$s"></script>',
				esc_attr($matches[1]),
				esc_attr($matches[2])
				);

		return apply_filters( 'embed_gist', $embed, $matches, $attr, $url, $rawattr );
	}