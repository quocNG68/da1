<div class="main-panel">
    <div class="content-wrapper">
<div class="container">
    <h2>Danh sách bình luận</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>


            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($list_product_comment)) {
                foreach ($list_product_comment as $value) {
                    extract($value);
            ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $name ?></td>
                        <td><img style="width:90px;height:90px;" src="../upload/<?= $img ?>" alt=""></td>
                        <td><a class="btn btn-primary" href="index.php?act=list_comment&idpro=<?= $idpro ?>">Xem</a></td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>
</div>