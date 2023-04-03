<?php 
include "../../controller/Account.php";
include "../../database/Migrations/dbAccount.php";

session_start();
if(isset($_POST["masuk"])){
    $userEmail = htmlentities(trim($_POST["userEmail"]));
    $password = md5(trim($_POST["password"]), false);
    $member = trim($_POST["member"]); // ketika mencari data untuk masuk kedalam halaman utama
    password_hash($password, PASSWORD_DEFAULT);
    password_verify($password, PASSWORD_DEFAULT);

    $onUpdated = date('y-m-d H:i:s a'); // Update untuk Logger Data Log In

    if($userEmail == "" || $password == ""){
        header("location:../../view/index.php?pesan=kosong");
        exit;
    }

    if(LoginAccount($userEmail,$password,$member)){
        $_SESSION["status"] = "Login Berhasil ...";
        mysqli_query($conAccount, "UPDATE t_account SET onUpdated='$onUpdated' where userEmail='$userEmail'");
        if($member == 1){
            $_SESSION["status"];
            header("location:../../view/dashboard/index.php");
            exit;
        }else if($member == 2){
            $_SESSION["status"];
            header("location:../../view/dashboard/index.php");
            exit;
        }else if($member == 3){
            $_SESSION["status"];
            header("location:../../view/dashboard/index.php");
            exit;
        }
    }else{
        header("location:../../view/index.php?pesan=gagal");
        exit;
    }
}
?>