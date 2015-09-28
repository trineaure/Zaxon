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
     echo "Connection established.\n";
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

