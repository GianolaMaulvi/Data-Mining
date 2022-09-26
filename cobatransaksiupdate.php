<?php
require_once ("koneksi.php"); 
$query1 = mysql_query("SELECT * FROM transaksi where Id_transaksi='".$_GET['id_transaksi']."' "); 
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
			<td>Id Transaksi</td> 
			<td><input name="Id_transaksi" type="text" value="<?php echo $data['Id_transaksi']?>" readonly="readonly"></td> 
		</tr> 
		<tr> 
			<td>Id Barang</td> 
			<td><input name="Id_barang" type="text" value="<?php echo $data['Id_barang']?>"></td> 
		</tr>
		<tr> 
			<td>Jumlah</td> 
			<td><input name="Jumlah" type="text" value="<?php echo $data['Jumlah']?>"></td> 
		</tr>
		<tr> 
			<td>Tanggal</td> 
			<td><input name="Tanggal_transaksi" type="date" value="<?php echo $data['Tanggal_transaksi']?>"></td> 
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
			  $query="UPDATE `transaksi` SET `Id_transaksi` = '".$_POST['Id_transaksi']."', `Id_barang` = '".$_POST['Id_barang']."', `Jumlah` = '".$_POST['Jumlah']."', `Tanggal_transaksi` = '".$_POST['Tanggal_transaksi']."' WHERE `Transaksi`.`Id_transaksi` = '".$_POST['Id_transaksi']."';"; 
			  
			  $hasil=mysql_query($query) or die (mysql_error()); 
			  ?>
			  
			  <script> 
			  alert("data sukses Diupdate"); 
			  window.location='cobatransaksi.php';
</script> 
			  <?php 
			  }
			  ?>