<?php 
global $conPerpustakaan;
include "../perpustakaan/header.php";
include "../../models/Perpustakaan.php";

$query = mysqli_query($conPerpustakaan, "SELECT max(kode_buku) as kodeTerbesar FROM t_databuku");
$data = mysqli_fetch_array($query);
$kodeBuku = $data['kodeTerbesar'];

$urutan = (int) substr($kodeBuku,-3,5);
$urutan++;
$huruf = "Book-";
$kodebuku = $huruf . sprintf("%03s", $urutan);
?>


<div class="modal" id="lihatbuku" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?=base()?>assets/image/sd.jpeg" alt="Logo" class="navbar-brand">
                <h5 class="modal-title text-center text-medium fw-normal">Lihat Buku Masuk Perpustakaan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <span class="flex justify-between items-center flex-wrap">
		            <span>Jumlah Record :</span>		
		            <span><?php echo $jum; ?></span>
		            <span>Jumlah Halaman :</span>	
		            <span><?php echo $halaman; ?></span>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="tambahbuku" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                <h5 class="modal-title text-center text-medium fw-normal">Tambah Buku Perpustakaan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body col-md-9 col-md-offset-1">
                <form action="<?=base()?>app/action/Perpustakaan/act_tambah.php" method="post">
                    <div class="mt-4">
                        <label class="fw-lighter text-medium">Kode Buku :</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-book"></span></div>
                            <input type="text" name="kode_buku" value="<?=$kodebuku;?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="fw-lighter text-medium">Judul Buku :</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-book"></span></div>
                            <input type="text" name="judul_buku" class="form-control input" placeholder="masukkan judul buku">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="fw-lighter text-medium">Judul Buku :</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-book"></span></div>
                            <select name="genre_buku" class="form-control select">
                                <option>Masukkan Genre Buku yang dimasukkan</option>
                                <?php 
                                    $result = $conPerpustakaan->query("SELECT distinct genre_buku FROM t_genre order by genre_buku desc");
                                    while($rx = $result->fetch_array()){
                                        ?>
                                        <option><?=$rx['genre_buku']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="fw-lighter text-medium">Nama Penulis :</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-book"></span></div>
                            <input type="text" name="nama_penulis" class="form-control input" placeholder="masukkan nama penulis buku">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="fw-lighter text-medium">Tahun Terbit :</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                            <input type="text" name="tahun_terbit" class="form-control date">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="fw-lighter text-medium">Nama Penerbit :</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-book"></span></div>
                            <input type="text" name="nama_penerbit" class="form-control input" placeholder="masukkan nama penerbit">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="fw-lighter text-medium">Jumlah Buku :</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-book"></span></div>
                            <input type="number" name="jumlah_buku" class="form-control number" placeholder="stock buku tersedia">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="fw-lighter text-medium">Abstract Buku :</label>
                        <div class="input-group">
                            <textarea name="abstract" style="border:1px solid; width: 43rem; height: 20rem;" maxlength="1000"></textarea>
                        </div>
                    </div>
                    <div class="input-group mt-4">
                        <input type="checkbox" name="selesai" value="yes"> Tandai jika sudah selesai
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" role="button" name="simpanBuku">Selesai</button>
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center items-center">
    <div class="card" style="width: 115rem; left:16rem;">
        <div class="card-header">
            <button class="btn btn-info" type="button" data-bs-target="#tambahbuku" data-bs-toggle="modal" role="button"><span class="fas fa-plus"></span></button>
            <button class="btn btn-info" type="button" data-bs-target="#lihatbuku" data-bs-toggle="modal" ><span class="fas fa-info"></span></button>
            <div class="mb-5"></div>
            <?php 
                if(isset($_GET["buku"])){
                    if($_GET["buku"] == "berhasil"){
                        ?>
                        <div class="alert-success mb-5" role="alert">
                            <h5 class="modal-title text-center text-medium fw-lighter">Selamat Anda Sudah Menambahkan Buku Baru ...</h5>
                        </div>
                        <?php
                    }else if($_GET["buku"] == "hapus"){
                        ?>
                        <div class="alert-danger mb-5" role="alert">
                            <h5 class="modal-title text-center text-medium fw-lighter">Anda Sudah Membuang Buku yang ada di data perpustakaan</h5>
                        </div>
                        <?php
                    }else if($_GET["buku"] == "edit"){
                        ?>
                        <div class="alert-warning mb-5" role="alert">
                            <h5 class="modal-title text-center text-medium fw-lighter">Selamat Anda Sudah Mengedit data buku perpustakaan</h5>
                        </div>
                        <?php
                    }else if($_GET["buku"] == "gagal"){
                        ?>
                        <div class="alert-warning mb-5" role="alert">
                            <h5 class="modal-title text-center text-medium fw-lighter"><span class="fas fa-info"></span> Maaf Anda gagal membuang buku yang ada di data perpustakaan</h5>
                        </div>
                        <?php
                    }
                    ?>
                    <script type="text/javascript">
                        window.setTimeout(() => {location.href='buku.php'}, 3000);
                    </script>
                    <?php
                }
            ?>
            <div class="mb-5">
                <h5 class="card-title text-end" onclick="location.href='../perpustakaan/buku.php'" style="cursor: pointer;">Buku Perpustakaan Sekolah</h5>
                <form action="../perpustakaan/buku.php" method="get" class="col-md-5 mt-5" style="margin-left: 68rem;">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="fas fa-search"></span></div>
                        <input type="text" name="cari" class="form-control input" placeholder="cari buku yang di inginkan ...">
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <div class="card-body">
                <table class="table table-stripped table-bordered text-medium">
                    <tr>
                        <th class="fw-lighter text-center">No</th>
                        <th class="fw-lighter text-center" style="width: 92px;">Kode Buku</th>
                        <th class="fw-lighter text-center">Judul Buku</th>
                        <th class="fw-lighter text-center">Genre Buku</th>
                        <th class="fw-lighter text-center">Nama Penulis</th>
                        <th class="fw-lighter text-center">Tahun Terbit</th>
                        <th class="fw-lighter text-center">Nama Penerbit</th>
                        <th class="fw-lighter text-center">Opsional</th>
                    </tr>
                    <?php 
                        if(isset($_GET["cari"])){
                            $caribuku = mysqli_escape_string($conPerpustakaan, $_GET["cari"]);
                            $buku = $conPerpustakaan->query("SELECT * FROM t_databuku WHERE judul_buku like '$caribuku' or genre_buku like '$caribuku' or tahun_terbit like '$caribuku'");
                        }else{
                            $buku = $conPerpustakaan->query("SELECT * FROM t_databuku limit $start, $per_hal");
                        }
                        $no = 1;
                        while($x = $buku->fetch_array()){
                            ?>
                            <tr class="text-center">
                                <td><?php echo $no++ ?></td>
                                <td><?=$x['kode_buku'];?></td>
                                <td class="text-start"><?=$x['judul_buku'];?></td>
                                <td><?=$x['genre_buku'];?></td>
                                <td><?=$x['nama_penulis'];?></td>
                                <td><?=$x['tahun_terbit'];?></td>
                                <td><?=$x['nama_penerbit'];?></td>
                                <td class="flex justify-between items-center flex-wrap">
                                    <a href="#" role="button" data-bs-toggle="modal" data-bs-target="#edit<?=$x['id_buku']?>"><span class="fa fa-edit"></span></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#lihat<?=$x['id_buku']?>"><span class="fa fa-file"></span></a>
                                    <a href="#" role="button" data-bs-toggle="" data-bs-target=""><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                            <div class="modal" id="edit<?=$x['id_buku']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.jpeg" alt="Logo" class="navbar-brand">
                                            <h5 class="modal-title text-center text-medium fw-normal">Tambah Buku Perpustakaan</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body col-md-offset-1">
                                            <form action="<?=base()?>app/action/Perpustakaan/act_edit.php" method="post">
                                                <input type="text" name="id_buku" value="<?=$x['id_buku']?>" hidden>
                                                <div class="mt-4">
                                                    <label class="fw-lighter text-medium">Kode Buku :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                                        <input type="text" name="kode_buku" value="<?=$x['kode_buku'];?>" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <label class="fw-lighter text-medium">Judul Buku :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                                        <input type="text" name="judul_buku" class="form-control input" placeholder="masukkan judul buku" value="<?=$x['judul_buku']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <label class="fw-lighter text-medium">Judul Buku :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                                        <select name="genre_buku" class="form-control select">
                                                            <option>Masukkan Genre Buku yang dimasukkan</option>
                                                            <?php 
                                                                $result = $conPerpustakaan->query("SELECT distinct genre_buku FROM t_genre order by genre_buku desc");
                                                                while($rx = $result->fetch_array()){
                                                                    ?>
                                                                    <option <?php if($rx['genre_buku'] == $x['genre_buku']){?> selected="" <?php }?>><?=$rx['genre_buku']?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <label class="fw-lighter text-medium">Nama Penulis :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                                        <input type="text" name="nama_penulis" class="form-control input" placeholder="masukkan nama penulis buku" value="<?=$x['nama_penulis']?>">
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <label class="fw-lighter text-medium">Tahun Terbit :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                                        <input class="form-control input" value="<?=date($x['tahun_terbit'])?>" name="tahun_terbit" type="text">
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <label class="fw-lighter text-medium">Nama Penerbit :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                                        <input type="text" name="nama_penerbit" class="form-control input" placeholder="masukkan nama penerbit" value="<?=$x['nama_penerbit']?>">
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <label class="fw-lighter text-medium">Jumlah Buku :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-book"></span></div>
                                                        <input type="number" name="jumlah_buku" class="form-control number" placeholder="stock buku tersedia" value="<?=(int)$x['jumlah_buku']?>">
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <label class="fw-lighter text-medium">Abstract Buku :</label>
                                                    <div class="input-group">
                                                        <textarea name="abstract" style="border:1px solid; width: 43rem; height: 20rem;" maxlength="1000"><?=$x['abstract']?></textarea>
                                                    </div>
                                                </div>
                                                <div class="input-group mt-4">
                                                    <input type="checkbox" name="selesai" value="yes"> Tandai jika sudah selesai
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="submit" role="button" name="editBuku">Selesai</button>
                                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="lihat<?=$x['id_buku']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.jpeg" alt="Logo" class="navbar-brand">
                                            <h5 class="modal-title"><?=$x['judul_buku'];?></h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mt-3">
                                                <label class="fw-lighter text-medium">Nama Penulis : </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                                    <input type="text" class="form-control input" value="<?=$x['nama_penulis']?>" readonly>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <label class="fw-lighter text-medium">Abstract : </label>
                                                <div class="input-group">
                                                    <textarea readonly style="border:1px solid; width: 43rem; height: 20rem;" maxlength="1000"><?=$x['abstract']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </table>
            </div>
            <div class="card-footer">
                <div class="modal-footer">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" <?php if($page > 1){ echo "href='?page=$sebelum'"; } ?> 
                         style="margin-left: 0.1rem; background-color: transparent; border: 0px; color:black;">⏮</a></li>
                        <?php 
                            for($x = 1; $x <= $halaman; $x++){
                        ?> 
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"
                         style="margin-left: 0.4rem; background-color: transparent; border: 0px; color:black;"> <?php echo $x; ?></a></li>
                        <?php
                            }
                        ?> 
                        <li class="page-item"><a class="page-link" <?php if($page < $halaman){ echo "href='?page=$setelah'"; } ?> 
                         style="margin-left: 0.5rem; background-color: transparent; border: 0px; color:black;">⏭</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include "../perpustakaan/footer.php";
?>