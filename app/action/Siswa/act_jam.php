<?php 
include "../../controller/SiswaBaru.php";
include "../../database/Migrations/dbSiswa.php";

$jam = htmlentities(trim($_POST['jam']));
$mulai = htmlentities(trim($_POST['mulai']));
$akhir = htmlentities(trim($_POST['akhir']));

if(TambahJam($jam,$mulai,$akhir)){
    header("location:../../view/dashboard/guru.php");
}else{
    header("location:../../view/dashboard/guru.php");
}
?>