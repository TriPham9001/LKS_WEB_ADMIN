<?php
    session_start();
    include 'config.php';
    if(isset($_POST["submit"])  &&  $_POST["username"] != '' && $_POST["password"] != '' ){
        $taiKhoan = $_POST["username"];
        $matKhau = $_POST["password"];
        $sql = "SELECT * FROM tblnhanvien WHERE taiKhoan='$taiKhoan' AND matKhau='$matKhau'";
        $user = mysqli_query($conn,$sql);
        if(mysqli_num_rows($user)>0){
            header("location: ./doc/index.php ");
        }else{
            header ("location: wrong.php");
        }
    }else{
        header("location: login.php");
    }
