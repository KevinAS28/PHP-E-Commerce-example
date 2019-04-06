<?php
include ("database.php");


$db = new Database();
if (isset($_POST["tambah_barang"]))
{
	$db->tambah_barang($_POST["nama"], $_POST["jumlah"], $_POST["deskripsi"], $_POST["owner_id"], $_POST["harga"], $_FILES["gambar"]["name"]);
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $_FILES["gambar"]["name"]);
	header("location: admin_page.php?pg=manbar");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
	<link rel="stylesheet" href="edit_barang.css"/>
</head>
<body>
	<h1 align="center">Tambah Barang</h1>
<div style="background-color: #fff;width: 50%;margin-left: 25%;">
<?php printf('<form action="tambah_barang.php" enctype="multipart/form-data" method="POST">');?>
	<input name="nama" placeholder="nama"/><br>
	<input name="jumlah" placeholder="jumlah"/><br>
	<input name="deskripsi" placeholder="deskripsi"/><br>
	<input name="owner_id" placeholder="owner_id"/><br>
	<input name="harga" placeholder="harga"/><br>
	<input type="file" name="gambar"/><br>
	<input name="tambah_barang" type="submit" value="Tambah Barang"/><br>
</div>
</form>
</body>
</html>