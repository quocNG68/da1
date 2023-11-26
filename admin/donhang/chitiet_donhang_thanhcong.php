<style>
    /* .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
  }

  .table-bordered {
    border: 1px solid #dee2e6;
  }

  .table thead th,
  .table tbody td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .btn {
    white-space: nowrap;
  } */
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="container">
                <h2>Danh sách đơn hàng</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        if (isset($load_chitiet_donhang_thanhcong)) {
                            foreach ($load_chitiet_donhang_thanhcong as $key => $value) {

                        ?>
                                <tr>
                                    <td><?= ($key + 1) ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><img style="width:100px;height:100px;" src="../upload/<?= $value['img'] ?>" alt=""></td>
                                    <td><?= $value['price'] - $value['price_saleoff'] ?></td>
                                    <td><?= $value['amount'] ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>



                    </tbody>
                </table>
            </div>
        </div>

    </div>