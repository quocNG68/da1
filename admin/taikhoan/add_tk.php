
<div class="main-panel">
    <div class="content-wrapper">
<div class="container">
        <h3>Thêm tài khoản</h3>
<form onsubmit=" return add_edit_taikhoan()" action="index.php?act=add_tk" method="post">
  <div class="form-group">
    <label for="email">Tên người dùng</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập ...">
    <span id="err_username" style="color: red;"><?= $err_username ?? "" ?></span>
  </div>
  <div class="form-group">
    <label for="email">Mật khẩu</label>
    <input type="text" class="form-control" id="password" name="password" placeholder="Mật khẩu ...">
    <span style="color: red;" id="err_password"></span>
  </div>
  <div class="form-group">
    <label for="pwd">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email">
    <span style="color: red;" id="err_email"><?= $err_email ?? '' ?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Địa chỉ</label>
    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ">
    <span id="err_diachi"></span>
  </div>
  <div class="form-group">
    <label for="pwd">Số điện thoại</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
    <span style="color: red;" id="err_phone"><?= $err_phone ?? '' ?></span>
  </div>
  <div class="form-group">
      <label for="pwd">Vai trò</label>
      <input type="text" class="form-control" id="role" name="role" placeholder="vai trò ...">
    </div>
    <button name="add_tk" class="btn btn-success">Thêm tài khoản</button>
</form>
</div>
</div>

