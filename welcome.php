<?php 

//start session
session_start();

if(!isset($_SESSION["userid"]) || $_SESSION["userid"]!==true)
{
	header("location:login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstarpcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-mid-12">
				<h1>Hello,<strong><?php echo $_SESSION["name"];?></strong>. Welcome to this site</h1>
			</div>
			<p>
				<a href="logout.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Log Out</a>
			</p>
		</div>
</div>
</body>
</html>