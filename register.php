<!-- khoi tao session -->
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí thành viên</title>
</head>
<body>
    <h3>Đăng ký thành viên</h3>
    <p>
        <!-- in ra thong bao bang sesion -->
        <?php
            if (isset($_SESSION["thong_bao"])) {
                // hien thi thong bao
                echo $_SESSION["thong_bao"];
                // xoa thong bao
                session_unset();
            }
        ?>
    </p>
    <form action="register_submit.php" method="POST">
        <table>
            <tr>
                <td>Tên đăng nhập: </td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Mật khẩu: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu</td>
                <td><input type="password" name="re_password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">đăng ký</button>
                    <p>ban da co co tai khoan <a href="login.php">dang nhap</a></p>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>