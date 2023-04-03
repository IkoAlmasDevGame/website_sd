<?php 
function data($member){
    if($member == 1){
        echo "Administrasi";
    }else if($member == 2){
        echo "Anggota";
    }else if($member == 3){
        echo "Siswa / Siswi";
    }
}

function gender($gender){
    if($gender == 1){
        echo "Laki - Laki";
    }else{
        echo "Perempuan";
    }
}
?>