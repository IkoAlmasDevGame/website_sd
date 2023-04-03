<?php 
include "../../database/Migrations/dbSiswa.php";
include "../../controller/SiswaBaru.php";

if(isset($_POST["simpan"])){
    $seleksi = htmlentities(trim($_POST["selected"]));
    $nisn = $_POST["NISN"];

    $conSiswa->query("SELECT * FROM t_datasiswa where NISN='$nisn'");

if(UpdateSeleksi($nisn, $seleksi)){
    ?>
    <script type="text/javascript">
        window.location.href='../../view/dashboard/daftarmurid.php?pesan=updateSeleksi';
    </script>
    <?php
}else{
    ?>
    <script type="text/javascript">
        window.location.href='../../view/dashboard/daftarmurid.php';
    </script>
    <?php
    }
}
?>