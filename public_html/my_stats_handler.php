<?php

require_once("./include/membersite_config.php");
//session_start();

echo $_POST['view_month'];
$tokens = explode(" ", $_POST['view_month']);
echo $tokens[0];
echo $tokens[1];

//$fgmembersite->RedirectToURL("mystats.php");

?>