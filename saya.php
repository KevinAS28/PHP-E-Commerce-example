<?php
include("security.php");
include ("database.php");
$db = new Database();
if (isset($_POST["ganti_dp"]))
{

	move_uploaded_file($_FILES["gambar"]["tmp_name"], $_FILES["gambar"]["name"]);
	$db->set_user_dp($_SESSION["id_user"], $_FILES["gambar"]["name"]);
	header("location: saya.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Akun Saya</title>
</head>
<body style='text-align: center;'>
<?php echo('<img src="'.$user->dat[0][7].'" style="width: 15%;"border-radius: 2px;/>'); ?>
<form action="" method="post" enctype="multipart/form-data">
	<h3>Ganti Display Picture</h3>
<input type="file" name="gambar"/>
<br>
<br>
<input type="submit" name="ganti_dp" value="Ganti DP"/>
</form>
<?php
 printf("<h1 >%s</h1>", $user->dat[0][3]);
 printf("<h2 >%s</h2>", $user->dat[0][1]) ;

$pw =  $user->dat[0][2];
$stars = "";
for ($i = 0; $i < strlen($pw); $i++)
{
	$stars = $stars."*";
}
if (isset($_GET["show_password"]))
{
printf("<h2 ><a href='saya.php'> Password: %s</a></h2>",  $pw);
}
else{
printf("<h2 ><a href='saya.php?show_password'> Password: %s</a></h2>",  $stars);	
}
	printf("<h2>Alamat: %s</h2>", $user->dat[0][4]);
?>

</body>
</html>
