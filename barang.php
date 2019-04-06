<?php
session_start();
include("database.php");
if (!isset($_GET["barang_id"]))
{
	header("location: index.php");
}

$db = new Database();
$barang = $db->get_barang($_GET["barang_id"])[0];
$kurir = array("JNE", "TIKI");
$ongkir = array(35000, 30000);
if(isset($_POST["keranjang"])){
	if (!isset($_SESSION["id_user"]))
	{
		header("location: login.php");
		exit(0);
	}
	$db->tambah_keranjang($_SESSION["id_user"], $_GET["barang_id"], $_POST["jumlah"]);
	$tambahan = ((int)$_POST["jasa"][0]);
	echo "<script> alert('Berhasil tambah ke keranjang')</script>";

}
if (isset($_POST["beli"]))
{
	
	
	if (!isset($_SESSION["id_user"]))
	{
		$_SESSION["redirect"] = $_SERVER["REQUEST_URI"];
		header("location: login.php");
		exit(0);
	}
	
	$in = $db->beli_barang($_GET["barang_id"], $_SESSION["id_user"], $_POST["jumlah"]);
	
	printf("<script>
		alert('Anda baru saja membeli barang %s. invoice anda: %s');
		window.location.replace('index.php');
		</script>", $barang[1], $in);
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php printf("%s", $barang[1]);?></title>
</head>

<body style="text-align: center;">
<h1 style="width: 100%;" ><?php printf("%s", $barang[1]);?>	</h1>
<img  style="width: 25%;border-radius: 10px;" src=<?php printf("'%s'", $barang[6]);?>	/>
<h2>Harga: IDR <?php echo $barang[5];?></h2>
<h3>Jumlah: <?php echo $barang[2];?></h3><br>
<h3>Deskripsi: </h3>
<h3 ><?php echo $barang[3];?></h3><br>
<?php printf('<form method="post" action="barang.php?barang_id=%s"/>', $barang[0]); ?>
<input style="height: 25px;" type="number" name="jumlah" placeholder="Jumlah dibeli" value="1"/><br><br>
<select name="jasa">
	<?php 
	for ($i=1; $i <= count($kurir); $i++)
	{
		printf("<option name='%s'>%d. %s (Rp. %d)</option>", $i-1, $i, $kurir[$i-1], $ongkir[$i-1]);
	}
	?>
</select>
<br><br>
<input type="submit" name="beli" value="Beli Barang"/>
<input type="submit" name="keranjang" value="Masukkan keranjang"/>
</form>
<?php
/*
<?php printf('<form method="post" action="barang.php?barang_id=%s"/>', $barang[0]); ?>
<input type="submit" name="keranjang" value="Masukkan ke keranjang"/>
</form>
*/
 ?>
</body>
</html>
