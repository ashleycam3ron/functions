<?php
//Blog Posts
function postlist_shortcode( $atts ) {
     $args = array(
	    'post_type' => 'post',
	    'cat' => 1,
	    //'posts_per_page' => $posts_per_page,
	    'posts_per_page' => 4,
	    'orderby' => 'date',
	    'order' => 'DESC' ,
    );
    $posts = new  WP_Query( $args );

	ob_start();
    if ($posts->have_posts()) : ?>

	    <?php while ( $posts->have_posts() ) : $posts->the_post();?>
	    	<div class="blog-post">
			    <?php if ( has_post_thumbnail( $posts->ID ) ) {
					echo '<a href="' . get_permalink( $posts->ID ) . '" title="' . esc_attr( $posts->post_title ) . '">';
					echo get_the_post_thumbnail( $posts->ID, 'thumbnail' );
					echo '</a>';
				} ?>
			   	<h3><a class="d-block" style="line-height: 1.4;margin-bottom: 5px;" href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
		   	</div>
		<?php endwhile; ?>
    <?php endif;
	wp_reset_query();
    $content = ob_get_contents();

    ob_end_clean();
    return $content;
}
add_shortcode('postlist', 'postlist_shortcode');


//Subscribe
function subscribe_shortcode( $atts ) {
	ob_start();  ?>

		<!-- Begin MailChimp Signup Form -->
			<!-- [PASTE MAILCHIMP EMBED CODE HERE]	-->
		<!--End mc_embed_signup-->

<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode('subscribe', 'subscribe_shortcode');


//YOAST Breadcrumbs
function breadcrumb_shortcode( $atts ) {
	ob_start();  ?>

	<!-- !Breadcrumbs -->
	<?php if ( !wp_is_mobile()) { ?>
		<div id="breadcrumbs" class="text-light">
			<div>
				<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<span class="trail">','</span>' ); } ?>
			</div>
		</div>
<?php } ?>


<?php $content = ob_get_contents();

ob_end_clean();
return $content;
}
add_shortcode('breadcrumbs', 'breadcrumb_shortcode');


//Greeting Message
function greeting_shortcode( $atts ) {

	ob_start();  ?>

	<div id="message" class="text-white">
		<?php date_default_timezone_set('America/Chicago');
			$Hour = date('G'); ?>

		<?php if (is_home() || is_front_page()){
			if ( $Hour >= 18 || $Hour <= 4 ){ ?>
			<i class='fas fa-moon'></i>
			<?php } ?>
			Welcome &amp;
		<?php } else { //echo 'Good';
		}?>

		<?php if ( $Hour >= 5 && $Hour <= 11 ) {
			    echo "Good morning";
			} else if ( $Hour >= 12 && $Hour <= 17 ) {
			    echo "Good afternoon";
			} else if ( $Hour >= 18 || $Hour <= 0 ) {
			    echo "Good evening";
			} else if ( $Hour >= 0 || $Hour <= 4 ) {
				if (!is_front_page()){
					echo "<i class='fas fa-moon'></i>";
				}
			    echo "Goodnight";
			} ?>
	</div>

<?php $content = ob_get_contents();

ob_end_clean();
return $content;
}
add_shortcode('greeting', 'greeting_shortcode');