<?php function isa_add_img_title( $attr, $attachment = null ) {
    $img_title = trim( strip_tags( $attachment->post_title ) );
    $attr['title'] = $img_title;
    // or get the title instead of image title $attr['title'] = the_title_attribute( 'echo=0' );
    $attr['alt'] = $img_title;
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes','isa_add_img_title', 10, 2 );