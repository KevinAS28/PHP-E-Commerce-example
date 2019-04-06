<?php
if (!isset($_SESSION))
{
session_start();	
}


if (!isset($_SESSION["id_user"]))
{
	header("location: index.php");
}
include("user.php");
$user = new user($_SESSION["id_user"]);
$disallowed = $user->page_disallowed[$user->dat[0][6]];
foreach ($disallowed as $a)
{
	if("/emart2/".$a==$_SERVER["REQUEST_URI"])
	{
		header("location: index.php");
		return;
	}
}

?>