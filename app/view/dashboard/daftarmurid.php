<?php 
global $conSiswa;
include "../dashboard/header.php";
include "../../models/Siswa.php";

$query = mysqli_query($conSiswa, "SELECT max(NISN) as kodeNISN FROM t_datasiswa");
$data = mysqli_fetch_array($query);
$kodeNisn = $data['kodeNISN'];

$urutan = (int) substr($kodeNisn,-3,8);
$urutan++;
$nisn = "00647726";
$kodenisn = $nisn . sprintf("%03s", $urutan);
?>

<div class="modal" id="tambahsiswa">
    <div class="modal-dialog mt-32">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                <h5 class="modal-title text-center text-medium">Tambah Murid Baru SD</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body col-md-offset-1">
                <form action="<?=base()?>app/action/Siswa/act_tambah.php" method="post" class="col-md-11">
                    <div class="mt-2">
                        <label class="fw-lighter">NISN : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span>#</span></div>
                            <input type="number" name="NISN" class="form-control form-input" value="<?=$kodenisn;?>" readonly>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="fw-lighter">Nama Lengkap : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fas fa-user"></span></div>
                            <input type="text" name="nama_lengkap" class="form-control form-input" placeholder="isi nama lengkap anak anda">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="fw-lighter">Birth Day : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fas fa-calendar"></span></div>
                            <input type="date" name="birthday" class="form-control date form-date">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="fw-lighter">Jenis Kelamin : </label>
                        <div class="input-group">
                            <select name="jeniskelamin" class="form-control select">
                                <?php 
                                    $result = $conSiswa->query("SELECT distinct jeniskelamin FROM t_jeniskelamin order by jeniskelamin desc");
                                    while($xx = mysqli_fetch_array($result)){
                                            $pilih = $xx['jeniskelamin'];
                                        ?>
                                        <option><?=$pilih;?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <div class="input-group-addon"><span class="caret"></span></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="fw-lighter">Religion : </label>
                        <div class="input-group">
                            <select name="agama" class="form-control select">
                                <?php 
                                    $results = $conSiswa->query("SELECT distinct agama FROM t_agama order by agama desc");
                                    while($xr = mysqli_fetch_array($results)){
                                            $pil = $xr['agama'];
                                        ?>
                                        <option><?=$pil;?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <div class="input-group-addon"><span class="caret"></span></div>
                        </div>
                    </div>
                    <div class="input-group ml-5 mt-10">
                        <input type="checkbox" name="selesai" class="form-checkbox" value="yes"> Tandai Jika Sudah Selesai
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" name="simpanBaru" type="submit">Selesai</button>
                        <button class="btn btn-default" type="button" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            <div class="card-footer" style="border-top:1px solid gray;">
                <p class="card-text text-start mt-3 text-small-3">🔘 Harap Data Siswa / Siswi di isi semua</p>
                <p class="card-text text-start mt-3 text-small-3">🔘 Nama Harus Lengkap tidak boleh Nama Panggilan</p>
                <p class="card-text text-start mt-3 text-small-3">🔘 6 tahun ke atas boleh daftar, dan kurang dari 6 tahun ke atas tidak boleh daftar</p>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="infosiswa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                <h5 class="modal-title text-center text-medium">Jumlah Siswa / Siswi Baru</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <span class="flex flex-wrap justify-between items-center">
                    <span>Jumlah Record :</span>		
		            <span><?php echo $jum; ?></span>
		            <span>Jumlah Halaman :</span>	
		            <span><?php echo $halaman; ?></span>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="position-relative ml-16 mt-32">
    <div class="card" style="width: 136rem; height: 72.1rem; left: 18rem; bottom:1rem;">
        <div class="card-header">
            <div class="flex flex-nowarp justify-start items-center">
                <h5 class="card-title text-start text-large" onclick="location.href='daftarmurid.php'" style="cursor: pointer;">Daftar Murid Baru</h5>
                <button class="btn btn-info ml-80" role="button" data-bs-target="#tambahsiswa" data-bs-toggle="modal"><span class="fas fa-plus"></span></button>
                <button class="btn btn-info ml-43" style="margin-left: 1rem;" role="button" data-bs-target="#infosiswa" data-bs-toggle="modal"><span class="fas fa-info"></span></button>
            </div>
            <div class="mb-1"></div>
            <?php 
                dataSiswa();
            ?>
        <form action="daftarmurid.php" method="get" class="col-md-4 col-md-offset-0" style="right:1.5rem; top:0.2rem;">
            <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-search"></span></div>
                <input type="text" name="cari" placeholder="cari nama siswa/siswi" class="form-control input">
            </div>
        </form>
        </div>
        <div class="table-responsive">
            <div class="card-body">
                <table class="table table-stripped">
                    <tr>
                        <th class="text-center text-medium" style="width: 10px;">No</th>
                        <th class="text-center fw-lighter" style="width: 95px; font-size:15px;">NISN Siswa</th>
                        <th class="text-center text-medium">Nama Lengkap Siswa</th>
                        <th class="text-center text-medium">Tanggal Lahir</th>
                        <th class="text-center text-medium">Usia Anak</th>
                        <th class="text-center text-medium">Jenis Kelamin</th>
                        <th class="text-center text-medium">Agama</th>
                        <th class="text-center text-medium">Seleksi Siswa</th>
                        <th class="text-center text-medium">Opsional</th>
                        <th class="text-center text-medium">Seleksi</th>
                    </tr>
                    <?php 
                        if(isset($_GET["cari"])){
                            $cariSiswa = mysqli_escape_string($conSiswa, $_GET["cari"]);
                            $cari = strtoupper($cariSiswa) or strtolower($cariSiswa);
                            $siswa = $conSiswa->query("SELECT * FROM t_datasiswa WHERE NISN like '$cariSiswa' or nama_lengkap like '$cari'");
                        }else{
                            $siswa = $conSiswa->query("SELECT * FROM t_datasiswa limit $start, $per_hal");
                        }
                        $no = 1;
                        while($x = $siswa->fetch_array()){
                            $birthDate = new DateTime($x['birthday']);
                            $today = new DateTime("today");
                            if($birthDate > $today){
                                exit("0 tahun 0 bulan");
                            }
                            $y = $today->diff($birthDate)->y;
                            $m = $today->diff($birthDate)->m;
                            $age = $y." tahun".", ".$m." bulan";
                            $tgl_lahir = date('d F, Y', strtotime($x['birthday']));
                            ?>
                            <tr>
                                <td class="text-center fw-lighter text-medium"><?=$no++?></td>
                                <td class="text-center fw-lighter text-medium" style="background: #adb5bd;"><?=$x['NISN']?></td>
                                <td class="text-start fw-lighter text-medium"><?=$x['nama_lengkap']?></td>
                                <td class="text-start fw-lighter text-medium" style="background: #adb5bd;"><?=$tgl_lahir;?></td>
                                <td class="text-center fw-lighter text-medium"><?=$age;?></td>
                                <td class="text-start fw-lighter text-medium" style="background: #adb5bd;"><?=$x['gender']?></td>
                                <td class="text-start fw-lighter text-medium"><?=$x['agama']?></td>
                                <td class="text-start fw-lighter text-medium" style="background: #adb5bd;"><?=Status($x['selected']);?></td>
                                <td class="flex flex-wrap justify-around items-center">
                                    <div class="mx-auto">
                                        <a href="" class="fas fa-plus" data-bs-target="#tambahdata<?=$x['id_siswa']?>" data-bs-toggle="modal"></a>
                                        <a href="" class="fas fa-edit" data-bs-target="#editdata<?=$x['id_siswa']?>" data-bs-toggle="modal"></a>
                                        <a href="" class="fas fa-trash" data-bs-target="#hapusdata<?=$x['id_siswa']?>" data-bs-toggle="modal"></a>
                                        <a href="" class="fas fa-file" data-bs-target="#filesiswa<?=$x['id_siswa']?>" data-bs-toggle="modal"></a>
                                        <a href="" class="fas fa-school" data-bs-target="#classroom<?=$x['id_siswa']?>" data-bs-toggle="modal"></a>
                                        <a href="" class="fa fa-address-book-o" data-bs-target="#editdoucment<?=$x['id_siswa']?>" data-bs-toggle="modal"></a>
                                    </div>
                                </td>
                                <td>
                                <form action="<?=base()?>app/action/Siswa/act_update.php" method="post" class="flex justify-between items-center col-md-12 col-md-offset-1">
                                <input type="hidden" name="NISN" value="<?=$x['NISN']?>">
                                        <select name="selected" class="form-control select">
                                            <option>Pilih data seleksi</option>
                                            <?php 
                                                $rseleksi = $conSiswa->query("SELECT distinct seleksi FROM t_seleksi order by seleksi desc");
                                                while($xs = mysqli_fetch_array($rseleksi)){
                                                    $pill = $xs['seleksi'];
                                                    ?>
                                                        <option><?=$pill;?></option>
                                                    <?php                                                    
                                                    }
                                                ?>
                                        </select>
                                        <div class="ml-10">
                                            <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <div class="modal" id="tambahdata<?=$x['id_siswa']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mt-10">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                            <h5 class="modal-title text-center text-medium">Data orang tua Murid</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base()?>app/action/Siswa/act_document.php" method="post">
                                                <input type="hidden" name="NISN" class="form-control input" value="<?=$x['NISN']?>">
                                                <div class="mt-1">
                                                <label class="fw-lighter">Nama Lengkap : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-user"></span></div>
                                                        <input type="text" name="nama_lengkap" class="form-control input" value="<?=$x['nama_lengkap']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-1">
                                                <label class="fw-lighter">Nama Lengkap Ayah : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-user"></span></div>
                                                        <input type="text" name="nama_ayah" class="form-control input">
                                                    </div>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Tempat Lahir Ayah : </label>
                                                    <select name="tempat_lahir_ayah" class="form-control select">
                                                        <?php 
                                                            $t = $conSiswa->query("SELECT * FROM t_tempat");
                                                            while($r = $t->fetch_array()){
                                                                ?>
                                                                <option><?php echo $r['provinsi'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Pekerjaan Ayah : </label>
                                                    <select name="workFather" class="form-control select">
                                                        <?php 
                                                            $s = $conSiswa->query("SELECT * FROM t_pekerjaan");
                                                            while($k = $s->fetch_array()){
                                                                ?>
                                                                <option><?php echo $k['profesi'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Pekerjaan Ayah : </label>
                                                    <select name="TertiaryEducationFather" class="form-control select">
                                                        <?php 
                                                            $p = $conSiswa->query("SELECT * FROM t_pendidikan");
                                                            while($j = $p->fetch_array()){
                                                                ?>
                                                                <option><?php echo $j['jenjang'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                <label class="fw-lighter">Nama Lengkap Ibu : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-user"></span></div>
                                                        <input type="text" name="nama_ibu" class="form-control input">
                                                    </div>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Tempat Lahir Ibu : </label>
                                                    <select name="tempat_lahir_ibu" class="form-control select">
                                                        <?php 
                                                            $t = $conSiswa->query("SELECT * FROM t_tempat");
                                                            while($r = $t->fetch_array()){
                                                                ?>
                                                                <option><?php echo $r['provinsi'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Pekerjaan Ibu : </label>
                                                    <select name="workMother" class="form-control select">
                                                        <?php 
                                                            $s = $conSiswa->query("SELECT * FROM t_pekerjaan");
                                                            while($k = $s->fetch_array()){
                                                                ?>
                                                                <option><?php echo $k['profesi'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Pekerjaan Ibu : </label>
                                                    <select name="TertiaryEducationMother" class="form-control select">
                                                        <?php 
                                                            $p = $conSiswa->query("SELECT * FROM t_pendidikan");
                                                            while($j = $p->fetch_array()){
                                                                ?>
                                                                <option><?php echo $j['jenjang'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Alamat Rumah : </label>
                                                    <div class="input-group">
                                                        <textarea name="alamat_rumah" class="form-control" style="width: 450px; border:1px solid;" maxlength="1000"></textarea>
                                                    </div>
                                                </div>
                                                <div class="card-footer mt-1">
                                                    <input type="checkbox" name="selesai" value="yes"> Tandai Jika Sudah Selesai
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-info" name="simpanDocs">Simpan</button>
                                                        <button class="btn btn-default" type="button" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="editdata<?=$x['id_siswa']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mt-20">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                            <h5 class="modal-title text-center text-medium">Edit Data Murid</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base()?>app/action/Siswa/act_editdata.php" method="post">
                                                <input type="number" name="NISN" value="<?=$x['NISN']?>" class="form-control input" hidden>
                                                <div class="mt-2">
                                                    <label class="fw-lighter">Nama Lengkap : </label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><span class="fas fa-user"></span></div>
                                                            <input type="text" name="nama_lengkap" class="form-control form-input" value="<?=$x['nama_lengkap']?>">
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="fw-lighter">Birth Day : </label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><span class="fas fa-calendar"></span></div>
                                                            <input type="date" name="birthday" class="form-control date" value="<?=$x['birthday'];?>">
                                                        </div>
                                                    </div>
                                                <div class="mt-2">
                                                    <label class="fw-lighter">Jenis Kelamin : </label>
                                                    <div class="input-group">
                                                        <select name="gender" class="form-control select">
                                                            <?php 
                                                                $result = $conSiswa->query("SELECT * FROM t_jeniskelamin order by jeniskelamin desc");
                                                                while($rx = $result->fetch_array()){
                                                                    ?>
                                                                    <option <?php if($rx['jeniskelamin'] == $x['gender']){?> selected="" <?php }?>><?=$rx['jeniskelamin']?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <div class="input-group-addon"><span class="caret"></span></div>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <label class="fw-lighter">Religion : </label>
                                                    <div class="input-group">
                                                        <select name="agama" class="form-control select">
                                                            <?php 
                                                                $results = $conSiswa->query("SELECT * FROM t_agama order by agama desc");
                                                                while($xr = mysqli_fetch_array($results)){
                                                                    ?>
                                                                    <option <?php if($xr['agama'] == $x['agama']){?> selected="" <?php }?>><?=$xr['agama'];?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <div class="input-group-addon"><span class="caret"></span></div>
                                                    </div>
                                                </div>
                                                <div class="input-group ml-5 mt-10">
                                                    <input type="checkbox" name="selesai" class="form-checkbox" value="yes"> Tandai Jika Sudah Selesai
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" name="EditBaru" type="submit">Selesai</button>
                                                    <button class="btn btn-default" type="button" data-bs-dismiss="modal">Close</button>
                                                </div>                                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="hapusdata<?=$x['id_siswa']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mt-20">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                            <h5 class="modal-title text-center text-medium">Hapus data</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base()?>app/action/Siswa/act_hapusdata.php" method="post">
                                                <input type="number" name="NISN" value="<?=$x['NISN']?>" hidden>
                                                <h5 class="modal-title text-center text-large fw-lighter">
                                                    Apakah Data Siswa / Siswi, ini anda ingin hapus ? <?=$x['NISN']?>
                                                </h5>
                                                <div class="card-footer mt-5 mb-5">
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" name="hapus" type="submit">YES</button>
                                                        <button class="btn btn-default" type="button" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="filesiswa<?=$x['id_siswa']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog mt-20">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                            <h5 class="modal-title text-center text-medium">File Document orang Tua</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-bordered">
                                                <div class="mt-1 table table-responsive">
                                                    <p class="text-medium mt-1">NISN Siswa/i : <?=$x['NISN']?></p>
                                                    <p class="text-medium mt-1">Nama Lengkap : <?=$x['nama_lengkap']?></p>
                                                    <p class="text-medium mt-1">Tanggal Lahir : <?=$tgl_lahir?></p>
                                                    <div class="table table-responsive mt-3">
                                                        <h5 class="modal-title text-center">Data Orang Tua</h5>
                                                    </div>
                                                    <?php
                                                        $data = $conSiswa->query("SELECT * FROM t_orangtua WHERE NISN like '$x[NISN]'");
                                                        if($row = mysqli_fetch_array($data)){
                                                            ?>
                                                            <p class="text-medium mt-1">Nama Ayah : <?=$row['nama_ayah']?></p>
                                                            <p class="text-medium mt-1">Tempat Lahir : <?=$row['tempat_lahir_ayah']?></p>
                                                            <p class="text-medium mt-1">Pekerjaan Ayah : <?=$row['workFather']?></p>
                                                            <p class="text-medium mt-1">Pendidikan Terakhir : <?=$row['TertiaryEducationFather']?></p>
                                                            <div class="mt-3"></div>
                                                            <p class="text-medium mt-1">Nama ibu : <?=$row['nama_ibu']?></p>
                                                            <p class="text-medium mt-1">Tempat Lahir : <?=$row['tempat_lahir_ibu']?></p>
                                                            <p class="text-medium mt-1">Pekerjaan Ibu : <?=$row['workMother']?></p>
                                                            <p class="text-medium mt-1">Pendidikan Terakhir : <?=$row['TertiaryEducationMother']?></p>
                                                            <div class="mt-3"></div>
                                                            <p class="text-medium mt-1">Alamat Rumah : <?=$row['alamat_rumah']?></p>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="editdoucment<?=$x['id_siswa']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                            <h5 class="modal-title text-center text-medium">Edit Document Orang tua</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base()?>app/action/Siswa/act_editdocument.php" method="post">
                                                <?php 
                                                    $dataX = $conSiswa->query("SELECT * FROM t_orangtua WHERE NISN like '$x[NISN]'");
                                                    if($rows = mysqli_fetch_array($dataX)){
                                                ?>
                                                <input type="number" name="NISN" class="form-control input" value="<?=$rows['NISN']?>" hidden>
                                                <div class="mt-1">
                                                <label class="fw-lighter">Nama Lengkap : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-user"></span></div>
                                                        <input type="text" name="nama_lengkap" class="form-control input" value="<?=$rows['nama_lengkap']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-1">
                                                <label class="fw-lighter">Nama Lengkap Ayah : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-user"></span></div>
                                                        <input type="text" name="nama_ayah" class="form-control input" value="<?=$rows['nama_ayah']?>">
                                                    </div>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Tempat Lahir Ayah : </label>
                                                    <select name="tempat_lahir_ayah" class="form-control select">
                                                        <?php 
                                                            $t = $conSiswa->query("SELECT * FROM t_tempat");
                                                            while($r = $t->fetch_array()){
                                                                ?>
                                                                <option <?php if($r['provinsi'] == $rows['tempat_lahir_ayah']){?> selected="" <?php } ?> ><?php echo $r['provinsi'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Pekerjaan Ayah : </label>
                                                    <select name="workFather" class="form-control select">
                                                        <?php 
                                                            $s = $conSiswa->query("SELECT * FROM t_pekerjaan");
                                                            while($k = $s->fetch_array()){
                                                                ?>
                                                                <option <?php if($k['profesi'] == $rows['workFather']){?> selected="" <?php } ?>><?php echo $k['profesi'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Pekerjaan Ayah : </label>
                                                    <select name="TertiaryEducationFather" class="form-control select">
                                                        <?php 
                                                            $p = $conSiswa->query("SELECT * FROM t_pendidikan");
                                                            while($j = $p->fetch_array()){
                                                                ?>
                                                                <option <?php if($j['jenjang'] == $rows['TertiaryEducationFather']){?> selected="" <?php } ?>><?php echo $j['jenjang'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                <label class="fw-lighter">Nama Lengkap Ibu : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-user"></span></div>
                                                        <input type="text" name="nama_ibu" class="form-control input" value="<?=$rows['nama_ibu']?>">
                                                    </div>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Tempat Lahir Ibu : </label>
                                                    <select name="tempat_lahir_ibu" class="form-control select">
                                                        <?php 
                                                            $t = $conSiswa->query("SELECT * FROM t_tempat");
                                                            while($r = $t->fetch_array()){
                                                                ?>
                                                                <option <?php if($r['provinsi'] == $rows['tempat_lahir_ibu']){?> selected="" <?php } ?>><?php echo $r['provinsi'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Pekerjaan Ibu : </label>
                                                    <select name="workMother" class="form-control select">
                                                        <?php 
                                                            $s = $conSiswa->query("SELECT * FROM t_pekerjaan");
                                                            while($k = $s->fetch_array()){
                                                                ?>
                                                                <option <?php if($k['profesi'] == $rows['workMother']){?> selected="" <?php } ?>><?php echo $k['profesi'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Pekerjaan Ibu : </label>
                                                    <select name="TertiaryEducationMother" class="form-control select">
                                                        <?php 
                                                            $p = $conSiswa->query("SELECT * FROM t_pendidikan");
                                                            while($j = $p->fetch_array()){
                                                                ?>
                                                                <option <?php if($j['jenjang'] == $rows['TertiaryEducationMother']){?> selected="" <?php } ?>><?php echo $j['jenjang'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Alamat Rumah : </label>
                                                    <div class="input-group">
                                                        <textarea name="alamat_rumah" class="form-control" style="width: 450px; border:1px solid;" maxlength="1000"><?=$rows['alamat_rumah']?></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-group ml-5 mt-10">
                                                    <input type="checkbox" name="selesai" class="form-checkbox" value="yes"> Tandai Jika Sudah Selesai
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" name="simpanEditDocument" type="submit">Selesai</button>
                                                    <button class="btn btn-default" type="button" data-bs-dismiss="modal">Close</button>
                                                </div>                                            
                                                <?php 
                                                    }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="classroom<?=$x['id_siswa']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                            <h5 class="modal-title text-center text-medium">Daftar Kelas Siswa / Siswi Baru</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base()?>app/action/Siswa/act_data.php" method="post">
                                                <input type="number" name="id_siswa" value="<?=$x['id_siswa']?>" hidden>
                                                <input type="number" name="NISN" value="<?=$x['NISN']?>" hidden>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Nama Lengkap : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-address-card"></span></div>
                                                        <input type="text" name="nama_lengkap" class="form-control input" value="<?=$x['nama_lengkap']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-1">
                                                    <label class="fw-lighter">Daftar Kelas : </label>
                                                    <select name="id_kelas" class="form-control select">
                                                        <?php 
                                                            $kelas = $conSiswa->query("SELECT * FROM t_kelas");
                                                            while($class = $kelas->fetch_array()){
                                                                ?>
                                                                <option value="<?=$class['id_kelas']?>"><?=$class['namakelas']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="input-group ml-5 mt-10">
                                                    <input type="checkbox" name="selesai" value="yes"> Tandai Jika Sudah Selesai
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" name="simpanKelas" type="submit">Selesai</button>
                                                    <button class="btn btn-default" type="button" data-bs-dismiss="modal">Close</button>
                                                </div>  
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    ?>
                </table>
                <div class="card-footer">
                    <div class="modal-footer fixed-bottom mr-56 mb-1">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" <?php if($page > 1){ echo "href='?page=$sebelum'"; } ?> 
                             style="margin-left: 0.1rem; background-color: transparent; border: 0px; color:black; bottom:1rem;">⏮</a></li>
                            <?php 
                                for($x = 1; $x <= $halaman; $x++){
                            ?> 
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"
                             style="margin-left: 0.4rem; background-color: transparent; border: 0px; color:black; bottom:1rem;"> <?php echo $x; ?></a></li>
                            <?php
                                }
                            ?> 
                            <li class="page-item"><a class="page-link" <?php if($page < $halaman){ echo "href='?page=$setelah'"; } ?> 
                             style="margin-left: 0.5rem; background-color: transparent; border: 0px; color:black; bottom:1rem;">⏭</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include "../dashboard/footer.php";
?>