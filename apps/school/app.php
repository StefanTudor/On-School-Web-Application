<?php

$resourceRequest = substr($urlRequest, strlen(BASE_URL));

if (strpos($resourceRequest, '?') !== false)
	$resourceRequest = strstr($resourceRequest, '?', true);

switch ($resourceRequest) {

	case "/":

		$_SESSION['user'] = null;

		require_once FOLDER_APP_CONTROLLERS . '/login_controller.php';

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		include FOLDER_APP_VIEWERS . "/login.php";

		break;

	case "/admin":

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === ADMINISTRATOR ?
			include FOLDER_APP_VIEWERS . "/admin.php" : header("Location: /");

		break;

	case "/elev":

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === ELEV ?
			include FOLDER_APP_VIEWERS . "/elev.php" : header("Location: /");

		break;

	case "/elev/orar":

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';


		isset($_SESSION['user']) && $_SESSION['tipCont'] === ELEV ?
			include FOLDER_APP_VIEWERS . "/orar-elev.php" : header("Location: /");

		break;

	case "/elev/note":

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === ELEV ?
			include FOLDER_APP_VIEWERS . "/note.php" : header("Location: /");

		break;

	case "/elev/calendar":

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === ELEV ?
			include FOLDER_APP_VIEWERS . "/calendar.php" : header("Location: /");

		break;

	case "/elev/lista-profesori":

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === ELEV ?
			include FOLDER_APP_VIEWERS . "/lista-profesori.php" : header("Location: /");

		break;

	case "/profesor":

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === PROFESOR ?
			include FOLDER_APP_VIEWERS . "/profesor.php" : header("Location: /");

		break;

	case "/profesor/orar":

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/profesor_controller.php';

		isset($_SESSION['user']) && ($_SESSION['tipCont'] === PROFESOR || $_SESSION['tipCont'] === ELEV) ?
			include FOLDER_APP_VIEWERS . "/orar-profesor.php" : header("Location: /");


		break;

	case "/profesor/note":

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/profesor_controller.php';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === PROFESOR ?
			include FOLDER_APP_VIEWERS . "/note-elevi.php" : header("Location: /");

		break;

	case "/profesor/calendar":

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === PROFESOR ?
			include FOLDER_APP_VIEWERS . "/calendar.php" : header("Location: /");

		break;

	case "/profesor/lista-profesori":

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === PROFESOR ?
			include FOLDER_APP_VIEWERS . "/lista-profesori.php" : header("Location: /");

		break;

	case "/parinte":

		require_once FOLDER_APP_CONTROLLERS . '/parinte_controller.php';

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === PARINTE ?
			include FOLDER_APP_VIEWERS . "/parinte.php" : header("Location: /");

		break;

	case "/parinte/orar":

		require_once FOLDER_APP_CONTROLLERS . '/parinte_controller.php';

		// setari SEO
		$seo['meta_title'] = '';
		$seo['meta_description'] = '';

		isset($_SESSION['user']) && $_SESSION['tipCont'] === PARINTE ?
			include FOLDER_APP_VIEWERS . "/orar-parinte.php" : header("Location: /");

		break;

	case "/data":

		require_once FOLDER_APP_CONTROLLERS . '/data_controller.php';

		break;

	case "/dataProf":

		require_once FOLDER_APP_CONTROLLERS . '/profesor_controller.php';

		break;

	default:

		header("HTTP/1.0 404 Not Found");

		break;
}
