<?php
include ("database.php");
include("security.php");

$db = new Database();
if (isset($_POST["tambah_akun"]))
{
	$_POST["password"] = md5($_POST["password"]);
	$db->tambah_users($_POST["email"], $_POST["password"], $_POST["nama"], $_POST["alamat"], $_POST["umur"], $_POST["id_type"]);
	header("location: admin_page.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah User</title>
	<link rel="stylesheet" href="edit_barang.css"/>
</head>
<body>
<h1 align="center">Tambah User</h1>
<div style="background-color: #fff;width: 50%;margin-left: 25%;">
<?php printf('<form action="tambah_user.php" method="POST">');?>
	<input name="nama" placeholder="nama"/><br>
	<input name="email" placeholder="email"/><br>
	<input name="password" placeholder="password"/><br>
	<input name="alamat" placeholder="alamat"/><br>
	<input name="umur" placeholder="umur"/><br>
	<input name="id_type" placeholder="id type"/><br>
	<input name="tambah_akun" type="submit"/><br>
</form>
</div>
</body>
</html>