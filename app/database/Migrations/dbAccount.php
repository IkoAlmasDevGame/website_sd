<?php 
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sd_data";
$port = 3306;

$conAccount = mysqli_connect($host, $user, $pass, $dbname, $port) or mysqli_connect_errno();
?>