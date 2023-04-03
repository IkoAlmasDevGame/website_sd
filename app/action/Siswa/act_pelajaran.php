<?php 
include "../../controller/SiswaBaru.php";
include "../../database/Migrations/dbSiswa.php";

$pelajaran = htmlentities(trim($_POST["pelajaran"]));

if(TambahPelajaran($pelajaran)){
    header("location:../../view/dashboard/mata_pelajaran.php");
}else{
    header("location:../../view/dashboard/mata_pelajaran.php");
}
?>