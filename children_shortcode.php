<?php
//tell wordpress to register the children-content shortcode
//example usage echo do_shortcode('[children-content id="18"]');
add_shortcode("children-content", "sc_show_children_content");
function sc_show_children_content($atts, $content = null){
		
	if(isset($atts['id']) && is_numeric($atts['id'])){
		//id specified by shortcode attribute
		$parent_id = $atts['id'];
	} else {
		//get the id of the current article that is calling the shortcode
		$parent_id = get_the_ID();
	}
	
	$output = "";
	$i = 0;
	$args = array(
		'post_parent' => $parent_id,
		'post_status' => 'publish',
		'post_type' => 'page',
		'orderby' => 'title',
		'order'=> 'ASC'
	);
	
	if(isset($atts['order'])) $args['order'] = $atts['order'];
	if(isset($atts['orderby'])) $args['orderby'] = $atts['orderby'];
	
	if ( $children = get_children($args)){ 
		foreach( $children as $child ) { ?>
			
			<article class="col-xs-6 <?php if (count($children) == 4) { ?>col-sm-6 <?php } else { ?>col-sm-4<?php } ?> col-sm-offset-0 child">
				<div class="row">
					<a href="<?php the_permalink($child->ID); ?>">
					<?php if ( get_the_post_thumbnail($child->ID) ) { echo get_the_post_thumbnail($child->ID,'Grid');
					 } else { ?>
						<img class="img-responsive" src="http://placehold.it/600x400/39b54a/ffffff" alt="placeholder"/>
					<?php } ?>
					</a>
				</div>
				<div class="col-xs-12">
					<a href="<?php the_permalink($child->ID); ?>">
					  <h1><?php echo $child->post_title;?></h1>
					  <?php the_excerpt(); ?>
					</a>
				</div>
			</article>
			
		<?php }
	} 
	return $output;

}
