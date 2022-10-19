<?php 

//Start the session
session_start();

//if user is already logged in then redirect user to weolcome page
if(isset($_SESSION["userid"]) && $_SESSION["userid"]==true)
{
	header("location:welcome.php");
	exit;
}
?>