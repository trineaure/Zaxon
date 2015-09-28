<!DOCTYPE html>

<html>
	<head>
		<title>PHP</title>
	</head>

	<body>
		<p>Hello World</p>
		
		
		
	
<?php

$serverName = "(local)";
$connectionInfo = array( "Database"=>"GardDatabase", "UID"=>"Gard", "PWD"=>"gard123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);




if( $conn )
{
	

	$fName = $_POST['firstname'];
	$lName= $_POST['lastname'];
	




	$sql = "INSERT INTO dbo.Student (studentID, Firstname, Lastname,Sex)
	VALUES (1002, '$fName','$lName','Female')";


    $q1 = sqlsrv_query($conn,$sql);
	if($q1 === false)
	{
		echo "Heeeello";
		die( print_r( sqlsrv_errors(), true));
	}else{
	echo "success";
	}
	
	
}
else
{
     echo "Connection could not be established.\n";
     die( print_r( sqlsrv_errors(), true));
}


sqlsrv_close( $conn);
?>


	
	</body>

</html>

