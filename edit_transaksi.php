<?php
include ("database.php");
include("security.php");
$id = $_GET["id"];
$db = new Database();
if (isset($_POST["edit_transaksi"]))
{
	$db->edit_transaksi($id, $_POST["id_user"], $_POST["id_barang"], $_POST["jumlah"], $_POST["tanggal_beli"], $_POST["tanggal_bayar"], $_POST["invoice"], $_POST["resi"], $_FILES["gambar"]["name"]);
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $_FILES["gambar"]["name"]);
	header("location: admin_page.php?pg=mantran");
}
$transaksi = $db->get_transaksi($id)[0];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Transaksi</title>
</head>
<body style="text-align: center;">
<h1 align="center">Edit Transaksi</h1>

<?php printf('<form action="edit_transaksi.php?id=%s" method="POST" enctype="multipart/form-data">', $_GET["id"]);?>
	<h3>ID User</h3><input name="id_user" placeholder="id_user" value="<?php echo $transaksi[1];?>"/><br>
	<h3>ID Barang</h3><input name="id_barang" placeholder="id_barang" value="<?php echo $transaksi[2];?>"/><br>
	<h3>Jumlah</h3><input name="jumlah" placeholder="jumlah" value="<?php echo $transaksi[3];?>"/><br>
	<h3>Tanggal Beli</h3><input name="tanggal_beli" placeholder="tanggal_beli" value="<?php echo $transaksi[4];?>"/><br>
	<h3>Tanggal Bayar</h3><input name="tanggal_bayar" placeholder="tanggal_bayar" value="<?php echo $transaksi[5];?>"/><br>
	<h3>Invoice</h3><input name="invoice" placeholder="invoice" value="<?php echo $transaksi[6];?>"/><br>
	<h3>Resi</h3><input name="resi" placeholder="resi" value="<?php echo $transaksi[8];?>"/><br>

	<input type="file" name="gambar" value="<?php echo $transaksi[7];?>" style='display: none;'/><br>
	<input name="edit_transaksi" type="submit"/><br>
</form>
</body>
</html>
