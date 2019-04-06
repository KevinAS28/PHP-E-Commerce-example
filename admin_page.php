<?php
include("database.php");
include("security.php");
$db = new Database();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="admin_page.css"/>
</head>
<body>
<div class="topnav">
 <h1 style="color: #f2f2f2;margin-left: 10px;">Admin Page</h1>
 <a class="active" href="admin_page.php?pg=manadm">Mangement Admin</a>
 <a class="active" href="admin_page.php?pg=manbar">Management Barang</a>
 <a class="active" href="admin_page.php?pg=mantran">Management Transaksi</a>
 <a class="active" href="index.php">Beranda</a>
 <a class="active" href="laporan_excel.php">Laporan Excel</a>
 <a class="active" href="logout.php">Logout</a>
</div>
<table border='1' style="margin-top: 25px;" align="center">
<?php

if (!isset($_GET["pg"]))
{
	$hal = "manadm";
}
else{
$hal = $_GET["pg"];	
}


switch ($hal)
{
	case "manadm":
	{	echo "<a href='tambah_user.php'>Tambah User</a>";
		$a = $db->get_user();
		$header = array("id", "Email", "Password", "Alamat", "Umur", "Alamat", "Tipe Akun", "DP");
		echo "<tr>";
		foreach ($header as $e) 
		{
			printf("<td><b>%s</b></td>", $e);
		}
		echo "</tr>";
		foreach($a as $b)
		{
			echo "<tr>";
			$extra = array(array("Edit", "edit_auth.php"), array("Hapus", "rem_auth.php"));
			foreach($b as $c)
			{
				printf("<td>%s</td>", $c);
			}
			foreach($extra as $c)
			{
				printf("<td><a href='%s'>%s</a></td>", $c[1]."?id=".$b[0], $c[0]);
			}
			echo "</tr>";
		}
		break;
	}
	case "manbar":
	{
		echo "<a href='tambah_barang.php'>Tambah Barang</a>";
		$a = $db->get_barang();
		$header = array("id", "Nama Barang", "Jumlah", "Deskripsi", "Owner_Id", "Harga", "Gambar");
		echo "<tr>";
		foreach ($header as $e) 
		{
			printf("<td><b>%s</b></td>", $e);
		}
		echo "</tr>";
		foreach($a as $b)
		{
			echo "<tr>";
			$extra = array(array("Edit", "edit_barang.php"), array("Hapus", "hapus_barang.php"));
			foreach($b as $c)
			{
				printf("<td>%s</td>", $c);
			}
			foreach($extra as $c)
			{
				printf("<td><a href='%s'>%s</a></td>", $c[1]."?id=".$b[0], $c[0]);
			}
			echo "</tr>";
		}
		break;
	}
	case "mantran":
	{
		$a = $db->get_transaksi();
		$header = array("id", "id_user", "id_barang", "jumlah", "tanggal_beli", "tanggal_bayar", "invoice", "file_bukti_bayar", "resi");
		echo "<tr>";
		foreach ($header as $e) 
		{
			printf("<td><b>%s</b></td>", $e);
		}
		echo "</tr>";
		foreach($a as $b)
		{
			echo "<tr>";
			$extra = array(array("Edit", "edit_transaksi.php"), array("Hapus", "hapus_transaksi.php"));
			foreach($b as $c)
			{
				printf("<td>%s</td>", $c);
			}
			foreach($extra as $c)
			{
				printf("<td><a href='%s'>%s</a></td>", $c[1]."?id=".$b[0], $c[0]);
			}
			echo "</tr>";
		}
		break;
	}
}
?>
</table>
</body>
</html>