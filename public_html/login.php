<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
		if ($fgmembersite->checkUsersTimezone())
		{
			//$fgmembersite->setUsersTZandCURR();
			$fgmembersite->RedirectToURL("tracking-home.php");
		}
		else
			$fgmembersite->RedirectToURL("user-settings.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Heunjeok | Login</title>
      <link rel="STYLESHEET" type="text/css" href="css/fg_membersite.css" />
      <script type='text/javascript' src='js/gen_validatorv31.js'></script>
	  <link rel="stylesheet" type="text/css" href="/css/style.css" />
	  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" /> 
</head>
<body background="/assets/images/background.jpg">
	<img src="/assets/images/heunjeok.png" id="logo" alt="Heunjeok logo">
	<!--<ul id="nav_container">
		<li>
			<a href="index.html">Home</a>
		</li>
		<li>
			<a href="register.php">Sign Up</a>
		</li>
		<li>
			<a href="login.php">Log In</a>
		</li>
		<li>
			<a href="contact.html">Contact</a>
		</li>
	</ul>-->

<!-- Form Code Start -->
<div id="main_content" align="center">
<div id='fg_membersite'>
<form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='username' >UserName*:</label><br/>
    <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
    <span id='login_username_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='password' >Password*:</label><br/>
    <input type='password' name='password' id='password' maxlength="50" /><br/>
    <span id='login_password_errorloc' class='error'></span>
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>
<div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div>
</fieldset>
</form>
<p class="p2">Not a member? <a href="register.php">Register</a> now.</p>
<img src="/assets/images/dollarswon.png" alt="Dollar and won sign">

<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>