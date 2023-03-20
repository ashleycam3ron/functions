<?php //Query random quotes
function wpb_rand_posts() {

$args = array(
    'post_type' => 'post',
    'cat' => 894,
    'orderby'   => 'rand',
    'posts_per_page' => 1,
    );

$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {
	    while ( $the_query->have_posts() ) { ?>
	       <?php $the_query->the_post();?>
		   <p class="quote text-center">
		       <quote>"<?php echo the_title();?>"</quote>
		   </p>
		       <div class="quote-author text-center"><?php echo the_content();?></div>

	    <?php }?>

	   <?php wp_reset_postdata();
	}
}

add_shortcode('random-quotes','wpb_rand_posts');
add_filter('widget_text', 'do_shortcode');