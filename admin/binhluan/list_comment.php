<div class="main-panel">
    <div class="content-wrapper">
<div class="container">
    <h2>Danh sách bình luận </h2>
    <table class="table">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên người dùng</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Nội dung</th>
                <th>Ngày bình luận</th>
                <th>Thao tác</th>


            </tr>
        </thead>
        <tbody>
             <?php
             if(isset($load_all_comment)){
                foreach($load_all_comment as $value){
                    extract($value);
                    ?>
                        <tr>
                            <td><?= $masanpham?></td>
                            <td><?= $username ?></td>
                            <td><?= $name ?></td>
                            <td><img style="width:90px;height: 90px;" src="../upload/<?= $img ?>" alt=""></td>
                            <td><?= $noidung ?></td>
                            <td><?= $ngaybinhluan ?></td>
                            <td><a class="btn btn-danger" href="index.php?act=delete_comment&id=<?= $mabinhluan?>">Xóa</a></td>
                        </tr>
                    <?php
                }
             }

             ?>

        </tbody>
    </table>
</div>
</div>