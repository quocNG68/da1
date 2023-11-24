<style>
    
    .wrapper-login {

        border: 1px solid #d7d7d7;
        margin-bottom: 12px;

        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    form{
        padding: 10px;
    }
    .wrapper-login h3{
    display: flex;
    color: white;
    font-weight: 550;
    padding: 3px;
    text-transform: uppercase;
    justify-content: center;
    align-items: center;
    background: #58911b;
    border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .wrapper-login button{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form-group-submit_btn{
      display: flex;
      justify-content: center;
    }
    .form-group-submit_wide{
      display: flex;
      justify-content: center;
    }
    .form-group-submit_wide a{
      color: #505050;
      font-weight: bold;
      display: block;
      padding: 5px;
    }
    .form-group-submit_wide a:hover{
      color: black;
    }
</style>
<div class="container">
    <div class="wrapper-login">
        <h3>Đăng nhập</h3>
<form onsubmit="return check_login()" action="index.php?act=login" method="post">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email_login" name="email" placeholder="Email ...">
    <span id="err_email_login" style="color: red;"><?= $err_email ?? "" ?></span>
  </div>
  <div class="form-group">
    <label for="email">Mật khẩu</label>
    <input type="text" class="form-control" id="password_login" name="password" placeholder="Nhập mật khẩu ...">
    <span id="err_password_login" style="color: red;"><?= $err_password ?? "" ?></span>
  </div>
  <div class="form-group-submit">
    <div class="form-group-submit_btn">
  <button type="submit" name="login" class="btn btn-success">Đăng nhập</button>
  </div>
  <div class="form-group-submit_wide">
  <a href="index.php?act=register">Đăng kí tài khoản</a>
  <a href="index.php?act=quenMatKhau">quên mật khẩu ?</a>
  </div>
  </div>
  
</form>
</div>
</div>