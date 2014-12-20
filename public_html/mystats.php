<?PHP
require_once("./include/membersite_config.php");
session_start();

if ($_SESSION['refresh_stats'])
	$flag = 1;
else
	$flag = 0;

if (!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Heunjeok | My Stats</title>
	  <link rel="STYLESHEET" type="text/css" href="css/fg_membersite.css" />
	  <script type='text/javascript' src='js/gen_validatorv31.js'></script>
      <link rel="STYLESHEET" type="text/css" href="css/style.css">
</head>

	<!--If the user's currency is dollars.-->
	<?php if($fgmembersite->getCURR() == 0) : ?>
	<body background="/assets/images/background.jpg">
        <img src="/assets/images/heunjeok.png" id="logo" alt="Heunjeok logo">
        <ul id="nav_container">
            <li>
                <div id="logged_in_as">Logged in as: <?= $fgmembersite->UserFullName(); ?></div> 
            </li>
			<li>
                <a href='tracking-home.php'>Input Page</a>
            </li>
            <li>
                <a href='logout.php'>Logout</a>
            </li>
            <li>
                <a href="contact.html">Contact</a> 
            </li>
        </ul>
		<div id="main_content" align="center">
			<p> 
				<?php echo $fgmembersite->getMonthWord($flag);
				echo " ";
				echo $fgmembersite->getYear($flag); ?>
			</p>
			<form id='view_month_id' action='my_stats_handler.php' method='post'>
				<?php $months = $fgmembersite->getUsersMonthList();?>
				<select name="view_month" onchange="this.form.submit()">
				<?php $output = "";
				$currentMonth = $fgmembersite->getMonthWord($flag);
				$currentYear = $fgmembersite->getYear($flag);
				$output .= $currentMonth." ".$currentYear;
				echo '"<option value="default">'.$output.'</option>"';
				for($i = 0; $i < count($months); ++$i) 
				{
					$output = "";
					$monthName = date('F', mktime(0, 0, 0, $months[$i]['month'], 10));
					if ($monthName != $fgmembersite->getMonthWord($flag)) 
					{
						$output .= $monthName." ".$months[$i]['year'];
						echo '"<option value="'.$output.'">'.$output.'</option>"';
					}
				}
				?>
				</select>
			</form>
			
			<?php
				$mt = $fgmembersite->getMonthlyTotal($flag);
				$month = $fgmembersite->getMonthWord($flag);
			?>	
			<p class="monthly_total"><?php echo $month ?> Total: $<?php echo number_format($mt, 2, '.', ',') . "\n"; ?></p>
			
			<?php $data = $fgmembersite->getMonthlyData($flag); ?>
			<table rules=groups>
				<thead>
					<tr>
						<th>Date</th>
						<th>Category</th>
						<th>Amount</th>
					</tr>
				</thead>
				<?php
				$row = mysql_fetch_array($data); ?>
				<tbody>
					<tr>
						<td><?php echo $row['day'];?></td>
						<td><?php echo $row['category'];?></td>
						<td><?php echo number_format($row['amount'], 2, '.', ',') . "\n";?></td>
					</tr>
				<?php $day = $row['day'];
				$total = $row['amount'];
				while ($row = mysql_fetch_array($data)) {
					if ($day == $row['day']) { ?>
						<tr>
							<td><?php echo "";?></td>
							<td><?php echo $row['category'];?></td>
							<td><?php echo number_format($row['amount'], 2, '.', ',') . "\n";?></td>
						</tr>
					<?php $total += $row['amount'];
					}
					else {
						$day = $row['day']; ?>
						</tbody>
							<tr>
								<td></td><td></td>
								<td class="total">Total: $<?php echo number_format($total, 2, '.', ',') . "\n"; ?></td>
								<?php $total = $row['amount']; ?>
							</tr>
						<tbody>
							<tr>
								<td><?php echo $row['day'];?></td>
								<td><?php echo $row['category'];?></td>
								<td><?php echo number_format($row['amount'], 2, '.', ',') . "\n";?></td>
							</tr>
					<?php }
				} ?>
				</tbody>
				<td></td><td></td>
				<td class="total">Total: $<?php echo number_format($total, 2, '.', ',') . "\n"; ?></td>
			</table>
			<img src="/assets/images/dollarswon.png" alt="Dollar and won sign">
		</div>
    </body>
	
	
	<!--If the user's surrency is Korean Won.-->
	<?php elseif($fgmembersite->getCURR() == 1) : ?>
	<body background="/assets/images/background.jpg">
        <img src="/assets/images/heunjeok.png" id="logo" alt="Heunjeok logo">
        <ul id="nav_container">
            <li>
                <div id="logged_in_as">Logged in as: <?= $fgmembersite->UserFullName(); ?></div> 
            </li>
			<li>
                <a href='tracking-home.php'>Input Page</a>
            </li>
            <li>
                <a href='logout.php'>Logout</a>
            </li>
            <li>
                <a href="contact.html">Contact</a> 
            </li>
        </ul>
		<div id="main_content" align="center">
			<p> 
				<?php echo $fgmembersite->getMonthWord($flag);
				echo " ";
				echo $fgmembersite->getYear($flag); ?>
			</p>
			<form id='view_month_id' action='my_stats_handler.php' method='post'>
				<?php $months = $fgmembersite->getUsersMonthList();?>
				<select name="view_month" onchange="this.form.submit()">
				<?php $output = "";
				$currentMonth = $fgmembersite->getMonthWord($flag);
				$currentYear = $fgmembersite->getYear($flag);
				$output .= $currentMonth." ".$currentYear;
				echo '"<option value="default">'.$output.'</option>"';
				for($i = 0; $i < count($months); ++$i) 
				{
					$output = "";
					$monthName = date('F', mktime(0, 0, 0, $months[$i]['month'], 10));
					if ($monthName != $fgmembersite->getMonthWord($flag)) 
					{
						$output .= $monthName." ".$months[$i]['year'];
						echo '"<option value="'.$output.'">'.$output.'</option>"';
					}
				}
				?>
				</select>
			</form>
			
			<?php
				$mt = $fgmembersite->getMonthlyTotal($flag);
				$month = $fgmembersite->getMonthWord($flag);
			?>	
			<p class="monthly_total"><?php echo $month ?> Total: ₩<?php echo number_format($mt, 0, '.', ',') . "\n"; ?></p>
			
			<?php $data = $fgmembersite->getMonthlyData($flag); ?>
			<table rules=groups>
				<thead>
					<tr>
						<th>Date</th>
						<th>Category</th>
						<th>Amount</th>
					</tr>
				</thead>
				<?php
				$row = mysql_fetch_array($data); ?>
				<tbody>
					<tr>
						<td><?php echo $row['day'];?></td>
						<td><?php echo $row['category'];?></td>
						<td><?php echo number_format($row['amount'], 0, '.', ',') . "\n";?></td>
					</tr>
				<?php $day = $row['day'];
				$total = $row['amount'];
				while ($row = mysql_fetch_array($data)) {
					if ($day == $row['day']) { ?>
						<tr>
							<td><?php echo "";?></td>
							<td><?php echo $row['category'];?></td>
							<td><?php echo number_format($row['amount'], 0, '.', ',') . "\n";?></td>
						</tr>
					<?php $total += $row['amount'];
					}
					else {
						$day = $row['day']; ?>
						</tbody>
							<tr>
								<td></td><td></td>
								<td class="total">Total: ₩<?php echo number_format($total, 0, '.', ',') . "\n"; ?></td>
								<?php $total = $row['amount']; ?>
							</tr>
						<tbody>
							<tr>
								<td><?php echo $row['day'];?></td>
								<td><?php echo $row['category'];?></td>
								<td><?php echo number_format($row['amount'], 0, '.', ',') . "\n";?></td>
							</tr>
					<?php }
				} ?>
				</tbody>
				<td></td><td></td>
				<td class="total">Total: ₩<?php echo number_format($total, 0, '.', ',') . "\n"; ?></td>
			</table>
			<img src="/assets/images/dollarswon.png" alt="Dollar and won sign">
		</div>
    </body> 
	<?php endif; ?>
</html>