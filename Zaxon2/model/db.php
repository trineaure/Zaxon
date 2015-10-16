<?php

require_once("employeeModel.php");
require_once("memberModel.php");
//require_once("reservationModel.php");
//require_once("treatmentModel.php");

//Create DB connection
$dbConn = new PDO("sqlsrv:Server=$DB_HOST;Database=$DB_NAME", $DB_USER, $DB_PWD);

//Create data models
$employeeModel = new employeeModel($dbConn);
$memberModel = new memberModel($dbConn);
//$reservationModel = new reservationModel($dbConn);
//$treatmentModel = new treatmentModel($dbConn);