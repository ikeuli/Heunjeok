<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Heunjeok | Settings</title>
    <link rel="STYLESHEET" type="text/css" href="css/fg_membersite.css" />
    <script type='text/javascript' src='js/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="css/pwdwidget.css" />
    <script src="js/pwdwidget.js" type="text/javascript"></script>  
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" /> 
</head>
<body background="/assets/images/background.jpg">
	<img src="/assets/images/heunjeok.png" id="logo" alt="Heunjeok logo">
	<div id="main_content" align="center">
		<p>Before you get started, choose your time zone and currency</p>
		<form id='TZandCURR' action='user-settings_handler.php' method='post'>
			<select name="TZ" style="width: 450px;">
				<?php foreach($fgmembersite->tz_list() as $t) { ?>
					<option value="<?php print $t['zone']; ?>">
					<?php print $t['diff_from_GMT'] . ' - ' . $t['zone']; ?>
					</option>
				<?php } ?>
			</select>
			</br>
			</br>
			<select name="CURR" style="width: 450px;">
				<option value="0">$ Dollars</option>
				<option value="1">₩ Won</option>
			</select>
			</br>
			</br>
			</br>
			</br>
			<div class='container'>
				<input type='submit' name='Submit' value='Submit' />
			</div>
	</div>
</body>
</html>