<?php 
include "../../database/Migrations/dbPerpustakaan.php";
include "../../controller/Perpustakaan.php";

if(isset($_POST["simpanBuku"])){
    $kodebuku = htmlentities(trim($_POST["kode_buku"]));
    $judulbuku = htmlentities(trim($_POST["judul_buku"]));
    $genrebuku = htmlentities(trim($_POST["genre_buku"]));
    $namapenulis = htmlentities(trim($_POST["nama_penulis"]));
    $tahunterbit = htmlentities(trim($_POST["tahun_terbit"]));
    $namapenerbit = htmlentities(trim($_POST["nama_penerbit"]));
    $jumlahbuku = htmlentities(trim($_POST["jumlah_buku"])); // stock buku yang tersedia
    $abstract = htmlentities(trim($_POST["abstract"]));
    $checkbox  = htmlentities(trim($_POST["selesai"]));

    if($checkbox){
        if(TambahBuku($kodebuku,$judulbuku,$genrebuku,$namapenulis,$tahunterbit,$namapenerbit,$jumlahbuku,$abstract,$checkbox)){}
        ?>
        <script type="text/javascript">
            window.location.href='../../view/perpustakaan/buku.php?buku=berhasil';    
        </script>
        <?php
    }else{
        unset($_POST["selesai"]);
        ?>
        <script type="text/javascript">
            window.location.href='../../view/perpustakaan/buku.php';   
        </script>
        <?php
    }
}
?>