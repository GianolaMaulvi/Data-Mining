<?php
include('header.php');
?>
<div style="width:950;text-align:center;font-weight:bold;padding-bottom:30px;">K-Nearest Neighbor</div>

<button class="btn"><a href="cobaknn.php">Tambah KNN</a></button>
<br>
<br>
<?php
require_once('koneksi.php');
$query1="SELECT manajemen.Id_barang, Stok1, Untung1, Prioritas1, Tingkat_penjualan1, Nama_barang,stok,saran_restok,
sum(pow((Stok1 -1),2))  + pow((Untung1 -1),2) + pow((Prioritas1 -1),2) + pow((Tingkat_penjualan1 -1),2)as knn, sum(saran_restok - stok) as saran_restok FROM manajemen join barang  where manajemen.Id_barang = barang.Id_barang group by manajemen.Id_barang, Stok1, Untung1, Prioritas1, Tingkat_penjualan1, Nama_barang,stok,saran_restok order by barang.id_barang";

$pola='asc';
$polabaru='asc';
if(isset($_GET['orderby'])){
	$orderby=$_GET['orderby'];
	$pola=$_GET['pola'];
	
	$query1="SELECT manajemen.Id_barang, Stok1, Untung1, Prioritas1, Tingkat_penjualan1, Nama_barang,stok,saran_restok,
sum(pow((Stok1 -1),2))  + pow((Untung1 -1),2) + pow((Prioritas1 -1),2) + pow((Tingkat_penjualan1 -1),2)as knn, sum(saran_restok - stok) as saran_restok  FROM manajemen join barang where manajemen.Id_barang = barang.Id_barang group by manajemen.Id_barang, Stok1, Untung1, Prioritas1, Tingkat_penjualan1, Nama_barang,stok, saran_restok order by $orderby $pola ";
	if($pola=='asc'){
		$polabaru='desc';
		
	}else{
		$polabaru='asc';
	}
}
?>
<table class="table" id="data" >
<tbody>
<th>
				<td><a href='index2.php?orderby=manajemen.Id_barang&pola=<?=$polabaru;?>'>Id Barang</a></td>
				<td><a href='index2.php?orderby=Stok1&pola=<?=$polabaru;?>'>Stok</a></td>
				<td><a href='index2.php?orderby=Untung1&pola=<?=$polabaru;?>'>Untung</a></td>
				<td><a href='index2.php?orderby=Prioritas1&pola=<?=$polabaru;?>'>Prioritas</a></td>
				<td><a href='index2.php?orderby=Tingkat_penjualan1&pola=<?=$polabaru;?>'>Tingkat Penjualan</a></td>
				<td><a href='index2.php?orderby=Nama_barang&pola=<?=$polabaru;?>'>Nama Barang</a></td>
				<td><a href='index2.php?orderby=knn&pola=<?=$polabaru;?>'>KNN</a></td>
				<td><a href='index2.php?orderby=stok&pola=<?=$polabaru;?>'>Stok</a></td>
				<td><a href='index2.php?orderby=saran_restok&pola=<?=$polabaru;?>'>Saran Restok</a></td>
</th>
				
<?php
//query database 
$result=mysql_query($query1) or die(mysql_error());
$no=1; //penomoran 


while($rows=mysql_fetch_object($result)){
			$knn= pow(($rows -> Stok1 -1),2) + pow(($rows -> Untung1 -1),2) + pow(($rows -> Prioritas1 -1),2) + pow(($rows -> Tingkat_penjualan1 -1),2);
			?>
			<tr>
				<td><?php echo $no
				?></td>
				<td><?php		echo $rows -> Id_barang;?></td>
				<td><?php		echo $rows -> Stok1;?></td>
				<td><?php		echo $rows -> Untung1;?></td>
				<td><?php		echo $rows -> Prioritas1;?></td>
				<td><?php		echo $rows -> Tingkat_penjualan1;?></td>
				<td><?php		echo $rows -> Nama_barang;?></td>
				<td><?php		echo pow(($rows -> Stok1 -1),2) + pow(($rows -> Untung1 -1),2) + pow(($rows -> Prioritas1 -1),2) + pow(($rows -> Tingkat_penjualan1 -1),2);?></TD>
				<td><?php		echo $rows -> stok;?></td>
				<td><?php		echo $rows -> saran_restok;?></td>

			</tr>
			<?php
$no++;

}?>
		</tbody>
		</table>

<?php
include('footer.php');
?>