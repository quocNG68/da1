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
        <h2>Danh sách tài khoản</h2>
        <table class="table ">
          <a href="index.php?act=add_tk" class="btn btn-success">Thêm người dùng</a>
          <thead>
            <tr>
              <th>Mã khách hàng</th>
              <th>Tên người dùng</th>
              <th>Mật khẩu</th>
              <th>Email</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Vai trò</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($load_all_taikhoan) {
              foreach ($load_all_taikhoan as $key => $value) {
                extract($value);
            ?>
                <tr>
                  <td><?= $id ?></td>
                  <td><?= $username ?></td>
                  <td><?= $pass ?></td>
                  <td><?= $email ?></td>
                  <td><?= $address ?></td>
                  <td><?= $phone ?></td>
                  <td><?= $role ?></td>
                  <td><a class="btn btn-danger" href="index.php?act=delete_tk&id=<?= $id ?>">Xóa</a>
                    <a onclick="return xoa()" class="btn btn-primary" href="index.php?act=edit_tk&id=<?= $id ?>">Sửa</a>
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
  <script>
    function xoa() {

      return confirm('Bạn chắc chắc muốn xóa không');
    }
  </script>