<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah Dasar</title>
    <?php 
        require "../config/config.php";
    ?>
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/all.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/glyphicon.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/font-awesome4.min.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/bootstrapv5221.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/card-bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>bootstrap/css/text-bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?=base()?>tailwindcss/dist/tailwind.css" type="text/css">

    <!-- Icon Sekolah Dasar -->
    <link rel="shortcut icon" href="<?=base()?>assets/image/sd.png" type="image/x-icon">
    <link rel="stylesheet" href="<?=base()?>app/css/Home/style.css" type="text/css">
</head>
<body class="overflow-y-hidden">
    <div class="mx-auto">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="navbar navbar-default fixed-top">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <img src="<?=base()?>assets/image/sd.png" alt="" class="navbar-brand mr-4 ">
                                <a href="./index.php" class="navbar-brand">Sekolah Dasar</a>
                                <div class="container-fluid">
                                    <form action="<?=base()?>app/action/Account/act_login.php" method="post" class="mt-0 flex justify-start items-center" style="margin-left:72rem;">
                                        <label for="inputEmail" class="fw-normal text-small-3 mt-4">Email</label>
                                        <div class="ml-5 mr-3" style="font-size: 3rem;">|</div>
                                        <input type="email" name="userEmail" id="inputEmail" class="form-control input text-small-3" placeholder="">
                                        <div class="ml-5 mr-3" style="font-size: 3rem;">|</div>
                                        <label for="inputPassword" class="fw-normal text-small-3 mt-4">Password</label>
                                        <div class="ml-5 mr-3" style="font-size: 3rem;">|</div>
                                        <input type="password" name="password" id="inputPassword" class="form-control input" placeholder="">
                                        <div class="ml-5 mr-3" style="font-size: 3rem;">|</div>
                                        <label class="fw-normal text-small-3 mt-4">Member Sekolah</label>
                                        <div class="ml-5 mr-3" style="font-size: 3rem;">|</div>
                                        <select name="member" class="form-control select">
                                            <option value="1">Khusus Adminisrasi</option>
                                            <option value="2">Khusus Anggota</option>
                                            <option value="3">Khusus Murid</option>
                                        </select>
                                        <input type="submit" value="Log In" class="btn btn-primary ml-5" name="masuk">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-start items-start ml-52 mt-48">
                        <div class="card" style="width: 50rem;">
                            <div class="card-header">
                                <div class="card-title">
                                    <h5 class="text-large text-center pt-4">Register Account</h5>
                                    <div class="container-fluid">
                                        <?php 
                                            if(isset($_GET["pesan"])){
                                                if($_GET["pesan"] == "kosong"){
                                                    ?>
                                                    <script type="text/javascript">
                                                        window.alert('form Login Tidak Boleh Kosong');
                                                    </script>
                                                    <?php
                                                }else if($_GET["pesan"] == "gagal"){
                                                    ?>
                                                    <script type="text/javascript">
                                                        window.alert('Data Tidak Ditemukan !!!');
                                                    </script>
                                                    <?php
                                                }
                                                ?>
                                                <script type="text/javascript">
                                                    window.setTimeout(() => {location.href='./index.php'}, 3500);
                                                </script>
                                                <?php
                                            }

                                            if(isset($_GET["account"])){
                                                if($_GET["account"] == "berhasil"){
                                                    ?>
                                                    <div class="text-center mt-5">
                                                        <h5 class="text-medium fw-normal" style="color: green;">Selamat Anda Sudah Membuat Akun Baru</h5>
                                                    </div>
                                                    <?php
                                                }else if($_GET["account"] == "gagal"){
                                                    ?>
                                                    <div class="text-center mt-5">
                                                        <h5 class="text-medium fw-normal" style="color: red;">Maaf Anda Gagal Membuat Akun Baru</h5>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <script type="text/javascript">
                                                    window.setTimeout(() => {location.href='./index.php'}, 3500);
                                                </script>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <div class="card-body">
                                    <form action="<?=base()?>app/action/Account/act_created.php" method="post">
                                        <div class="mt-1 col-md-offset-1">
                                            <label class="fw-normal">Email : </label>
                                            <div class="input-group col-md-9">
                                                <div class="input-group-addon"><span class="fas fa-envelope"></span></div>
                                                <input type="email" name="userEmail" class="form-control input" style="width: 45vh;" placeholder="">
                                            </div>
                                        </div>
                                        <div class="mt-1 col-md-offset-1">
                                            <label class="fw-normal">Username : </label>
                                            <div class="input-group col-md-9">
                                                <div class="input-group-addon"><span class="fas fa-user"></span></div>
                                                <input type="text" name="username" class="form-control input" style="width: 45vh;" placeholder="">
                                            </div>
                                        </div>
                                        <div class="mt-1 col-md-offset-1">
                                            <label class="fw-normal">Password : </label>
                                            <div class="input-group col-md-9">
                                                <div class="input-group-addon"><span class="fas fa-lock"></span></div>
                                                <input type="password" name="password" class="form-control input" style="width: 45vh;" placeholder="">
                                            </div>
                                        </div>                                        
                                        <div class="mt-1 col-md-offset-1">
                                            <label class="fw-normal">Date Of Birth : </label>
                                            <div class="input-group col-md-9">
                                                <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                                <input type="date" name="birthday" id="datepicker" class="form-control input" style="width: 45vh;" placeholder="">
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md-offset-1" >
                                            <label class="fw-normal">Gender : </label>
                                            <div class="input-group col-md-9" style="width: 49vh;" >
                                                <select name="gender" class="form-control select">
                                                    <option>Pilih Jenis Kelamin</option>
                                                    <option value="1">Laki-Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-2 col-md-offset-1">
                                            <label class="fw-normal">Choose Member : </label>
                                            <div class="input-group col-md-9" style="width: 49vh;">
                                                <select name="member" class="form-control select">
                                                    <option>Pilih Member Sekolah</option>
                                                    <option value="1">Khusus Administrasi</option> <!-- => ini untuk administrasi -->
                                                    <option value="2">Khusus Anggota</option> <!-- => ini untuk guru di sekolah -->
                                                    <option value="3">Khusus Murid</option> <!-- => ini untuk para siswa atau murdi di sekolah -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer mt-10">
                                            <div class="mt-6 col-md-offset-1">
                                                <input type="checkbox" name="selesai" value="yes"> Tandai Jika Sudah selesai
                                                <div class="modal-footer">
                                                    <button type="submit" name="tambahAccount" onclick="this.form.clear()" class="btn btn-primary"><span class="fa fa-save mr-2"></span> Daftar</button>
                                                    <div class="ml-5"></div>
                                                    <button type="button" onclick="this.form.reset()" class="btn btn-default">Reset All</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto mt-52">
                            <img src="<?=base()?>assets/svg/sd.svg" alt="" class="img-responsive">
                            <h5 class="text-medium text-center fw-lighter">SEKOLAH DASAR WEB</h5>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <div class="container-fluid fixed-bottom">
        <footer class="py-1 my-1">
            <ul class="nav flex justify-content-end border-bottom pb-1 mb-1">
                <li class="nav-item">
                    <a href="index.php" class="nav-link px-1">Home Sekolah</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-1"><i class="fa fa-instagram text-muted" style="font-size: 24px;"></i></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-1"><i class="fa fa-facebook text-muted" style="font-size: 24px;"></i></a>
                </li>
            </ul>
            <img src="<?=base()?>assets/svg/sd.svg" class="navbar-brand" style="margin-left: 0rem;"><p class="text-medium navbar-brand">2023 App Sekolah Dasar, School</p>
            <h5 style="margin-left: 108rem;" class="ml-72 mt-3 btn btn-warning" data-bs-target="#feedback" data-bs-toggle="modal">Contact Us</h5>
        </footer>
    </div>
    <div class="modal mt-16 ml-80" id="feedback" style="margin-left: 48rem;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body col-md-8 col-md-offset-1">
                    <form action="" method="post">
                        <div class="mt-2">
                            <label for="inputNameUser" class="fw-normal">User Name : </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span></div>
                                    <input type="text" name="username" id="inputNameUser" class="form-control input">
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="inputuserEmail" class="fw-normal">User Email : </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fas fa-envelope"></span></div>
                                    <input type="email" name="userEmail" id="inputuserEmail" class="form-control input">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="inputMessage" class="fw-normal">Pesan : </label>
                            <div class="mb-2"></div>
                            <textarea name="message" id="inputMessage" maxlength="500"
                            style="width: 38rem; height: 15rem; border: 1px solid;"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="" onclick="this.form.clear()">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?=base()?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>