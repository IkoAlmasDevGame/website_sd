<?php 
include "../../database/Migrations/dbPerpustakaan.php";
include "../../controller/Perpustakaan.php";

if(isset($_POST["pinjamBuku"])){
    $nama = htmlentities(trim($_POST["nama"]));
    $id_buku = htmlentities(trim($_POST["id_buku"]));
    $kodebuku = htmlentities(trim($_POST["kode_buku"]));
    $namabuku = htmlentities(trim($_POST["nama_buku"]));
    $onPeminjaman = htmlentities(trim($_POST["onPeminjaman"]));
    $onPengembalian = htmlentities(trim($_POST["onPengembalian"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        if(PeminjamanBuku($nama, $id_buku, $kodebuku, $namabuku, $onPeminjaman, $onPengembalian, $checkInput)){}
        ?>
        <script type="text/javascript">
            window.location.href='../../view/Perpustakaan/peminjaman.php';
        </script>
        <?php
    }else{
        unset($_POST["pinjamBuku"]);
        ?>
        <script type="text/javascript">
            window.location.href='../../view/Perpustakaan/peminjaman.php';
        </script>
        <?php
    }
}
?>