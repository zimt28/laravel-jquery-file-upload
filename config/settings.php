<?php

return array(
	'script_url' => URL::to_route('upload'),
	'upload_dir' => path('public').'bundles/jupload/uploads'.DS.'files/',
	'upload_url' => URL::base().'/bundles/jupload/uploads/files/',
	'delete_type' => 'POST',
	'image_versions' => array(
		'thumbnail' => array(
			'upload_dir' => path('public').'bundles/jupload/uploads'.DS.'thumbnails/',
			'upload_url' => URL::base().'/bundles/jupload/uploads/thumbnails/',
		),
	),
);