<?php 
global $conPerpustakaan;
include "../perpustakaan/header.php";
include "../../models/Perpustakaan.php";
?>



<div class="flex justify-center items-center">
    <div class="card" style="width: 115rem; left:16rem;">
        <div class="card-header">
            <h5 class="card-title text-end text-medium" onclick="location.href='peminjaman.php'" style="cursor: pointer;">Peminjaman Buku</h5>
            <button class="btn btn-info" data-bs-toggle="" data-bs-target=""><span class="fas fa-info"></span></button>
        </div>
        <div class="table table-responsive">
            <form action="../perpustakaan/peminjaman.php" method="get" class="col-md-5 mt-5" style="margin-left: 68rem;">
                <div class="input-group mb-5">
                    <div class="input-group-addon"><span class="fas fa-search"></span></div>
                    <input type="text" name="cari" class="form-control input" placeholder="cari buku yang di inginkan ...">
                </div>
            </form>
            <div class="card-body">
                <table class="table table-stripped">
                    <tr>
                        <th class="fw-lighter text-center">No</th>
                        <th class="fw-lighter text-center" style="width: 92px;">Kode Buku</th>
                        <th class="fw-lighter text-center">Judul Buku</th>
                        <th class="fw-lighter text-center">Genre Buku</th>
                        <th class="fw-lighter text-center">Nama Penulis</th>
                        <th class="fw-lighter text-center">Nama Penerbit</th>
                        <th class="fw-lighter text-center">Tahun Terbit</th>
                        <th class="fw-lighter text-center">Opsional</th>
                    </tr>
                    <?php 
                        if(isset($_GET["cari"])){
                            $buku = mysqli_escape_string($conPerpustakaan, $_GET["cari"]);
                            $cari = mysqli_query($conPerpustakaan, "SELECT * FROM t_databuku WHERE kode_buku like '$buku'");
                        }else{
                            $cari = $conPerpustakaan->query("SELECT * FROM t_databuku limit $start, $per_hal");
                        }
                        $no = 1;
                        while($x = $cari->fetch_array()){
                            ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$x['kode_buku']?></td>
                                <td><?=$x['judul_buku']?></td>
                                <td><?=$x['genre_buku']?></td>
                                <td><?=$x['nama_penulis']?></td>
                                <td><?=$x['nama_penerbit']?></td>
                                <td><?=$x['tahun_terbit']?></td>
                                <td class="flex justify-center items-center flex-wrap">
                                    <a href="" class="fas fa-book" data-bs-toggle="modal" data-bs-target="#buku<?=$x['id_buku']?>"></a>
                                </td>
                            </tr>
                            <div class="modal" id="buku<?=$x['id_buku']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" alt="Logo" class="navbar-brand">
                                            <h5 class="modal-title text-center"><?=$x['judul_buku']?></h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base()?>app/action/Perpustakaan/act_peminjaman.php" method="post">
                                                <input type="text" name="id_buku" class="form-control input" value="<?=$x['id_buku']?>" hidden>
                                                <div class="mt-5">
                                                    <label class="fw-lighter text-medium">Nama Peminjam : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                                        <input type="text" name="nama" class="form-control input" placeholder="nama peminjaman buku perpustakaan">
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <label class="fw-lighter text-medium">Kode Buku : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                                        <input type="text" name="kode_buku" class="form-control input" value="<?=$x['kode_buku']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <label class="fw-lighter text-medium">Nama Buku : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                                        <input type="text" name="nama_buku" class="form-control input" value="<?=$x['judul_buku']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <label class="fw-lighter text-medium">Tanggal Peminjaman Buku : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-calendar"></span></div>
                                                        <input type="date" name="onPeminjaman" class="form-control date">
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <label class="fw-lighter text-medium">Tanggal Pengembalian Buku : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-calendar"></span></div>
                                                        <input type="date" name="onPengembalian" class="form-control date">
                                                    </div>
                                                </div>
                                                <div class="input-group mt-4">
                                                    <input type="checkbox" name="selesai" value="yes"> Tandai jika sudah selesai
                                                    <div class="modal-footer mb-5">
                                                        <button class="btn btn-primary" type="submit" role="button" name="pinjamBuku">Selesai</button>
                                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
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
                </table>
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
</div>

<?php 
include "../perpustakaan/footer.php";
?>