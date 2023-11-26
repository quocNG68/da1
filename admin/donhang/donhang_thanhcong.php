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
                <h2>Đơn hàng thành công</h2>
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

                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $tongtien = 0;

                        if (isset($load_all_donhang_thanhcong)) {
                            foreach ($load_all_donhang_thanhcong as $key => $value) {
                                // $thanhtien = $value['amount_sp_hoadon'] * $value['price_sp_hoadon'];
                                // $tongtien = $tongtien+$thanhtien;


                        ?>
                                <tr>
                                    <td><?= ($key + 1) ?></td>
                                    <td><?= $value['madonhang'] ?></td>
                                    <td><?= $value['nguoinhan'] ?></td>
                                    <td><?= $value['diachi_nguoinhan'] ?></td>
                                    <td><?= $value['phone_nguoinhan'] ?></td>
                                    <td><?= $value['ngaymua'] ?></td>
                                    <td><?= $value['phuongthuc_thanhtoan'] ?></td>
                                    <td><?= $value['price_sp_hoadon'] ?></td>
                                    <td>
                                        <?= $value['tentrangthai'] ?>
                                    </td>
                                    <td>
                                        <a href="index.php?act=chitiet_donhang_thanhcong&id_order=<?= $value['id_order'] ?>"><i class="fa-solid fa-calendar-day"></i></a>
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