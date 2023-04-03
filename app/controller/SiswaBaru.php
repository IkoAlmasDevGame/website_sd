<?php 
function TambahMurid($nisn,$namalengkap,$lahir,$gender,$religion,$checkInput){
    global $conSiswa;

    $nisn = htmlentities(trim($_POST["NISN"]));
    $namalengkap = htmlentities(trim($_POST["nama_lengkap"]));
    $lahir = htmlentities(trim($_POST["birthday"]));
    $gender = htmlentities(trim($_POST["gender"]));
    $religion = htmlentities(trim($_POST["agama"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        $tambah = "INSERT INTO t_datasiswa (id_siswa, NISN, nama_lengkap, birthday, gender, agama, selesai) VALUES ('','$nisn','$namalengkap','$lahir','$gender','$religion','$checkInput')";
        $response = array();
        $response['t_datasiswa'] = array();
        if($conSiswa->query($tambah)){
            array_push(
                $response['t_datasiswa'],
                $nisn,
                $namalengkap,
                $lahir,
                $gender,
                $religion,
                $checkInput
            );
            ?>
            <script type="text/javascript">
                window.alert("Data Pribadi Siswa / Siswi sudah masuk dalam database sekolah", location.href='../../view/dashboard/daftarmurid.php');
            </script>
            <?php
        }
        return true;
    }else{
        return false;
    }
}

function UpdateSeleksi($nisn, $seleksi){
    global $conSiswa;

    $seleksi = htmlentities(trim($_POST["selected"]));
    $nisn = $_POST["NISN"];

    $conSiswa->query("SELECT * FROM t_datasiswa where NISN='$nisn'");

    if($conSiswa->query("UPDATE t_datasiswa SET selected='$seleksi' where NISN='$nisn'")){
        return true;
    }else{
        return false;
    }
}

function EditDocument($namalengkap,$nama_ayah,$tla,$wFather,$tef,$nama_ibu,$tli,$wMother,$tei,$address,$checkInput,$nisn){
    global $conSiswa;

    $nisn = htmlentities(trim($_POST["NISN"]));
    $namalengkap = htmlentities(trim($_POST["nama_lengkap"]));
    $nama_ayah = htmlentities(trim($_POST["nama_ayah"]));
    $tla = htmlentities(trim($_POST["tempat_lahir_ayah"]));
    $wFather = htmlentities(trim($_POST["workFather"]));
    $tef = htmlentities(trim($_POST["TertiaryEducationFather"]));
    $nama_ibu = htmlentities(trim($_POST["nama_ibu"]));
    $tli = htmlentities(trim($_POST["tempat_lahir_ibu"]));
    $wMother = htmlentities(trim($_POST["workMother"]));
    $tei = htmlentities(trim($_POST["TertiaryEducationMother"]));
    $address = htmlentities(trim($_POST["alamat_rumah"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        $updateBaru = "UPDATE t_orangtua SET nama_lengkap='$namalengkap', nama_ayah='$nama_ayah', tempat_lahir_ayah='$tla', workFather='$wFather', TertiaryEducationFather='$tef', nama_ibu='$nama_ibu', tempat_lahir_ibu='$tli', workMother='$wMother', TertiaryEducationMother='$tei', alamat_rumah='$address', selesai='$checkInput' where NISN='$nisn'";
        $response = array();
        $response['t_orangtua'] = array();
        if($conSiswa->query($updateBaru)){
            array_push(
                $response['t_orangtua'],
                $namalengkap,
                $nama_ayah,
                $tla,
                $wFather,
                $tef,
                $nama_ibu,
                $tli,
                $wMother,
                $tei,
                $address,
                $checkInput,
                $nisn
            );
            ?>
            <script type="text/javascript">
                window.alert("Sudah Ter-Update Data Orang Tua Siswa", location.href='../../view/dashboard/daftarmurid.php');
            </script>
            <?php
        }
        return true;
    }else{
        return false;
    }

}

function DocsFamilyStudent($nisn,$namalengkap,$nama_ayah,$tla,$wFather,$tef,$nama_ibu,$tli,$wMother,$tei,$checkInput){
    global $conSiswa;

    $nisn = htmlentities(trim($_POST["NISN"]));
    $namalengkap = htmlentities(trim($_POST["nama_lengkap"]));
    $nama_ayah = htmlentities(trim($_POST["nama_ayah"]));
    $tla = htmlentities(trim($_POST["tempat_lahir_ayah"]));
    $wFather = htmlentities(trim($_POST["workFather"]));
    $tef = htmlentities(trim($_POST["TertiaryEducationFather"]));
    $nama_ibu = htmlentities(trim($_POST["nama_ibu"]));
    $tli = htmlentities(trim($_POST["tempat_lahir_ibu"]));
    $wMother = htmlentities(trim($_POST["workMother"]));
    $tei = htmlentities(trim($_POST["TertiaryEducationMother"]));
    $address = htmlentities(trim($_POST["alamat_rumah"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        $docs = "INSERT INTO t_orangtua (id_data, NISN, nama_lengkap, nama_ayah, tempat_lahir_ayah, workFather, TertiaryEducationFather, nama_ibu, tempat_lahir_ibu, workMother, TertiaryEducationMother, alamat_rumah, selesai) VALUES('','$nisn','$namalengkap','$nama_ayah','$tla','$wFather','$tef','$nama_ibu','$tli','$wMother','$tei', '$address','$checkInput')";
        $response = array();
        $response['t_orangtua'] = array();
        if($conSiswa->query($docs)){
            array_push(
                $response['t_orangtua'],
                $nisn,
                $namalengkap,
                $nama_ayah,
                $tla,
                $wFather,
                $tef,
                $nama_ibu,
                $tli,
                $wMother,
                $tei,
                $address,
                $checkInput
            );
            ?>
            <script type="text/javascript">
                window.alert("Data Penginputan Orang Tua, sudah masuk database sekolah", location.href='../../view/dashboard/daftarmurid.php');
            </script>
            <?php
        }
        return true;
    }else{
        return false;
    }
}

function EditMurid($namalengkap,$lahir,$gender,$religion,$checkInput,$nisn){
    global $conSiswa;

    $nisn = htmlentities(trim($_POST["NISN"]));
    $namalengkap = htmlentities(trim($_POST["nama_lengkap"]));
    $lahir = htmlentities(trim($_POST["birthday"]));
    $gender = htmlentities(trim($_POST["gender"]));
    $religion = htmlentities(trim($_POST["agama"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        $update = "UPDATE t_datasiswa SET nama_lengkap='$namalengkap', birthday='$lahir', gender='$gender', agama='$religion', selesai='$checkInput' WHERE NISN='$nisn'";
        $response = array();
        $response['t_datasiswa'] = array();
        if($conSiswa->query($update)){
            array_push(
                $response['t_datasiswa'],
                $namalengkap,
                $lahir,
                $gender,
                $religion,
                $checkInput,
                $nisn
            );
            ?>
            <script type="text/javascript">
                window.alert("Sudah Ter-update Data Siswa", location.href='../../view/dashboard/daftarmurid.php');
            </script>
            <?php
        }
        return true;
    }else{
        return false;
    }
}

function HapusDataMurid($nisn){
   global $conSiswa;

   $nisn = htmlentities(trim($_POST["NISN"]));
   if($conSiswa->query("DELETE FROM t_datasiswa WHERE NISN='$nisn'")){
    return true;
   }else{
    return false;
   }
}

function classroom($id_siswa,$nisn,$nama,$id_kelas,$checkInput){
    global $conSiswa;

    $id_siswa = htmlentities(trim($_POST["id_siswa"]));
    $nisn = htmlentities(trim($_POST["NISN"]));
    $nama = htmlentities(trim($_POST["nama_lengkap"]));
    $id_kelas = htmlentities(trim($_POST["id_kelas"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        $response = array();
        $response['t_siswa'] = array();
        $dataKelas = "INSERT INTO t_siswa (kd_siswa, id_siswa, NISN, nama_lengkap, id_kelas, selesai) VALUES ('','$id_siswa','$nisn','$nama','$id_kelas','$checkInput')";
        if($conSiswa->query($dataKelas)){
            array_push(
                $response['t_siswa'],
                $id_siswa,
                $nisn,
                $nama,
                $id_kelas,
                $checkInput
            );
            ?>
            <script type="text/javascript">
                window.alert("Data Kelas Sudah Tersedia ...", location.href='../../view/dashboard/daftarmurid.php');
            </script>
            <?php
        }
        return true;
    }else{
        return false;
    }
}

function TambahPelajaran($pelajaran){
    global $conSiswa;

    $pelajaran = htmlentities(trim($_POST["pelajaran"]));
    if($conSiswa->query("INSERT INTO t_pelajaran SET pelajaran='$pelajaran'")){
        return true;
    }else{
        return false;
    }
}

function TambahJam($jam, $mulai, $akhir){
    global $conSiswa;

    $jam = htmlentities(trim($_POST['jam']));
    $mulai = htmlentities(trim($_POST['mulai']));
    $akhir = htmlentities(trim($_POST['akhir']));

    if($conSiswa->query("INSERT INTO t_jam set jam='$jam', mulai='$mulai', akhir='$akhir'")){
        return true;
    }else{
        return false;
    }
}

function NamaGuru($namaGuru, $gender){
    global $conSiswa;

    $namaGuru = htmlentities(trim($_POST["nama"]));
    $gender = htmlentities(trim($_POST["jeniskelamin"]));

    $addGuru = "INSERT INTO t_guru SET nama='$namaGuru', jeniskelamin='$gender'";
    if($conSiswa->query($addGuru)){
        return true;
    }else{
        return false;
    }
}

function HapusGuru($namaGuru){
    global $conSiswa;

    $namaGuru = htmlentities(trim($_POST["nama"]));
    if($conSiswa->query("DELETE FROM t_guru WHERE nama='$namaGuru'")){
        return true;
    }else{
        return false;
    }
}

function EditJam($jam, $mulai, $akhir){
    global $conSiswa;

    $jam = htmlentities(trim($_POST['jam']));
    $mulai = htmlentities(trim($_POST['mulai']));
    $akhir = htmlentities(trim($_POST['akhir']));

    if($conSiswa->query("UPDATE t_jam set mulai='$mulai', akhir='$akhir' where jam='$jam'")){
        return true;
    }else{
        return false;
    }
}
?>