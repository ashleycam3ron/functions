<?php
/**
 * This function modifies the main WordPress query to remove
 * pages from search results.
 *
 * @param object $query The main WordPress query.
 */
function ac_exclude_post_from_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
       set_query_var('post__not_in', array( 3497 ) );
    }
}
add_action( 'pre_get_posts', 'ac_exclude_post_from_search_results' );