<?php 
global $conSiswa;

$per_hal = 10;
$jumlah_record=mysqli_query($conSiswa,"SELECT * from t_datasiswa");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;

$setelah = $page + 1;
$sebelum = $page - 1;

function Status($selected){
    if($selected == "Lulus Seleksi"){
        ?>
        <div style="color:green;">
            Lulus Seleksi
        </div>
        <?php
    }else if($selected == "Tidak Lulus"){
        ?>
        <div style="color:red;">
            Tidak Lulus
        </div>
        <?php
    }else{
        ?>
        <div style="color:#adb5bd;">

        </div>
        <?php
    }
}

function dataSiswa(){
    if(isset($_GET["pesan"])){
        if($_GET["pesan"] == "baru"){
            ?>
            <div class="alert-success mb-1" role="alert">
                <h5 class="modal-title text-center text-medium fw-lighter">Selamat Anda Sudah Menambahkan Siswa Baru ...</h5>
            </div>
            <?php
        }else if($_GET["pesan"] == "edit"){
            ?>
            <div class="alert-info mb-1">
                <h5 class="modal-title text-center text-medium fw-lighter">Data Pribadi Siswa / Siswi sudah diperbarui</h5>
            </div>
            <?php
        }else if($_GET["pesan"] == "hapus"){
            ?>
            <div class="alert-danger mb-1">
                <h5 class="modal-title text-center text-medium fw-lighter"><span class="fa fa-trash"></span> Sudah Terhapus tiga data yang registerasi atau terseleksi</h5>
            </div>
            <?php
        }else if($_GET["pesan"] == "updateSeleksi"){
            ?>
            <div class="alert-success mb-1">
                <h5 class="modal-title text-center text-medium fw-lighter">Selamat Anda Sudah Terseleksi</h5>
            </div>
            <?php
        }else if($_GET["pesan"] == "gagal"){
            ?>
            <div class="alert-warning mb-1" role="alert">
                <h5 class="modal-title text-center text-medium fw-lighter"><span class="fas fa-info"></span> Maaf Anda Gagal Record Murid Baru ke dalam database siswa</h5>
            </div>
            <?php
        }
        ?>
        <script type="text/javascript">
            window.setTimeout(() => {location.href='daftarmurid.php'}, 3000);
        </script>
        <?php
    }
}

function kelas($id_kelas){
    if($id_kelas == 1){
        echo "Kelas 1 SD";
    }else if($id_kelas == 2){
        echo "Kelas 2 SD";
    }else if($id_kelas == 3){
        echo "Kelas 3 SD";
    }else if($id_kelas == 4){
        echo "Kelas 4 SD";
    }else if($id_kelas == 5){
        echo "Kelas 5 SD";
    }else if($id_kelas == 6){
        echo "Kelas 6 SD";
    }
}
?>