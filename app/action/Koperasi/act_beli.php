<?php 
include "../../controller/Koperasi.php";
include "../../database/Migrations/dbKoperasi.php";

if(isset($_POST["bayar"])){
    $tgl = htmlentities(trim($_POST["tanggal"]));
    $kodebarang = htmlentities(trim($_POST["kode_barang"]));
    $namabarang = htmlentities(trim($_POST["nama_barang"]));
    $harga = htmlentities(trim($_POST["harga"]));
    $jumlahbeli = htmlentities(trim($_POST["jumlah_beli"]));
    $checkbox = htmlentities(trim($_POST["selesai"]));

    if($checkbox){
        if(Pembayaran($tgl,$kodebarang,$namabarang,$harga,$jumlahbeli,$checkbox)){}
        ?>
        <script type="text/javascript">
            window.location.href="../../view/koperasi/penjualan.php?proses=berhasil";
        </script>
        <?php
    }
    unset($_POST["selesai"]);
    ?>
    <script type="text/javascript">
        window.location.href="../../view/koperasi/penjualan.php";
    </script>
    <?php
}
?>