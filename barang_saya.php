<?php
include("security.php");
include("database.php");
$db = new Database();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Barang Saya</title>
</head>
<body>
<h1>Barang Saya</h1>
<table border="1" align="center">
<?php
		echo "<a href='jual_barang.php'>Jual Barang</a>";
		$a = $db->get_barang_by_owner($_SESSION["id_user"]);
		$header = array("id", "Nama Barang", "Jumlah", "Deskripsi", "Harga", "Gambar");
		echo "<tr>";
		$ignore = array(4);
		foreach ($header as $e) 
		{
			printf("<td><b>%s</b></td>", $e);
		}
		echo "</tr>";
		
		foreach($a as $b)
		{
			$i = 0;
			echo "<tr>";
			$extra = array(array("Edit", "edit_barang_penjual.php"), array("Hapus", "hapus_barang_penjual.php"));
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
				printf("<td>%s</td>", $c);


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