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
          <?php include "bieudo/bieudo.php"; ?>



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
            <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
              <li>
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Meeting with Urban Team
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Duplicate a project for new customer
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Project meeting with CEO
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Follow up of team zilla
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Level up for Antony
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
            </ul>
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
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-0">Projects</p>
          <div class="table-responsive">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th class="pl-0  pb-2 border-bottom">Places</th>
                  <th class="border-bottom pb-2">Orders</th>
                  <th class="border-bottom pb-2">Users</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="pl-0">Kentucky</td>
                  <td>
                    <p class="mb-0"><span class="font-weight-bold mr-2">65</span>(2.15%)</p>
                  </td>
                  <td class="text-muted">65</td>
                </tr>
                <tr>
                  <td class="pl-0">Ohio</td>
                  <td>
                    <p class="mb-0"><span class="font-weight-bold mr-2">54</span>(3.25%)</p>
                  </td>
                  <td class="text-muted">51</td>
                </tr>
                <tr>
                  <td class="pl-0">Nevada</td>
                  <td>
                    <p class="mb-0"><span class="font-weight-bold mr-2">22</span>(2.22%)</p>
                  </td>
                  <td class="text-muted">32</td>
                </tr>
                <tr>
                  <td class="pl-0">North Carolina</td>
                  <td>
                    <p class="mb-0"><span class="font-weight-bold mr-2">46</span>(3.27%)</p>
                  </td>
                  <td class="text-muted">15</td>
                </tr>
                <tr>
                  <td class="pl-0">Montana</td>
                  <td>
                    <p class="mb-0"><span class="font-weight-bold mr-2">17</span>(1.25%)</p>
                  </td>
                  <td class="text-muted">25</td>
                </tr>
                <tr>
                  <td class="pl-0">Nevada</td>
                  <td>
                    <p class="mb-0"><span class="font-weight-bold mr-2">52</span>(3.11%)</p>
                  </td>
                  <td class="text-muted">71</td>
                </tr>
                <tr>
                  <td class="pl-0 pb-0">Louisiana</td>
                  <td class="pb-0">
                    <p class="mb-0"><span class="font-weight-bold mr-2">25</span>(1.32%)</p>
                  </td>
                  <td class="pb-0">14</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Charts</p>
              <div class="charts-data">
                <div class="mt-3">
                  <p class="mb-0">Data 1</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="progress progress-md flex-grow-1 mr-4">
                      <div class="progress-bar bg-inf0" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">5k</p>
                  </div>
                </div>
                <div class="mt-3">
                  <p class="mb-0">Data 2</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="progress progress-md flex-grow-1 mr-4">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">1k</p>
                  </div>
                </div>
                <div class="mt-3">
                  <p class="mb-0">Data 3</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="progress progress-md flex-grow-1 mr-4">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">992</p>
                  </div>
                </div>
                <div class="mt-3">
                  <p class="mb-0">Data 4</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="progress progress-md flex-grow-1 mr-4">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">687</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
          <div class="card data-icon-card-primary">
            <div class="card-body">
              <p class="card-title text-white">Number of Meetings</p>
              <div class="row">
                <div class="col-8 text-white">
                  <h3>34040</h3>
                  <p class="text-white font-weight-500 mb-0">The total number of sessions within the date range.It is calculated as the sum . </p>
                </div>
                <div class="col-4 background-icon">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Notifications</p>
          <ul class="icon-data-list">
            <li>
              <div class="d-flex">
                <img src="../public/admin_view/images/faces/face1.jpg" alt="user">
                <div>
                  <p class="text-info mb-1">Isabella Becker</p>
                  <p class="mb-0">Sales dashboard have been created</p>
                  <small>9:30 am</small>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex">
                <img src="../public/admin_view/images/faces/face2.jpg" alt="user">
                <div>
                  <p class="text-info mb-1">Adam Warren</p>
                  <p class="mb-0">You have done a great job #TW111</p>
                  <small>10:30 am</small>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex">
                <img src="../public/admin_view/images/faces/face3.jpg" alt="user">
                <div>
                  <p class="text-info mb-1">Leonard Thornton</p>
                  <p class="mb-0">Sales dashboard have been created</p>
                  <small>11:30 am</small>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex">
                <img src="../public/admin_view/images/faces/face4.jpg" alt="user">
                <div>
                  <p class="text-info mb-1">George Morrison</p>
                  <p class="mb-0">Sales dashboard have been created</p>
                  <small>8:50 am</small>
                </div>
              </div>
            </li>
            <li>
              <div class="d-flex">
                <img src="../public/admin_view/images/faces/face5.jpg" alt="user">
                <div>
                  <p class="text-info mb-1">Ryan Cortez</p>
                  <p class="mb-0">Herbs are fun and easy to grow.</p>
                  <small>9:00 am</small>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>