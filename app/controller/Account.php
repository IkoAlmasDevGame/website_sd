<?php 

function CreatedAccount($userEmail,$username,$password,$birthday,$gender,$member,$checkbox){
    global $conAccount;

    $userEmail = htmlentities(trim($_POST["userEmail"]));
    $username = htmlentities(trim($_POST["username"]));
    $password = md5(trim($_POST["password"]), false);
    $birthday = htmlentities(trim($_POST["birthday"]));
    $gender = htmlentities(trim($_POST["gender"]));
    $member = htmlentities(trim($_POST["member"]));
    $checkbox = htmlentities(trim($_POST["selesai"]));

    $onCreated = date('y-m-d H:i:s a');
    $onUpdated = date('y-m-d H:i:s a');

    if($checkbox){
        $data = "INSERT INTO t_account (id_user,userEmail,username,password,birthday,gender,member,selesai,onCreated,onUpdated) VALUES ('','$userEmail','$username','$password','$birthday','$gender','$member','$checkbox','$onCreated','$onUpdated')";
        if(mysqli_query($conAccount, $data)){
            return true;
        }
        return true;
    }else{
        return true;
    }
}

function LoginAccount($userEmail,$password,$member){
    global $conAccount;

    $userEmail = htmlentities(trim($_POST["userEmail"]));
    $password = md5(trim($_POST["password"]), false);
    $member = trim($_POST["member"]); // ketika mencari data untuk masuk kedalam halaman utama
    password_hash($password, PASSWORD_DEFAULT);
    password_verify($password, PASSWORD_DEFAULT);

    $cekdata = mysqli_query($conAccount, "SELECT * FROM t_account where userEmail='$userEmail' and password='$password' and member like '$member'");

    if($cekdata->num_rows > 0){
        $response = array();
        $response['t_account'] = array();
        if($row = $cekdata->fetch_assoc()){
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['member'] = $row['member'];
            array_push($response['t_account'], $row);
        }
        return true;
    }else{
        return false;
    }
}

function EditAccount($userEmail,$username,$password,$birthday,$gender,$checkbox,$id_user){
    global $conAccount;

    $userEmail = htmlentities(trim($_POST["userEmail"]));
    $username = htmlentities(trim($_POST["username"]));
    $password = md5(trim($_POST["password"]), false);
    $birthday = htmlentities(trim($_POST["birthday"]));
    $gender = htmlentities(trim($_POST["gender"]));
    $checkbox = htmlentities(trim($_POST["selesai"]));
    $id_user = htmlentities(trim($_POST["id_user"]));

    if($checkbox){
        $data = "UPDATE t_account SET userEmail='$userEmail', username='$username', password='$password', birthday='$birthday', gender='$gender', selesai='$checkbox' where id_user='$id_user'";
        if(mysqli_query($conAccount, $data)){
            return true;
        }
        return true;
    }else{
        return true;
    }
}
?>