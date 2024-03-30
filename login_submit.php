<?php
    // nguoi dung dang nhap nhap thanh cong thif tao ra 1 sesion , co sesion thi moi vao trang index duoc
    session_start();

    include 'config.php';
    if (isset($_POST['submit']) && $_POST['username'] !='' && $_POST['password'] !='') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";

        $user = mysqli_query($conn, $sql);
        if(mysqli_num_rows($user) >0) {
            // khi nguoi dung dang nhap thanh cong thi tao ra 1 sesion
            $_SESSION["user"] = $username;
            header("location: index.php");
        } else {
            $_SESSION["thong_bao"] = "ban da dang nhap sai username hoac password";
            header("location: login.php");
        }
    } else {
        //tao sessiom thong bao khi nguoi dung chua nhap gi
        $_SESSION["thong_bao"] = "vui long nhap day du thong tin";
        header( "location:login.php");
    }
?>