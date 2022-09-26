<html>
<head>
	<style>
		body{
			font-size:14px;
			font-family:tahoma;
			font-weight:bold;
		}
		table{
			border : 1px solid #000;
			text-align : center;
			font-family:tahoma;
			font-size:12px;
		}
		table tr th{
			border : 1px solid #000;
			background : gray;
			color : #FFF;
			padding:3px;
		}
		table tr td{
			border : 1px solid #000;
		}
	</style>
<link rel="stylesheet" media="all" href="style.css" type="text/css" />

</head>
<body>

<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="index.php">Clustering</a>
  <a href="index2.php">KNN</a>
  <a href="coba.php">Data Barang</a>
  <a href="cobatransaksi.php">Data Transaksi</a>

</div>

<?php

error_reporting(0);

      include "objek.php";
	  include "ClusteringKMean.php";
	  
      for ($i=0;$i<count($_POST[objek]);$i++){
			$obj = $_POST[objek];
			$data = explode(",",$obj[$i]);
			for ($j=0;$j<count($data);$j++){
				$objek[$i][$j] = $data[$j];
			}
	  }
	  for ($i=0;$i<count($_POST[cluster]);$i++){
			$cls = $_POST[cluster];
			$data = explode(",",$cls[$i]);
			for ($j=0;$j<count($data);$j++){
				$centroid[$i][$j] = $data[$j];
			}
	  }	  
	
	   //K-MEAN	   
	  echo "<div style='width:500px;float:left;'>
			<div style='width:500px;text-align:center;padding-bottom:30px;'>K- MEAN</div>";
      $clustering = new ClusteringKMean($objek, $centroid);
      $clustering->setClusterObjek(1);
	  echo "</div>";
	  
?>	
</body>
</html>