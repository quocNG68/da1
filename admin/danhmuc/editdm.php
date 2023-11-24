<div class="main-panel">
    <div class="content-wrapper">
        <h4>Cập nhật danh mục</h4>
        <?php
        if (isset($load_one_dm)) {
            extract($load_one_dm);
        }
        ?>
        <div class="container">
            <form enctype="multipart/form-data" action="index.php?act=updatedm" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="old_image" value="<?= $img ?>"> <!-- Thêm trường ẩn để lưu tên tệp ảnh cũ -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Danh mục</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="namedm" placeholder="Nhập tên danh mục" value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <img width="120px" src="../upload/<?= $img ?>" alt="">
                    <div class="form-group">
                        <input type="file" name="image">
                        <span style="color: red;"><?= $_COOKIE['err_imagedm'] ?? '' ?></span>
                    </div>
                </div>

                <button type="submit" name="updatedm" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>