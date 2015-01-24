<?php

require_once("./include/membersite_config.php");
session_start();

$connect = mysql_connect("localhost", "heuncxep", "fadfjke11"); 
if (!connect) { die('Connection Failed: ' . mysql_error()); } 
mysql_select_db("heuncxep_heunjeok", $connect);

$user_info = 'INSERT INTO timezone_currency (
	username, 
	timezone, 
	currency
	) 
	VALUES 
	(
	"' . $fgmembersite->SanitizeForSQL($_SESSION['username']) . '", 
	"' . $_POST['TZ'] . '", 
	"' . $_POST['CURR'] . '"
	)';
	
if (!mysql_query($user_info, $connect)) { die('Error: ' . mysql_error()); }
mysql_close($connect); 
	
//$fgmembersite->setUsersTZandCURR();
$fgmembersite->RedirectToURL("tracking-home.php");