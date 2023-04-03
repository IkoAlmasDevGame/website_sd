<?php 
include "../../controller/SiswaBaru.php";
include "../../database/Migrations/dbSiswa.php";

if(isset($_POST["hapus"])){
    $nisn = htmlentities(trim($_POST["NISN"]));
    
    if(HapusDataMurid($nisn)){
        mysqli_query($conSiswa, "DELETE FROM t_orangtua WHERE NISN='$nisn'");
        mysqli_query($conSiswa, "DELETE FROM t_siswa WHERE NISN='$nisn'");
        ?>
        <script type="text/javascript">
            window.location.href='../../view/dashboard/daftarmurid.php?pesan=hapus';
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