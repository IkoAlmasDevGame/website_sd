<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sd_siswa";
$port = 3306;

$conSiswa = mysqli_connect($host, $user, $pass, $dbname, $port) or mysqli_connect_errno();
?>