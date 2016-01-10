<?php
function browser_body_class($classes) {
	global $post;
	if(is_home()) $classes[] = 'home';
	if(is_front_page()) $classes[] = 'front_page';
	if(is_404()) $classes[] = '404';
	if(is_search()) $classes[] = 'search';
	if(is_date()) $classes[] = 'date';
	if(is_author()) $classes[] = 'author';
	if(is_category()) $classes[] = 'category';
	if(is_tag()) $classes[] = 'tag';
	if(is_tax()) $classes[] = 'tax';
	if(is_archive()) $classes[] = 'archive';
	if(is_single()) $classes[] = 'single';
	if(is_attachment()) $classes[] = 'attachment';
	if(is_page()) $classes[] = 'page';
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';
	if($is_iphone) $classes[] = 'iphone';
	
	$hua = strtolower($_SERVER['HTTP_USER_AGENT']);
	$browsers = array('firefox','msie','opera','chrome','safari','mozilla','seamonkey','konqueror','netscape','gecko','navigator','mosaic','lynx','amaya','omniweb','avant','camino','flock','aol');
	foreach($browsers as $b){
		if(preg_match("#($b)[/ ]?([0-9.]*)#", $hua, $match)){
			$classes[] = $match[1].'-verion-'.preg_replace('/\./','-',$match[2]);
			break;
		}
	}
	$platforms = array('android','ipad','ipod','blackberry','iphone','win','mac','ppc','linux','os/2','beos');
	foreach($platforms as $p){
		if(preg_match("($p)", $hua, $match)){
			$classes[] = $p;
			break;
		}
	}
	return $classes;
}
add_filter('body_class','browser_body_class');
?>