<?php /* Add Title and Alt Attribute to WordPress Image the_post_thumbnail */
function z3_add_img_title( $attr, $attachment = null ) {
 
    $img_title = trim( strip_tags( $attachment->post_title ) );
    // or get the title instead of image title $attr['title'] = the_title_attribute( 'echo=0' );
    $attr['title'] = $img_title;
    $attr['alt'] = $img_title;
 
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes','z3_add_img_title', 10, 2 );
