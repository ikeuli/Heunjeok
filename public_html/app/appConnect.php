<?php
	require_once("/home/heuncxep/public_html/include/fg_membersite.php");
	
	if ($_POST['systemCall'] == "checkLogin") 
	{
		if(!$fgmembersite->Login())
			print "systemResult=Incorrect username or password.";
		else
			print "systemResult=Success!.";
	}
	
	else
		print "systemResult=Incorrect username or password.";
?>