<?php 
include "../../database/Migrations/dbSiswa.php";
include "../../controller/SiswaBaru.php";

if(isset($_POST["simpanBaru"])){
    $nisn = htmlentities(trim($_POST["NISN"]));
    $namalengkap = htmlentities(trim($_POST["nama_lengkap"]));
    $lahir = htmlentities(trim($_POST["birthday"]));
    $gender = htmlentities(trim($_POST["gender"]));
    $religion = htmlentities(trim($_POST["agama"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        if(TambahMurid($nisn,$namalengkap,$lahir,$gender,$religion,$checkInput)){}
        ?>
        <script type="text/javascript">
            window.location.href='../../view/dashboard/daftarmurid.php?pesan=baru';
        </script>
        <?php
    }else{
        unset($_POST["selesai"]);
        ?>
        <script type="text/javascript">
            window.location.href='../../view/dashboard/daftarmurid.php?pesan=gagal';
        </script>
    <?php
    }
}
?>