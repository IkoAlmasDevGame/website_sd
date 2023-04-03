<?php 
include "../../controller/SiswaBaru.php";
include "../../database/Migrations/dbSiswa.php";

if(isset($_POST["simpanDocs"])){
    $nisn = htmlentities(trim($_POST["NISN"]));
    $namalengkap = htmlentities(trim($_POST["nama_lengkap"]));
    $nama_ayah = htmlentities(trim($_POST["nama_ayah"]));
    $tla = htmlentities(trim($_POST["tempat_lahir_ayah"]));
    $wFather = htmlentities(trim($_POST["workFather"]));
    $tef = htmlentities(trim($_POST["TertiaryEducationFather"]));
    $nama_ibu = htmlentities(trim($_POST["nama_ibu"]));
    $tli = htmlentities(trim($_POST["tempat_lahir_ibu"]));
    $wMother = htmlentities(trim($_POST["workMother"]));
    $tei = htmlentities(trim($_POST["TertiaryEducationMother"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        if(DocsFamilyStudent($nisn,$namalengkap,$nama_ayah,$tla,$wFather,$tef,$nama_ibu,$tli,$wMother,$tei,$checkInput)){

        }
        ?>
        <script type="text/javascript">
            window.location.href='../../view/dashboard/daftarmurid.php';
        </script>
        <?php
    }else{
        unset($_POST["selesai"]);
        ?>
        <script type="text/javascript">
            window.location.href='../../view/dashboard/daftarmurid.php';
        </script>
        <?php
    }
}
?>