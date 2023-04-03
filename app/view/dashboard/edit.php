<?php 
include "../dashboard/header.php";
global $conAccount;
?>

<div class="flex justify-center items-center mt-28">
    <div class="card" style="width: 70rem; margin-left: 35rem;">
        <div class="card-header">
            <?php 
                $id_user = $_GET["id_user"];
                $result = $conAccount->query("SELECT * FROM t_account WHERE id_user='$id_user'");
                while($x = $result->fetch_array()){
            ?>
            <h5 onclick="if(confirm('Apakah anda ingin keluar ? ')){location.href='index.php'}else{location.href='edit.php?id_user=<?=$x['id_user']?>'}" class="close" style="cursor:pointer;">x</h5>
            <h5 class="card-title" onclick="location.href='edit.php?id_user=<?$x['id_user']?>'" style="cursor: pointer;">EDIT PROFILE</h5>
        </div>
        <div class="card-body">
            <form action="<?=base()?>app/action/Account/act_edit.php" method="post">
                <div class="table table-responsive">
                    <div class="flex justify-end items-start">
                        <div class="img-thumbnail">
                            <img src="<?=base()?>assets/image/images.jfif" alt="profile" class="img-responsive">
                            <div class="mt-0"><?=$x['username']?></div>
                        </div>
                    </div>
                    <div class="mt-1">
                        <input type="text" name="id_user" class="form-control input" value="<?=$_SESSION['id_user']?>" hidden>
                        <label class="fw-lighter text-medium">User Email : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fas fa-envelope"></span></div>
                            <input type="email" name="userEmail" class="form-control input" value="<?=$x['userEmail'];?>">
                        </div>
                    </div>
                    <div class="mt-1">
                        <label class="fw-lighter text-medium">User Name : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fas fa-user"></span></div>
                            <input type="text" name="username" class="form-control input" value="<?=$_SESSION['username'];?>">
                        </div>
                    </div>
                    <div class="mt-1">
                        <label class="fw-lighter text-medium">Password : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fas fa-lock" onclick="clickShow()"></span></div>
                            <input type="password" name="password" id="pass" class="form-control input" value="">
                        </div>
                    </div>
                    <div class="mt-1">
                        <label class="fw-lighter text-medium">Date Birhday : </label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fas fa-calendar"></span></div>
                            <input type="date" name="birthday" class="form-control date" value="<?=$x['birthday'];?>">                        
                        </div>
                    </div>
                    <div class="mt-1">
                        <label class="fw-lighter text-medium">Jenis Kelamin : </label>
                        <div class="input-group">
                            <select name="gender" class="form-control select">
                                <?php 
                                    $resultx = $conAccount->query("SELECT * FROM t_jeniskelamin order by jeniskelamin desc");
                                    while($j = $resultx->fetch_array()){
                                        ?>
                                        <option <?php if($j['jeniskelamin'] == $x['gender']){?> selected="" <?php }?>><?=$j['jeniskelamin'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer mt-1">
                        <input type="checkbox" name="selesai" value="yes"> Tandai Jika sudah selesai
                        <div class="modal-footer">
                            <button class="btn btn-primary" name="simpanEdit" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php 
                }
            ?>
        </div>
    </div>
</div>

<?php 
include "../dashboard/footer.php";
?>