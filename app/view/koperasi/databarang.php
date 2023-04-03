<?php 
include "../koperasi/header.php";
include "../../models/dataBarang.php";
include "../../models/Koperasi.php";

$query = mysqli_query($conKoperasi, "SELECT max(kode_barang) as kodeTerbesar FROM t_databarang");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];

$urutan = (int) substr($kodeBarang,-3,4);
$urutan++;
$huruf = "BRG-";
$kodebarang = $huruf . sprintf("%03s", $urutan);
?>

<style type="text/css">
    .text-none:hover {
        text-decoration: none;
    }
    .font-large {
        font-size: 21px;
    }
</style>

<h5 class="font-large flex justify-start items-start" style="margin-left: 21.8rem; margin-bottom: 2.5rem;"><a class="text-none" href="../koperasi/databarang.php">Data Barang Koperasi</a></h5>
<button data-bs-toggle="modal" data-bs-target="#infobarang" type="button" class="btn btn-info mb-5" style="margin-left: 21.8rem;"><span class="fa fa-info"></span> View Data Barang</button> <!-- Melihat Data Barang Masuk -->
<button data-bs-toggle="modal" data-bs-target="#tambahbarang" type="button" class="btn btn-info mb-5 ml-5"><span class="fa fa-plus"></span> Tambah Barang</button> <!-- Penambahan Data Barang -->

<div class="modal" id="infobarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?=base()?>assets/image/sd.png" class="navbar-brand">
                <h5 class="modal-title">Informasi Barang</h5>
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


