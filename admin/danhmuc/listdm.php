<div class="main-panel">
    <div class="content-wrapper">

        <div class="container">
            <h4>Danh sách danh mục</h4>
            <table class="table table table-bordered" border="1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tên danh mục chính</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($load_all_danhmuc as $value) :
                        extract($value);



                    ?>
                        <tr>
                            <td><?= $id ?> </td>
                            <td><?=  $name ?></td>
                            <td><img width=120px src="../upload/<?= $img ?>" alt=""></td>
                            <td><?php echo $trangthai ? 'Hiển thị' : 'Ẩn'  ?></td>
                            <td>
                                <a class="btn btn-primary" href="index.php?act=editdm&id=<?= $id ?>">Sửa</a>
                                <a onclick="return xoa()" class="btn btn-danger" href="index.php?act=deletedm&id=<?= $id ?>">Xóa</a>
                            </td>
                        </tr>


                    <?php endforeach; ?>


                </tbody>

            </table>
            <a href="index.php?act=adddm" class="btn btn-success">Thêm danh mục</a>
        </div>
    </div>
    <script>
        function xoa() {

            return confirm('Bạn chắc chắc muốn xóa không');
        }
    </script>