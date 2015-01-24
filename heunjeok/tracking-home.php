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
      <title>Heunjeok | Input Page</title>
	  <link rel="STYLESHEET" type="text/css" href="css/fg_membersite.css" />
	  <script type='text/javascript' src='js/gen_validatorv31.js'></script>
      <link rel="STYLESHEET" type="text/css" href="css/style.css">
	  <link rel="stylesheet" href="css/jquery-ui.css" />
	  <script src="js/jquery-1.9.1.js"></script>
	  <script src="js/jquery-ui.js"></script>
	  <script src="js/date.js"></script>
	  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" /> 
</head>

	<!--If the user's currency is dollars.-->
	<?php if($fgmembersite->getCURR() == 0) { ?>
	<body background="assets/images/background.jpg">
        <img src="assets/images/heunjeok.png" id="logo" alt="Heunjeok logo">
        <ul id="nav_container">
            <li>
                <div id="logged_in_as">Logged in as: <?= $fgmembersite->UserFullName(); ?></div> 
            </li>
			<li>
                <a href='mystats.php'>My Stats</a>
            </li>
			<li>
                <a href='appDemo.php'>iOS App Demo</a> 
            </li>
            <li>
                <a href='logout.php'>Logout</a>
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
					<label for='memo'>(Optional) Memo:</label><br/>
					<textarea ROWS=3 COLS=30 name='memo' id='memo' maxlength="1000" autocomplete="off"></textarea></br>
					<span id='tracker_input_memo_errorloc' class='error'></span>
				</div>
				<div class='container'>
					<label for='datepicker' >(Optional) Date:</label><br/>
					<input type="text" id="datepicker" readonly="readonly" name="datepicker"/>
				</div>
				<div class='container'>
					<input type='submit' name='Submit' value='Submit' />
				</div>
				</fieldset>
			</form>
			</div>
			<br/>
			<br/>
			<?php
				$mt = $fgmembersite->getMonthlyTotal(1);
				$month = $fgmembersite->getMonthWord(1);
			?>	
			<p class="monthly_total"><?php echo $month ?> Total: $<?php echo number_format($mt, 2, '.', ',') . "\n"; ?></p>
            <img src="assets/images/dollarswon.png" alt="Dollar and won sign">
			<script type='text/javascript'>
				// <![CDATA[

				var frmvalidator  = new Validator("tracker_input");
				frmvalidator.EnableOnPageErrorDisplay();
				frmvalidator.EnableMsgsTogether();

				frmvalidator.addValidation("spending_category","req","Please provide a name for this payment.");
				frmvalidator.addValidation("amount_spent","req","Please provide the amount of money spent.");
				frmvalidator.addValidation("amount_spent","regexp=^[0-9]+(?:\.[0-9]{2}){0,1}$","Please provide a number amount.");
				frmvalidator.addValidation("memo","maxlen","Memo is too long (Max 1000 characters).");

				// ]]>
			</script>
        </div>
    </body> <?php }
	
	//If the user's currency is Korean Won.
	elseif ($fgmembersite->getCURR() == 1) { ?>
	<body background="/assets/images/background.jpg">
        <img src="/assets/images/heunjeok.png" id="logo" alt="Heunjeok logo">
        <ul id="nav_container">
            <li>
                <div id="logged_in_as">Logged in as: <?= $fgmembersite->UserFullName(); ?></div> 
            </li>
			<li>
                <a href='mystats.php'>My Stats</a>
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
					<label for='memo'>(Optional) Memo:</label><br/>
					<textarea ROWS=3 COLS=30 name='memo' id='memo' maxlength="1000" autocomplete="off"></textarea></br>
					<span id='tracker_input_memo_errorloc' class='error'></span>
				</div>
				<div class='container'>
					<label for='datepicker' >(Optional) Date:</label><br/>
					<input type="text" id="datepicker" readonly="readonly" name="datepicker"/>
				</div>
				<div class='container'>
					<input type='submit' name='Submit' value='Submit' />
				</div>
				</fieldset>
			</form>
			</div>
			<br/>
			<br/>
			<?php
				$mt = $fgmembersite->getMonthlyTotal(1);
				$month = $fgmembersite->getMonthWord(1);
			?>	
			<p class="monthly_total"><?php echo $month ?> Total: ₩<?php echo number_format($mt, 0, '.', ',') . "\n"; ?></p>
            <img src="assets/images/dollarswon.png" alt="Dollar and won sign">
			<script type='text/javascript'>
				// <![CDATA[

				var frmvalidator  = new Validator("tracker_input");
				frmvalidator.EnableOnPageErrorDisplay();
				frmvalidator.EnableMsgsTogether();

				frmvalidator.addValidation("spending_category","req","Please provide a name for this payment.");
				frmvalidator.addValidation("amount_spent","req","Please provide the amount of money spent.");
				frmvalidator.addValidation("amount_spent","num","Please provide a number amount.");
				frmvalidator.addValidation("memo","maxlen","Memo is too long (Max 1000 characters).");

				// ]]>
			</script>
        </div>
    </body> <?php } ?>
</html>
