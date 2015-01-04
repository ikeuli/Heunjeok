<?php
	require_once("./include/membersite_config.php");
	session_start();
	
	if ($_POST['systemCall'] == "checkLogin") 
	{
		if(!$fgmembersite->Login())
			print "systemResult=Incorrect username or password.";
		else
			print "systemResult=Success!";
	}
	elseif ($_POST['systemCall'] == "inputStats") 
	{
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
			"' . $fgmembersite->SanitizeForSQL($_POST['category']) . '", 
			"' . $fgmembersite->SanitizeForSQL($_POST['amount']) . '",
			"' . $day . '",
			"' . $month . '",
			"' . $year . '"
			)';
			
		if (!mysql_query($user_info, $connect)) { die('Error: ' . mysql_error()); }
		mysql_close($connect);
		
		if($fgmembersite->getCURR() == 0)
		{
			$mt = $fgmembersite->getMonthlyTotal(1);
			$monthWord = $fgmembersite->getMonthWord(1);
			$formattedMT = number_format($mt, 2, '.', ',');
			$dt = $fgmembersite->getDailyTotal();
			$dayWord = $fgmembersite->getDayWord();
			$formattedDT = number_format($dt, 2, '.', ',');
			print "systemResult=$dayWord Total: $$formattedDT\n$monthWord Total: $$formattedMT";
		}
		elseif($fgmembersite->getCURR() == 1)
		{
			$mt = $fgmembersite->getMonthlyTotal(1);
			$monthWord = $fgmembersite->getMonthWord(1);
			$formattedMT = number_format($mt, 0, '.', ',');
			$dt = $fgmembersite->getDailyTotal();
			$dayWord = $fgmembersite->getDayWord();
			$formattedDT = number_format($dt, 0, '.', ',');
			print "systemResult=$dayWord Total: $formattedDT won\n$monthWord Total: $formattedMT won";
		}
	}
	elseif ($_POST['systemCall'] == "getStats") 
	{
		if($fgmembersite->getCURR() == 0)
		{
			$mt = $fgmembersite->getMonthlyTotal(1);
			$monthWord = $fgmembersite->getMonthWord(1);
			$formattedMT = number_format($mt, 2, '.', ',');
			$dt = $fgmembersite->getDailyTotal();
			$dayWord = $fgmembersite->getDayWord();
			$formattedDT = number_format($dt, 2, '.', ',');
			print "systemResult=$dayWord Total: $$formattedDT\n$monthWord Total: $$formattedMT";
		}
		elseif($fgmembersite->getCURR() == 1)
		{
			$mt = $fgmembersite->getMonthlyTotal(1);
			$monthWord = $fgmembersite->getMonthWord(1);
			$formattedMT = number_format($mt, 0, '.', ',');
			$dt = $fgmembersite->getDailyTotal();
			$dayWord = $fgmembersite->getDayWord();
			$formattedDT = number_format($dt, 0, '.', ',');
			print "systemResult=$dayWord Total: $formattedDT won\n$monthWord Total: $formattedMT won";
		}
	}
?>