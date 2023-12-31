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
<script src="https://kit.fontawesome.com/ca9a6c5a17.js" crossorigin="anonymous"></script>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="container">
                <h2>Danh sách đơn hàng</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Mã đơn hàng</th>
                            <th>khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt hàng</th>
                            <th>Thanh toán</th>
                            <th>Tổng cộng</th>
                            <th>Tình trạng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        if (isset($load_all_donhang_admin)) {
                            foreach ($load_all_donhang_admin as $key => $value) {
                                // $thanhtien = $value['amount_sp_hoadon'] * $value['price_sp_hoadon'];
                                // $tongtien +=$thanhtien;

                        ?>
                                <tr>
                                    <td><?= ($key + 1) ?></td>
                                    <td><?= $value['madonhang'] ?></td>
                                    <td><?= $value['nguoinhan'] ?></td>
                                    <td><?= $value['diachi_nguoinhan'] ?></td>
                                    <td><?= $value['phone_nguoinhan'] ?></td>
                                    <td><?= $value['ngaymua'] ?></td>
                                    <td><?= $value['phuongthuc_thanhtoan'] ?></td>


                                    <td><?= number_format($value['tongtien'], 0, ',', '.') ?>.000vnd</td>
                                    <td>
                                        <?= $value['tentrangthai'] ?>
                                    </td>
                                    <td>
                                        <a href="index.php?act=edit_trangthai_donhang&id_order=<?= $value['madonhang'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="index.php?act=chitiet_donhang&id_order=<?= $value['id_order'] ?>"><i class="fa-solid fa-calendar-day"></i></a>
                                    </td>

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