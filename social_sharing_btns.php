<?php
/*
function crunchify_social_sharing_buttons($content) {
	// Show this on post and page only. Add filter is_home() for home page
	if(is_singular()){

		// Get current page URL
		$shortURL = get_permalink();

		// Get current page title
		$shortTitle = get_the_title();

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$shortTitle.'&amp;url='.$shortURL.'&amp;via=OmahaTargets';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shortURL;
		$googleURL = 'https://plus.google.com/share?url='.$shortURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$shortURL.'&amp;text='.$shortTitle;

		// Add sharing button at the end of page/page content
		$content .= '<div class="crunchify-social">';
		$content .= '<h5>SHARE ON</h5> <a class="btn-default twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a class="btn-default facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$content .= '<a class="btn-default googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		$content .= '<a class="btn-default buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
		$content .= '</div>';
		//$content .= '<a class="crunchify-link follow-twit" href="http://twitter.com/Crunchify" target="_blank">Follow @Crunchify</a></div>';
		return $content;
	}else{
		// if not post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons');
*/