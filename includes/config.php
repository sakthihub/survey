<?php 
require("report.class.php");
require("mysqlDb.class.php");
require("mysqlQuery.class.php");
require("common_functions.class.php");

$RO = new report();
if(!file_exists('includes/survey.errlog')):
    $file='../includes/survey.errlog';
else:
    $file='includes/survey.errlog';
endif;
$RO->setLogFile($file);
$CF = new common_functions;
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "survey";
$DO = new mysqlDb($hostname,$username,$password,$database_name,3360,'RO',1);

if(!$DO->isConnected())
{
    // unable to create database access make unavailable
    $GLOBALS['RO']->log_Error("Could not connect to database.");
}
?>