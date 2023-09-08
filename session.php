<?php
session_start();
if (isset($_SESSION['loggedin'])) 
{
	$s=$_SESSION['login_user'];
}
?>
