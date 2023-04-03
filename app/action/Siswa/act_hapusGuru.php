<?php 
include "../../controller/SiswaBaru.php";
include "../../database/Migrations/dbSiswa.php";

if(isset($_POST["hapusGuru"])){

$namaGuru = htmlentities(trim($_POST["nama"]));

    if(HapusGuru($namaGuru)){
        $response = array();
        $response['t_guru'] = array();
        array_push($response['t_guru'], $namaGuru);
        header("location:../../view/dashboard/guru.php");
    }else{
        header("location:../../view/dashboard/guru.php");
    }
}
?>