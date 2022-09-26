<?php
require_once ("koneksi.php");

if($_GET['Id_barang'] != "");
{
	$Id_barang = $_GET['Id_barang'];
	mysql_query("DELETE From Manajemen where Id_barang='".$_GET['Id_barang']."'");
	
	echo "<script>alert('Data berhasil dihapus')</script>";
	echo "<meta http-equiv='refresh'content='0;url=cobaknn.php'>";
}
?>