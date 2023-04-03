<?php 
include "../../database/Migrations/dbSiswa.php";
include "../dashboard/header.php";
$id_kelas = $_GET['id_kelas'];
$query = $conSiswa->query("SELECT * FROM t_kelas WHERE id_kelas = '$id_kelas'");
$row = mysqli_fetch_array($query);
?>

<div class="row mt-36">
    <div class="flex justify-center items-center">
        <div class="col-12">
            <div class="col-lg-3">
                <div class="container"></div>
                    <div class="card" style="width: 130rem; left:20rem;">
                        <div class="card-header">
                            <h5 class="card-title text-end text-medium fw-lighter mb-5">Jadwal Pelajaran</h5>
                            <h5 class="card-title text-end text-medium fw-normal">Data Kelas : <?$row['namakelas'];?></h5>
                        </div>
                        <div class="table table-responsive">
                            <div class="card-body">
                                <table class="table table-stripped text-medium" style="overflow: scroll;">
                                    <thead>
                                        <tr>
                                            <th class="fw-lighter text-center"> Jam Ke </th>
                                            <th class="fw-lighter text-center"> Senin </th>
                                            <th class="fw-lighter text-center"> Selasa </th>
                                            <th class="fw-lighter text-center"> Rabu </th>
                                            <th class="fw-lighter text-center"> Kamis </th>
                                            <th class="fw-lighter text-center"> Jumat </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $jam = mysqli_query($conSiswa, "SELECT * FROM t_jam");
                                            while($get_jam = $jam->fetch_array()){
                                                ?>
                                            <tr>
                                                <td class="text-start"><?=$get_jam['mulai']." - ".$get_jam['akhir']?></td>
                                                <?php for($j=1; $j <= 5; $j++){ ?>
                                                    <?php 
                                                        $hari = "";
                                                            if($j == 1){
                                                                $hari = "Senin";
                                                            }else if($j == 2){
                                                                $hari = "Selasa";
                                                            }else if($j == 3){
                                                                $hari = "Rabu";
                                                            }else if($j == 4){
                                                                $hari = "Kamis";
                                                            }else if($j == 5){
                                                                $hari = "Jumat";
                                                            }
                                                        ?>
                                                    <td>
                                                        <form action="<?=base()?>app/action/Siswa/act_proses.php" method="post" id="form_id_<?=$j."_".$get_jam['id_jam']?>" class="col-md-13 mb-2">
                                                            <input type="hidden" name="id_kelas" value="<?=$row['id_kelas']?>">
                                                            <input type="hidden" name="hari" value="<?=$hari;?>">
                                                            <input type="hidden" name="id_jam" value="<?=$get_jam['id_jam']?>">
                                                            <?php 
                                                                error_reporting(0);

                                                                $id_kelas = $row['id_kelas'];
                                                                $id_jam = $get_jam['id_jam'];
                                                                
                                                                $data_jadwal = mysqli_query($conSiswa, "SELECT * FROM t_jadwal JOIN t_pelajaran on t_pelajaran.id_pelajaran = t_jadwal.id_pelajaran WHERE id_jam='$id_jam' && id_kelas='$id_kelas' && hari='$hari'");
                                                                $get_jadwal = mysqli_fetch_array($data_jadwal);
                                                            ?>
                                                            <input type="hidden" name="id_jadwal" value="<?=$get_jadwal['id_jadwal']?>">
                                                            <select name="id_pelajaran" class="form-control select" data-toggle="tooltip" data-placement="top" title="<?=$get_jadwal['pelajaran']?>" type="submit" onchange="document.getElementById('form_id_<?=$j.'_'.$get_jam['id_jam']; ?>').submit();">
                                                                <option> Mata Pelajaran </option>
                                                                <?php 
                                                                    $data_pelajaran = $conSiswa->query("SELECT * FROM t_pelajaran");
                                                                    while($get_pelajaran = $data_pelajaran->fetch_array()){
                                                                        ?>
                                                                        <option value="<?=$get_pelajaran['id_pelajaran']?>"
                                                                        <?php if($get_jadwal['id_pelajaran'] == $get_pelajaran['id_pelajaran']){ echo "selected"; }?>><?=$get_pelajaran['pelajaran']?></option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </form>
                                                        <form action="<?=base()?>app/action/Siswa/act_proses.php" method="post" class="col-md-13" id="form_id_2_<?=$j."_".$get_jam['id_jam']?>">

                                                        
                                                        <?php 
                                                                $id_kelas = $row['id_kelas'];
                                                                $id_jam = $get_jam['id_jam'];
                                                                
                                                                $get_id_jadwal = mysqli_query($conSiswa, "select * from t_jadwal where id_jam='$id_jam' && id_kelas='$id_kelas' && hari='$hari'");
                                                                $id_jadwal = mysqli_fetch_array($get_id_jadwal);
                                                                $rows = $_SESSION['id_guru'] = $id_jadwal['guru'];
                                                            ?>
                                                            
                                                            <input type="hidden" name="id_kelas" value="<?=$row['id_kelas']?>">
                                                            <input type="hidden" name="hari" value="<?=$hari;?>">
                                                            <input type="hidden" name="id_jam" value="<?=$get_jam['id_jam']?>">
                                                            <input type="hidden" name="id_jadwal" value="<?=$id_jadwal['id_jadwal']?>">
                                                            
                                                            <?php 
                                                                error_reporting(0);

                                                                $get_guru_tooltip         = mysqli_query($conSiswa, "select * from t_guru where id_guru = '$rows'");
                                                                $guru_tooltip             = mysqli_fetch_array($get_guru_tooltip);
                                                            ?>
                                                            <select name="id_guru" class="form-control select" data-toggle="tooltip" data-placement="top" title="<?=$guru_tooltip['nama']?>" type="submit" onchange="document.getElementById('form_id_2_<?=$j.'_'.$get_jam['id_jam']; ?>').submit();">
                                                                <option>Pilih Guru</option>
                                                                <?php 
                                                                    $data_guru = mysqli_query($conSiswa, "select * from t_guru");
                                                                    while($get_guru = $data_guru->fetch_array()){
                                                                        ?>
                                                                        <option value="<?=$get_guru['id_guru']?>" <?php if($id_jadwal['id_guru'] == $get_guru['id_guru']){ echo "selected"; } ?>><?=$get_guru['nama']?></option>
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