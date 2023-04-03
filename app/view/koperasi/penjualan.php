<?php 
include "../koperasi/header.php";
include "../../models/dataBarang.php";
include "../../models/Koperasi.php";
?>

<div class="ml-80" style="width: 125rem; margin-left:21.5rem;">
    <div class="card">
        <div class="card-header">
        <h5 class="card-title text-start text-large" onclick="location.href='penjualan.php'" style="cursor:pointer;">Penjualan Koperasi</h5>
            <div class="flex justify-end items-center mt-3">
                <?php  
                    if(isset($_GET["proses"])){
                        if($_GET["proses"] == "berhasil"){
                            ?>
                            <div class="alert-success mb-5" role="alert">
                                <h5 class="modal-title text-medium fw-lighter">Terima Kasih Sudah belanja di Koperasi Kita</h5>
                            </div>
                            <?php
                        }
                        ?>
                        <script type="text/javascript">
                            window.setTimeout(() => {
                                location.href="penjualan.php"
                            }, 3000);
                        </script>
                        <?php
                    }
                ?>
            </div>  
            <form action="../koperasi/penjualan.php" method="get">
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
                                <td><?php echo (int)$x['jumlah_barang']."Qty"; ?></td>
                                <td class="flex-wrap jusftify-between items-center">
                                    <a style="cursor:pointer;" onclick="if(confirm('Apakah Anda ingin membeli barang ini <?=$x['nama_barang']?> ?')){}else{window.location.href='penjualan.php'}" data-bs-target="#tambahpembelian<?=$x['id_barang']?>" data-bs-toggle="modal"><span class="fa fa-shopping-cart"></span></a>
                                </td>
                            </tr>
                            <div class="modal" id="tambahpembelian<?=$x['id_barang']?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="<?=base()?>assets/image/sd.png" class="navbar-brand">
                                            <div class="modal-title">
                                                <h5 class="text-medium text-center">Product - <?=$x['nama_barang'];?></h5>
                                            </div>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body col-md-9 col-md-offset-1">
                                            <form action="<?=base()?>app/action/Koperasi/act_beli.php" method="post">
                                                <div class="mt-3">
                                                    <label class="fw-normal">Tanggal Pembelian : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" name="tanggal" class="form-control date">
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
                                                    <label class="fw-normal">Harga Barang : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-cash-register"></span></div>
                                                        <input type="number" name="harga" class="form-control input" value="<?=$x['harga_barang']?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <label class="fw-normal">Jumlah Beli Barang : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="fas fa-cash-register"></span></div>
                                                        <input type="number" name="jumlah_beli" class="form-control input">
                                                    </div>
                                                </div>
                                                <div class="card-footer mt-5">
                                                <input type="checkbox" name="selesai" value="yes"> Tandai jika sudah selesai
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" name="bayar"><span class="fa fa-shopping-cart"></span></button>
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