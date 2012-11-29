<?php

Route::get('(:bundle)', function()
{
	return View::make('jupload::index');
});

Route::get('(:bundle)/test', function()
{
	return View::make('jupload::test');
});

Route::any('(:bundle)/upload/(:any?)', array('as' => 'upload', function($folder = null)
{
	if ($folder !== null)
		$folder .= '/';

	$upload_handler = IoC::resolve('UploadHandler');

	if ( ! Request::ajax())
		return;

	switch (Request::method())
	{
		case 'OPTIONS':
			break;
		case 'HEAD':
		case 'GET':
			$upload_handler->get($folder);
			break;
		case 'POST':
			if (Input::get('_method') === 'DELETE')
			{				
				$upload_handler->delete($folder);
			}
			else
			{
				$upload_handler->post($folder);
			}
			break;
		default:
			header('HTTP/1.1 405 Method Not Allowed');
	}
}));