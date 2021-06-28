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
		$header = array("id", "id user", "id barang", "jumlah", "tanggal beli", "tanggal bayar", "invoice", "resi", "file bukti bayar");
		echo "<tr>";
		$icol = array(7);
		foreach ($header as $e) 
		{
			printf("<td><b>%s</b></td>", $e);
		}
		echo "</tr>";
		foreach($a as $b)
		{
			echo "<tr>";
			$extra = array(array("Edit", "edit_transaksi_penjual.php"));
			$i=0;
			foreach($b as $c)
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
						//continue;
					}
				if ($c=="")
				{
					$c="<b>Tidak Ada</b>";
				}
				printf("<td>%s</td>", $c);
			}
			echo("<td align='center' style='width: 25%;text-align: center;'><a href='".$b[7]."'><img align='center' src='".$b[7]."' style='width: 100%'/></a></td>");
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