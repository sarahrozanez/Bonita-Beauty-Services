<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class User {

	private $con;

	public $user_id;
	public $email;
	public $reg_time;

	public function __construct(int $user_id) {
		$this->con = DB::getConnection();

		$user_id = Filter::Int( $user_id );

		// prepare and bind
		$user = $this->con->prepare("SELECT user_id, email, reg_time FROM users WHERE user_id = ? LIMIT 1");
		$user->bind_param('i', $user_id);
		$user->execute();


		//$row_cnt = $user->num_rows;
		//echo '<script>console.log(' . $user->num_rows . '); </script>'; 
		//if(row_cnt === 1) {

			$result = $user->get_result();
			$user = $result->fetch_assoc();

			$this->email 		= (string) $user["email"]; 
			$this->user_id 		= (int) $user["user_id"];  
			$this->reg_time 	= (string) $user["reg_time"];

		//} else {
			// No user.
			// Redirect to to logout.
			//header("Location: ./logout.php"); exit;
		//}
	}

	public function setEmail($new_email) {

		// $User = new User(1);
		// $User->setEmail("new@email.com");

		// echo $this->email; // The current email address
		// echo $this->user_id; // The existing user id
		
		// $this->con->prepare("...")		
	}


	public static function Find($email, $return_assoc = false) {

		$con = DB::getConnection();
		
		// Make sure the user does not exist. 
		$email = (string) Filter::String( $email );
		if($findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = ? LIMIT 1")){
		$findUser->bind_param("s", $email);
		$findUser->execute();


		if($return_assoc) {

			$result = $findUser->get_result();
			return $result->fetch_assoc();
		}

		$rowf_cnt = $findUser->num_rows;
		$user_found = (boolean) $rowf_cnt;

		$findUser->close();
		return $user_found;
	}
	$con-->close();
}

}
?>
