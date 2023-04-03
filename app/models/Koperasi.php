<?php 
global $conKoperasi;

$per_hal = 10;
$jumlah_record=mysqli_query($conKoperasi,"SELECT * from t_databarang");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;

$setelah = $page + 1;
$sebelum = $page - 1;
?>