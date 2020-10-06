<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class DB {

	protected static $con;

	private function __construct() {

		try {

            self::$con = mysqli_connect ('localhost', 'root', '', 'login_course');

            # set encoding to match PHP script encoding
            mysqli_set_charset(self::$con, 'utf8');
            
		} catch (PDOException $e) {
			echo "Could not connect to database."; exit;
		}
	}

	public static function getConnection() {

		if (!self::$con) {
			new DB();
		}

		return self::$con;
	}
}
?>
