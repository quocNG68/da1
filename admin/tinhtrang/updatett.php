<div class="main-panel">
    <div class="content-wrapper">
        <?php
        if (isset($load_one_tt) && is_array($load_one_tt)) {
            extract($load_one_tt);
        }
        ?>
        <h4>Cập nhật tình trạng</h4>
        <div class="container">
            <form action="index.php?act=updatett" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">

                <div class="form-group">
                    <label for="exampleInputEmail1">Tình trạng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="namett" placeholder="Nhập tình trạng ..." value="<?= $tinhtrang ?>">

                </div>

                <button type="submit" name="updatett" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>