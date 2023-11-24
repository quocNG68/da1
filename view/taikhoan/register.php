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
      align-items: center;
    }
    .form-group-submit_wide a.login{
      color: #505050;
      font-weight: bold;
      display: block;
      padding: 5px;
    }
    .form-group-submit_wide a.text{
color: rgba(0,0,0,.26);
    }
    .form-group-submit_wide a.login:hover{
      color: black;
    }
</style>
<div class="container">
    <div class="wrapper-login">
        <h3>Đăng kí</h3>
<form onsubmit="return send_user()" action="index.php?act=register" method="post">
  <div class="form-group">
    <label for="email">Tên đăng nhập</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập ...">


    <span id="err_username" style="color: red;"><?= $err_username ?? "" ?></span>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Tên đăng nhập ...">
    
    <span style="color: red;" id="err_email"><?= $err_email??""?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Mật khẩu</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu ...">
    <span id="err_password"></span>
  </div>
  <div class="form-group-submit">
    <div class="form-group-submit_btn">
  <button name="register" class="btn btn-success">Đăng kí</button>
  </div>
  <div class="form-group-submit_wide">
  <a class="text">Bạn đã có tài khoản ?</a>
  <a class="login" href="index.php?act=login">Đăng nhập</a>
  </div>
  </div>
  
</form>
</div>
</div>
<script>
  
</script>
