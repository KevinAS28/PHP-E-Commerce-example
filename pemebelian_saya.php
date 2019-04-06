<?php
include ("security.php");
include ("database.php");
$db = new Database();


if (isset($_POST["bukti"]))
{
	$filenya = "bukti_bayar/".$_FILES["gambar"]["name"];
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $filenya);
	$db->masukan_bukti($filenya, $_GET["id"]);
}
?>
<!DOCTYPE html>	
<html>
<head>
	<title>Pembelian Saya</title>
</head>
<body>
	<h1 style="text-align: center;">Pembelian Saya</h1>
<table border='2' align="center">
	<?php
		$pembelian = $db->pembelian_saya($_SESSION["id_user"]);
		$header = array("Nama Barang", "Jumlah", "Tanggal Beli", "Tanggal Bayar", "Invoice", "Bukti Pembayaran", "Resi");
		foreach ($header as $a)
		{
			printf("<td><b>%s</b></td>", $a);
		}
		foreach ($pembelian as $a)
		{
		echo "<tr>";
		$barang = $db->get_barang($a[2]);
		if (!count($barang))
		{
			printf("<td>Keranjang %s</td>", $a[2]);
		}
		else{
			printf("<td>%s</td>", $barang[0][1]);
		}
		
		for ($i = 3; $i < count($a)-2; $i++)
		{
			if ($a[$i]=="")
			{
				$a[$i]="<b>Kosong</b>";
			}
			printf("<td>%s</td>", $a[$i]);
		}
		echo "<td style='text-align: center;'>";
		if ($a[count($a)-2]=="")
		{
			
		printf("
			<form   action='pemebelian_saya.php?id=%s' method='post' enctype='multipart/form-data'>
			<input type='file' name='gambar'/>
			<input type='submit' value='Upload' name='bukti'/>
			</form>
			", $a[0]);
		}else{
			echo "<td ><a href='".$a[count($a)-2]."'><img style='width:35%; ' src='".$a[count($a)-2]."'/></a></td>";
		}
		echo "</td>";


		if ($a[count($a)-1]=="")
		{
		printf("<td><h4>Belum Tersedia</h4></td>");
		}else{
		printf("<td>%s</td>", $a[count($a)-1]);
		}
		echo "</tr>";
		}
	?>
</table>
</body>
</html>
