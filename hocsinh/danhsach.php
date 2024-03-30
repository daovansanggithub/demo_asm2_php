<?php
    $sql = "SELECT * FROM students";
    $query = mysqli_query($connect, $sql);
?>

<div class="container my-5">
    <div class="card">
        <div class="text-center">
            <h2>Danh sách học sinh</h2>
        </div>
        <div class="body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên học sinh</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Điểm</th>
                        <th scope="col">Đánh giá</th>
                        <th scope="col">##</th>
                        <th scope="col">##</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <!-- lặp hiển thị id tên hc sinh ....-->
                                <td><?php echo $i++; ?></td> 
                                <td><?php echo $row['std_name']; ?></td>
                                <td>
                                    <img style="width: 100px;" src="img/<?php echo $row['image'];?>">
                                </td>
                                <td><?php echo $row['diem']; ?></td>
                                <td><?php echo $row['danhgia']; ?></td>
                                <td>
                                    <!-- link sang trang xửli -->
                                    <a href="index.php?page_layout=sua&id=<?php echo $row['std_id']; ?>">Sửa</a>
                                </td>
                                <td>
                                    <a onclick="return Del('<?php echo $row['std_name']; ?>')" href="index.php?page_layout=xoa&id=<?php echo $row['std_id']; ?>">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
        <a class="btn btn-primary" href="index.php?page_layout=them">Them moi</a>
    </div>
</div>

<!-- hiển thị thông báo xác nhận xóa -->
<script>
    function Del(name) {
        return confirm("bạn có chắc chắn muốn xóa học sinh này ra khỏi danh sách không?  "+ name + "?");
    }
</script>