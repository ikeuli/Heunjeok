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
      <title>Heunjeok | Home 2</title>
	  <script type='text/javascript' src='js/gen_validatorv31.js'></script>
      <link rel="STYLESHEET" type="text/css" href="css/style.css">
</head>
<body background="/assets/images/background.jpg">
        <img src="/assets/images/heunjeok.png" id="logo" alt="Heunjeok logo">
        <ul id="nav_container">
            <li>
                <div id="logged_in_as">Logged in as: <?= $fgmembersite->UserFullName(); ?></div> 
            </li>
            <li>
                <a href='logout.php'>Logout</a>
            </li>
            <li>
                <a href="contact.html">Contact</a> 
            </li>
        </ul>
        <div id="main_content" align="center">
			<div class="right_column">
				<form>
					wdad name: <input type="text" name="firstname">
				</form> 
            </div>
			<div class="left_column">
				<form>
					First name: <input type="text" name="firstname">
				</form>
            </div>
            <img src="/assets/images/dollarswon.png" alt="Dollar and won sign">
        </div>
    </body>
</html>
