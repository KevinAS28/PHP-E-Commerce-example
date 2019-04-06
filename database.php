<?php
if (!isset($db))
{
	class Database
	{
		private $connection;

		public function header_tb($tbname)
		{
			return $this->cusq( sprintf("show columns from %s", $tbname));
		}
		public function __construct($ip="127.0.0.1", $db="emart", $uname="root", $password="")
		{
			$this->connection = mysqli_connect($ip, $uname, $password);
			$this->cusq( sprintf("use %s", $db));
		}
		public function get_user($id="")
		{
			if (!$id=="")
			{
			$a = $this->cusq( sprintf("select * from users where id='%s'", $id));
			}
			else{
			$a = $this->cusq( sprintf("select * from users"));

			}

			$b = array();
			$i = 0;
			while ($e = mysqli_fetch_row($a))
			{
				$b[$i] = $e;
				$i++;
			}
			return $b;
		}
		public function cusq($q)
		{
			return mysqli_query($this->connection, $q);
		}
	public function get_transaksi($id="")
		{
			if (!$id=="")
			{
			$a = $this->cusq( sprintf("select * from transaksi where id='%s'", $id));
			}
			else{
			$a = $this->cusq( sprintf("select * from transaksi"));

			}

			$b = array();
			$i = 0;
			while ($e = mysqli_fetch_row($a))
			{
				$b[$i] = $e;
				$i++;
			}
			return $b;

		}


	public function get_barang($id="")
		{
			if (!$id=="")
			{
			$a = $this->cusq( sprintf("select * from barang where id='%s'", $id));
			}
			else{
			$a = $this->cusq( sprintf("select * from barang"));

			}

			$b = array();
			$i = 0;
			while ($e = mysqli_fetch_row($a))
			{
				$b[$i] = $e;
				$i++;
			}
			return $b;

		}
		public function get_barang_by_owner($id)
		{
			$a = $this->cusq( sprintf("select * from barang where owner_id='%s'", $id));

			$b = array();
			$i = 0;
			while ($e = mysqli_fetch_row($a))
			{
				$b[$i] = $e;
				$i++;
			}
			return $b;
		}
		public function get_transaksi_owner($id_owner)
		{
			$id_barang_owner = array();
			$q = sprintf("select id from barang where owner_id='%s'", $id_owner);

			$a = $this->cusq($q);
			$i = 0;
			while ($b = mysqli_fetch_row($a))
			{
				$id_barang_owner[$i] = $b[0];
				$i++;
			}
			$i = 0;
			$transaksi = array();
			$b = $this->cusq("select * from transaksi");
			while ($c = mysqli_fetch_row($b))
			{
				$ada = false;
				foreach ($id_barang_owner as $cek)
				{	
					if ($c[2]==$cek)
					{

						$ada = true;
						break;
					}
				}
				if (!$ada){continue;}
				$transaksi[$i] = $c;
				$i++;
			}
			return $transaksi;
		}
		public function transaksi($id_barang, $id_user, $jumlah)
		{
			$tanggal = date("y-m-d h:m:s.ms");
			$q0 = sprintf("insert into transaksi(id_barang, id_user, jumlah, tanggal_beli) values('%s', '%s', '%s', '%s');", $id_barang, $id_user, $jumlah, $tanggal);
			$this->cusq( $q0);
			$rownya = mysqli_fetch_row($this->cusq( "select * from transaksi order by id desc"));
			$invoice = "EMIV".((string)$rownya[0]);
			$this->cusq( sprintf("update transaksi set invoice='%s' where id='%s'", $invoice, $rownya[0]));
			return $invoice;
		}
		public function beli_barang($id_barang, $id_user, $jumlah)
		{
			$tanggal_beli = date("y-m-d h:m:s.ms");
			$invoice = $this->transaksi($id_barang, $id_user, $jumlah, $tanggal_beli);
			$q1= sprintf("select * from barang where id='%s'", $id_barang);
			$barang = mysqli_fetch_row($this->cusq( $q1));
			$stok = (int)$barang[2];
			$sisa = $stok-((int)$jumlah);
			$q2= sprintf("update barang set jumlah='%s' where id='%s'", (string)$sisa, $id_barang);
			$this->cusq( $q2);
			return $invoice;
		}
		public function login($email, $pass)
		{
			//$pass = md5($pass);
			$a = $this->cusq(  sprintf("select * from users where email='%s' and password='%s'", $email,$pass));
			return mysqli_fetch_row($a);
			
		}
		public function tambah_users($email, $pass, $nama, $alamat, $umur, $id_tipe)
		{
			$this->cusq( sprintf("insert into users(email, password, nama, alamat, umur, id_tipe_akun) values('%s', '%s', '%s', '%s', '%s', '%s');", $email, $pass, $nama, $alamat, $umur, $id_tipe));
		}
		public function get_type($id)
		{
			return mysqli_fetch_row($this->cusq("select * from tipe_akun"));
		}
		public function tambah_barang($nama_barang, $jumlah, $deskripsi, $owner_id, $harga, $gambar)
		{
			$q = sprintf("insert into barang(nama_barang, jumlah, deskripsi, owner_id, harga, gambar) values('%s', '%s', '%s', '%s', '%s', '%s');", $nama_barang, $jumlah, $deskripsi, $owner_id, $harga, $gambar);
			
			$this->cusq( $q);
		}		
		public function set_user_dp($id, $pic)
		{
			$this->cusq(sprintf("update users set dp='%s' where id='%s'", $pic, $id));
		}
		public function edit_users($id, $email, $pass, $nama, $alamat, $umur, $id_tipe)
		{
			$this->cusq( sprintf("update users set email='%s', password='%s', nama='%s', alamat='%s', umur='%s', id_tipe_akun='%s' where id='%s'", $email, $pass, $nama, $alamat, $umur, $id_tipe, $id));
		}		
		public function edit_transaksi($id, $id_user, $id_barang, $jumlah, $tanggal_beli, $tanggal_bayar, $invoice, $resi, $gambar)
		{
			$q = sprintf("update transaksi set id_user='%s', id_barang='%s', jumlah='%s', tanggal_beli='%s', tanggal_bayar='%s', invoice='%s', resi='%s', file_bukti_bayar='%s' where id='%s'", $id_user, $id_barang, $jumlah, $tanggal_beli, $tanggal_bayar, $invoice, $resi, $gambar, $id);
			$this->cusq( $q);
		}
		public function hapus_transaksi($id)
		{
						$this->cusq( sprintf("delete from transaksi where id='%s'", $id));
		}
		public function edit_barang($id, $nama_barang, $jumlah, $deskripsi, $owner_id, $harga)
		{
			$q = sprintf("update barang set nama_barang='%s', jumlah='%s', deskripsi='%s', owner_id='%s', harga='%s' where id='%s'", $nama_barang, $jumlah, $deskripsi, $owner_id, $harga, $id);
			$this->cusq( $q);
		}		
		public function hapus_users($id)
		{
			$this->cusq( sprintf("delete from users where id='%s'", $id));
		}

		public function hapus_barang($id)
		{
			$this->cusq( sprintf("delete from barang where id='%s'", $id));
		}
		public function hapus_keranjang_user($id)
		{
			$this->cusq( sprintf("delete from keranjang where id_user='%s'", $id));
		}
		public function hapus_keranjang($id)
		{
			$this->cusq( sprintf("delete from keranjang where id='%s'", $id));
		}		

		public function keranjang($id="")
		{
			if ($id==""){
				$a = $this->cusq( "select * from keranjang");
			}
			else{
				$a = $this->cusq( sprintf("select * from keranjang where id_user='%s'", $id));
			}
			$toreturn = array();
			$i=0;
			while ($b=mysqli_fetch_row($a))
			{
				$toreturn[$i]=$b;
				$i++;
			}
			return $toreturn;
		}
		public function beli_semua_keranjang($id)
		{

		}
		public function tambah_keranjang($id_user, $id_barang, $jumlah)
		{
			$this->cusq( sprintf("insert into keranjang(id_user, id_barang, jumlah) values('%s', '%s', '%s')", $id_user, $id_barang, $jumlah));
		}
		public function pembelian_saya($id)
		{
			$a = $this->cusq(sprintf("select * from transaksi where id_user='%s'", $id));
			$toreturn = array();
			$i = 0;
			while ($b = mysqli_fetch_row($a))
			{
				$toreturn[$i] = $b;
				$i++;
			}
			return $toreturn;
		}
		public function masukan_bukti($file, $id)
		{
			$q = sprintf("update transaksi set file_bukti_bayar='%s' where id='%s';", $file, $id);
			$this->cusq($q);
		}
		public function excel_laporan()
		{
			$filename = "laporan.xls"; 
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			$user_query = $this->cusq("select * from transaksi");
			$flag = false;
			while ($row = mysqli_fetch_assoc($user_query)) {
			    if (!$flag) {
			        echo implode("\t", array_keys($row)) . "\r\n";
			        $flag = true;
			    }
			    echo implode("\t", array_values($row)) . "\r\n";
			}			
		}
	}
	$db=true;

}

?>