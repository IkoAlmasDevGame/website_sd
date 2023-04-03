<?php 
    function Rupiah($harga_barang){
        echo "Rp. ".number_format($harga_barang, 2, ".", ",");
    }

    function JenisBarang($jenis){
        if($jenis == 1){
            echo "Alat Tulis";
        }else if($jenis == 2){
            echo "Buku";
        }else if($jenis == 3){
            echo "Makanan";
        }else if($jenis == 4){
            echo "Minuman";
        }
    }
?>