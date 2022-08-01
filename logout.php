<?php
/**
 * LOGS OUT THE USER. REDIRECTS TO THE LOGIN PAGE AND CLEARS THE SESSION.
 *
 * @version    PHP 8.0.12 
 * @since      March 2022
 * @author     AtharvaShah
 */


require("functions.php");
require("connection.php");
session_start();
if(empty($_SESSION))
{
  header("Location: login.php");
}
$user_data = check_login($con);
$username = $user_data['user_name'];

if(isset($_SESSION['user_id']))
{
	set_inactive($username);
	unset($_SESSION['user_id']);
}

header("Location: login.php");
mysqli_close($con);
die;