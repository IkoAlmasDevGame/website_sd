<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah Dasar</title>
    <?php
        session_start();
        include "../../config/authDashboard.php";
        include "../../config/config.php";

        include "../../database/Migrations/dbAccount.php";
        include "../../database/Migrations/dbPerpustakaan.php";
        include "../../database/Migrations/dbKoperasi.php";
        include "../../database/Migrations/dbSiswa.php";

        include "../../js/dropdown.php";
        include "../../models/dataMember.php";

        if(isset($_GET['aksi'])){
            $aksi = $_GET['aksi'];
            if($aksi == "keluar"){
                if(isset($_SESSION['status'])){
                    unset($_SESSION['status']);
                    session_unset();
                    session_destroy();
                    $_SESSION = array();
                }
                header("location:../index.php");
                exit;
            }
        }
    ?>
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/all.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/glyphicon.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/font-awesome4.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/bootstrapv5221.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/text-bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>tailwindcss/dist/tailwind.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/card-bootstrap.css" type="text/css">
    <!-- Icon Sekolah Dasar -->
    <link rel="shortcut icon" href="<?=base()?>assets/icon/sd.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?=base()?>app/css/Dashboard/style.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>app/css/Dashboard/dropdown.css" type="text/css">
</head>
    <body>
        <div id="layoutAuthentication" class="mx-auto">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="navbar navbar-default fixed-top">
                        <header>
                        <div class="navbar-container" id="navbar-container">
                            <div class="navbar-header">
                                <img src="<?=base()?>assets/image/sd.png" class="img-responsive navbar-brand mt-6"><a href='../dashboard/index.php' class="navbar-brand mt-6">Sekolah Dasar</h5>
                                <button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                    <span class="sr-only">Toggle Navigation</span>
                                    <span class="icon-bar"></span>
				    	            <span class="icon-bar"></span>
				    	            <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse -mt-6 mr-40">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown"><a class="dropdown-toggle" data-bs-toggle="dropdown" role="button"> 
                                        &nbsp&nbsp<span class="glyphicon glyphicon-user mx-auto -mr-2" id="dropbtn" onclick="myFunction()"></span></a>
                                        <div id="myDropdown" class="dropdown-content">
                                            <?php 
                                            if($_SESSION['member'] == 1){
                                                ?>                                            
                                                <a role="button">Hi, <?php echo $_SESSION["username"]; ?></a>
                                                <a href="../dashboard/logger.php"><span class="fa fa-file mr-5"></span>Logger</a>
                                                <a href="../dashboard/edit.php?id_user=<?php echo $_SESSION["id_user"];?>"><span class="fa fa-user mr-5"></span>Account</a>
                                                <a href="header.php?aksi=keluar"><i class="fa fa-sign-out mr-4"></i>Log out</a>
                                                <?php
                                            }else if($_SESSION['member'] == 2){
                                                ?>
                                                <a role="button">Hi, <?php echo $_SESSION["username"]; ?></a>
                                                <a href="../dashboard/edit.php?id_user=<?php echo $_SESSION["id_user"];?>"><span class="fa fa-user mr-5"></span>Account</a>
                                                <a href="header.php?aksi=keluar"><i class="fa fa-sign-out mr-4"></i>Log out</a>
                                                <?php
                                            }else if($_SESSION['member'] == 3){
                                                ?>
                                                <a role="button">Hi, <?php echo $_SESSION["username"]; ?></a>
                                                <a href="../dashboard/edit.php?id_user=<?php echo $_SESSION["id_user"];?>"><span class="fa fa-user mr-5"></span>Account</a>
                                                <a href="header.php?aksi=keluar"><i class="fa fa-sign-out mr-4"></i>Log out</a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </header>
                            <div class="fix-col-md fixed-bottom" id="box-border">
                            <div class="row">
                                <div class="col-xs-12 mt-1 ml-10 h-100%">
                                        <a class="img-thumbnail rounded-full mt-6">
                                            <img src="<?=base()?>assets/image/images.jfif" class="img-responsive rounded-full"/>
                                        </a>
                                        <p class="text-medium mx-auto mb-5 ml-5 fw-semibold" style="letter-spacing: 3px;">
                                        <?php echo data($_SESSION["member"]);?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row"></div>
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active text-medium" id="smalls"><a href="../dashboard/index.php" class="mb-6 text-small-3 text-start">
                                            <span class="fa fa-home mr-5"></span> Dashboard Sekolah</a></li>
                                    <?php 
                                    if($_SESSION['member'] == 1){
                                    ?>
                                    <li class="dropdown-k text-small-3 active" id="smalls">
                                        <a class="text-small-3 text-start mb-7" id="dropbtn-k" onclick="myFunction_Koperasi()"><span class="fa fa-shopping-cart mr-4"></span> 
                                        Koperasi Sekolah</a>
                                        <div id="myDropdowns" class="dropdown-content" style="font-size: 12px;">
                                            <a href="../koperasi/index.php" class="text-small-3">Dashboard Koperasi</a>
                                            <a href="../koperasi/databarang.php" class="text-small-3">Data Barang Koperasi</a>
                                            <a href="../koperasi/penjualan.php" class="text-small-3">Penjualan Barang Koperasi</a>
                                            <a href="../koperasi/bukti.php">Bukti Penjualan Koperasi</a>
                                        </div>
                                    </li>
                                    <li class="dropdown-p text-small-3 active" id="smalls">
                                    <a class="text-small-3 text-start mb-7" id="dropbtn-p" onclick="myFunction_Perpus()"><span class="fa fa-book mr-4"></span> 
                                        Perpustakaan Sekolah</a>
                                        <div id="myDropdownp" class="dropdown-content">
                                            <a href="../perpustakaan/index.php">Dashboard Perpustakaan</a>
                                            <a href="../perpustakaan/buku.php">Data Buku Perpustakaan</a>
                                            <a href="../perpustakaan/peminjaman.php">Peminjaman Buku</a>
                                            <a href="../perpustakaan/history.php">History Peminjaman Buku</a>
                                        </div>
                                    </li>
                                    <li class="dropdown-g text-small-3 active" id="smalls">
                                        <a role="button" class="text-small-3 text-start mb-7" id="dropbtn-g" onclick="myFunction_Data()"><span class="fa fa-file  mr-5"></span>
                                        Data Sekolah</a>
                                        <div id="myDropdowng" class="dropdown-content">
                                            <a href="../dashboard/full_mapel.php"><span class="fa fa-book"></span> Mata Pelajaran</a>
                                            <a href="../dashboard/guru.php"><span class="fa fa-folder-open"></span> Data Sekolah</a>
                                            <a href="../dashboard/#"><span class="fa fa-file"></span> Data Struktur Sekolah</a>
                                        </div>
                                    </li>
                                    <li class="text-small-3 active" id="smalls"><a href="../dashboard/daftarmurid.php" class="mb-7 text-small-3 text-start">
                                        <span class="fa fa-user  mr-5"></span> Daftar Murid Baru</a></li>
                                    <li class="text-small-3 active" id="smalls"><a href="../dashboard/absensi.php" class="mb-7 text-small-3 text-start">
                                        <span class="fa fa-user  mr-5"></span>  Absensi Murid</a></li>
                                    <?php    
                                    }else if($_SESSION['member'] == 2){
                                    ?>
                                    <li class="dropdown-k text-small-3 active" id="smalls">
                                        <a class="text-small-3 text-start mb-7" id="dropbtn-k" onclick="myFunction_Koperasi()"><span class="fa fa-shopping-cart mr-4"></span> 
                                        Koperasi Sekolah </a>
                                        <div id="myDropdowns" class="dropdown-content" style="font-size: 12px;">
                                            <a href="../koperasi/index.php" class="text-small-3">Dashboard Koperasi</a>
                                            <a href="../koperasi/penjualan.php" class="text-small-3">Penjualan Barang Koperasi</a>
                                        </div>
                                    </li>
                                    <li class="dropdown-p text-small-3 active" id="smalls">
                                    <a class="text-small-3 text-start mb-7" id="dropbtn-p" onclick="myFunction_Perpus()"><span class="fa fa-book mr-4"></span> 
                                        Perpustakaan Sekolah</a>
                                        <div id="myDropdownp" class="dropdown-content">
                                            <a href="../perpustakaan/index.php">Dashboard Perpustakaan</a>
                                            <a href="../perpustakaan/peminjaman.php">Peminjaman Buku</a>
                                        </div>
                                    </li>
                                    <li class="dropdown-g text-small-3 active" id="smalls">
                                        <a role="button" class="text-small-3 text-start mb-7" id="dropbtn-g" onclick="myFunction_Data()"><span class="fa fa-file  mr-5"></span>
                                        Data Sekolah</a>
                                        <div id="myDropdowng" class="dropdown-content">
                                        <a href="../dashboard/full_mapel.php"><span class="fa fa-book"></span> Mata Pelajaran</a>
                                            <a href="../dashboard/guru.php"><span class="fa fa-folder-open"></span> Data Sekolah</a>
                                            <a href="../dashboard/#"><span class="fa fa-file"></span> Data Struktur Sekolah</a>
                                        </div>
                                    </li>
                                    <li class="text-small-3 active" id="smalls"><a href="../dashboard/absensi.php" class="mb-7 text-small-3 text-start">
                                        <span class="fa fa-user  mr-5"></span>  Absensi Murid</a></li>
                                    <?php
                                    }else if($_SESSION['member'] == 3){
                                    ?>
                                    <li class="dropdown-k text-small-3 active" id="smalls">
                                        <a class="text-small-3 text-start mb-7" id="dropbtn-k" onclick="myFunction_Koperasi()"><span class="fa fa-shopping-cart mr-4"></span> 
                                        Koperasi Sekolah</a>
                                        <div id="myDropdowns" class="dropdown-content" style="font-size: 12px;">
                                            <a href="../koperasi/index.php" class="text-small-3">Dashboard Koperasi</a>
                                            <a href="../koperasi/penjualan.php" class="text-small-3">Penjualan Barang Koperasi</a>
                                        </div>
                                    </li>
                                    <li class="dropdown-p text-small-3 active" id="smalls">
                                    <a class="text-small-3 text-start mb-7" id="dropbtn-p" onclick="myFunction_Perpus()"><span class="fa fa-book mr-4"></span> 
                                        Perpustakaan Sekolah</a>
                                        <div id="myDropdownp" class="dropdown-content">
                                            <a href="../perpustakaan/index.php">Dashboard Perpustakaan</a>
                                            <a href="../perpustakaan/peminjaman.php">Peminjaman Buku</a>
                                        </div>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
            <script type="text/javascript" src="<?=base()?>bootstrap/js/bootstrap.min.js"></script>
        </div>
    <div class="col-md-10">