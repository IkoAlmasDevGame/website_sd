<?php 
global $conSiswa;
include "../dashboard/header.php";
include "../../models/Guru.php";
?>

<div class="modal" id="tambahguru">
    <div class="modal-dialog mt-24">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                <h5 class="modal-title text-center text-medium">Tambah Anggota Guru</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body col-md-9 col-md-offset-1">
                <form action="<?=base()?>app/action/Siswa/act_guru.php" method="post">
                    <div class="form-group">
                        <label class="fw-lighter text-medium">Nama Guru</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-address-card" aria-hidden="true"></span></div>
                            <input type="text" name="nama" class="form-control input" placeholder="masukkan nama guru anda">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="fw-lighter text-medium">Jenis Kelamin</label>
                            <select name="jeniskelamin" class="form-control select">
                                <option> -- Pilih Jenis Kelamin -- </option>
                                <?php 
                                    $result = $conSiswa->query("SELECT * FROM t_jeniskelamin");
                                    while($d = $result->fetch_array()){
                                        ?>
                                        <option><?=$d['jeniskelamin']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <button class="btn btn-primary" name="simpanGuru" type="submit">
                                <span class="fas fa-save"></span></button>
                            <button class="btn btn-default" data-bs-dismiss="modal" aria-hidden="true" type="button">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="tambahjam">
    <div class="modal-dialog mt-24">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                <h5 class="modal-title text-center text-medium">Tambah Jam</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body col-md-9 col-md-offset-1">
                <form action="<?=base()?>app/action/Siswa/act_jam.php" method="post">
                    <div class="form-group">
                        <label class="fw-lighter text-medium">Jam</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fas fa-clock"></span></div>
                            <input type="number" name="jam" class="form-control time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="fw-lighter text-medium">Mulai Jam</label>
                        <div class="input-group">
                            <input type="time" name="mulai" class="form-control time">
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label class="fw-lighter text-medium">Akhir Jam</label>
                        <div class="input-group">
                            <input type="time" name="akhir" class="form-control time">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <button class="btn btn-primary" name="simpanJam" type="submit">
                                <span class="fas fa-save"></span></button>
                            <button class="btn btn-default" data-bs-dismiss="modal" aria-hidden="true" type="button">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="flex justify-between items-center ">
    <div class="row mt-28">
        <div class="card" style="width: 70rem; left:24rem;">
            <div class="card-header">
                <button class="btn btn-info" type="button" data-bs-target="#tambahguru" data-bs-toggle="modal"><span class="fas fa-plus"></span> Tambah Nama Guru</button>
                <button class="btn btn-info" type="button" data-bs-target="#infoguru" data-bs-toggle="modal"><span class="fas fa-info"></span> Info Record Guru</button>
                <h5 class="card-title text-end text-medium fw-lighter">Daftar Nama Guru</h5>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table class="table table-bordered fw-lighter" style="overflow: scroll;">
                        <thead>
                            <tr>
                                <th class="text-center text-medium">No</th>
                                <th class="text-center text-medium">Nama Lengkap Guru</th>
                                <th class="text-center text-medium">Jenis Kelamin</th>
                                <th class="text-center text-medium">Opsional</th>
                            </tr>
                            <tbody>
                                <?php 
                                    $guru = $conSiswa->query("SELECT * FROM t_guru");
                                    $no = 1;
                                    while($g = $guru->fetch_array()){
                                        ?>
                                        <tr>
                                            <td class="text-center text-medium"><?=$no++?></td>
                                            <td class="text-start text-medium"><?=$g['nama']?></td>
                                            <td class="text-start text-medium"><?=$g['jeniskelamin']?></td>
                                            <td class="text-center">
                                                <a href="" class="fas fa-folder" data-bs-target="#dataguru<?=$g['id_guru']?>" data-bs-toggle="modal"></a>
                                                <a href="" class="fas fa-trash" data-bs-target="#hapusguru<?=$g['id_guru']?>" data-bs-toggle="modal"></a>
                                            </td>
                                        </tr>
                                        <div class="modal" id="dataguru<?=$g['id_guru']?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                                        <h5 class="modal-title text-center text-medium">Edit Anggota Guru</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post">
                                                            <div class="form-group">
                                                                <label class="fw-lighter text-medium">Nama Guru</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><span class="fa fa-address-card" aria-hidden="true"></span></div>
                                                                    <input type="text" name="nama" class="form-control input" value="<?=$g['nama']?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="fw-lighter text-medium">Jenis Kelamin</label>
                                                                    <select name="jeniskelamin" class="form-control select">
                                                                        <option> -- Pilih Jenis Kelamin -- </option>
                                                                        <?php 
                                                                            $result = $conSiswa->query("SELECT * FROM t_jeniskelamin");
                                                                            while($d = $result->fetch_array()){
                                                                                ?>
                                                                                <option <?php if($d['jeniskelamin'] == $g['jeniskelamin']){?> selected="" <?php } ?>><?=$d['jeniskelamin']?></option>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-default" data-bs-dismiss="modal" aria-hidden="true" type="button">Close</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal" id="hapusguru<?=$g['id_guru']?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                                        <h5 class="modal-title text-center text-medium">Hapus Anggota Guru</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=base()?>app/action/Siswa/act_hapusGuru.php" method="post">
                                                            <div class="form-group">
                                                                <h5 class="text-medium text-center fw-lighter mb-5">
                                                                    Apakah Anda ingin menghapus nama guru dibawah ini ?
                                                                </h5>
                                                                <h5 class="text-center text-medium fw-lighter"><input type="text" name="nama" value="<?=$g['nama']?>" readonly></h5>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger" name="hapusGuru" type="submit">Yes</button>
                                                                    <button class="btn btn-warning" data-bs-dismiss="modal" type="button">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </thead>
                    </table>
                    <div class="card-footer">
                        <div class="modal-footer mt-5">
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
    <div class="row mt-40">
        <div class="card" style="width: 59rem; left:15rem; bottom:2.59rem;">
            <div class="card-header">
                <button class="btn btn-info" type="button" data-bs-target="#tambahjam" data-bs-toggle="modal"><span class="fas fa-plus"></span> Tambah Jam Ke</button>
                <button class="btn btn-info" type="button" data-bs-target="#infojam" data-bs-toggle="modal"><span class="fas fa-info"></span> Info Record</button>
                <h5 class="card-title text-end text-medium fw-lighter">Daftar Tambah Jam</h5>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table class="table table-bordered fw-lighter">
                        <thead>
                            <tr>
                                <th class="text-center text-medium">Jam</th>
                                <th class="text-center text-medium">Mulai</th>
                                <th class="text-center text-medium">Akhir</th>
                                <th class="text-center text-medium">Opsional</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $jam = $conSiswa->query("SELECT * FROM t_jam");
                                while($j = $jam->fetch_array()){
                                    ?>
                                    <tr>
                                        <td class="text-center text-medium"><?=$j['jam']?></td>
                                        <td class="text-center text-medium"><?=$j['mulai']?></td>
                                        <td class="text-center text-medium"><?=$j['akhir']?></td>
                                        <td class="text-center"><a href="" data-bs-target="#editjam<?=$j['id_jam']?>" data-bs-toggle="modal" class="fas fa-edit"></a></td>
                                    </tr>
                                    <div class="modal" id="editjam<?=$j['id_jam']?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                                    <h5 class="modal-title text-center text-medium">Edit Jam</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?=base()?>app/action/Siswa/act_editJam.php" method="post">
                                                        <div class="form-group">
                                                            <label class="fw-lighter text-medium">Jam</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><span class="fas fa-clock"></span></div>
                                                                <input type="number" name="jam" class="form-control time" value="<?=$j['jam']?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="fw-lighter text-medium">Mulai Jam</label>
                                                                <input type="time" name="mulai" class="form-control" value="<?=$j['mulai']?>">                        
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="fw-lighter text-medium">Akhir Jam</label>
                                                                <input type="time" name="akhir" class="form-control" value="<?=$j['akhir']?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary" name="EditJam" type="submit">
                                                                    <span class="fas fa-save"></span></button>
                                                                <button class="btn btn-default" data-bs-dismiss="modal" aria-hidden="true" type="button">Close</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include "../dashboard/footer.php";
?>