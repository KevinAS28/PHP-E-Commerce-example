<?php
include ("database.php");
include("security.php");
$id = $_GET["id"];
$db = new Database();
if (isset($_POST["edit_barang"]))
{
	$db->edit_barang($id, $_POST["barang"], $_POST["jumlah"], $_POST["deskripsi"], $_POST["owner_id"], $_POST["harga"]);
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $_FILES["gambar"]["name"]);
		header("location: admin_page.php?pg=manbar");
}

$barang = $db->get_barang($id)[0];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Barang</title>
	<link rel="stylesheet" href="edit_barang.css"/>
</head>
<body>
	<h1 align="center">Edit Barang</h1>
	<img src="<?php echo $barang[6];?>" style="margin: 10px;border-radius: 10px; width: 25%;"/>
<div style="background-color: #fff;width: 50%;margin-left: 25%;">
<?php printf('<form action="edit_barang.php?id=%s" method="POST" enctype="multipart/form-data">', $_GET["id"]);?>
	<h3 >Nama Barang :</h3><input name="barang" placeholder="barang" value="<?php echo $barang[1];?>"/><br><br>
	<h3 >Jumlah :</h3><input name="jumlah" placeholder="jumlah" value="<?php echo $barang[2];?>"/><br>
	<h3 >Deskripsi :</h3><input name="deskripsi" placeholder="deskripsi" value="<?php echo $barang[3];?>"/><br>
	<h3 >Owner ID :</h3><input name="owner_id" placeholder="owner_id" value="<?php echo $barang[4];?>"/><br>
	<h3 >Harga :</h3><input name="harga" placeholder="harga" value="<?php echo $barang[5];?>"/><br>
	<input type="file" name="gambar" value="<?php echo $barang[6];?>" style='display: none;'/><br>
	<input name="edit_barang" type="submit" value="Edit Barang"/><br>
</form>
</div>
</body>
</html>