<?php 
global $conSiswa;
include "../dashboard/header.php";
$id_kelas = $conSiswa->escape_string($_GET["id_kelas"]);
$query = mysqli_fetch_array($conSiswa->query("select * from t_kelas where id_kelas='$id_kelas'"));

$per_hal = 10;
$jumlah_record=mysqli_query($conSiswa,"SELECT * from t_siswa where id_kelas='$id_kelas'");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;

$setelah = $page + 1;
$sebelum = $page - 1;
?>

<div class="flex justify-center items-center">
    <div class="card" style="width: 120rem; left:20rem; height: 70.5rem; top: 7.2rem;">
        <div class="card-header">
            <h5 class="card-title text-medium fw-lighter">
                <a href="input_absensi.php?id_kelas=<?=$query['id_kelas']?>">ABSENSI KELAS <?php echo $query['namakelas'];?></a>
            </h5>
        </div>
        <div class="table-responsive">
            <div class="card-body">
                <form action="<?=base()?>app/action/Siswa/act_absensi.php" method="post">
                    <input type="hidden" value="<?php echo $query['id_kelas'];?>" name="id_kelas"/>
                    <table class="table table-stripped">
                        <tr>
                            <div class="input-group mb-5">
                                <div class="input-group-addon"></div>
                                <input type="date" name="tanggal" class="form-control date">
                            </div>
                        </tr>
                        <tr>
                            <th class="text-medium text-center fw-lighter">No</th>
			                <th class="text-medium text-start fw-lighter">Nama Siswa / Siswi</th>
			                <th class="text-medium text-center fw-lighter">Hadir (H)</th>
			                <th class="text-medium text-center fw-lighter">Sakit (S)</th>
			                <th class="text-medium text-center fw-lighter">Ijin (I)</th>
			                <th class="text-medium text-center fw-lighter">Alfa (A)</th>
                        </tr>
                        <?php 
                            $no = 0;
                            $c = 1;
                            $query=$conSiswa->query("select * from t_siswa where id_kelas='$id_kelas'");
                            while($row = $query->fetch_array()){
                                ?>
                                <tr>
                                    <td class="text-center text-medium fw-lighter"><?php echo $c++;?></td>
                                    <td class="text-start text-medium fw-lighter"><?php echo $row['nama_lengkap'];?></td>
                                    <td align="center">
			                        	<?php
			                        	echo "<input type=checkbox name=hadir[] value=$row[id_siswa] id='$no'>";
			                        	$no++;
			                        	?>
			                        </td>
                                    <td align="center">
			                        	<?php
			                        	echo "<input type=checkbox name=sakit[] value=$row[id_siswa] id=$no>";
			                        	$no++;
			                        	?>
			                        </td>
                                    <td align="center">
			                        	<?php
			                        	echo "<input type=checkbox name=ijin[] value=$row[id_siswa] id=$no>";
			                        	$no++;
			                        	?>
			                        </td>
                                    <td align="center">
			                        	<?php
			                        	echo "<input type=checkbox name=alfa[] value=$row[id_siswa] id=$no>";
			                        	$no++;
			                        	?>
			                        </td>     
                                </tr>
                            <?php
                            }
                            echo "
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td align=center>
                                    <input type='button' name='pilih' onclick='for (i=0;i<$no;i++){document.getElementById(i).checked=true;}' value='Check All'>
                                    </td>
                                    <td align=center>
                                    <input type='button' name='pilih' onclick='for (i=0;i<$no;i++){document.getElementById(i).checked=false;}' value='Uncheck All'>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>";
                        ?>
                    </table>
            		<input type="checkbox" name="selesai" value="yes" /> Tandai Kelas Selesai
            		<div class="mb-3"></div>
            		<input class="btn btn-primary" type="submit" value="Submit" />
                    <div class="mb-5"></div>
                </form>
                <div class="card-footer">
                    <div class="modal-footer mt-2">
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