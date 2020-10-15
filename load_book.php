<?php

	// Allow the config
	define('__CONFIG__', true);

	// Require the config
	require_once "inc/config.php"; 
	
$myData = $_REQUEST['data'];  //This recieves the data passed from the Send() method
$staff_value = $_REQUEST['staff_value'];
$serv_id = $_REQUEST['serv_id'];
$date = $_REQUEST['date'];
$time = $_REQUEST['time'];
//$User = new User($_SESSION['user_id']);
$user_id = $_SESSION['user_id'];
$myData = strtolower($myData);   //Converts the value in $myData to lowercase

header("Content-type: text/xml");  // Makes IE 7 see the returned document as XML!!!
print '<?xml version = "1.0" ?>';
 
//Connect to the Database
				
$host =  'localhost';
$userid =  'root';
$password = '';
$dbname = 'proj_beauty';

$db = mysqli_connect($host, $userid, $password, $dbname);

if (!$db)
{
	print "<h1>Unable to Connect to MySQL</h1>";
	exit;
}
//get the staff ID
$statementStaffID  = "SELECT staff_id FROM staff WHERE firstname = '$staff_value'";
$resultStaffID = mysqli_query($db, $statementStaffID);

if (!$resultStaffID) {
	$outputStaffID  = "ERROR MySQL No: ".mysqli_errno($db)." ";
	$outputStaffID .= "MySQL Error: ".mysqli_error($db)." ";
	$outputStaffID .= "SQL: ".$statementStaffID." ";
	print "<staff>".$outputStaffID."</staff>";
	
} else {
		
	$numresultsStaffID = mysqli_num_rows($resultStaffID);
	
	//print "<br>numresults: ".$numresults."<br>";

	for ($i = 0; $i < $numresultsStaffID; $i++)
	{
		$rowStaffID = mysqli_fetch_array($resultStaffID);
		$staff_id  	= $rowStaffID['staff_id'];
	}
}

//get the staff_service_id

$statementSSID  = "SELECT staff_service_id FROM staff_service WHERE staff_id = $staff_id AND service_id = $serv_id and date = '$date' and time = '$time'";
$resultSSID = mysqli_query($db, $statementSSID);

if (!$resultSSID) {
	$outputSSID  = "ERROR MySQL No: ".mysqli_errno($db)." ";
	$outputSSID .= "MySQL Error: ".mysqli_error($db)." ";
	$outputSSID .= "SQL: ".$statementSSID." ";
	print "<staff>".$outputSSID."</staff>";
	
} else {
		
	$numresultsSSID= mysqli_num_rows($resultSSID);
	
	//print "<br>numresults: ".$numresults."<br>";

	for ($i = 0; $i < $numresultsSSID; $i++)
	{
		$rowSSID= mysqli_fetch_array($resultSSID);
		$staff_service_id  	= $rowSSID['staff_service_id'];
	}
}


//insert into service_request

$statementInsert  = "INSERT INTO `service_request` (`staff_service_id`, `user_id`) VALUES ($staff_service_id, $user_id)";

$resultINS = mysqli_query($db, $statementInsert);

if (!$resultINS) {
	$outputINS  = "ERROR MySQL No: ".mysqli_errno($db)." ";
	$outputINS .= "MySQL Error: ".mysqli_error($db)." ";
	$outputINS .= "SQL: ".$statementInsert." ";
	print "<error>".$outputINS."</error>";
	
} else {

	print "<requestID>".mysqli_insert_id($db)."</requestID>";
}
?>