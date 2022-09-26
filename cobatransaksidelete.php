<?php
require_once ("koneksi.php");

if($_GET['Id_transaksi'] != "");
{
	$Id_barang = $_GET['Id_transaksi'];
	mysql_query("DELETE From Transaksi where Id_transaksi='".$_GET['id_transaksi']."'");
	
	echo "<script>alert('Data berhasil dihapus')</script>";
	echo "<meta http-equiv='refresh'content='0;url=cobatransaksi.php'>";
}
?>