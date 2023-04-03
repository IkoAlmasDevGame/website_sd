<?php 
include "../../controller/SiswaBaru.php";
include "../../database/Migrations/dbSiswa.php";

if(isset($_POST["EditBaru"])){
    $nisn = htmlentities(trim($_POST["NISN"]));
    $namalengkap = htmlentities(trim($_POST["nama_lengkap"]));
    $lahir = htmlentities(trim($_POST["birthday"]));
    $gender = htmlentities(trim($_POST["gender"]));
    $religion = htmlentities(trim($_POST["agama"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        if(EditMurid($namalengkap,$lahir,$gender,$religion,$checkInput,$nisn)){}
        ?>
        <script type="text/javascript">
            window.location.href='../../view/dashboard/daftarmurid.php?pesan=edit';
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