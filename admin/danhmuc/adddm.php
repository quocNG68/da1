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
                <div class="form-group">
                    <label for="toggleRadio">Ẩn/Hiện</label>
                    <input name="trangthai" value="1" type="checkbox" id="toggleRadio" class="hidden-radio" name="toggleVisibility" checked>
                    <label for="toggleRadio" class="toggle-label" id="toggleLabel"></label>
                </div>

                <button type="submit" name="adddm" class="btn btn-success">Thêm danh mục chính</button>
                <a class="btn btn-primary" href="index.php?act=listdm">Danh sách</a>
            </form>
        </div>
    </div>

