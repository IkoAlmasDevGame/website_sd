<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sd_perpustakaan";
$port = 3306;

$conPerpustakaan = mysqli_connect($host, $user, $pass, $dbname, $port) or mysqli_connect_errno();
?>