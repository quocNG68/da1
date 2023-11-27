<style>
    /* Style the hidden radio input */
    .hidden-radio {
        position: absolute;
        left: -9999em;
        /* Move the radio input off-screen */
    }

    /* Style the label as a toggle switch */
    .toggle-label {
        display: inline-block;
        width: 50px;
        /* Adjust the width as needed */
        height: 30px;
        /* Adjust the height as needed */
        background-color: #ccc;
        /* Background color when unchecked */
        position: relative;
        border-radius: 13px;
        cursor: pointer;
    }

    /* Style the label when the radio input is checked */
    .hidden-radio:checked+.toggle-label {
        background-color: #4CAF50;
        /* Background color when checked */
    }

    /* Style the inner circle of the toggle switch */
    .toggle-label::after {
        content: "";
        position: absolute;
        width: 24px;
        /* Adjust the width as needed */
        height: 24px;
        /* Adjust the height as needed */
        background-color: #fff;
        /* Color of the inner circle */
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        transition: 0.3s;
        /* Add a smooth transition effect */
    }

    /* Position the inner circle based on the radio input state */
    .hidden-radio:checked+.toggle-label::after {
        left: calc(100% - 28px);
        /* Move the inner circle to the right when checked */
    }
</style>
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
                <div class="form-group">
                    <label for="toggleRadio">Ẩn/Hiện</label>
                    <input name="trangthai" value="1" <?php echo $trangthai == 1  ? 'checked' : '' ?> type="checkbox" id="toggleRadio" class="hidden-radio" name="toggleVisibility">
                    <label for="toggleRadio" class="toggle-label" id="toggleLabel"></label>
                </div>

                <button type="submit" name="updatedm" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>