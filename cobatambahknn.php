<?php
require_once ("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<form action="" method="post" style="max-width:300px;margin:auto">
<h2>Tambah KNN</h3>
<table>

<tr>
	<td class="input-container">
		<i class="fa fa-key icon"></i>
		<input class="input-field" name="Id_barang" type="text" placeholder="Kode Barang">
	</td>
</tr>
<tr>
	<td class="input-container">
		<i class="fa fa-user icon"></i>
		<input class="input-field" name="Stok1" type="text" placeholder="Stok">
	</td>
</tr>
<tr>
	<td class="input-container">
		<i class="fa fa-calendar icon"></i>
		<input class="input-field" name="Untung1" type="text" placeholder="Untung">
	</td>
</tr>
<tr>
	<td class="input-container">
		<i class="fa fa-calendar icon"></i>
		<input class="input-field" name="Prioritas1" type="text" placeholder="Prioritas">
	</td>
</tr>
<tr>
	<td class="input-container">
		<i class="fa fa-calendar icon"></i>
		<input class="input-field" name="Tingkat_penjualan1" type="text" placeholder="Tingkat_penjualan">
	</td>
</tr>
<tr>
<td><input name="submit" type="submit" value="Insert" class="btn"></td>
</tr>
</table>
</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$query="insert into manajemen(Id_barang, Stok1, Untung1, Prioritas1, Tingkat_penjualan1) value 
	('".$_POST['Id_barang']."','".$_POST['Stok1']."','".$_POST['Untung1']."','".$_POST['Prioritas1']."','".$_POST['Tingkat_penjualan1']."')";

	$query1="UPDATE `barang` SET `Stok` = `Stok` - '".$_POST['Jumlah']."' WHERE `Barang`.`Id_barang` = '".$_POST['Id_barang']."'";
	
	//eksekusi query
	$hasil=mysql_query($query) or die (mysql_error());
	$hasil1=mysql_query($query1) or die (mysql_error());
?>
<script>
alert("data sukses ditambah");
window.location='cobaknn.php'; 
</script>

<?php
}?>