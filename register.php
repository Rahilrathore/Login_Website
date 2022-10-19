<?php 

require_once "config.php";
require_once "session.php";

if($_SERVER["$_REQUEST_METHOD"]=="POST" && isset($_POST['submit']))
{
	$fullname=trim($_Post['name']);
	$email=trim($_POST['email']);
	$password=trim($_POST['password']);
	$confirm_password=trim($_POST['confirm_passowrd']);
	$password_hash=password_hash($password, PASSWORD_BCRYPT);

	if($query=$db->prepare("Selct * from user where email=?"))
	{
		$error='';
		$query->bind_param('s',$email);
		$query->execute();
		$query->store_result();
		if($query->num_rows>0)
		{
			$error .='<p class="error">The email address is already registered!</p>';
		}
		else
		{ //validate password
			if(strlen($password)<6)
			{
			$error.='<p class="error">Password must have atleast 6 characters.</p>';
			}
			//validate confirm password
			if(empty($confirm_password))
			{
				$error.='<p class="error">Please enter confirm password.</p>';
			}
			else
			{
				if(empty($error) && ($password!=$confirm_password))
				{
					$error.='<p class="error">Password did not match.</p>'
				}
			}
		}
		if(empty($error))
		{
			$insertQuery=$db->prepare("Insert into user(name,email,password) values (?,?,?,?);");
			$insertQuery->bind_param("sss",$fullname,$email,$password_hash);
			$result=$insertQuery->execute();
			if($result)
			{
				$error .='<p class="success">Your registration was successful!</p>';
			}
			else
			{
				$error .= '<p class="error">Something went wrong!</p>';
			}
		}
	}
}
$query->close();
$insertQuery->close();
//Closing DB connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://stackpath.bootstarpcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-mid-12">
				<h2>Register</h2>
				<p>Please fill the form to create an account.</p>
				<form action="" method="post">
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					</div>
					<p>Already have an account?<a href="login.php">Login here</a>.</p>
				</form>
				</div>
			</div>
		</div>
</body>
</html>