<!DOCTYPE html>

<html>
	<head>
		<title>PHP</title>
	</head>

	<body>
		<p>Employer</p>
		
		
		
	
<?php

$serverName = "(local)";
$connectionInfo = array( "Database"=>"Zaxon", "UID"=>"Gard", "PWD"=>"gard123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);




if( $conn === true )
{
	

	$empId = $_POST ['EmployeeID'];
	$fName = $_POST['First_name'];
	$lName= $_POST['Last_name'];
	




	$sql = "INSERT INTO dbo.Employee (EmployeeID,First_name,Last_name)
	VALUES ('$empId', '$fName','$lName')";


    $q1 = sqlsrv_query($conn,$sql);
	if($q1 === false)
	{
		echo "PeaceLate!!!!";
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