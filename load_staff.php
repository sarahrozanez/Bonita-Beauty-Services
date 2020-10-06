<?php
$myData = $_REQUEST['data'];  //This recieves the data passed from the Send() method

$myData = strtolower($myData);   //Converts the value in $myData to lowercase

header("Content-type: text/xml");  // Makes IE 7 see the returned document as XML!!!
print '<?xml version = "1.0" ?>';

print '<mydata>';
 
//Connect to the Database
				
$host =  'localhost';
$userid =  'root';
$password = '';
$dbname = 'login_course';

$db = mysqli_connect($host, $userid, $password, $dbname);

if (!$db)
{
	print "<h1>Unable to Connect to MySQL</h1>";
	exit;
}

$statement  = "SELECT firstname, lastname, description, email,	phone, image_file ";
$statement .= "FROM staff ";
$statement .= "ORDER BY firstname ";

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
		
		$firstname  	= $row['firstname'];
		$image_file 	= $row['image_file'];
		$description 	= $row['description'];
		$phone 	= $row['phone'];
		$email 	= $row['email'];
		
		print "<staff image='".$image_file."' task='".$firstname."' description =  '".$description."' phone =  '".$phone."' email =  '".$email."'>".$firstname."</staff>";
	}
}

print '</mydata>';

?>