<?php
require_once ("koneksi.php"); 
$query1 = mysql_query("SELECT * FROM manajemen where Id_barang='".$_GET['id_barang']."' "); 
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
			<td>Id Barang</td> 
			<td><input name="Id_barang" type="text" value="<?php echo $data['Id_barang']?>"></td> 
		</tr>
		<tr> 
			<td>Stok</td> 
			<td><input name="Stok" type="text" value="<?php echo $data['Stok1']?>"></td> 
		</tr>
		<tr> 
			<td>Untung</td> 
			<td><input name="Untung" type="text" value="<?php echo $data['Untung1']?>"></td> 
		</tr>
		<tr> 
			<td>Prioritas</td> 
			<td><input name="Prioritas" type="text" value="<?php echo $data['Prioritas1']?>"></td> 
		</tr>
		<tr> 
			<td>Tingkat Penjualan</td> 
			<td><input name="Tingkat_penjualan" type="text" value="<?php echo $data['Tingkat_penjualan1']?>"></td> 
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
			  $query="UPDATE `manajemen` SET  `Id_barang` = '".$_POST['Id_barang']."', `Stok1` = '".$_POST['Stok']."', `Untung1` = '".$_POST['Untung']."', `Prioritas1` = '".$_POST['Prioritas']."', `Tingkat_penjualan1` = '".$_POST['Tingkat_penjualan']."' WHERE `manajemen`.`Id_barang` = '".$_POST['Id_barang']."';"; 
			  
			  $hasil=mysql_query($query) or die (mysql_error()); 
			  ?>
			  
			  <script> 
			  alert("data sukses Diupdate"); 
			  window.location='cobaknn.php';
</script> 
			  <?php 
			  }
			  ?>