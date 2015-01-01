<?php
	require_once("./include/membersite_config.php");
	
	if ($_POST['systemCall'] == "checkLogin") 
	{
		if(!$fgmembersite->Login())
			print "systemResult=Incorrect username or password.";
		else
			print "systemResult=Success!";
	}
?>