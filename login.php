<?php
session_start();
if (isset($_SESSION["id_user"]))
{
	header("location: index.php");
}
if (isset($_POST["login"]))
{
	$_POST["password"] = md5($_POST["password"]);
	include("database.php");
	$db = new Database();
	$a = $db->login($_POST["email"], $_POST["password"]);
	if ($a)
	{
		$wut = false;
		$_SESSION["id_user"] = $a[0];
		if (isset($_SESSION["redirect"]))
		{
			if ($_SESSION["redirect"]!="")	
			{
				$wut = true;
				header(sprintf("location: %s", $_SESSION["redirect"]));		
				$_SESSION["redirect"] = "";
			}
		}
		if (!$wut)
		{
			header("location: index.php");
		}
		
	}
	else{
		printf("<script>alert('Salah Authentikasi');</script>");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>

<body style="text-align: center;background-color: #dfdfdf;margin:0;">
	<div style="width: 35%;margin-left: 32%;margin-top: 100px;background-color: #fff;border-radius: 10px;padding-bottom: 25px;">

	<h1>Login</h1>
<form action="login.php" method="post">
	<input name="email" placeholder="email" type="email" required="yes" />
	<br><br>
	<input name="password" placeholder="password" type="password" required="yes" />
	<br><br> 
	<input type="submit" name="login" value="Login"/>
</form>
<br>
<a href="register.php"><h3>Register</h3></a>
</div>
</body>
</html>
