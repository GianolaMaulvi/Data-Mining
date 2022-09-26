<?php
require_once ("koneksi.php");
?>

<div class="container">
<form action="" method="post" style="max-width:300px;margin:auto">
<h2>Tambah Transaksi</h3>
<table class="btn">
<tr>
	<td class="input-container">
		<i class="fa fa-key icon"></i>
		<input class="input-field" name="Id_transaksi" type="text" placeholder="Kode Transaksi">
	</td>
</tr>
<tr>
	<td class="input-container">
		<i class="fa fa-key icon"></i>
		<input class="input-field" name="Id_barang" type="text" placeholder="Kode Barang">
	</td>
</tr>
<tr>
	<td class="input-container">
		<i class="fa fa-user icon"></i>
		<input class="input-field" name="Jumlah" type="text" placeholder="Jumlah">
	</td>
</tr>
<tr>
	<td class="input-container">
		<i class="fa fa-calendar icon"></i>
		<input class="input-field" name="Tanggal_transaksi" type="date" placeholder="Tanggal Transaksi">
	</td>
</tr>
<tr>
<td><input name="submit" type="submit" value="Insert" class="btn"></td>
</tr>
</table>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$query="insert into transaksi(Id_transaksi, Id_barang, Jumlah, Tanggal_transaksi) value 
	('".$_POST['Id_transaksi']."','".$_POST['Id_barang']."','".$_POST['Jumlah']."','".$_POST['Tanggal_transaksi']."')";

	$query1="UPDATE `barang` SET `Stok` = `Stok` - '".$_POST['Jumlah']."' WHERE `Barang`.`Id_barang` = '".$_POST['Id_barang']."'";
	
	//eksekusi query
	$hasil=mysql_query($query) or die (mysql_error());
	$hasil1=mysql_query($query1) or die (mysql_error());
?>
<script>
alert("data sukses ditambah");
window.location='cobatransaksi.php'; </script>
<?php
}?>