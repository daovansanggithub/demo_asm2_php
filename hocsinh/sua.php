<?php
    $id = $_GET['id'];

    $sql_up = "SELECT * FROM students WHERE std_id = $id";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    // Kiểm tra nếu form đã được gửi đi
    if (isset($_POST['sbm'])) {
        // Lấy dữ liệu từ form
        $std_name = $_POST['std_name'];

        if($_FILES['image']['name'] == '') {
            $image = $row_up['image'];
        }else {
            $image = $row_up['image'];
        }

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $diem = $_POST['diem'];
        $danhgia = $_POST['danhgia'];

        // Khai báo và thiết lập kết nối cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vidu";
        $connect = mysqli_connect($servername, $username, $password, $dbname);

        // Kiểm tra kết nối cơ sở dữ liệu
        if (!$connect) {
            die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
        }

        // thưc thi câu lệnh update
        $sql = "UPDATE students SET std_name = '$std_name', image = '$image', diem = '$diem', danhgia = '$danhgia' WHERE std_id = $id";
        $query = mysqli_query($connect, $sql);
        // Chuyển hướng trang sau khi thêm học sinh thành công
        header("location: index.php?page_layout=danhsach");
        exit(); // Kết thúc script
    }
?>

<!-- Phần HTML -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sửa thông tin học sinh</h5>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="dataInput">Tên học sinh</label>
                            <input type="text" name="std_name" class="form-control" placeholder="Nhập tên" required value="<?php echo $row_up['std_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="dataInput">Ảnh học sinh</label> <br>
                            <input type="file" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="dataInput">Điểm</label>
                            <input type="number" name="diem" class="form-control" placeholder="Nhập điểm" required value="<?php echo $row_up['diem']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="dataInput">Đánh giá</label>
                            <input type="text" name="danhgia" class="form-control" placeholder="Đánh giá" required value="<?php echo $row_up['danhgia']; ?>">
                        </div>
                        <button name="sbm" type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>