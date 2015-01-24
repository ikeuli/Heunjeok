<?PHP
require_once("./include/membersite_config.php");
session_start();
$_SESSION['refresh_stats'] = 1;

$fgmembersite->LogOut();
$fgmembersite->RedirectToURL("login.php");
?>