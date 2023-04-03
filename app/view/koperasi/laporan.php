<?php 
include "../koperasi/header.php";
include "../../models/dataBarang.php";
global $conKoperasi;
?>

<div class="flex justify-center items-center" style="margin-left: 5rem;">
    <div class="card" style="width: 110rem; left:15rem;">
        <div class="card-header">
            <h5 class="card-title text-end" onclick="location.href='../koperasi/laporan.php'">Laporan Bukti Pembelian Buku Rekapitulasi</h5>
            <button type="button" class="btn btn-info" onclick="location.href='../koperasi/bukti.php'"><span class="fa fa-arrow-left"></span></button>
        </div>
        <div class="card-header">
            <form name="tanggal" action="./laporan.php" method="get" class="col-md-4 mt-1 mb-1">
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
            <?php
                if(isset($_GET['tanggal'])){
                    $date = $_GET['tanggal'];
                    $tg="lap_barang_laku.php?tanggal='$date'";
                ?>
                    <h4 style="margin-left:84rem; margin-top:0.55rem; margin-bottom:1rem;"> Data Penjualan Tanggal <a style='color:blue;'><?php echo $_GET['tanggal']; ?></a></h4>
                    <a style="margin-bottom:5px; margin-right: 2.7rem;" href="<?= $tg;?>" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
                }else{
                    $tg="lap_barang_laku.php";
                }
            ?>
        </div>
        <div class="table-responsive">
            <div class="card-body">
                <table class="table table-stripped table-bordered">
                    <tr>
                        <th class="text-small-3 fw-normal text-center">No</th>
                        <th class="text-small-3 fw-normal text-center">Tanggal</th>
                        <th class="text-small-3 fw-normal text-center">Kode Barang</th>
                        <th class="text-small-3 fw-normal text-center">Nama Product</th>
                        <th class="text-small-3 fw-normal text-center">Harga Product</th>
                        <th class="text-small-3 fw-normal text-center">Jumlah Beli</th>
                        <th class="text-small-3 fw-normal text-center">Laba</th>
                        <th class="text-small-3 fw-normal text-center">Total Harga</th>
                    </tr>
                    <?php 
                        if(isset($_GET['tanggal'])){
                            $tanggal = $_GET['tanggal'];
                            $bsale = mysqli_query($conKoperasi, "SELECT * FROM t_pembelian where tanggal like '$tanggal' order by tanggal desc");
                        }else{
                            $bsale = mysqli_query($conKoperasi, "select * from t_pembelian order by tanggal desc");
                        }
                        $no = 1;
                        while($s = mysqli_fetch_array($bsale)){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++?></td>
                        <td><?php echo $s['tanggal'];?></td>
                        <td><?php echo $s['kode_barang'] ?></td>
                        <td><?php echo $s['nama_barang'];?></td>
                        <td><?php echo Rupiah($s['harga']);?></td>
                        <td><?php echo $s['jumlah_beli'];?></td>
                        <td><?php echo Rupiah($s['laba']);?></td>
                        <td><?php echo Rupiah($s['total_harga']);?></td>
                    </tr>
                    <?php
                    }
                ?>
            <tr>
		    <td colspan="7">Total Pemasukan</td>
	                	<?php 
	                	if(isset($_GET['tanggal'])){
	                		$tanggal = $_GET['tanggal'];
	                		$x=mysqli_query($conKoperasi,"SELECT sum(total_harga) as total from t_pembelian where tanggal='$tanggal'");				
	                		if($xx=mysqli_fetch_array($x)){
	                			echo "<td><b> Rp.". number_format($xx['total'],2,".",",").",-</b></td>";
	                		}
	                	}else{}
	                	?>
	                </tr>
	                <tr>
	                	<td colspan="7">Total Laba</td>
	                	<?php 
	                	if(isset($_GET['tanggal'])){
	                		$tanggal = $_GET['tanggal'];
	                		$x=mysqli_query($conKoperasi,"SELECT sum(laba) as total from t_pembelian where tanggal='$tanggal'");			
	                		if($xx=mysqli_fetch_array($x)){
	                			echo "<td><b> Rp.". number_format($xx['total'],2,".",",").",-</b></td>";
	                		}else{}
	                	}
	                	?>
	                </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
include "../koperasi/footer.php";
?>