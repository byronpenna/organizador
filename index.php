<?php 
	header('Content-Type: text/html; charset=UTF-8');
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	require_once 'app/autoload.php';
	new Startup();
?>