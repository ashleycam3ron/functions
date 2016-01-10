<?php
# Static Maps API - Google Code
add_shortcode('google_map', 'shortcode_google_map');
function shortcode_google_map($atr, $title = NULL){
	$args = shortcode_atts(array(
		'center' => '37.0902405,-95.7128906',
		'zoom' => '10',
		'size' => '400x200',
		'scale' => '1',
		'sensor' => 'false',
		'maptype' => 'roadmap',
		'format' => 'png',
		'markers' => $atr['center']
	), $atr);
	
	$html = ($title != NULL) ? '<h4>' . $title . '</h4>' : NULL;
	$html .= '<img title="'. $title .'" alt="'. $title .'" src="http://maps.googleapis.com/maps/api/staticmap?';
	foreach($args as $k => $v){
		$html .= $k . '=' . urlencode($v) . '&';
	}
	$html .= '"/>';
	return $html;
}
?>