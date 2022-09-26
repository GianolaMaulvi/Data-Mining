<?php
require_once ("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
<style type="text"/css>
</style>
</head>
<body>
<div class="container">
<h3>Tambah Barang</h3>
<form action="" method="post">
<table class="table">
<tr><td>ID Barang</td>
<td><input name="Id_barang" type="text" ></td>
</tr>
<tr><td>Nama Barang</td>
<td><input name="Nama_barang" type="text"></td>
</tr>
<tr><td>Harga Beli</td>
<td><input name="Harga_beli" type="text"></td>
</tr>
<tr><td>Harga Jual</td>
<td><input name="Harga_jual" type="text"></td>
</tr>
<tr><td>Stok</td>
<td><input name="Stok" type="text"></td>
</tr>
<tr><td>ID Kategori</td>
			<td><select name="Id_kategori">
				
                        <option value="<?php echo $data['Nama']?>" ></option>
							<?php
							$kategori=array("K0001","K0002","K0003","K0004","K0005","K0006","K0007","K0008","K0009","K0010");
							$kategori1=array("Hexagon Bolt & Nut","Machine Screw","Nut","Ring","Flange Bolt","Rattan Screw","Drywall Screw","Self-Tapping Screw","Calciboard Screw","Carriage Bolt & Nut");
							$jlh_bln=count($kategori);
							for($c=0; $c<$jlh_bln; $c+=1){
								echo"<option value=$kategori[$c]> $kategori1[$c] </option>";
							}
							?>
            </select></td>
</tr>
<tr><td>Saran Restok</td>
<td><input name="saran_restok" type="text"></td>
</tr>
<tr>
<td colspan="2"><input class="btn" name="submit" type="submit" value="Insert"></td>
</tr>
</table>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$query="insert into barang(Id_barang, Nama_barang, Harga_beli, Harga_jual, Untung, Stok, Id_kategori, saran_restok) value 
	('".$_POST['Id_barang']."','".$_POST['Nama_barang']."','".$_POST['Harga_beli']."','".$_POST['Harga_jual']."','".$_POST['Harga_jual']."' - '".$_POST['Harga_beli']."','".$_POST['Stok']."','".$_POST['Id_kategori']."','".$_POST['saran_restok']."')";

	//eksekusi query
	$hasil=mysql_query($query) or die (mysql_error())
?>
<script>
alert("data sukses ditambah");
window.location='coba.php'; </script>
<?php
}?>