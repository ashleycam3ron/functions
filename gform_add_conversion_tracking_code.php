<?php // track conversions in Gravity Forms

//contact
function add_conversion_tracking_code($button, $form) {
	$dom = new DOMDocument();
	$dom->loadHTML($button);
	$input = $dom->getElementsByTagName('input')->item(0);
	if ($input->hasAttribute('onclick')) {
		$input->setAttribute("onclick","ga('send', 'event', { eventCategory: 'Forms', eventAction: 'Contact Us', eventLabel: 'Contact'});".$input->getAttribute("onclick"));
	} else {
		$input->setAttribute("onclick","ga('send', 'event', { eventCategory: 'Forms', eventAction: 'Contact Us', eventLabel: 'Contact'});");
	}
	return $dom->saveHtml();
}
//change the button id to match form
add_filter( 'gform_submit_button_2', 'add_conversion_tracking_code', 10, 2);