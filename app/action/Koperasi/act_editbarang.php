<?php 
include "../../database/Migrations/dbKoperasi.php";
include "../../controller/Koperasi.php";

if(isset($_POST["simpan"])){

    $kodebarang = htmlentities(trim($_POST["kode_barang"]));
    $namabarang = htmlentities(trim($_POST["nama_barang"]));
    $jenisbarang = htmlentities(trim($_POST["jenis"]));
    $hargabarang = htmlentities(trim($_POST["harga_barang"]));
    $jumlahbarang = htmlentities(trim($_POST["jumlah_barang"]));
    $checkbox = htmlentities(trim($_POST["selesai"]));
    $idbarang = htmlentities(trim($_POST["id_barang"]));

    if($checkbox){
        if(EditBarang($kodebarang,$namabarang,$jenisbarang,$hargabarang,$jumlahbarang,$checkbox,$idbarang)){}
        ?>
        <script type="text/javascript">
            window.location.href="../../view/koperasi/databarang.php?proses=edit";
        </script>
        <?php
    }else{
        unset($_POST["selesai"]);
        header("location:../../view/koperasi/databarang.php?proses=gagal");
    }
}
?>