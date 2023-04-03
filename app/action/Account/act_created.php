<?php 
include "../../controller/Account.php";
include "../../database/Migrations/dbAccount.php";

if(isset($_POST["tambahAccount"])){

    $userEmail = htmlentities(trim($_POST["userEmail"]));
    $username = htmlentities(trim($_POST["username"]));
    $password = md5(trim($_POST["password"]), false);
    $birthday = htmlentities(trim($_POST["birthday"]));
    $gender = htmlentities(trim($_POST["gender"]));
    $member = htmlentities(trim($_POST["member"]));
    $checkbox = htmlentities(trim($_POST["selesai"]));

    if($checkbox){
        if(CreatedAccount($userEmail,$username,$password,$birthday,$gender,$member,$checkbox)){
            echo "By Developer IkoAlmasDevGame";
        }
        header("location:../../view/index.php?account=berhasil");
    }else{
        unset($_POST["selesai"]);
        header("location:../../view/index.php?account=gagal");
    }
}
?>