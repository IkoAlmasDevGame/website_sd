<?php 
    include "../../database/Migrations/dbSiswa.php";
    error_reporting(0);
    session_start();

    $id_data = $_POST["id_data"];
    $id_ekstrakulikuler = $_POST["id_ekstrakulikuler"];
    $id_kelas = $_POST["id_kelas"];
    $id_siswa = $_POST["id_siswa"];
    $hari = $_POST["hari"];

        $select         = "SELECT COUNT(*) as total FROM t_data WHERE id_data='$id_data' ";
        $select         = mysqli_query($conSiswa, $select);
        $select         = mysqli_fetch_array($select);

        if($select['total'] > 0){
            mysqli_query($conSiswa, "update t_data set id_ekstrakulikuler='$id_ekstrakulikuler', id_kelas='$id_kelas', id_siswa='$id_siswa', hari='$hari' where id_data='$id_data' ");

        //atau jika tidak ada maka insert baru
        }else{
            mysqli_query($conSiswa, "insert into t_data set id_ekstrakulikuler='$id_ekstrakulikuler', id_siswa='$id_siswa', hari='$hari', id_kelas='$id_kelas'");
    }
    header('Location:../../view/dashboard/ekstrakulikuler.php?id_kelas='.$id_kelas);
?>