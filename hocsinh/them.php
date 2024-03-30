<?php
    // Kiểm tra nếu form đã được gửi đi
    if (isset($_POST['sbm'])) {
        // Lấy dữ liệu từ form
        $std_name = $_POST['std_name'];
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

        // Xử lý truy vấn INSERT
        $sql = "INSERT INTO students (std_name, image, diem, danhgia) 
        VALUES ('$std_name', '$image', '$diem', '$danhgia')";
        $query = mysqli_query($connect, $sql);

        // Di chuyển tệp tạm lên thư mục lưu trữ ảnh
        move_uploaded_file($image_tmp, 'img/'.$image);

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
                    <h5 class="card-title">Thêm học sinh</h5>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="dataInput">Tên học sinh</label>
                            <input type="text" name="std_name" class="form-control" placeholder="Nhập tên" required>
                        </div>
                        <div class="form-group">
                            <label for="dataInput">Ảnh học sinh</label> <br>
                            <input type="file" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="dataInput">Điểm</label>
                            <input type="number" name="diem" class="form-control" placeholder="Nhập điểm" required>
                        </div>
                        <div class="form-group">
                            <label for="dataInput">Đánh giá</label>
                            <input type="text" name="danhgia" class="form-control" placeholder="Đánh giá" required>
                        </div>
                        <button name="sbm" type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>