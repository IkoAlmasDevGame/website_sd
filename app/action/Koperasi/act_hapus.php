<?php 
include "../../controller/Koperasi.php";
include "../../database/Migrations/dbKoperasi.php";

global $conKoperasi;
$idbarang = htmlentities(trim($_POST["id_barang"]));
$hapus = $conKoperasi->query("DELETE FROM t_databarang WHERE id_barang='$idbarang'");
if($hapus == 0){
    header("location:../../view/koperasi/databarang.php?proses=hapus");
}else{
    header("location:../../view/koperasi/databarang.php?proses=hapus_gagal");
}
?>