<?php
include ("database.php");
include("security.php");
include("user.php");
$id = $_GET["id"];
$db = new Database();
if (isset($_POST["edit_akun"]))
{
	$_POST["password"] = md5($_POST["password"]);
	$db->edit_users($id, $_POST["email"], $_POST["password"], $_POST["nama"], $_POST["alamat"], $_POST["umur"], $_POST["id_type"]);
	header("location: admin_page.php");
}
$users = new user($id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Auth</title>
	<link rel="stylesheet" href="edit_barang.css"/>
</head>
<body>
	<h1 align="center">Edit Auth</h1>
<div style="background-color: #fff;width: 50%;margin-left: 25%;">
<?php printf('<form action="edit_auth.php?id=%s" method="POST">', $_GET["id"]);?>
	<input name="nama" placeholder="nama" value="<?php echo $users->dat[0][3]; ?>"/><br>
	<input name="email" placeholder="email" value="<?php echo $users->dat[0][1]; ?>"/><br>
	<input name="password" placeholder="password" value="<?php echo $users->dat[0][2]; ?>"/><br>
	<input name="alamat" placeholder="alamat" value="<?php echo $users->dat[0][4]; ?>"/><br>
	<input name="umur" placeholder="umur" value="<?php echo $users->dat[0][5]; ?>"/><br>
	<input name="id_type" placeholder="id type" value="<?php echo $users->dat[0][6]; ?>"/><br>
	<input name="edit_akun" type="submit"/><br>
</form>
</div>
</body>
</html>