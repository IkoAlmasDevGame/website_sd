<?php 
include "../../database/Migrations/dbAccount.php";
include "../../controller/Account.php";

if(isset($_POST["simpanEdit"])){
    $userEmail = htmlentities(trim($_POST["userEmail"]));
    $username = htmlentities(trim($_POST["username"]));
    $password = md5(trim($_POST["password"]), false);
    $birthday = htmlentities(trim($_POST["birthday"]));
    $gender = htmlentities(trim($_POST["gender"]));
    $checkbox = htmlentities(trim($_POST["selesai"]));
    $id_user = htmlentities(trim($_POST["id_user"]));    

    if($checkbox){
        if(EditAccount($userEmail,$username,$password,$birthday,$gender,$checkbox,$id_user)){}
        ?>
        <script type="text/javascript">
            window.location.href='../../view/dashboard/index.php';
        </script>
        <?php
    }else{
        unset($_POST["selesai"]);
        header("location:../../view/dashboard/edit.php?id_user=$id_user");
    }
}
?>