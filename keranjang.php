<?php

include ("database.php");
include ("security.php");
$db = new Database();
if (isset($_GET["hapus_barang"]))
{
	$db->hapus_keranjang ($_GET["hapus_barang"]);
	header("location: keranjang.php");
}
if (isset($_GET["beli_barang"]))
{
	$in = $db->beli_barang($_GET["beli_barang"], $_SESSION["id_user"], $_GET["jumlah"]);
	$barang = $db->get_barang($_GET["beli_barang"]);
		printf("<script>
		alert('Anda baru saja membeli barang %s. invoice anda: %s');
		window.location.replace('index.php');
		</script>", $barang[1], $in);
	$db->hapus_keranjang($_GET["beli_barang"]);
}

if (isset($_GET["beli"]))
{
	$invoices = array();
	$cart = $db->keranjang($_SESSION["id_user"]);
	$id = "EMVKER_".$_SESSION["id_user"];
	$db->transaksi($id, $_SESSION["id_user"], "1");
		printf("<script>
		alert('Anda baru saja membeli semua barang di kelanja anda. invoice anda: %s');
		window.location.replace('index.php');</script>"
		, $id);
	$db->hapus_keranjang_user($_SESSION["id_user"]);
}

$cart = $db->keranjang($_SESSION["id_user"]);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Saya</title>
</head>
<body>
	<h1 align="center">Keranjang Saya</h1>
	<?php if (count($cart)>=1){
		$total = 0;
		foreach ($cart as $c)
		{
			$barang = $db->get_barang($c[2]);
			$total += (int)$barang[0][5];
		}
		printf('<a href="keranjang.php?beli"><h3 align="center" >Beli Semua (IDR.%d)</h3></a>', $total);

	} ?>
	
<table border="3" align="center">
	<?php
		$headers = array("Barang", "Jumlah", "Harga Total");
		echo "<tr>";
		foreach($headers as $h)
		{
			echo "<td><b>";
			echo $h;
			echo "</td></b>";
		}
		echo "</tr>";

		$icol = array(0, 1, 2);
		
		foreach ($cart as $a)
		{
			echo "<tr>";
			$i = 0;
			$barang = $db->get_barang($a[2])[0];
			printf("<td>%s</td>", $barang[1]);
			$jumlah = (int)$a[3];

			foreach ($a as $b)
			{

					$lanjut = true;
					foreach($icol as $c)
					{
						if($c==$i)
						{
							$lanjut=false;
							break;
						}
					}
					$i++;
					if (!$lanjut)
					{
						continue;
					}
				printf("<td>%s</td>", $b);
			}
			printf("<td>%s</td>", $jumlah*(int)$barang[5]);
			printf("<td><a href='keranjang.php?beli_barang=%s&&jumlah=%s'>Beli</a></td>", $a[0], $a[3]);
			printf("<td><a href='keranjang.php?hapus_barang=%s'>Hapus</a></td>", $a[0]);	
			echo "</tr>";
		}
	?>
</table>
</body>
</html>
