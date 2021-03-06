<?PHP
	require_once("./include/membersite_config.php");
	session_start();
	$_SESSION['refresh_stats'] = 1;

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
		  <title>Heunjeok | App Demo</title>
		  <link rel="stylesheet" type="text/css" href="css/style.css" />
		  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" /> 
	</head>
	
	<body background="assets/images/background.jpg">
		<img src="assets/images/heunjeok.png" id="logo" alt="Heunjeok logo">
		<ul id="nav_container">
            <li>
                <div id="logged_in_as">Logged in as: <?= $fgmembersite->UserFullName(); ?></div> 
            </li>
			<li>
                <a href='tracking-home.php'>Input Page</a>
            </li>
			<li>
                <a href='mystats.php'>My Stats</a>
            </li>
            <li>
                <a href='logout.php'>Logout</a>
            </li>
        </ul>
		<br/>
		<div id="main_content" align="center">
			<object width="640" height="960">
				<param name="movie" value="http://heunjeok.com/heunjeok/assets/flash/login.swf">
				<embed src="http://heunjeok.com/heunjeok/assets/flash/login.swf" width="640" height="960">
				</embed>
			</object>
			<br/>
			<img src="assets/images/dollarswon.png" alt="Dollar and won sign">
		</div>
	</body>
</html>