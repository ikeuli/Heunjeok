<?php

$connect = mysql_connect("localhost", "heuncxep", "fadfjke11"); 
if (!connect) { die('Connection Failed: ' . mysql_error()); } 
mysql_select_db("heuncxep_heunjeok", $connect);

$user_info = "INSERT INTO spending_data (username, category, amount) VALUES ('$_SESSION[username]', '$_POST[spending_category]', '$_POST[amount_spent]')"; 
if (!mysql_query($user_info, $connect)) { die('Error: ' . mysql_error()); }
echo "Your information was added to the database.";
mysql_close($connect); 

/*header("Location: http://heunjeok.com/tracking-home.php");*/

?>