<!-- neu dang nhap thanh cong thi tao ra 1 session va neu sesion nay ton tai thi moi cho vao admin neu ko co thi ko cho vao trang nay -->
<!-- khai bao su dung sesion -->
<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("location: login.php");
    }
?>

<!-- ket noi database : goi den file config-->
<?php
    require_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link boostrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin php</title>
</head>
<body>
    <?php
        if ( isset ($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
                case 'danhsach':
                    require_once 'hocsinh/danhsach.php';
                    break;
                case 'them':
                    require_once 'hocsinh/them.php';
                    break;
                case 'sua':
                    require_once 'hocsinh/sua.php';
                    break;
                case 'xoa':
                    require_once 'hocsinh/xoa.php';
                    break;
                default:
                    require_once 'hocsinh/danhsach.php';
                    break;

            }
        }else {
            require_once 'hocsinh/danhsach.php';
        }
    ?>
</body>
</html>