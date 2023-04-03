<?php 
include "../../database/Migrations/dbSiswa.php";
$kd_kelas=$_POST['id_kelas'];
$tanggal=htmlentities(trim($_POST['tanggal']));

if(isset($_POST['selesai'])){
	if(!empty($_POST['hadir'])){
		//parameter
		$kd_siswa=$_POST['hadir'];
		$jumlah=count($kd_siswa);
	
		for($i=0;$i<$jumlah;$i++){
			$hadir=$conSiswa->query("insert into t_absensi(id_siswa,id_kelas,keterangan,tanggal,selesai) values('$kd_siswa[$i]','$kd_kelas','h','$tanggal','yes')");
		}
        header("location:../../view/dashboard/absensi.php?id_kelas=$kd_kelas?tanggal=$tanggal");
	}
	
	if(!empty($_POST['sakit'])){
		//parameter
		$kd_siswa=$_POST['sakit'];
		$jumlah=count($kd_siswa);

		for($i=0;$i<$jumlah;$i++){
			$hadir=$conSiswa->query("insert into t_absensi(id_siswa,id_kelas,keterangan,tanggal,selesai) values('$kd_siswa[$i]','$kd_kelas','s','$tanggal','yes')");
		}
        header("location:../../view/dashboard/absensi.php?id_kelas=$kd_kelas?tanggal=$tanggal");
    }
	
	if(!empty($_POST['ijin'])){
		//parameter
		$kd_siswa=$_POST['ijin'];
		$jumlah=count($kd_siswa);
	
		for($i=0;$i<$jumlah;$i++){
			$hadir=$conSiswa->query("insert into t_absensi(id_siswa,id_kelas,keterangan,tanggal,selesai) values('$kd_siswa[$i]','$kd_kelas','i','$tanggal','yes')");
		}
        header("location:../../view/dashboard/absensi.php?id_kelas=$kd_kelas?tanggal=$tanggal");
	}
	
	if(!empty($_POST['alfa'])){
		//parameter
		$kd_siswa=$_POST['alfa'];
		$jumlah=count($kd_siswa);
	
		for($i=0;$i<$jumlah;$i++){
			$hadir=$conSiswa->query("insert into t_absensi(id_siswa,id_kelas,keterangan,tanggal,selesai) values('$kd_siswa[$i]','$kd_kelas','a','$tanggal','yes')");
		}
        header("location:../../view/dashboard/absensi.php?id_kelas=$kd_kelas?tanggal=$tanggal");
	}
}else{
	unset($_POST['selesai']);
    header("location:../../view/dashboard/absensi.php?id_kelas=$kd_kelas?tanggal=$tanggal");
}
?>