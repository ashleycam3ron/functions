<?php
register_sidebar(array(
	'name'=>'Header Widgets',
	'description'=>'Uppermost row from header.php (on every page)',
	'id'=>'header-widgets',
	'before_widget'=>'<li id="%1$s" class="widget %2$s">',
	'before_title'=>'<h3 class="hidden">',
	'after_title'=>'</h3>'
));
register_sidebar(array(
	'name'=>'Sidebar Widgets',
	'description'=>'Common widgets in the sidebar on all pages.',
	'id'=>'sidebar-widgets',
	'before_widget'=>'<li id="%1$s" class="widget %2$s">',
	'before_title'=>'<h3 class="">',
	'after_title'=>'</h3>'
));
register_sidebar(array(
	'name'=>'Blog Sidebar',
	'description'=>'Blog archive widgets',
	'id'=>'blog-widgets',
	'before_widget'=>'<li id="%1$s" class="widget %2$s">',
	'before_title'=>'<h3 class="">',
	'after_title'=>'</h3>'
));
?>