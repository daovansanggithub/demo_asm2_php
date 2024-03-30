<!-- khai bao su dung sesion de hien thi thong bao -->
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dang nhap </title>
</head>
<body>
    <h3>Dang nhap</h3>
    <p>
        <?php
            if (isset($_SESSION["thong_bao"])) {
                echo $_SESSION["thong_bao"];
                session_unset();
            }
        ?>
    </p>
    <form action="login_submit.php" method="post">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></td>
            </tr>

            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Login</button>
                    <p>ban chua co tai khoan <a href="register.php">dang ky</a></p>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>