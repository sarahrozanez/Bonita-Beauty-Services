<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class Page {
	
	// Force the user to be logged in, or redirect. 
	static function ForceLogin() {
		if(isset($_SESSION['user_id'])) {
			echo '<script>console.log(' . $_SESSION['user_id'] . '); </script>'; 
		} else {
			echo '<script>console.log("No user"); </script>';
			header("Location: ./login.php"); exit;
		}
	}

	static function ForceIndex() {
		if(isset($_SESSION['user_id'])) {
			echo '<script>console.log(' . $_SESSION['user_id'] . '); </script>'; 
			header("Location: ./index.php"); exit;
		} else {
			echo '<script>console.log("No user"); </script>';
		}
	}
}


?>
