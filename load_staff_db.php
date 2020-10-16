<?php
$myData = $_REQUEST['data'];  //This recieves the data passed from the Send() method

$myData = strtolower($myData);   //Converts the value in $myData to lowercase

header("Content-type: text/xml");  // Makes IE 7 see the returned document as XML!!!
print '<?xml version = "1.0" ?>';

print '<mydata>';

// Allow the config
define('__CONFIG__', true);
// Include the DB.php file;
include_once "./inc/classes/DB.php";

//Connect to the Database
$db = DB::getConnection();
				
if (!$db)
{
	print "<h1>Unable to Connect to MySQL</h1>";
	exit;
}

$statement  = "SELECT staff_id, firstname, lastname, description, phone, street, city, state, image_file ";
$statement .= "FROM staff ";
$statement .= "ORDER BY staff_id ";

$result = mysqli_query($db, $statement);

if (!$result) {
	$output  = "ERROR MySQL No: ".mysqli_errno($db)." ";
	$output .= "MySQL Error: ".mysqli_error($db)." ";
	$output .= "SQL: ".$statement." ";
	print "<service>".$output."</service>";
	
} else {
		
	$numresults = mysqli_num_rows($result);
	
	//print "<br>numresults: ".$numresults."<br>";

	for ($i = 0; $i < $numresults; $i++)
	{
		$row = mysqli_fetch_array($result);
		
		$staff_id  		= $row['staff_id'];
		$firstname  		= $row['firstname'];
		$lastname  		= $row['lastname'];
		$description  		= $row['description'];
		$phone 	= $row['phone'];
		$street 	= $row['street'];
		$city 	= $row['city'];
		$state 	= $row['state'];
		$image_file 	= $row['image_file'];
	
		print "<about staff_id='".$staff_id."' image='".$image_file."' description='".$description."'>".$firstname."</about>";
	}
}

print '</mydata>';

?>