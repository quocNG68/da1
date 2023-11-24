
<?php
if(isset($load_one_tk) && is_array($load_one_tk)){
    extract($load_one_tk);
  
}
?>
<div class="main-panel">
    <div class="content-wrapper">
<div class="container">
        <h3>Cập nhật tài khoản</h3>
<form onsubmit=" return add_edit_taikhoan()" action="index.php?act=update_tk" method="post">
<input type="text" name="id" value="<?= $id ?>">
  <div class="form-group">
    <label for="email">Tên người dùng</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập ..." value="<?= $username ?>">
    <span id="err_username" style="color: red;"><?= $_COOKIE['err_username'] ?? "" ?></span>
  </div>
  <div class="form-group">
    <label for="email">Mật khẩu</label>
    <input type="text" class="form-control" id="password" name="password" placeholder="Mật khẩu ..." value="<?= $pass ?>">
    <span style="color: red;" id="err_password"></span>
  </div>
  <div class="form-group">
    <label for="pwd">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email" value="<?= $email ?>">
    <span style="color: red;" id="err_email"><?= $_COOKIE['err_email'] ?? '' ?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Địa chỉ</label>
    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ" value="<?= $address ?>">
    <span id="err_diachi"></span>
  </div>
  <div class="form-group">
    <label for="pwd">Số điện thoại</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="<?= $phone ?>">
    <span style="color: red;" id="err_phone"><?= $_COOKIE['err_phone'] ?? '' ?></span>
  </div>
  <div class="form-group">
      <label for="pwd">Vai trò</label>
      <input type="text" class="form-control" id="role" name="role" placeholder="vai trò ..." value="<?= $role ?>">
    </div>
    <button name="update_tk" class="btn btn-success">Cập nhật tài khoản</button>
</form>
</div>
</div>