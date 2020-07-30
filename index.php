<?php

//afisarea erorilor
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// definim structura de directoare
define("BASE_FOLDER", 	__DIR__);
define("CONFIG_FOLDER", BASE_FOLDER . DIRECTORY_SEPARATOR . 'configs');

// define la nivel de aplicatie
define('ADMINISTRATOR', 1);
define('PROFESOR', 2);
define('ELEV', 3);
define('PARINTE', 4);

// pornim sesiunea
session_start();

// ne conectam la baza de date
$configDb = require "configs/db.php";
$conn = new mysqli(
	$configDb['DB_HOST'],
	$configDb['DB_USER'],
	$configDb['DB_PASS'],
	$configDb['DB_NAME']
);

if ($conn->connect_error) {
	die('Eroare conectare baza de date: ' . $conn->connect_error);
}

$conn->query("SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci'");


// incarcam functiile de care are nevoie aplicatia
include "includes/functions.php";


// routarea / accesarea modulelor cerute de utilizator
$config = [];

$config['url'] = require "configs/url.php";

// extragere denumire subdomeniu din URL
define("SUBDOMAIN", parseURL($_SERVER['HTTP_HOST'])['subdomain']);
define("BASE_URL", 'http' . ($config['url']['secure'] ? 's' : '') . '://' .
	(SUBDOMAIN ? SUBDOMAIN . '.' : '') . $config['url']['domain']);

$urlRequest = 	'http' . ($config['url']['secure'] ? 's' : '') . '://' .
	$_SERVER['SERVER_NAME'] .
	$_SERVER['REQUEST_URI'];

// se verifica daca se acceseaza pagina de la o alta adresa decat cea corecta
if (substr($urlRequest, 0, strlen(BASE_URL)) != BASE_URL) {
	die("Nu puteti accesa site-ul de la aceasta adresa.");
}

// selectam aplicatia care se doreste a fi lansata
define("APP_NAME", (SUBDOMAIN == '' ? "presentation" : "school"));

// definim caile aplicatiei dorite
define("FOLDER_APP", 				BASE_FOLDER . '/apps/' . APP_NAME);
define("FOLDER_APP_CONTROLLERS", 	FOLDER_APP . '/controllers');
define("FOLDER_APP_MODELS", 		FOLDER_APP . '/models');
define("FOLDER_APP_VIEWERS", 		FOLDER_APP . '/viewers');

// lansam aplicatia
include FOLDER_APP . "/app.php";
