<?php 
global $conKoperasi;
include "../koperasi/header.php";
include "../../models/dataBarang.php";

$per_hal = 4;
$jumlah_record=mysqli_query($conKoperasi,"SELECT * from t_pembelian");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;

$setelah = $page + 1;
$sebelum = $page - 1;
?>

<div class="flex justify-center items-center ml-80">
    <div class="card ml-80" style="width: 100rem;">
        <div class="card-header">
            <h5 class="card-title text-medium text-end" onclick="location.href='../koperasi/bukti.php'" style="cursor:pointer;">Bukti Pembelian</h5>
            <button class="btn btn-info col-md-offset-10 mt-5" onclick="location.href='../koperasi/laporan.php'">Laporan Penjualan</button>
            <form name="tanggal" action="./bukti.php" method="get" class="col-md-4">
                <select type="submit" name="tanggal" class="form-control select mb-2" onchange="this.form.submit()">
                    <option>Pilih Tanggal</option>
                    <?php 
                        $data = "SELECT distinct tanggal FROM t_pembelian order by tanggal desc";
                        $rs = mysqli_query($conKoperasi, $data);
                        while($xt = $rs->fetch_array()){
                            ?>
                            <option><?php echo $xt['tanggal']; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </form>
        </div>
        <div class="table-responsive">
            <div class="card-body">
                <?php 
                    if(isset($_GET["tanggal"])){
                        $cari = mysqli_escape_string($conKoperasi, $_GET["tanggal"]);
                        $xdata = mysqli_query($conKoperasi, "SELECT * FROM t_pembelian WHERE tanggal like '$cari'");
                    }else{
                        $xdata = mysqli_query($conKoperasi, "SELECT * FROM t_pembelian limit $start, $per_hal");   
                    }
                    while($x = $xdata->fetch_array()){
                        ?>
                        <div class="card col-md-4 ml-5 mt-5 mb-3 flex justify-between items-center flex-wrap position-relative">
                            <div class="card-header">
                                <h5 class="card-title text-medium text-center">Bukti Pembelian</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-small-3 fw-normal">Tanggal Pembelian : <?php echo $x['tanggal']; ?></p>
                                <p class="card-text text-small-3 fw-normal">Kode Barang : <?php echo $x['kode_barang']; ?></p>
                                <p class="card-text text-small-3 fw-normal">Nama Barang : <?php echo $x['nama_barang']; ?></p>
                                <p class="card-text text-small-3 fw-normal">Harga Barang : <?php echo Rupiah($x['harga']); ?></p>
                                <p class="card-text text-small-3 fw-normal">Jumlah Beli : <?php echo (int)$x['jumlah_beli']; ?></p>
                                <div class="card-footer">
                                    <div class="modal-footer">
                                        <p class="card-text text-small-3 ml-24 fw-normal">Laba : <?php echo Rupiah($x['laba']); ?></p>
                                        <p class="card-text text-small-3 fw-normal">Total Harga : <?php echo Rupiah($x['total_harga']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="card-footer"></div>
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

<?php 
include "../koperasi/footer.php";
?>