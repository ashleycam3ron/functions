<?php
function custom_login_logo() { 
	$logo = get_stylesheet_directory_uri().'/dir/logo.png';
	if(@file($logo)) : ;
	$l = getimagesize($logo);?>
<style type="text/css">
    body.login div#login h1 a {
        background: url(<?php echo get_stylesheet_directory_uri(); ?>/dir/logo.png) no-repeat center center;
        background-size: contain;
        width:320px;
        height: 172px;
    }
</style>
<?php endif; }
add_action('login_enqueue_scripts', 'custom_login_logo');
function custom_login_logo_link() {
	return get_bloginfo('url');
}
add_filter('login_headerurl','custom_login_logo_link');
function custom_login_logo_tooltip() {
	return get_bloginfo('name');
}
add_filter('login_headertitle', 'custom_login_logo_tooltip');
?>