<html>
<head>
<title>K-Nearest Neighbour</title>
<?php
include "function.php";
include "koneksi.php";
?>
<link rel="stylesheet" media="all" href="style.css" type="text/css" />
<link rel="stylesheet" media="all" href="nearestneighbour.css" type="text/css" />
</head>

<body>
<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="index.php">Clustering</a>
  <a href ="index2.php">KNN</a>
</div>

<?php
if(isset($_GET[source])) {
    highlight_file(__FILE__);
}else{

?>
<center>
    <table id="patients" cellpadding="3" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Stok</th>
            <th>Untung</th>
            <th>Prioritas</th>
            <th>Tingkat Penjualan</th>
            <th>Prioritas Stok Ulang Barang</th>
            <th>Nilai K-NN</th>
			<th>Saran Restok</th>
        </tr>

    <?php	
	$koneksi_database = mysql_connect("localhost","root","");
	if (!$koneksi_database)
		{
		die('tidak tau'. mysql_error());
		}
	mysql_select_db("tokodinar", $koneksi_database);

        $rows = getRows("SELECT * FROM manajemen join barang where manajemen.Id_barang = barang.Id_barang;", NUM);
        $closest = -1;

        if(isset($_POST[diagnose])) {
            $distance = array_fill(0, count($rows), 0);

            $instance = $_POST[instance];

            for($i = 0; $i < count($rows); $i++) {

                for($j = 1; $j < 5; $j++) {
                    if(pow(($rows[$i][$j] - $instance[$j]),2) == 1)
                        $distance[$i]++;
					elseif(pow(($rows[$i][$j] - $instance[$j]),2) == 4)
                        $distance[$i]+=4;
					elseif(pow(($rows[$i][$j] - $instance[$j]),2) == 9)
                        $distance[$i]+=9;
						elseif(pow(($rows[$i][$j] - $instance[$j]),2) == 16)
                        $distance[$i]+=16;
                }

            }

            $closest = array_search(min($distance), $distance);
            $diagnosis = $rows[$closest][6];
			$saran = $rows[$closest][13];
        }

        $a = 0;
        foreach($rows as $row) {

        ?>
            <tr<?php if($closest == $a) { ?> class="selected"<?php } ?>>
                <td><?=$row[0]?></td>
                <td><?php if ($row[1] == 1){
					echo "Restok";
				}elseif ($row[1] == 2){
					echo "Siaga II";
				}elseif ($row[1] == 3){
					echo "Siaga I";
				}elseif ($row[1] == 4){
					echo "Waspada";
				}elseif ($row[1] == 5){
					echo "Tenang";
				}else{
					echo "None";
				}				
				 ?></td>
				<td><?php if ($row[2] == 1){
					echo "Restok";
				}elseif ($row[2] == 2){
					echo "Siaga II";
				}elseif ($row[2] == 3){
					echo "Siaga I";
				}elseif ($row[2] == 4){
					echo "Waspada";
				}elseif ($row[2] == 5){
					echo "Tenang";
				}else{
					echo "None";
				}				
				 ?></td>
				 <td><?php if ($row[3] == 1){
					echo "Restok";
				}elseif ($row[3] == 2){
					echo "Siaga II";
				}elseif ($row[3] == 3){
					echo "Siaga I";
				}elseif ($row[3] == 4){
					echo "Waspada";
				}elseif ($row[3] == 5){
					echo "Tenang";
				}else{
					echo "None";
				}				
				 ?></td>
				 <td><?php if ($row[4] == 1){
					echo "Restok";
				}elseif ($row[4] == 2){
					echo "Siaga II";
				}elseif ($row[4] == 3){
					echo "Siaga I";
				}elseif ($row[4] == 4){
					echo "Waspada";
				}elseif ($row[4] == 5){
					echo "Tenang";
				}else{
					echo "None";
				}				
				 ?></td>
		
			
                <td><?=$row[6] ?></td>
                <td><?=$distance[$a++]?></td>
				<td><?=$row[21] ?></td>
            </tr>

        <?php

        }
        ?>
        <tr>
            <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                <td><input type="hidden" name="instance[]" value="65" />Kriteria</td>
                <td><select name="instance[]">
                        <option value="1"<?php if($_POST[instance][1] == "1") echo "selected=\"selected\"";?>>Restok</option>
                        <option value="2"<?php if($_POST[instance][1] == "2") echo "selected=\"selected\"";?>>Siga II</option>
						<option value="3"<?php if($_POST[instance][1] == "3") echo "selected=\"selected\"";?>>Siaga I</option>
						<option value="4"<?php if($_POST[instance][1] == "4") echo "selected=\"selected\"";?>>Waspada</option>
						<option value="5"<?php if($_POST[instance][1] == "5") echo "selected=\"selected\"";?>>Tenang</option>
                    </select>
                </td>
                <td><select name="instance[]">
                        <option value="1"<?php if($_POST[instance][2] == "1") echo "selected=\"selected\"";?>>Restok</option>
                        <option value="2"<?php if($_POST[instance][2] == "2") echo "selected=\"selected\"";?>>Siga II</option>
						<option value="3"<?php if($_POST[instance][2] == "3") echo "selected=\"selected\"";?>>Siaga I</option>
						<option value="4"<?php if($_POST[instance][2] == "4") echo "selected=\"selected\"";?>>Waspada</option>
						<option value="5"<?php if($_POST[instance][2] == "5") echo "selected=\"selected\"";?>>Tenang</option>
                    </select>
                </td>
                <td><select name="instance[]">
                        <option value="1"<?php if($_POST[instance][3] == "1") echo "selected=\"selected\"";?>>Restok</option>
                        <option value="2"<?php if($_POST[instance][3] == "2") echo "selected=\"selected\"";?>>Siga II</option>
						<option value="3"<?php if($_POST[instance][3] == "3") echo "selected=\"selected\"";?>>Siaga I</option>
						<option value="4"<?php if($_POST[instance][3] == "4") echo "selected=\"selected\"";?>>Waspada</option>
						<option value="5"<?php if($_POST[instance][3] == "5") echo "selected=\"selected\"";?>>Tenang</option>
                    </select>
                </td>
                <td><select name="instance[]">
                        <option value="1"<?php if($_POST[instance][4] == "1") echo "selected=\"selected\"";?>>Restok</option>
                        <option value="2"<?php if($_POST[instance][4] == "2") echo "selected=\"selected\"";?>>Siga II</option>
						<option value="3"<?php if($_POST[instance][4] == "3") echo "selected=\"selected\"";?>>Siaga I</option>
						<option value="4"<?php if($_POST[instance][4] == "4") echo "selected=\"selected\"";?>>Waspada</option>
						<option value="5"<?php if($_POST[instance][4] == "5") echo "selected=\"selected\"";?>>Tenang</option>
                    </select>
                </td>
				 
                <td <?php if($diagnosis) { ?> class="selected"<?php } ?>><?=$diagnosis?></td>
                <td><input type="submit" name="diagnose" value="Cari" /></td>
				<td <?php if($saran) { ?> class="selected"<?php } ?>><?=$saran?></td>
            </form>
        </tr>

    </table>
</center>
<?php } ?>
</body>
</html>