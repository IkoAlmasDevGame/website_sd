<?php 
global $conSiswa;
include "../dashboard/header.php";
include "../../models/Siswa.php";

$hari = "";
$id_kelas = $_GET["id_kelas"];

$per_hal = 10;
$jumlah_record=mysqli_query($conSiswa,"SELECT * from t_data");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;

$setelah = $page + 1;
$sebelum = $page - 1;

$query=mysqli_fetch_array($jumlah_record);
?>

<div class="row">
    <div class="flex justify-center items-center mt-28">
        <div class="col-12">
            <div class="col-lg-3">
                <div class="container"></div>
                <div class="card" style="width: 105rem; left:20rem;">
                <div class="card-header">
                    <h5 class="card-title text-medium text-end fw-lighter" onclick="location.href='ekstrakulikuler.php?id_kelas=<?=$query['id_kelas']?>'" style="cursor:pointer;">Jadwal Murid Ekstrakulikuler</h5>
                    <h5 class="text-end card-title text-medium fw-lighter"><?=kelas($id_kelas)?></h5>
                </div>
                    <div class="table-responsive">
                        <div class="card-body">
                            <table class="table table-stripped " style="overflow: scroll;">
                                <thead>
                                    <tr>
                                        <th class="text-center fw-lighter text-medium">No</th>
                                        <th class="text-center fw-lighter text-medium">Nama Siswa</th>
                                        <th class="text-center fw-lighter text-medium">Kelas</th>
                                        <th class="text-center fw-lighter text-medium">Hari</th>
                                        <th class="text-center fw-lighter text-medium">Ekstrakulikuler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $res = mysqli_query($conSiswa, "SELECT * FROM t_siswa JOIN t_kelas ON t_siswa.id_kelas = t_kelas.id_kelas WHERE t_kelas.id_kelas = '$id_kelas'");
                                        $no = 1;
                                        while($s = $res->fetch_array()){
                                            ?>
                                        <tr>
                                            <td class="text-center text-medium fw-lighter"><?=$no++?></td>
                                            <td class="text-center text-medium fw-lighter"><?php echo $s['nama_lengkap']?></td>
                                            <td class="text-center text-medium fw-lighter"><?=kelas($s['id_kelas'])?></td>
                                            <td class="text-center text-medium fw-lighter"><?=$hari;?></td>
                                            <?php 
                                                for($j = 1; $j<=1; $j++){?>
                                                <?php 
                                                    if($j == 1){
                                                        $hari = "sabtu";
                                                    }                                                
                                                    ?>
                                                <td>
                                                    <form action="<?=base()?>app/action/Siswa/act_pembinaan_siswa.php" method="post" id="form_id_<?=$j."_".$_GET['id_kelas']?>" class="col-md-9 mb-2">
                                                        <input type="hidden" name="id_kelas" value="<?=$_GET['id_kelas']?>">
                                                        <input type="hidden" name="id_siswa" value="<?=$s['id_siswa']?>">
                                                        <input type="hidden" name="hari" value="<?=$hari;?>">
                                                        <?php 
                                                            error_reporting(0);

                                                            $id_kelas = $_GET['id_kelas'];
                                                            $id_siswa = $s['id_siswa'];

                                                            $data_ekstra = mysqli_query($conSiswa, "SELECT * FROM t_data JOIN t_dataekstrakulikuler ON t_dataekstrakulikuler.id_ekstrakulikuler = t_data.id_ekstrakulikuler WHERE id_siswa='$id_siswa' && id_kelas='$id_kelas' && hari='$hari'");
                                                            $get_ekstra = mysqli_fetch_array($data_ekstra);
                                                        ?>
                                                        <input type="hidden" name="id_data" value="<?=$get_ekstra['id_data']?>">
                                                        <select name="id_ekstrakulikuler" class="form-control select col-md-offset-2" type="submit" data-toggle="tooltip" data-placement="top" title="<?=$get_ekstra['nama_ekstrakulikuler']?>" onchange="document.getElementById('form_id_<?=$j.'_'.$_GET['id_kelas']; ?>').submit();">
                                                            <option>Pilih Ekstrakulikuler</option>
                                                            <?php 
                                                                $jadwal_ekstra = mysqli_query($conSiswa, "SELECT * FROM t_dataekstrakulikuler");
                                                                while($get_jadwal = $jadwal_ekstra->fetch_array()){
                                                                    ?>
                                                                    <option value="<?=$get_jadwal['id_ekstrakulikuler']?>" <?php if($get_ekstra['id_ekstrakulikuler'] == $get_jadwal['id_ekstrakulikuler']){ echo "selected"; } ?>><?=$get_jadwal['nama_ekstrakulikuler']?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </form>
                                                </td>
                                                <?php
                                                }
                                            ?>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('[data-toggle="tooltip"]').tooltip();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include "../dashboard/footer.php";
?>