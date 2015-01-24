<?php

require_once("./include/membersite_config.php");
session_start();

$tokens = explode(" ", $_POST['view_month']);
$_SESSION['month'] = $tokens[0];
$_SESSION['year'] = $tokens[1];
$_SESSION['refresh_stats'] = 0;

$fgmembersite->RedirectToURL("mystats.php");

?>