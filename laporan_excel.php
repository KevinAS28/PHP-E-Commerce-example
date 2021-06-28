<?php
include("security.php");
include("database.php");
$db = new Database();
$db->excel_laporan();
//header("location: admin_page.php");
?>