<?php
include('header.php');
?>

	<SCRIPT language="javascript">
		function addRow(tableID) {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var cell1 = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
			cell1.appendChild(element1);
		}

		function Add(id){
			var table=document.getElementById(id);
			var clone=table.getElementsByTagName('Tbody')[1].cloneNode(true);
				table.appendChild(clone);

			var rowCount = table.rows.length;
			var row = table.rows[rowCount];
			table.rows[rowCount-1].cells[0].innerHTML = rowCount-1;
		}


		function deleteRow(tableID) {
			try {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
				if (rowCount>2){
					table.deleteRow(rowCount-1);
					rowCount--;
				}
			}catch(e) {
				alert(e);
			}
		}
	</SCRIPT>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
$(window).load(function(){
$("#ktp").change(function() {
			console.log($("#ktp option:selected").val());
			if ($("#ktp option:selected").val() == 'TingkatPenjualan') {
				$('.no_ktp').prop('hidden', false);
			} else {
				$('.no_ktp').prop('hidden', 'true');
			}
		});
});
</script>
<div style="width:950;text-align:center;font-weight:bold;padding-bottom:30px;">CLUSTERING DATA</div>

<?php
include "koneksi.php";
//Query JOINT Table
$db=mysql_query("select barang.id_barang, nama_barang, stok, nama, untung, prioritas, sum(jumlah) as 
jumlah from kategori join barang on barang.id_kategori = kategori.id_kategori left join transaksi 
on barang.id_barang = transaksi.id_barang group by barang.id_barang, nama_barang, stok, nama, untung, prioritas");
?>
<form action="index.php" method="post" name="postform">
            <p align="center"><font color="orange" size="3"><b>Pencarian Data Berdasarkan Atribut Barang</b></font></p><br />
            <table border="0">
                <tr>
                    <td width="125"><b>Atribut Barang</b>
                    <td colspan="2" width="190">: 
					<select id="ktp" class="select2_single form-control" tabindex="-1" type="text" name="data">
                            <option></option>
                            <option value="Stok">Stok</option>
                            <option value="Untung">Untung</option>
                            <option value="Prioritas">Prioritas</option>
                            <option value="TingkatPenjualan">TingkatPenjualan<br></option>
                          </select>
					 <td width="125" class="no_ktp" value="" hidden><b>Dari Tanggal</b></td>
                    <td class="no_ktp" colspan="2" width="190" hidden>: <input type="date" name="tanggal_awal" size="16" />               
                    </td>
                    <td class="no_ktp" width="125" hidden><b>Sampai Tanggal</b></td>
                    <td class="no_ktp"colspan="2" width="190" hidden>: <input type="date" name="tanggal_akhir" size="16" />              
                    </td>

                    <a href="javascript:void(0)" ></a>                
                    </td>
                    <td colspan="2" width="190"><input type="submit" value="Cari" name="pencarian"/></td>
                </tr>
            </table>
        </form><br />
        <p>
        <?php
            //proses jika sudah klik tombol pencarian data
            if(isset($_POST['pencarian'])){
            //menangkap nilai form
            $data=$_POST['data'];
			$tanggal_awal=$_POST['tanggal_awal'];
            $tanggal_akhir=$_POST['tanggal_akhir'];
            if(empty($data)){
            //jika data tanggal kosong
            ?>
            <script language="JavaScript">
                alert('Data Harap di Isi!');
                document.location='index.php';
            </script>
            <?php
            }elseif($data == 'TingkatPenjualan' and empty($tanggal_awal) || empty($tanggal_akhir)){
            //jika data tanggal kosong
            ?>
            <script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='index.php';
            </script>
            <?php
			}elseif($data == 'TingkatPenjualan'){
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
            <?php
            $query=mysql_query("select barang.id_barang, nama_barang, sum(jumlah) as TingkatPenjualan from barang left join transaksi on barang.id_barang = transaksi.id_barang where Tanggal_transaksi between '$tanggal_awal' and '$tanggal_akhir' or jumlah is null group by barang.id_barang, nama_barang");
            }elseif($data == 'Prioritas'){
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan data <b><?php echo $_POST['data']?></b></i>
            <?php
            $query=mysql_query("select barang.id_barang, nama_barang, $data from barang join kategori on barang.id_kategori = kategori.id_kategori");
            }else{
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan data <b><?php echo $_POST['data']?></b></i>
            <?php
            $query=mysql_query("select id_barang, nama_barang, $data from barang");
            }
        ?>
        </p>
<form action="hasil.php" target="_BLANK" method="POST">
<div style="float:left;width:500px;">
	<div style="width:500px;text-align:center;font-weight:bold;padding:10px;">DATA OBJEK</div><br>

	<TABLE width="550px" border="1" cellpadding="0" cellspacing="0" bordercolor="#000066" id="data">
		<tbody>
			<TR>
				<Th>No</Th>
				<Th>Id Barang</Th>
				<Th>Nama Barang</Th>
				<Th><?php echo $data?></Th>
			</TR>
		</tbody>
		<tbody>
		<?php if(mysql_num_rows($db)>0){ ?>
        <?php
            $no = 1;
            while($dat = mysql_fetch_array($query)){
        ?>
			<TR>
				<TD><?php echo $no ?></TD>
				<TD><?php echo $dat["id_barang"]?> </TD>
				<TD><?php echo $dat["nama_barang"]?> </TD>
				<TD><input type="text" size="7" name="objek[]" value="<?php echo $dat["$data"]?>"/> </TD>
			</TR>
			<?php $no++; } ?>
			<?php } ?>
		</tbody>
	</TABLE>
</div>

<div style="float:right;width:400px;">
	<div style="width:300px;text-align:center;font-weight:bold;padding:10px;">DATA CLUSTER</div>
	
	<button onclick="deleteRow('cluster');return false;"/>Hapus Cluster</button>
	<button onclick="Add('cluster');return false;"/>Tambah Cluster</button><br>

	<TABLE width="300px" border="1" cellpadding="0" cellspacing="0" bordercolor="#000066" id="cluster">
		<tbody>
			<TR>
				<Th>Cluster</Th>
				<Th>Centroid Awal</Th>
			</TR>
		</tbody>
		<tbody>
			<TR>
				<TD> 1 </TD>
				<TD><INPUT type="text" size="9" name="cluster[]"/></TD>
			</TR>
		</tbody>
	</TABLE>
</div>
<div style="float:left;width:550px;margin-top:50px;text-align:center;"><button type="submit">Proses</button></div>
</form>	
	<?php
        }
        else{
            unset($_POST['pencarian']);
        }
        ?>
        <iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>	
		
		<?php
include('footer.php');
?>