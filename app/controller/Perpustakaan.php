<?php 
function TambahBuku($kodebuku,$judulbuku,$genrebuku,$namapenulis,$tahunterbit,$namapenerbit,$jumlahbuku,$abstact,$checkbox){
    global $conPerpustakaan;

    $kodebuku = htmlentities(trim($_POST["kode_buku"]));
    $judulbuku = htmlentities(trim($_POST["judul_buku"]));
    $genrebuku = htmlentities(trim($_POST["genre_buku"]));
    $namapenulis = htmlentities(trim($_POST["nama_penulis"]));
    $tahunterbit = htmlentities(trim($_POST["tahun_terbit"]));
    $namapenerbit = htmlentities(trim($_POST["nama_penerbit"]));
    $jumlahbuku = htmlentities(trim($_POST["jumlah_buku"])); // stock buku yang tersedia
    $abstract = htmlentities(trim($_POST["abstract"]));
    $checkbox  = htmlentities(trim($_POST["selesai"]));

    if($checkbox){
        $response = array();
        $response['t_databuku'] = array();
        $tambah = "INSERT INTO t_databuku (id_buku, kode_buku, judul_buku, genre_buku, nama_penulis, tahun_terbit, nama_penerbit, jumlah_buku, abstract, selesai) VALUES ('','$kodebuku','$judulbuku','$genrebuku','$namapenulis','$tahunterbit','$namapenerbit','$jumlahbuku', '$abstact','$checkbox')";
        if(mysqli_query($conPerpustakaan,$tambah)){
            array_push(
                $response['t_databuku'],
                [
                    $kodebuku,
                    $judulbuku,
                    $genrebuku,
                    $namapenulis,
                    $tahunterbit,
                    $namapenerbit,
                    $jumlahbuku,
                    $abstact => $_POST['abstract'],
                    $checkbox
                ]);
        }
        return true;
    }else{
        return false;
    }
}

function EditBuku($kodebuku,$judulbuku,$genrebuku,$namapenulis,$tahunterbit,$namapenerbit,$jumlahbuku,$checkbox,$abstract,$id_buku){
    global $conPerpustakaan;

    $kodebuku = htmlentities(trim($_POST["kode_buku"]));
    $judulbuku = htmlentities(trim($_POST["judul_buku"]));
    $genrebuku = htmlentities(trim($_POST["genre_buku"]));
    $namapenulis = htmlentities(trim($_POST["nama_penulis"]));
    $tahunterbit = htmlentities(trim($_POST["tahun_terbit"]));
    $namapenerbit = htmlentities(trim($_POST["nama_penerbit"]));
    $jumlahbuku = htmlentities(trim($_POST["jumlah_buku"])); // stock buku yang tersedia
    $abstract = htmlentities(trim($_POST["abstract"]));
    $checkbox  = htmlentities(trim($_POST["selesai"]));
    $id_buku = htmlentities(trim($_POST["id_buku"]));

    if($checkbox){
        $response = array();
        $response['t_databuku'] = array();
        $edit = "UPDATE t_databuku SET kode_buku='$kodebuku', judul_buku='$judulbuku', genre_buku='$genrebuku', nama_penulis='$namapenulis', tahun_terbit='$tahunterbit', nama_penerbit='$namapenerbit', jumlah_buku='$jumlahbuku', abstract='$abstract', selesai='$checkbox' where id_buku='$id_buku'";
        if(mysqli_query($conPerpustakaan,$edit)){
            array_push(
                $response['t_databuku'],
                [
                    $kodebuku,
                    $judulbuku,
                    $genrebuku,
                    $namapenulis,
                    $tahunterbit,
                    $namapenerbit,
                    $jumlahbuku,
                    $abstract => $_POST['abstract'],
                    $checkbox,
                    $id_buku
                ]);
        }
        return true;
    }else{
        return false;
    }
}

function PeminjamanBuku($nama, $id_buku, $kodebuku, $namabuku, $onPeminjaman, $onPengembalian, $checkInput){
    global $conPerpustakaan;

    $nama = htmlentities(trim($_POST["nama"]));
    $id_buku = htmlentities(trim($_POST["id_buku"]));
    $kodebuku = htmlentities(trim($_POST["kode_buku"]));
    $namabuku = htmlentities(trim($_POST["nama_buku"]));
    $onPeminjaman = htmlentities(trim($_POST["onPeminjaman"]));
    $onPengembalian = htmlentities(trim($_POST["onPengembalian"]));
    $checkInput = htmlentities(trim($_POST["selesai"]));

    if($checkInput){
        $peminjam = "INSERT INTO t_peminjaman (id_peminjaman, nama, id_buku, kode_buku, nama_buku, onPeminjaman, onPengembalian, selesai) VALUES ('','$nama','$id_buku','$kodebuku','$namabuku','$onPeminjaman','$onPengembalian','$checkInput')";
        $response = array();
        $response['t_peminjaman'] = array();
        if(mysqli_query($conPerpustakaan, $peminjam)){
            array_push(
                $response['t_peminjaman'],
                $nama,
                $id_buku,
                $kodebuku,
                $namabuku,
                $onPeminjaman,
                $onPengembalian,
                $checkInput
            );
        }
        return true;
    }else{
        return false;
    }
}

?>