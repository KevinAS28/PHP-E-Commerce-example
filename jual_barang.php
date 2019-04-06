<?php
include("security.php");
include ("database.php");

$db = new Database();
if (isset($_POST["jual_barang"]))
{
	$db->tambah_barang($_POST["nama"], $_POST["jumlah"], $_POST["deskripsi"], $_SESSION["id_user"], $_POST["harga"], $_FILES["gambar"]["name"]);
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $_FILES["gambar"]["name"]);
		
	printf("<script>
		alert('Barang berhasil di jual :)');
		window.location.replace('index.php');
		</script>");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>jual Barang</title>
	<link rel="stylesheet" href="edit_barang.css"/>
</head>
<body>
	<h1 align="center">jual Barang</h1>
<div style="background-color: #fff;width: 50%;margin-left: 25%;padding-top: 25px;">
<?php printf('<form action="jual_barang.php" enctype="multipart/form-data" method="POST">');?>
	<input name="nama" placeholder="nama"/><br><br>
	<input name="jumlah" placeholder="jumlah"/><br><br>
	<input name="deskripsi" placeholder="deskripsi"/><br><br>
	<input name="harga" placeholder="harga"/><br><br>
	<input type="file" name="gambar"/><br><br>
	<input name="jual_barang" type="submit" value="jual Barang"/><br><br>
</div>
</form>
</body>
</html>