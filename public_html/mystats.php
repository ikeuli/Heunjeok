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
      <title>Heunjeok | My Stats</title>
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
			<?php $data = $fgmembersite->getMonthlyData(); ?>
			<table cellpadding=6 rules=groups>
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
						<td><?php echo $row['amount'];?></td>
					</tr>
				<?php $day = $row['day'];
				$total = $row['amount'];
				while ($row = mysql_fetch_array($data)) {
					if ($day == $row['day']) { ?>
						<tr>
							<td><?php echo "";?></td>
							<td><?php echo $row['category'];?></td>
							<td><?php echo $row['amount'];?></td>
						</tr>
					<?php $total += $row['amount'];
					}
					else {
						$day = $row['day']; ?>
						</tbody>
							<tr>
								<td class="total"><?php echo "Total:", $total;?></td>
								<?php $total = $row['amount']; ?>
							</tr>
						<tbody>
							<tr>
								<td><?php echo $row['day'];?></td>
								<td><?php echo $row['category'];?></td>
								<td><?php echo $row['amount'];?></td>
							</tr>
					<?php }
				} ?>
				</tbody>
				<td class="total"><?php echo "Total:", $total;?></td>
			</table>
		</div>
    </body>
</html>