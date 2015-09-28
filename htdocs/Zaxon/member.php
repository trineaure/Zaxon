<!DOCTYPE html>

<html>
	<head>
		<title>PHP</title>
	</head>

	<body>
		<p>Member</p>
		
		
		
	
<?php

$serverName = "(local)";
$connectionInfo = array( "Database"=>"Zaxon", "UID"=>"Gard", "PWD"=>"gard123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);




if( $conn )
{
	

	$membNumb = $_POST ['Membership_number'];
	$fName = $_POST['First_name'];
	$lName= $_POST['Last_name'];
	$birth= $_POST['Birth'];
	




	$sql = "INSERT INTO dbo.Member (Membership_number,First_name,Last_name,Birth)
	VALUES ('$membNumb', '$fName','$lName','$birth')";


    $q1 = sqlsrv_query($conn,$sql);
	if($q1 === false)
	{
		echo "Peacelate!!";
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