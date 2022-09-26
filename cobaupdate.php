<?php
require_once ("koneksi.php"); 
$query1 = mysql_query("SELECT * FROM barang join kategori on barang.Id_kategori = kategori.Id_kategori where Id_barang='".$_GET['id_barang']."' "); 
	while ($data = mysql_fetch_array($query1)) { 
	
?> 
 
 <!DOCTYPE html> 
 <html> 
 <head> 
	 <style type="text/css">  
	 <!-- 
	 .style1 {color: #FFFFFF} 
	 --> 
	 </style> 
	 <link rel="stylesheet" media="all" href="css/coba.css" type="text/css" />

 </head> 
 
 <body> 
 <h3>Update Admin</h3> 
 <form action="" method="post">
	<table width="200" border="0"> 
		<tr>
			<td>Id_barang</td> 
			<td><input name="Id_barang" type="text" value="<?php echo $data['Id_barang']?>" readonly="readonly"></td> 
		</tr> 
		<tr> 
			<td>Nama Barang</td> 
			<td><input name="Nama_barang" type="text" value="<?php echo $data['Nama_barang']?>"></td> 
		</tr>
		<tr> 
			<td>Harga Beli</td> 
			<td><input name="Harga_beli" type="text" value="<?php echo $data['Harga_beli']?>"></td> 
		</tr>
		<tr> 
			<td>Harga Jual</td> 
			<td><input name="Harga_jual" type="text" value="<?php echo $data['Harga_jual']?>"></td> 
		</tr>
		<tr> 
			<td>Stok</td> 
			<td><input name="Stok" type="text" value="<?php echo $data['Stok']?>"></td> 
		</tr>
		<tr>
			<td>Id Kategori</td>
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
		<tr> 
			<td>Saran Restok</td> 
			<td><input name="saran_restok" type="text" value="<?php echo $data['saran_restok']?>"></td>
		</tr>
		<tr> 
			<td colspan="2"><input name="update" type="submit" value="Update" id="update"></td> 
		</tr> 
	</table> 
<?php } ?> 
</form> 


</body> 
			  
</html> 
			  
			  <?php 
			  if(isset($_POST['update'])){ 
			  $query="UPDATE `barang` SET `Id_barang` = '".$_POST['Id_barang']."', `Nama_barang` = '".$_POST['Nama_barang']."', `Harga_beli` = '".$_POST['Harga_beli']."', `Harga_jual` = '".$_POST['Harga_jual']."', `Untung` = '".$_POST['Harga_jual']."' - '".$_POST['Harga_beli']."', `Stok` = '".$_POST['Stok']."', `Id_kategori` = '".$_POST['Id_kategori']."', `saran_restok` = '".$_POST['saran_restok']."' WHERE `Barang`.`Id_barang` = '".$_POST['Id_barang']."';"; 
			  
			  $hasil=mysql_query($query) or die (mysql_error()); 
			  ?>
			  
			  <script> 
			  alert("data sukses Diupdate"); 
			  window.location='coba.php';
</script> 
			  <?php 
			  }
			  ?>