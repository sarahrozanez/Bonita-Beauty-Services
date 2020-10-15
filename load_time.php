<?php
$myData = $_REQUEST['data'];  //This recieves the data passed from the Send() method
$staff_value = $_REQUEST['staff_value'];
$serv_id = $_REQUEST['serv_id'];
$date = $_REQUEST['date'];
$myData = strtolower($myData);   //Converts the value in $myData to lowercase

header("Content-type: text/xml");  // Makes IE 7 see the returned document as XML!!!
print '<?xml version = "1.0" ?>';

print '<mydata>';
 
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

$statement  = "SELECT ss.staff_service_id, ss.date, ss.time FROM staff_service ss, staff s WHERE s.staff_id = ss.staff_id AND s.firstname = '$staff_value' and ss.service_id = $serv_id and ss.date = '$date'";

$result = mysqli_query($db, $statement);

if (!$result) {
	$output  = "ERROR MySQL No: ".mysqli_errno($db)." ";
	$output .= "MySQL Error: ".mysqli_error($db)." ";
	$output .= "SQL: ".$statement." ";
	print "<staff>".$output."</staff>";
	
} else {
		
	$numresults = mysqli_num_rows($result);
	
	//print "<br>numresults: ".$numresults."<br>";

	for ($i = 0; $i < $numresults; $i++)
	{
		$row = mysqli_fetch_array($result);
		
		$date  	= $row['date'];
		$time 	= $row['time'];
		$staff_service_id 	= $row['staff_service_id'];
		
		print "<daytime date='".$date."' time='".$time."'>".$time."</daytime>";
	}
}

print '</mydata>';

?>