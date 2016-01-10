<?php
add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-portfolio .wp-menu-image {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/image/briefcase.png) no-repeat 6px -17px !important;
        }
        #menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
        
        #menu-posts-bios .wp-menu-image {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/image/xfn-colleague.png) no-repeat 6px -17px !important;
        }
        #menu-posts-bios:hover .wp-menu-image, #menu-posts-bios.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
        
        #menu-posts-sump .wp-menu-image {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/image/cake.png) no-repeat 6px -17px !important;
        }
        #menu-posts-sump:hover .wp-menu-image, #menu-posts-sump.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
        
        #menu-posts-videos .wp-menu-image {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/image/clapperboard.png) no-repeat 6px -17px !important;
        }
        #menu-posts-videos:hover .wp-menu-image, #menu-posts-videos.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
        
        #menu-posts-tales .wp-menu-image {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/image/balloon-ellipsis.png) no-repeat 6px -17px !important;
        }
        #menu-posts-tales:hover .wp-menu-image, #menu-posts-tales.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
<?php } ?>