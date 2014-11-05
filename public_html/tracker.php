<?php
/*require_once("./include/session_start.php");*/
require_once("./include/membersite_config.php");
session_start();

$connect = mysql_connect("localhost", "heuncxep", "fadfjke11"); 
if (!connect) { die('Connection Failed: ' . mysql_error()); } 
mysql_select_db("heuncxep_heunjeok", $connect);

$day = $fgmembersite->getDay();
$month = $fgmembersite->getMonth(1);
$year = $fgmembersite->getYear(1);

$user_info = 'INSERT INTO spending_data (
	username, 
	category, 
	amount,
	day,
	month,
	year
	) 
	VALUES 
	(
	"' . $fgmembersite->SanitizeForSQL($_SESSION['username']) . '", 
	"' . $fgmembersite->SanitizeForSQL($_POST['spending_category']) . '", 
	"' . $fgmembersite->SanitizeForSQL($_POST['amount_spent']) . '",
	"' . $day . '",
	"' . $month . '",
	"' . $year . '"
	)';
	
if (!mysql_query($user_info, $connect)) { die('Error: ' . mysql_error()); }
mysql_close($connect); 

$fgmembersite->RedirectToURL("tracking-home.php");

/*header("Location: http://heunjeok.com/tracking-home.php");*/

?>