<?php 
include "../../controller/SiswaBaru.php";
include "../../database/Migrations/dbSiswa.php";

$namaGuru = htmlentities(trim($_POST["nama"]));
$gender = htmlentities(trim($_POST["jeniskelamin"]));

if(NamaGuru($namaGuru, $gender)){
    $response = array();
    $response['t_guru'] = array();
    array_push($response['t_guru'], $namaGuru, $gender);
    header("location:../../view/dashboard/guru.php");
}else{
    header("location:../../view/dashboard/guru.php");
}
?>