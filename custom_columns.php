<?php

/* Custom Columns

	http://olliebarker.co.uk/articles/2014/06/displaying-custom-fields-wordpress-admin-post-lists/
*/


add_filter('manage_menu_posts_columns', 'bs_menu_table_head');
function bs_menu_table_head( $columns ) {

    $columns['price']  = 'Price';
    return $columns;

}
add_action( 'manage_menu_posts_custom_column', 'bs_menu_table_content', 10, 2 );

function bs_menu_table_content( $column_name, $post_id ) {

    if( $column_name == 'price' ) {
        $project_category = get_post_meta( $post_id, 'price', true );
        echo $project_category;
    }
}


/*  Add to Quick Edit
	http://shibashake.com/wordpress-theme/expand-the-wordpress-quick-edit-menu
*/

// Add to our admin_init function
/*
add_action('quick_edit_custom_box',  'shiba_add_quick_edit', 10, 2);

function shiba_add_quick_edit($column_name, $post_type) {
    if ($column_name != 'price') return;
    ?>
    <fieldset class="inline-edit-col-left">
    <div class="inline-edit-col">
        <span class="title">Price</span>
        <input type="hidden" name="shiba_widget_set_noncename" id="shiba_widget_set_noncename" value="" />
        <input name="price" />
    </div>
    </fieldset>
    <?php
}

// Add to our admin_init function
add_action('save_post', 'shiba_save_quick_edit_data');

function shiba_save_quick_edit_data($post_id) {
    // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
    // to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;
    // Check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }
    // OK, we're authenticated: we need to find and save the data
    $post = get_post($post_id);
    if (isset($_POST['post_widget_set']) && ($post->post_type != 'revision')) {
        $widget_set_id = esc_attr($_POST['post_widget_set']);
        if ($widget_set_id)
            update_post_meta( $post_id, 'post_widget', $widget_set_id);
        else
            delete_post_meta( $post_id, 'post_widget');
    }
    return $widget_set_id;
}

// Add to our admin_init function
add_action('admin_footer', 'shiba_quick_edit_javascript');

function shiba_quick_edit_javascript() {
    global $current_screen;
    if (($current_screen->id != 'edit-post') || ($current_screen->post_type != 'post')) return;

    ?>
    <script type="text/javascript">
    <!--
    function set_inline_widget_set(widgetSet, nonce) {
        // revert Quick Edit menu so that it refreshes properly
        inlineEditPost.revert();
        var widgetInput = document.getElementById('post_widget_set');
        var nonceInput = document.getElementById('shiba_widget_set_noncename');
        nonceInput.value = nonce;
        // check option manually
        for (i = 0; i < widgetInput.options.length; i++) {
            if (widgetInput.options[i].value == widgetSet) {
                widgetInput.options[i].setAttribute("selected", "selected");
            } else { widgetInput.options[i].removeAttribute("selected"); }
        }
    }
    //-->
    </script>
    <?php
}
// Add to our admin_init function
add_filter('post_row_actions', 'shiba_expand_quick_edit_link', 10, 2);

function shiba_expand_quick_edit_link($actions, $post) {
    global $current_screen;
    if (($current_screen->id != 'edit-post') || ($current_screen->post_type != 'post')) return $actions;

    $nonce = wp_create_nonce( 'shiba_widget_set'.$post->ID);
    $widget_id = get_post_meta( $post->ID, 'post_widget', TRUE);
    $actions['inline hide-if-no-js'] = '<a href="#" class="editinline" title="';
    $actions['inline hide-if-no-js'] .= esc_attr( __( 'Edit this item inline' ) ) . '" ';
    $actions['inline hide-if-no-js'] .= " onclick=\"set_inline_widget_set('{$widget_id}', '{$nonce}')\">";
    $actions['inline hide-if-no-js'] .= __( 'Quick&nbsp;Edit' );
    $actions['inline hide-if-no-js'] .= '</a>';
    return $actions;
}
*/