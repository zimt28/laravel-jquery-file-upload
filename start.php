<?php

require __DIR__.'/libraries/upload.class.php';

$options = array(
	'script_url' => URL::to_route('upload'),
	'upload_dir' => path('public').'bundles/upload/uploads'.DS.'files/',
	'upload_url' => URL::base().'/bundles/upload/uploads/files/',
	'param_name' => 'files',
	// Set the following option to 'POST', if your server does not support
	// DELETE requests. This is a parameter sent to the client:
	'delete_type' => 'POST',
	// The php.ini settings upload_max_filesize and post_max_size
	// take precedence over the following max_file_size setting:
	'max_file_size' => null,
	'min_file_size' => 1,
	'accept_file_types' => '/.+$/i',
	// The maximum number of files for the upload directory:
	'max_number_of_files' => null,
	// Image resolution restrictions:
	'max_width' => null,
	'max_height' => null,
	'min_width' => 1,
	'min_height' => 1,
	// Set the following option to false to enable resumable uploads:
	'discard_aborted_uploads' => true,
	// Set to true to rotate images based on EXIF meta data, if available:
	'orient_image' => false,
	'image_versions' => array(
		// Uncomment the following version to restrict the size of
		// uploaded images. You can also add additional versions with
		// their own upload directories:
		/*
		'large' => array(
			'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']).'/files/',
			'upload_url' => $this->getFullUrl().'/files/',
			'max_width' => 1920,
			'max_height' => 1200,
			'jpeg_quality' => 95
		),
		*/
		'thumbnail' => array(
			'upload_dir' => path('public').'bundles/upload/uploads'.DS.'thumbnails/',
			'upload_url' => URL::base().'/bundles/upload/uploads/thumbnails/',
			'max_width' => 80,
			'max_height' => 80
		)
	)
);

IoC::singleton('UploadHandler', function() use ($options)
{
	return new UploadHandler($options);
});