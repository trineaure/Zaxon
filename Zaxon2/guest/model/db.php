<?php

require_once("memberModel.php");
require_once("employeeModel.php");

//Create DB connection
$dbConn = new PDO("sqlsrv:Server=$DB_HOST;Database=$DB_NAME", $DB_USER, $DB_PWD);

//Create data models
$memberModel = new memberModel($dbConn);
$employeeModel = new employeeModel($dbConn);