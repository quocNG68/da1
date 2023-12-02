<style>
</style>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Xin chào <?= $_SESSION['success_login_admin']['username'] ?? ""  ?></h3>
          <h6 class="font-weight-normal mb-0">Bạn khỏe không? Chúc bạn một ngày tốt lành</h6>
        </div>
        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-4">Tổng doanh thu</p>
              <?php
              foreach ($thongke_doanhthu as $value) {
                extract($value);
              ?>
                <p class="fs-30 mb-2"><?= number_format($tongdoanhthu, 3, '.', ',') ?>VNĐ</p>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div style="background-color: #7978E9;" class="card card-tale">
            <div class="card-body">
              <p class="mb-4">Đơn hàng thành công</p>
              <?php
              foreach ($so_donhang_thanhcong as $value) {
                extract($value);
              ?>
                <p class="fs-30 mb-2"><?= number_format($so_donhang_thanhcong, 0, '.', ',') ?></p>
              <?php
              }
              ?>
              <!-- <p>10.00% (30 days)</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div style="background: #F3797E;" class="card card-tale">
            <!-- <img style="width:70px;" src="../public/img/icon_khachhang.png" alt=""> -->
            <div class="card-body">
              <p class="mb-4">Người dùng</p>
              <?php
              ?>
              <p class="fs-30 mb-2"><?= number_format($thongke_so_nguoidung['thongke_so_nguoidung'], 0, '.', ',') ?></p>
              <?php
              ?>

              <!-- <p>10.00% (30 days)</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div style="background-color: #4747A1;" class="card card-tale">
            <!-- <img style="width:70px;" src="../public/img/icon_khachhang.png" alt=""> -->
            <div class="card-body">
              <p class="mb-4">Đơn hàng đã đặt</p>
              <?php
              ?>
              <p class="fs-30 mb-2"><?= number_format($thong_ke_donhang_dadat['thong_ke_donhang_dadat'], 0, '.', ',') ?></p>

              <?php

              ?>
              <!-- <p>10.00% (30 days)</p> -->
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card position-relative">
        <div class="card-body">
          <form action="index.php?act=home" method="post">
            <input type="date" name="date_start">
            <input type="date" name="date_end">
            <select name="type">
              <option value="date">Ngày</option>
              <option value="month">Tháng</option>
              <option value="year">Năm</option>
            </select>
            <button name="filter" class="btn btn-primary">Lọc</button>
          </form>
          <?php include "bieudo/bieudo_doanhthu_donhang.php"; ?>

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-0">Sản phẩm bán chạy</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Giá</th>
                  <th>Số lượng bán ra</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($thong_ke_product_bestseller as $value) {
                  extract($value);
                ?>
                  <tr>
                    <td><?= $name ?></td>
                    <td><img src="../upload/<?= $img ?>" alt=""></td>
                    <td class="font-weight-bold"><?= number_format($price - $price_saleoff, 3, '.', ',') . 'VNĐ' ?></td>
                    <td><?= $total_amount ?></td>
                  </tr>
                <?php
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">To Do Lists</h4>
          <div class="list-wrapper pt-2">
           <?php
           include "bieudo/bieudo_thongke_danhmuc.php";
           ?>
          </div>
          <div class="add-items d-flex mb-0 mt-2">
            <input type="text" class="form-control todo-list-input" placeholder="Add new task">
            <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card position-relative">
        <div class="card-body">
         
          <?php include "./bieudo/table_thongke_gia_danhmuc.php"; ?>

        </div>
      </div>
    </div>
  </div>