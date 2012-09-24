<?php

require __DIR__.'/libraries/upload.class.php';

foreach (Config::get('jupload::settings') as $key => $val) {
	$options[$key] = $val;
}

IoC::singleton('UploadHandler', function() use ($options)
{
	return new UploadHandler($options);
});