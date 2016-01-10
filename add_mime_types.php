<?php
add_filter('upload_mimes','add_custom_mime_types');
	function add_custom_mime_types($mimes){
		return array_merge($mimes,array (
			'dwg' => 'application/dwg',
			'dwg1' => 'drawing/dwg',
			'dwg2' => 'image/x-dwg',
            'svg' => 'image/svg+xml'
		));
	}