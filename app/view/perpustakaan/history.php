<?php
global $conPerpustakaan; 
include "../perpustakaan/header.php";

$per_hal = 8;
$jumlah_record=mysqli_query($conPerpustakaan,"SELECT * from t_peminjaman");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;

$setelah = $page + 1;
$sebelum = $page - 1;
?>

<div class="flex justify-between items-center ml-16">
    <div class="card" style="width: 115rem; left: 20rem;">
        <div class="card-header">
            <h5 class="card-title text-end text-medium" onclick="location.href='history.php'" style="cursor: pointer;">History Peminjaman Buku</h5>
        </div>
        <div class="table table-responsive">
            <form action="history.php" method="get" class="col-md-4">
                <select name="cari" class="form-control select mt-4 mb-3" style="margin-left: 75rem;" type="submit" onchange="this.form.submit()">
                    <option>Pilih Nama Peminjaman Buku</option>
                    <?php 
                        $pilih = "SELECT distinct nama FROM t_peminjaman order by nama desc";
                        $result = mysqli_query($conPerpustakaan, $pilih);
                        while($xx = $result->fetch_array()){
                            ?>
                            <option><?=$xx['nama']?></option>
                            <?php
                        }
                    ?>
                </select>
            </form>
            <div class="table table-bordered">
                <div class="card-body flex-wrap flex justiy-center items-center position-relative">
                    <?php 
                        if(isset($_GET["cari"])){
                            $cari = mysqli_escape_string($conPerpustakaan, $_GET["cari"]);
                            $search = "SELECT * FROM t_peminjaman WHERE nama like '$cari'";
                            $nama = mysqli_query($conPerpustakaan, $search);
                        }else{
                            $nama = mysqli_query($conPerpustakaan, "SELECT * FROM t_peminjaman limit $start, $per_hal");
                        }
                        while($x = $nama->fetch_array()){
                            $cari_hari = abs(strtotime($x['onPeminjaman']) - strtotime($x['onPengembalian']));
                            $hitung_hari = floor($cari_hari/(60*60*24));
                            if($hitung_hari > strtotime($x['onPengembalian'])){
                                $telat = $hitung_hari - strtotime($x['onPengembalian']);
                                $denda = 1000 * $telat;
                            }else{
                                $telat = 0;
                                $denda = 0;
                            }
                            ?>                
                                <div class="card ml-5 mt-5">
                                    <div class="card-header">
                                        <h5 class="card-title text-center text-medium"><?=$x['nama_buku']?></h5>
                                        <p class="card-text text-center mt-2">Kode Buku : <?=$x['kode_buku']?></p>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text mt-2">Nama Peminjaman : <?=$x['nama']?></p>
                                        <p class="card-text mt-2">Judul Buku : <?=$x['nama_buku']?></p>
                                        <p class="card-text mt-2">Tanggal Peminjaman : <?=$x['onPeminjaman']?></p>
                                        <p class="card-text mt-2">Tanggal Peminjaman : <?=$x['onPengembalian']?></p>
                                        <div class="card-footer text-end">
                                            <p class="card-text mt-2">Denda : <?php echo "Rp. ".number_format($denda, 2, ".", ",");?></p>
                                            <p class="card-text mt-2">Telat : <?php echo "Rp. ".number_format($telat, 2, ".", ",");?></p>
                                            <div class="card-footer"></div>
                                            <div class="modal-footer">
                                                <p class="card-text">Sisa Hari : <?=$hitung_hari . " Hari";?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include "../perpustakaan/footer.php";
?>