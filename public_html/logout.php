<?PHP
require_once("./include/membersite_config.php");
session_start();
$_SESSION['refresh_stats'] = 1;

$fgmembersite->LogOut();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
      <script type='text/javascript' src='js/gen_validatorv31.js'></script>
	  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" /> 
</head>
<body>

<h2>You have logged out</h2>
<p>
<a href='login.php'>Login Again</a>
</p>

</body>
</html>