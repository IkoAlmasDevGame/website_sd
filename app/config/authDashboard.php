<?php 

if(isset($_SESSION['status'])){
    if(isset($_SESSION['id_user'])){
        if(isset($_SESSION['username'])){
            if(isset($_SESSION['member'])){

            }
        }
    }
}else{
    header("location:../index.php");
}

?>