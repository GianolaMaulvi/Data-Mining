<?php
include('header.php');
?>

<div style="width:950;text-align:center;font-weight:bold;padding-bottom:30px;">DATA BARANG</div>

<?php
include "koneksi.php";
$db=mysql_query("select * FROM barang join kategori on barang.Id_kategori = kategori.Id_kategori order by barang.id_barang desc");
?>


<!-- Trigger/Open The Modal -->
<table>
<tr>
<td><button class="btn" id="myBtn">Tambah Barang</button></td>
</tr>
</table>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<?php include "cobatambah.php";?>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>





<div style="float:left;width:500px;">
	<div style="width:500px;text-align:center;font-weight:bold;padding:10px;"></div>

	<TABLE class="table" id="data">
		<tbody>
			<TR>
				<Th>No</Th>
				<Th>Id Barang</Th>
				<Th>Nama Barang</Th>
				<Th>Harga Beli</Th>
				<Th>Harga Jual</Th>
				<Th>Untung</Th>
				<Th>Stok</Th>	
				<Th>Kategori</Th>	
				<Th>Saran Restok</Th>
				<Th>Action</Th>
			</TR>
		</tbody>
		<tbody>
		<?php if(mysql_num_rows($db)>0){ ?>
        <?php
            $no = 1;
            while($data = mysql_fetch_array($db)){
        ?>
			<TR>
				<TD><?php echo $no ?></TD>
				<TD><?php echo $data["Id_barang"]?> </TD>
				<TD><?php echo $data["Nama_barang"]?> </TD>
				<TD><?php echo $data["Harga_beli"]?> </TD>
				<TD><?php echo $data["Harga_jual"]?> </TD>
				<TD><?php echo $data["Untung"]?> </TD>
				<TD><?php echo $data["Stok"]?> </TD>
				<TD><?php echo $data["Nama"]?> </TD>
				<TD><?php echo $data["saran_restok"] - $data["Stok"]?> </TD>
				<TD> <center style="">
					<a
					href="cobaupdate.php?id_barang=<?php echo $data['Id_barang']?>" class="btn">Update</a>
					<br><br>
					<a 
					href="cobadelete.php?id_barang=<?php echo $data['Id_barang']?>" class="btn"
					onClick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a>
				</TD>
			</TR>
			<?php $no++; } ?>
			<?php } ?>
		</tbody>
	</TABLE>
</div>


<?php
include('footer.php');
?>