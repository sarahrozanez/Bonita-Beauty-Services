<?php 

	// If there is no constant defined called __CONFIG__, do not load this file 
	if(!defined('__CONFIG__')) {
		exit('You do not have a config file');
	}

		// Sessions are always turned on
		if(!isset($_SESSION)) {
			session_start();
		}
	

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// Include the DB.php file;
	include_once "classes/DB.php";
	include_once "classes/Filter.php";
	include_once "classes/Page.php";
	include_once "classes/User.php";


	$con = DB::getConnection();

?>
