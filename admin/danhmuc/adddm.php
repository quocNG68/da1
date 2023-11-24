<div class="main-panel">
    <div class="content-wrapper">
        <h4>Danh mục chính</h4>
        <div class="container">
            <form enctype="multipart/form-data" action="index.php?act=adddm" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="namedm" placeholder="Nhập tên danh mục">
                    <?php
                    if (isset($err_namedm)) {
                        echo '<span style="color: red;">' . $err_namedm . '</span>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Hình ảnh</label>
                    <input type="file" class="form-control" name="image_danhmuc">
                    <?php
                    if (isset($err_imagedm)) {
                        echo '<span style="color: red;">' . $err_imagedm . '</span>';
                    }
                    ?>
                </div>

                <button type="submit" name="adddm" class="btn btn-success">Thêm danh mục chính</button>
                <a class="btn btn-primary" href="index.php?act=listdm">Danh sách</a>
            </form>
        </div>
    </div>