<style>
</style>
<?php
// if (isset($load_one_trangthai)) {
//     print_r($load_one_trangthai);
//     exit;
// }

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="container">
                <h2>Cập nhật trạng thái đơn hàng</h2>
                <form action="index.php?act=update_trangthai_donhang" method="post">
                    <input type="hidden" name="id_order" value="<?= $load_one_trangthai['id'] ?? ""?>">
                    <div class="form-group">
                        <label for="email">Trạng thái</label>
                        <select class="form-control" name="id_trangthai_donhang">
                            <?php
                         
                                foreach ($load_all_trangthai_donhang as $value) {
                                    extract($value);
                            ?>
                                    <?php
                                    if ($id_trangthai == $load_one_trangthai['trangthai']) {
                                    ?>
                                        <option value="<?= $id_trangthai ?>" selected><?= $tentrangthai ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?= $id_trangthai ?>"><?= $tentrangthai ?></option>

                            <?php
                                    }
                                }
                       
                            ?>

                        </select>
                    </div>
                    <button name="update_trangthai_donhang" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>