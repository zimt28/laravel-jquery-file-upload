<?php

Route::get('(:bundle)', function()
{
	return View::make('upload::index');
});

Route::get('(:bundle)/test', function()
{
	return View::make('upload::test');
});

Route::any('(:bundle)/upload', array('as' => 'upload', function()
{
	$upload_handler = IoC::resolve('UploadHandler');

	header('Pragma: no-cache');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Content-Disposition: inline; filename="files.json"');
	header('X-Content-Type-Options: nosniff');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
	header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');

	switch (Request::method())
	{
		case 'OPTIONS':
			break;
		case 'HEAD':
		case 'GET':
			$upload_handler->get();
			break;
		case 'POST':
			if (Input::get('_method') === 'DELETE')
			{
				$upload_handler->delete();
			}
			else
			{
				$upload_handler->post();
			}
			break;
		case 'DELETE':
			$upload_handler->delete();
			break;
		default:
			header('HTTP/1.1 405 Method Not Allowed');
	}
}));