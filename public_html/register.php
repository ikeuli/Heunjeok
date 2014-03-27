<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.html");
   }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Heunjeok | Sign Up</title>
    <link rel="STYLESHEET" type="text/css" href="css/fg_membersite.css" />
    <script type='text/javascript' src='js/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="css/pwdwidget.css" />
    <script src="js/pwdwidget.js" type="text/javascript"></script>      
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body background="http://huntsy.com/assets/blue_thatch.png">
	<img src="/assets/images/heunjeok.png" id="logo" alt="Heunjeok logo">
		<ul id="nav_container">
            <li>
                <a href="index.html">Home</a> 
            </li>
            <li>
                <a href="register.php">Sign Up</a> 
            </li>
            <li>
                <a href="login.html">Log In</a> 
            </li>
            <li>
                <a href="contact.html">Contact</a> 
            </li>
        </ul>

<!-- Form Code Start -->
<div id="main_content" align="center">
<div id='fg_membersite'>
<form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Register</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='username' >UserName*:</label><br/>
    <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
    <span id='register_username_errorloc' class='error'></span>
</div>
<div class='container' style='height:80px;'>
    <label for='password' >Password*:</label><br/>
    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
    <noscript>
    <input type='password' name='password' id='password' maxlength="50" />
    </noscript>    
    <div id='register_password_errorloc' class='error' style='clear:both'></div>
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>
</div>

</fieldset>
</form>

<img src="/assets/images/dollarswon.png" alt="Dollar and won sign">

<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("password","req","Please provide a password");

// ]]>
</script>
</body>
</html>