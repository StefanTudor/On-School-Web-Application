<?php

	$resourceRequest = substr($urlRequest, strlen(BASE_URL));

	if( strpos($resourceRequest, '?') !== false )
		$resourceRequest = strstr($resourceRequest, '?', true);

	switch ($resourceRequest) {

		case "/":

			// setari SEO
			$seo['meta_title'] = '';
			$seo['meta_description'] = '';

			include FOLDER_APP_VIEWERS . "/homepage.php";

			break;

		case "/inregistrare":

			require_once FOLDER_APP_CONTROLLERS . '/register_controller.php';

			// setari SEO
			$seo['meta_title'] = '';
			$seo['meta_description'] = '';
			
			include FOLDER_APP_VIEWERS . "/inregistrare.php";

			break;

		case "/data":

			require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

			break;

		default:

			header("HTTP/1.0 404 Not Found");

			break;
	}
