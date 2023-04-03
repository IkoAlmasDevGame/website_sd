<?php 
global $conSiswa;

include "../dashboard/header.php";
include "../../models/Siswa.php";
?>

<div class="flex justify-center items-center mt-28">
    <div class="card" style="width: 100rem; margin-left:50rem;">
        <div class="card-header">
            <img src="<?=base()?>assets/image/sd.png" class="navbar-brand">
            <h5 class="card-title text-start text-medium mt-7" onclick="location.href='absensi.php'" style="cursor: pointer;">ABSENSI MURID</h5>
        </div>
        <div class="table table-responsive">
            <div class="card-body">
                <table class="table table-stripped">
                    <tr>
                        <th class="text-center text-medium fw-lighter">No</th>
                        <th class="text-center text-medium fw-lighter">Nama Kelas</th>
                        <th class="text-center text-medium fw-lighter">Jumlah Siswa</th>
                        <th class="text-center text-medium fw-lighter">Aksi</th>
                    </tr>
                    <?php 
                        $kelas = $conSiswa->query("SELECT * FROM t_kelas order by namakelas asc");
                        echo "Jumlah Kelas : ".$jumlah_kelas=mysqli_num_rows($kelas);
		                echo "<br>";
                        echo "Jumlah Siswa : ".$jumlah_siswa=mysqli_num_rows(mysqli_query($conSiswa,"select * from t_siswa"));
                        echo "<br><br>";
                        $no = 1;
                        while($row = $kelas->fetch_array()){
                            $siswa = $conSiswa->query("select * from t_siswa where id_kelas='$row[id_kelas]'");
                            $jumlah = mysqli_num_rows($siswa);
                            ?>
                            <tr>
                                <td class="text-center text-medium fw-lighter"><?=$no++;?></td>
                                <td class="text-center text-medium fw-lighter"><?=$row['namakelas']?></td>
                                <td class="text-center text-medium fw-lighter"><?=$jumlah?> Orang</td>
                                <td class="text-center text-medium fw-lighter">
                                    <a href="input_absensi.php?id_kelas=<?=$row['id_kelas']?>" class="btn btn-primary"> Absensi</a>
                                    <a href="mata_pelajaran.php?id_kelas=<?=$row['id_kelas']?>" class="btn btn-primary"><span class="fas fa-book"></span> Mata Pelajaran</a>                                    
                                    <a href="ekstrakulikuler.php?id_kelas=<?=$row['id_kelas']?>" class="btn btn-primary"></span> Jam Tambahan </a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
include "../dashboard/footer.php";
?>