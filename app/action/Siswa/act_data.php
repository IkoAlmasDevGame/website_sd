<?php 
include "../../database/Migrations/dbSiswa.php";
include "../../controller/SiswaBaru.php";

if(isset($_POST["simpanKelas"])){
    $id_siswa = htmlentities(trim($_POST["id_siswa"]));
    $nisn = htmlentities(trim($_POST["NISN"]));
    $nama = htmlentities(trim($_POST["nama_lengkap"]));
    $id_kelas = htmlentities(trim($_POST["id_kelas"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        if(classroom($id_siswa,$nisn,$nama,$id_kelas,$checkInput)){}
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