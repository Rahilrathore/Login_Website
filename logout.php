<?php 
//strat session
session_start();

//Destroy session
if(session_destroy())
{
	//redirect to login page
	header("Location:login.php");
	exit;
}
?>