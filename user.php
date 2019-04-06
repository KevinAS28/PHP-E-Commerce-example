<?php
include("database.php");

if (!isset($user_class))
{

	$user_class=true;
	class user{
			public $page_disallowed=array("1"=>array(), "2"=>array("admin_page.php", "database.php","edit_barang.php", "tambah_user.php", "tambah_transaksi.php", "edit_transaksi.php"));

		public $dat = array();
		public function __construct($id)
		{
			$db = new Database();
			$this->dat=$db->get_user($id);
		}
	}
}
?>