<?php
include('header.php');
?>

<?php
include "koneksi.php";
$db=mysql_query("select * FROM transaksi order by Id_transaksi desc");
?>

<div style="float:left;width:500px;">
	<div style="width:500px;text-align:center;font-weight:bold;padding:10px;">DATA TRANSAKSI</div>

<!-- Trigger/Open The Modal -->
<table>
<tr>
<th><button class="btn" id="myBtn">Tambah Transaksi</button></th>
<th><button class="btn"> <a href="filter.php">Penyortiran</a></button></th>
</tr>
</table>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<?php include "cobatransaksitambah.php";?>
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

	<TABLE class="table" id="data">
		<tbody>
			<TR>
				<Th>No</Th>
				<Th>Kode Transaksi</Th>
				<Th>Kode Barang</Th>
				<Th>Jumlah</Th>
				<Th>Tanggal</Th>
				
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
				<TD><?php echo $data["Id_transaksi"]?> </TD>
				<TD><?php echo $data["Id_barang"]?> </TD>
				<TD><?php echo $data["Jumlah"]?> </TD>
				<TD><?php echo $data["Tanggal_transaksi"]?> </TD>
				<TD> 
					<a
					href="cobatransaksiupdate.php?id_transaksi=<?php echo $data['Id_transaksi']?>" class="btn">Update</a>
				</TD>	
				<TD>
					<a
					href="cobatransaksidelete.php?id_transaksi=<?php echo $data['Id_transaksi']?>" class="btn"
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