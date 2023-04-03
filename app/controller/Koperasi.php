<?php 
    function TambahBarang($kodebarang,$namabarang,$jenisbarang,$hargabarang,$jumlahbarang,$checkbox){
        global $conKoperasi;
        
        $kodebarang = htmlentities(trim($_POST["kode_barang"]));
        $namabarang = htmlentities(trim($_POST["nama_barang"]));
        $jenisbarang = htmlentities(trim($_POST["jenis"]));
        $hargabarang = htmlentities(trim($_POST["harga_barang"]));
        $jumlahbarang = htmlentities(trim($_POST["jumlah_barang"]));
        $checkbox = htmlentities(trim($_POST["selesai"]));

        if($checkbox){
            $tambah = "INSERT INTO t_databarang (id_barang, kode_barang, nama_barang, jenis, harga_barang, jumlah_barang, selesai) VALUES ('','$kodebarang','$namabarang','$jenisbarang','$hargabarang','$jumlahbarang','$checkbox')";
            if($conKoperasi->query($tambah)){
                $response = array();
                $response['t_databarang'] = array();
                array_push($response['t_databarang'], [
                    $kodebarang,
                    $namabarang,
                    $jenisbarang,
                    $hargabarang,
                    $jumlahbarang,
                    $checkbox
                ]);
            }
            return true;
        }else{
            return false;
        }
    }

    function Pembayaran($tgl,$kodebarang,$namabarang,$harga,$jumlahbeli,$checkbox){
        global $conKoperasi;

        $tgl = htmlentities(trim($_POST["tanggal"]));
        $kodebarang = htmlentities(trim($_POST["kode_barang"]));
        $namabarang = htmlentities(trim($_POST["nama_barang"]));
        $harga = htmlentities(trim($_POST["harga"]));
        $jumlahbeli = htmlentities(trim($_POST["jumlah_beli"]));
        $checkbox = htmlentities(trim($_POST["selesai"]));

        $databarang = mysqli_query($conKoperasi, "SELECT * FROM t_databarang WHERE nama_barang='$namabarang'");
        $db = mysqli_fetch_array($databarang);
        $sisa = $db['jumlah_barang'] - $jumlahbeli;
        $conKoperasi->query("UPDATE t_databarang SET jumlah_barang='$sisa' where nama_barang='$namabarang'");

        $laba = $harga * $jumlahbeli;
        $total_harga = $laba;

        if($checkbox){
            $bayar = "INSERT INTO t_pembelian (id_bayar, tanggal, kode_barang, nama_barang, harga, jumlah_beli, selesai, laba, total_harga) VALUES ('','$tgl','$kodebarang','$namabarang','$harga','$jumlahbeli','$checkbox','$laba','$total_harga')";
            if($conKoperasi->query($bayar)){
                $response = array();
                $response['t_pembelian'] = array();
                array_push($response['t_pembelian'], [
                    $tgl,
                    $kodebarang,
                    $namabarang,
                    $harga,
                    $jumlahbeli,
                    $checkbox
                ]);
            }
            return true;
        }else{
            return false;
        }
    }

    function EditBarang($kodebarang,$namabarang,$jenisbarang,$hargabarang,$jumlahbarang,$checkbox,$idbarang){
        global $conKoperasi;

        $kodebarang = htmlentities(trim($_POST["kode_barang"]));
        $namabarang = htmlentities(trim($_POST["nama_barang"]));
        $jenisbarang = htmlentities(trim($_POST["jenis"]));
        $hargabarang = htmlentities(trim($_POST["harga_barang"]));
        $jumlahbarang = htmlentities(trim($_POST["jumlah_barang"]));
        $checkbox = htmlentities(trim($_POST["selesai"]));        
        $idbarang = htmlentities(trim($_POST["id_barang"]));

        if($checkbox){
            $edit = "UPDATE t_databarang SET kode_barang='$kodebarang',nama_barang='$namabarang',jenis='$jenisbarang',harga_barang='$hargabarang',jumlah_barang='$jumlahbarang',selesai='$checkbox' where id_barang='$idbarang'";
            if($conKoperasi->query($edit)){
                $response = array();
                $response['t_databarang'] = array();
                array_push($response['t_databarang'], [
                    $idbarang,
                    $kodebarang,
                    $namabarang,
                    $jenisbarang,
                    $hargabarang,
                    $jumlahbarang,
                    $checkbox
                ]);
            }
            return true;
        }else{
            return false;
        }
    }

    function HapusBarang($idbarang){
        global $conKoperasi;
        $idbarang = htmlentities(trim($_POST["id_barang"]));
        $hapus = $conKoperasi->query("DELETE FROM t_databarang WHERE id_barang='$idbarang'");
        if($hapus){
            return true;
        }else{
            return false;
        }
    }
?>