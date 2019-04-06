
<?php
include("database.php");
if (!isset($_GET["id"]))
{
	header("location: admin_page.php");
}
$db = new Database();
$db->hapus_barang($_GET["id"]);
echo "<script>alert('Berhasil')</script>";
header("location: admin_page.php?pg=manbar");
?>