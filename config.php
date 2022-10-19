<?php


define('DBSERVER','localhost');// server
define('DBUSERNAME','root');//username
define('DBPASSWORD','');//password
define('DBNAME','demo');//name

/*connect to MYSql database*/
$db=mysqli_connect(DBSERVER,DBUSERNAME,DSPASSWORD,DBNAME);

//Check db connection
if($db==false)
{
	die("Error: connection error." . mysqli_connect_error());
}
?>