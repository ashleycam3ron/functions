<?php
// get taxonomies terms links
function custom_taxonomies_terms_links(){
  // get post by post id
  $post = get_post( $post->ID );

  // get post type by post
  $post_type = $post->post_type;

  // get post type taxonomies
  $taxonomies = get_object_taxonomies( $post_type, 'objects' );

  $out = array();
  foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

    // get the terms related to post
    $terms = get_the_terms( $post->ID, $taxonomy_slug );

    if ( !empty( $terms ) ) {
      //$out[] = $taxonomy->label;
      foreach ( $terms as $term ) {
        //echo $term->slug;
        //echo $taxonomy_slug;
        echo $term->slug;
      }
    }
  }

  return implode('', $out );
}