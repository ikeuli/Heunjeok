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
	  <link rel="STYLESHEET" type="text/css" href="css/fg_membersite.css" />
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
			<p>Choose a label or short description for the spending category then input how much money you spent.</p>
			<div id='fg_membersite'>
			<form id='tracker_input' action='tracker.php' method='post' accept-charset='UTF-8'>
				<fieldset >
				<legend>Track your spending</legend>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
				<div class='container'>
					<label for='spending_category' >Category:</label><br/>
					<input type='text' name='spending_category' id='spending_category' maxlength="50" autocomplete="off"/></br>
					<span id='tracker_input_spending_category_errorloc' class='error'></span>
				</div>
				<div class='container'>
					<label for='amount_spent' >Amount:</label><br/>
					<input type='text' name='amount_spent' id='amount_spent' maxlength="20" autocomplete="off"/></br>
					<span id='tracker_input_amount_spent_errorloc' class='error'></span>
				</div>
				<div class='container'>
					<input type='submit' name='Submit' value='Submit' />
				</div>
				</fieldset>
			</form>
			</div>
			<div><span class='error'><?php echo $fgmembersite->getMonthlyTotal() + "4"; ?></span></div>
            <img src="/assets/images/dollarswon.png" alt="Dollar and won sign">
			<script type='text/javascript'>
				// <![CDATA[

				var frmvalidator  = new Validator("tracker_input");
				frmvalidator.EnableOnPageErrorDisplay();
				frmvalidator.EnableMsgsTogether();

				frmvalidator.addValidation("spending_category","req","Please provide a name for this payment.");
    
				frmvalidator.addValidation("amount_spent","req","Please provide the amount of money spent.");
				
				frmvalidator.addValidation("amount_spent","num","Please provide a number amount.");

				// ]]>
			</script>
        </div>
    </body>
</html>
