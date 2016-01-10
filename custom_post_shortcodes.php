<?php
// create shortcode for custom post type

function illazzarone_menu_shortcode( $atts = array(), $content = '' )
{
    $atts = shortcode_atts( array(
        'type' => 'pizze' // default type
    ), $atts, 'square_slider' );

    // Sanitize input:
    $type = sanitize_title( $atts['type'] );

    // Output
    return illazzarone_menu_template( $type );
}

add_shortcode( 'menu', 'illazzarone_menu_shortcode' );


// query/loop
function illazzarone_menu_template( $type = '' )
{
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $args = array(
        'post_type' => 'menu',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'title',
        'tax_query' => array(
	        'relation' => 'AND',
			array(
				'taxonomy' => 'courses',
				'field'    => 'slug',
				'terms'    => $type,
			),
			array(
				'taxonomy' => 'locations',
				'field'    => 'slug',
				'terms'    => array($term->slug),
				'operator' => 'IN'
			),
		),
    );

    // The Query
    $the_query = new WP_Query( $args );

/*
   if ( $the_query->have_posts() ) { ?>
    <div class="row">
        <ul class="menu pizza">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li id="post-<?php the_ID(); ?>" class="col-sm-12">
            	<div class="inner1 col-sm-12">
	            	<?php if ( has_post_thumbnail() ) { ?>
				     	 <?php the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive img-circle col-sm-4'));?>
					 <?php } else { ?>
						<img class="img-responsive img-circle col-sm-4" src="http://placehold.it/130x130">
					 <?php } ?>
	                <div class="col-sm-8">
		                <h4><?php the_title(); ?></h4>
		                <span><?php echo implode(', ', get_field('ingredients2')); ?></span>
		                <?php if ($term->slug == 'st-joseph-mo') { ?>
							<p class="price"><?php the_field('price'); ?></p>
						<?php } else { ?>
							<p class="price"><?php the_field('price2'); ?></p>
						<?php } ?>
					</div>
            	</div>
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php }
*/

if ( $the_query->have_posts() ) { ?>
    <div class="row">
        <ul class="menu pizza">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li id="post-<?php the_ID(); ?>" class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0">
            	<div class="inner1">
	            	<?php if ( has_post_thumbnail() ) { ?>
				     	 <?php the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive img-circle col-sm-12 hidden-xs'));?>
					 <?php } else { ?>
						<img class="img-responsive img-circle col-sm-12 hidden-xs" src="http://placehold.it/130x130">
					 <?php } ?>
	                <div class="col-sm-12">
		                <h4><?php the_title(); ?></h4>
		                <span><?php echo implode(', ', get_field('ingredients2')); ?></span>
		                <?php if ($term->slug == 'st-joseph-mo') { ?>
							<p class="price"><?php the_field('price'); ?></p>
						<?php } else { ?>
							<p class="price"><?php the_field('price2'); ?></p>
						<?php } ?>
					</div>
					<div class="clearfix"></div>
            	</div>
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php }
}