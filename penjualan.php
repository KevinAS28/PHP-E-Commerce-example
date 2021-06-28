<?php
include("security.php");
include("database.php");

$db = new Database();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Penjualan Saya</title>
</head>
<body>
	<h1 style="text-align: center;">Penjualan Saya</h1>
<table border="1" align="center">
<?php
		$a = $db->get_transaksi_owner($_SESSION["id_user"]);
		$header = array("id", "id_user", "id_barang", "jumlah", "tanggal_beli", "tanggal_bayar", "invoice", "resi", "file_bukti_bayar");
		echo "<tr>";
		$ignore = array(7);
		foreach ($header as $e) 
		{
			printf("<td><b>%s</b></td>", $e);
		}
		echo "</tr>";
		foreach($a as $b)
		{
			$i=0;
			echo "<tr>";
			$extra = array(array("Edit", "edit_transaksi_penjual.php"), array("Hapus", "hapus_transaksi_penjual.php"));
			foreach($b as $c)
			{
				$lanjut = true;
				foreach ($ignore as $ig)
				{
					if ($i==$ig)
					{

						$lanjut = false;
						break;
					}
				}
				$i++;
				if(!$lanjut)
				{
					continue;
				}				
				if ($c=="")
				{
					$c="<b>Tidak Ada</b>";
				}
				printf("<td>%s</td>", $c);
			}
			if ($b[7]=="")
			{
				printf("<td><b>Belum Tersedia</b></td>");
			}
			else{
			echo "<td ><a href='".$b[7]."'><img style='width:25%;' src='".$b[7]."'/></a></td>";
			}
			foreach($extra as $c)
			{
				printf("<td><a href='%s'>%s</a></td>", $c[1]."?id=".$b[0], $c[0]);
			}
			echo "</tr>";
		}
?>
</table>
</body>
</html>