<div class="modal" id="tambahbarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?=base()?>assets/image/sd.png" class="navbar-brand">
                <h5 class="modal-title text-center text-medium">Tambah barang</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body col-md-10 col-md-offset-1">
                <form action="<?=base()?>app/action/Koperasi/act_tambah.php" method="post">
                    <div class="mt-3">
                        <label class="fw-normal">Kode Barang : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-briefcase"></span></div>
                            <input type="text" name="kode_barang" class="form-control input" value="<?php echo $kodebarang;?>" readonly>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="fw-normal">Nama Barang : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-briefcase"></span></div>
                            <input type="text" name="nama_barang" class="form-control input" placeholder="masukkan nama produk">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="fw-normal">Jenis Barang : </label>
                        <select name="jenis" class="form-control select">
                            <option value="1">Alat Tulis</option>
                            <option value="2">Buku</option>
                            <option value="3">Makanan</option>
                            <option value="4">Minuman</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="fw-normal">Harga Barang : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fas fa-cash-register"></span></div>
                            <input type="number" name="harga_barang" class="form-control input" placeholder="masukkan harga barang">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="fw-normal">Jumlah Barang : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-briefcase"></span></div>
                            <input type="number" name="jumlah_barang" class="form-control input" placeholder="masukkan jumlah isi barang di dalam kerdus">
                        </div>
                    </div>
                    <div class="card-footer mt-5">
                        <input type="checkbox" name="selesai" value="yes"> Tandai jika sudah selesai
                        <div class="modal-footer">
                            <button class="btn btn-primary" name="simpanBarang"><span class="fa fa-save"></span></button>
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="ml-80" style="width: 125rem; margin-left:21.5rem;">
    <div class="card">
        <div class="card-header">
        <h5 class="card-title text-end">Data Barang Koperasi</h5>
            <div class="flex justify-end items-center mt-3">
                <?php  
                    if(isset($_GET["proses"])){
                        if($_GET["proses"] == "berhasil"){
                            ?>
                            <div class="alert-success mb-5" role="alert">
                                <h5 class="modal-title text-medium fw-lighter">Data Barang Berhasil Masuk ....</h5>
                            </div>
                            <?php
                        }else if($_GET["proses"] == "gagal"){
                            ?>
                            <div class="alert-danger mb-5" role="alert">
                                <h5 class="modal-title text-medium fw-lighter">Data Barang Tidak Berhasil Masuk ...</h5>
                            </div>
                            <?php
                        }else if($_GET["proses"] == "edit"){
                            ?>
                            <div class="alert-success mb-5" role="alert">
                                <h5 class="modal-title text-medium fw-lighter">Data Berhasil Di ubah ...</h5>
                            </div>
                            <?php
                        }else if($_GET["proses"] == "hapus"){
                            ?>
                            <div class="alert-warning mb-5" role="alert">
                                <h5 class="modal-title text-medium fw-lighter">Data Berhasil dihapus ...</h5>
                            </div>
                            <?php
                        }else if($_GET["proses"] == "hapus_gagal"){
                            ?>
                            <div class="alert-warning mb-5" role="alert">
                                <h5 class="modal-title text-medium fw-lighter">Data Barang Tidak berhasil dihapus</h5>
                            </div>
                            <?php
                        }
                        ?>
                        <script type="text/javascript">
                            window.setTimeout(() => {
                                location.href="databarang.php"
                            }, 3000);
                        </script>
                        <?php
                    }
                ?>
            </div>  
            <form action="../koperasi/databarang.php" method="get">
                <div class="input-group col-md-4 col-md-offset-8 mt-1">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
                <input type="text" class="form-control input mb-1" placeholder="Cari data barang ..." aria-describedby="basic-addon1" name="cari">
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">              
                <table class="table table-stripped">
                    <tr class="text-small-3 fw-lighter">
                        <th class="text-center">No</th>
                        <th class="text-center">Kode Barang</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Jenis Barang</th>
                        <th class="text-center">Harga Barang</th>
                        <th class="text-center">Jumlah Barang</th>
                        <th class="text-center">Opsional</th>
                    </tr>
                    <?php 
                        if(isset($_GET["cari"])){
                            $cari = mysqli_real_escape_string($conKoperasi, $_GET["cari"]);
                            $barang = "SELECT * FROM t_databarang WHERE nama_barang like '$cari' or kode_barang like '$cari'";
                            $caribarang = mysqli_query($conKoperasi, $barang);
                        }else{
                            $barang = "SELECT * FROM t_databarang limit $start, $per_hal";
                            $caribarang = mysqli_query($conKoperasi, $barang);
                        }
                        $no = 1;
                        while($x = $caribarang->fetch_array()){
                            ?>
                            <tr class="text-center text-medium fw-normal">
                                <td class="text-center"><?php echo $no++?></td>
                                <td><?php echo $x['kode_barang']; ?></td>
                                <td><?php echo ucfirst($x['nama_barang']); ?></td>
                                <td><?php echo JenisBarang(ucfirst($x['jenis'])); ?></td>
                                <td><?php echo Rupiah($x['harga_barang']); ?></td>
                                <td><?php echo (int)$x['jumlah_barang']." Qty"; ?></td>
                                <td class="flex-wrap jusftify-between items-center">
                                    <a data-bs-target="#edit<?=$x['id_barang']?>" data-bs-toggle="modal"><span class="fa fa-edit"></span></a>
                                    <a href="<?=base()?>app/action/Koperasi/act_hapus.php?id_barang=<?=$x['id_barang']?>" onclick="confirm('Apakah Barang yang anda inginkan mau di hapus ? <?=$x['nama_barang']?>');"><span class="fa fa-trash"></span></a>
                                    <a data-bs-target="#openfile<?=$x['id_barang']?>" data-bs-toggle="modal"><span class="fa fa-file"></span></a>
                                </td>
                            </tr>
                            <div class="modal" id="edit<?=$x['id_barang']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" class="navbar-brand">
                                            <div class="modal-title">
                                                <h5 class="text-medium text-center">Edit Product - <?=$x['nama_barang'];?></h5>
                                            </div>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body col-md-9 col-md-offset-1">
                                            <form action="<?=base()?>app/action/Koperasi/act_editbarang.php" method="post">
                                                <div class="mt-3">
                                                    <label class="fw-normal">No Barang</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-id-card"></span></div>
                                                        <input type="text" name="id_barang" class="form-control input" value="<?=$x['id_barang']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="fw-normal">Kode Barang : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-briefcase"></span></div>
                                                        <input type="text" name="kode_barang" class="form-control input" value="<?=$x['kode_barang']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="fw-normal">Nama Barang : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-briefcase"></span></div>
                                                        <input type="text" name="nama_barang" class="form-control input" value="<?=$x['nama_barang']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                <label class="fw-normal">Jenis Barang : </label>
                                                <input type="text" class="form-control input mb-2" value="<?php echo JenisBarang($x['jenis'])?>" readonly>
                                                    <select name="jenis" class="form-control select text-black">
                                                            <option class="text-black" value="1">Alat Tulis</option>
                                                            <option class="text-black" value="2">Buku</option>
                                                            <option class="text-black" value="3">Makanan</option>
                                                            <option class="text-black" value="4">Minuman</option>
                                                    </select>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="fw-normal">Harga Barang : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-cash-register"></span></div>
                                                        <input type="number" name="harga_barang" class="form-control input" value="<?=$x['harga_barang']?>">
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="fw-normal">Jumlah Barang : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-cash-register"></span></div>
                                                        <input type="number" name="jumlah_barang" class="form-control input" value="<?=$x['jumlah_barang']?>">
                                                    </div>
                                                </div>
                                                <div class="card-footer mt-5">
                                                <input type="checkbox" name="selesai" value="yes"> Tandai jika sudah selesai
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" name="simpan"><span class="fa fa-shopping-cart"></span></button>
                                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="openfile<?=$x['id_barang']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" class="navbar-brand">
                                            <div class="modal-title text-center">
                                                <h5 class="text-medium">File - <?=$x['nama_barang']?></h5>
                                            </div>
                                        </div>
                                        <div class="modal-body col-md-9 col-md-offset-1">
                                            <div class="mt-3">
                                                <label class="fw-normal">Kode Barang : </label>
                                                <p class="form-control input"><?=$x['kode_barang']?></p>
                                            </div>
                                            <div class="mt-3">
                                                <label class="fw-normal">Nama Barang : </label>
                                                <p class="form-control input"><?=$x['nama_barang']?></p>
                                            </div>
                                            <div class="mt-3">
                                                <label class="fw-normal">Jenis Barang : </label>
                                                <p class="form-control input"><?=JenisBarang($x['jenis'])?></p>
                                            </div>
                                            <div class="mt-3">
                                                <label class="fw-normal">Harga Barang : </label>
                                                <p class="form-control input"><?=Rupiah($x['harga_barang']);?></p>
                                            </div>
                                            <div class="mt-3">
                                                <label class="fw-normal">Stock Barang : </label>
                                                <p class="form-control input"><?=$x['jumlah_barang']." Qty";?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
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

<?php 
include "../koperasi/footer.php";
?>