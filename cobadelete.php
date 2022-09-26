<?php
require_once ("koneksi.php");

if($_GET['Id_barang'] != "");
{
	$id_barang = $_GET['Id_barang'];
	mysql_query("DELETE From Barang where Id_barang='".$_GET['id_barang']."'");
	
	echo "<script>alert('Data berhasil dihapus')</script>";
	echo "<meta http-equiv='refresh'content='0;url=coba.php'>";
}
?>