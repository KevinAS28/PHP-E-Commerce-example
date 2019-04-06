<?php
session_start();
include("database.php");
include("user.php");

$db = new Database();
$sudah_login = false;
if (isset($_SESSION["id_user"]))
{
	$sudah_login = true;
}
if (isset($_GET["cari_barang"]))
{
	if ($_GET["cari_barang"]=="")
	{
		header("location: index.php");
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
	<link rel="stylesheet" href="index.css"/>
</head>
<body>
	<div class="topnav">
		<h1 style="color: #fff;">E-MART</h1>
		<a href=""><h3 style="display: inline;margin-left: 5px;">Home</h3></a>

		<?php if ($sudah_login) {
			include("security.php");
			$menu = array("logout", "pemebelian_saya", "keranjang", "saya", "jual_barang", "penjualan", "barang_saya");
			$menu1 = array("Logout", "Pembelian", "Keranjang", "Saya", "Jual", "Penjualan", "Barang Saya");
			for ($i = 0; $i < count($menu); $i++)
			{
			echo '<a href="'.$menu[$i].".php".'"><h3 style="display: inline;margin-left: 10px;">'.$menu1[$i].'</h3></a>';
			}
		if ($user->dat[0][6]=="1")
		{
			echo '<a href="admin_page.php"><h3 style="display: inline;margin-left: 5px;">Admin</h3></a>';

		}
	}
		else{						
			echo '<a href="register.php"><h3 style="display: inline;margin-left: 5px;">Register</h3></a>';
			echo '<a href="login.php"><h3 style="display: inline;margin-left: 5px;">Login</h3></a>';
		}
		echo "<br><br>";
		?>
		
		<form action="index.php" method="get" style="display: inline; margin-left: 10px;">
			<input name="cari_barang" placeholder="Cari Barang" style="margin-bottom: 10px;">
			<input type="submit" style="display: none;"/>
		</form>
	</div>

<div class="banner_barang" style="margin-bottom: 25px;">
	<?php
	$toadd = "";
	$i = 0;
	foreach ($db->get_barang() as $a)
	{

		$id=$a[0];
$gmbr=$a[6];
$nama=$a[1];
$harga=$a[5];
$stok = $a[2];
if (isset($_GET["cari_barang"]))
{
	continue;
}
if ($stok=="0")
{
	continue;
}
				$toadd = $toadd.'
				<div style="display: inline; position: relative;">

				<div style="display: inline; position: relative;" id="ban0">
				<a href="barang.php?barang_id='.$id.'">
				<img class="banner" src="'.$gmbr.'"  style="width: 30%;height: 25%;margin-left: 2% ;border-radius: 5% "/>
				<h1 style="color:white; position: absolute;bottom: 5px;left: 8px; right: 8px;margin-left: 10%;display: inline;" >'.$nama.'</h1>
				<h2 style="color:white; position: absolute;bottom: -15px;left: 8px;margin-left: 10% ;display: inline;" >IDR '.$harga.'</h2>
				</a>
				</div>

				<div style="display: none; position: relative;" id="ban1">
				<a href="barang.php?barang_id='.$id.'">
				<img class="banner" src="gaming2.jpeg"  style="width: 30%;height: 25%;margin-left: 2% ;border-radius: 5% "/>
				<h1 style="color:white; position: absolute;bottom: 5px;left: 8px; right: 8px;margin-left: 10%;display: inline;" >'.$nama.'</h1>
				<h2 style="color:white; position: absolute;bottom: -15px;left: 8px;margin-left: 10% ;display: inline;" >IDR '.$harga.'</h2>
				</a>
				</div>

				<div style="display: none; position: relative;" id="ban2">
				<a href="barang.php?barang_id='.$id.'">
				<img class="banner" src="gaming.jpeg"  style="width: 30%;height: 25%;margin-left: 2% ;border-radius: 5% "/>
				<h1 style="color:white; position: absolute;bottom: 5px;left: 8px; right: 8px;margin-left: 10%;display: inline;" >'.$nama.'</h1>
				<h2 style="color:white; position: absolute;bottom: -15px;left: 8px;margin-left: 10% ;display: inline;" >IDR '.$harga.'</h2>
				</a>
				</div>

				</div>
				'

				;
					$i++;
	if($i==3)
	{
		break;
	}
	}
	echo($toadd);

	?>
</div>


<div class="daftar_barang">
	<?php
	$toadd = "";
	$i = 0;
	$max_per_line = 4;
	foreach ($db->get_barang() as $a)
	{
		
		$id=$a[0];
$gmbr=$a[6];
$nama=$a[1];
$harga=$a[5];
$stok = $a[2];
if (isset($_GET["cari_barang"]))
{
	if (($nama != $_GET["cari_barang"]))
	{
		continue;
	}
}
if ($stok=="0")
{
	continue;
}

				$toadd = $toadd.'<div style="display: inline; position: relative;"><a href="barang.php?barang_id='.$id.'">
				<img class="banner" src="'.$gmbr.'" width="20% " height="25% " style=" margin-left: 2% ;border-radius: 5% "/>
				<h1 style="color:white; position: absolute;bottom: 5px;left: 8px;margin-left: 10% ;display: inline;" >'.$nama.'</h1>
				<h2 style="color:white; position: absolute;bottom: -15px;left: 8px;margin-left: 10% ;display: inline;" >IDR '.$harga.'</h2>
				</a></div>';
				$i++;
				if ($i==$max_per_line)
				{
					$toadd=$toadd."<br><br>";
					$i=0;
				}
	}
	echo($toadd);
	
	
	?>
</div>
<script>
var a = ["ban2", "ban1", "ban0"];
var b = 0;
function test()
{
	if (b==a.length)
	{
		b = 0;
	}
	var c = document.getElementById(a[b]);
	var s;
	if (b==0)
	{
		s = a.length-1;
	}
	else{
		s=b-1;
	}
	var sb = document.getElementById(a[s]);
	c.style.display = "inline";
	sb.style.display = "none";
	b+=1;
	setTimeout(test, 2000);
}
test();
</script>
</body>
</html>