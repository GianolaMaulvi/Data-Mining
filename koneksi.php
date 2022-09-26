<?php
 

$databasetype='mysql';
$server='localhost';
$user='root';
$password='';
$database='toko_dinar';

mysql_connect($server,$user,$password) or die (mysql_error());
mysql_select_db($database);

?>