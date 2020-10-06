<?php 

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		// header('Content-Type: application/json');
		
		$return = [];

		$email = Filter::String( $_POST['email'] );
		$user_found = User::Find($email);
		$email = strtolower($email);

		if($user_found) {
			// User exists 
			// We can also check to see if they are able to log in. 
			$return['error'] = "You already have an account";
			$return['is_logged_in'] = false;
		} else {
			// User does not exist, add them now. 

			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			
			$addUser = $con->prepare("INSERT INTO users(email, password) VALUES(?, ?)");
			$addUser->bind_param('ss', $email, $password);
			$addUser->execute();
			$user_id = mysqli_insert_id($con);
			//$user_id = $con->lastInsertId();

			$_SESSION['user_id'] = (int) $user_id;

			$return['redirect'] = './index.php';
			$return['is_logged_in'] = true;
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script. Redirect the user. Do something regardless.
		exit('Invalid URL');
	}
?>
