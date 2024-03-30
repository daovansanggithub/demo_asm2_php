<?php
    // tao ra session de bat loi va hien thi loi 
    session_start();

    include 'config.php';
    if (isset($_POST['submit']) && $_POST['username'] !='' && $_POST['password'] !='' && $_POST['re_password'] !='') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
        $level = 0;

        if($password != $re_password) {
            // sesion thong bao
            $_SESSION["thong_bao"] = "ko khop pass";
            header("location:register.php");
            die(); // sau do khong thuc hien cai gi nua
        }
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $old = mysqli_query($conn, $sql);
        $password = md5($password);
        if(mysqli_num_rows($old) > 0) {
            $_SESSION["thong_bao"] = "User name da ton tai";
            header( "location:register.php");
            die(); // sau do khong thuc hien cai gi nua
        }

        $sql = "INSERT INTO user (username,password,level) VALUES ('$username', '$password','$level')";
        mysqli_query($conn, $sql);
        $_SESSION["thong_bao"] = "da dang ki thanh cong";
        header('location:login.php');
    } else {
        // bat loi bang sesion'
        $_SESSION["thong_bao"] = "vui long nhap day du thong tin";
        header( "location:register.php");
    }
?>