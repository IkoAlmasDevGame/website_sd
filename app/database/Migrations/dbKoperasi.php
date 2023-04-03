<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sd_koperasi";
$port = 3306;

$conKoperasi = mysqli_connect($host, $user, $pass, $dbname, $port) or mysqli_connect_errno();
?>