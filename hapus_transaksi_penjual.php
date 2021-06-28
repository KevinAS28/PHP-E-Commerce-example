
<?php

include("security.php");
include("database.php");
if (!isset($_GET["id"]))
{
	header("location: penjualan.php");
}
$db = new Database();
$db->hapus_transaksi($_GET["id"]);

	printf("<script>
		alert('Transaksi Berhasil Dihapus');
		window.location.replace('penjualan.php');
		</script>");
?>