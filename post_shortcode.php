<?php
// Add Shortcode
add_shortcode( 'team', 'team_shortcode' );
function team_shortcode( $atts ) {
	ob_start();

	// Attributes
	extract( shortcode_atts(
		array(
			'type' => 'post',
			'category' => 'team',
			'order' => 'date',
			'orderby' => 'title',
			'posts' => -1
		), $atts ) );

	// define query parameters based on attributes
    $args = array(
        'post_type' => $type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'category_name' => $category,
    );

	// The Query
	$the_query = new WP_Query( $args );

	$category_id = get_cat_ID($category);

	if ( $the_query->have_posts() ) {
		$category1 = get_the_category();
	?>
	    <section class="cat-<?php echo $category_id; ?>">
	    	<h2><span><?php echo $category; ?></span></h2>
	        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	        <article>
	            <a href="#post-<?php the_ID(); ?>" class="fancybox">
		            <div class="mask"></div>
		        	<?php if (has_post_thumbnail()){  the_post_thumbnail('thumbnail'); } else { ?>
						<img class="img-responsive pull-left col-sm-12 hidden-xs" src="http://placehold.it/200x311">
					 <?php } ?>
		            <div class="col-sm-12">
		                <h3><?php the_title(); ?></h3>
		                <?php if (get_field('title')) { ?><h4><?php the_field('title');?></h4><?php } ?>
		                <?php if (get_field('email')) { ?>
		                	<div class="email"><a href="mailto:<?php the_field('email');?>"><i class="glyphicon glyphicon-envelope"></i> Email</a></div>
		                <?php } ?>
					</div>
	            </a>
	            <div id="post-<?php the_ID(); ?>" class="member">
		            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 text-center left">
		            	<?php the_post_thumbnail('medium', array('class'=>'img-responsive')); ?>
		            	<div class="email"><a href="mailto:<?php the_field('email');?>"><i class="glyphicon glyphicon-envelope"></i> Email</a></div>
		            </div>
		            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-0">
			            <h3><span><?php the_title(); ?></span></h3>
			            <h4><?php the_field('title');?></h4>
			            <?php the_content(); ?>
			            <img class="detail" src="<?php echo get_stylesheet_directory_uri();?>/dir/images/detail.png"/>
		            </div>
		            <div class="clearfix"></div>
		            <div class="corner"></div>
	            </div>
	        </article>
	        <?php endwhile;
	        wp_reset_postdata(); ?>
	    </section>
	<?php }
}