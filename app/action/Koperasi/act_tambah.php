<?php 
include "../../controller/Koperasi.php";
include "../../database/Migrations/dbKoperasi.php";

if(isset($_POST["simpanBarang"])){
    $kodebarang = htmlentities(trim($_POST["kode_barang"]));
    $namabarang = htmlentities(trim($_POST["nama_barang"]));
    $jenisbarang = htmlentities(trim($_POST["jenis"]));
    $hargabarang = htmlentities(trim($_POST["harga_barang"]));
    $jumlahbarang = htmlentities(trim($_POST["jumlah_barang"]));
    $checkbox = htmlentities(trim($_POST["selesai"]));

    if($checkbox){
        if(TambahBarang($kodebarang,$namabarang,$jenisbarang,$hargabarang,$jumlahbarang,$checkbox)){}
        ?>
        <script type="text/javascript">
            window.location.href="../../view/koperasi/databarang.php?proses=berhasil";
        </script>
        <?php
    }else{
        unset($_POST["selesai"]);
        ?>
        <script type="text/javascript">
            window.location.href="../../view/koperasi/databarang.php?proses=gagal";
        </script>
        <?php
    }
}
?>