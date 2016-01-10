<?php
//CUSTOMIZE READ MORE
	function excerpt_read_more_link($output) {
	 global $post;
	 return $output . '<a href="'. get_permalink($post->ID) . '"> </a>';
	}
	add_filter('the_excerpt', 'excerpt_read_more_link');

//CUSTOM EXCERPT LENGTH
	function custom_excerpt_length( $length ) {
		return 18;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Adding Multiple Custom Excerpt Lengths
	function excerpt($limit) {
	  $excerpt = explode(' ', get_the_excerpt(), $limit);
	  if (count($excerpt)>=$limit) {
	    array_pop($excerpt);
	    $excerpt = implode(" ",$excerpt).'...';
	  } else {
	    $excerpt = implode(" ",$excerpt);
	  }
	  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	  return $excerpt;
	}

	function content($limit) {
	  $content = explode(' ', get_the_content(), $limit);
	  if (count($content)>=$limit) {
	    array_pop($content);
	    $content = implode(" ",$content).'...';
	  } else {
	    $content = implode(" ",$content);
	  }
	  $content = preg_replace('/[.+]/','', $content);
	  $content = apply_filters('the_content', $content);
	  $content = str_replace(']]>', ']]&gt;', $content);
	  return $content;
	}
// no more jumping for read more link
	function no_more_jumping($post) {
		return ''.'Continue Reading'.'';
	}
	add_filter('excerpt_more', 'no_more_jumping');