<style>
    .infor_user {
        border: 1px solid #ccc;
        margin-bottom: 16px;
        border-radius: 3px;
        
    }
    .infor_user h4{
        display: flex;
        padding: 5px;
        background-color: #7fad39;
        color: white;
        justify-content: center;
    }

    .infor_user_full{
        padding: 16px;
    }
    .infor_user_edittk{
        text-align: center;
    }
    .infor_user_edittk button{
        padding: 7px 16px;
        color: white;
        background-color: #7fad39;
        margin-bottom: 16px;
    }
    .infor_user_edittk a:hover{
        color: white;
        background-color: #51a01d;
    }
</style>

<div class="container">
    <div class="wrapper_user">
        <div class="infor_user">
            <h4>Đổi mật khẩu</h4>
            <form  action="index.php?act=quenMatKhau" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
            <div class="infor_user_full">
            <div class="infor_user_view">
                <div class="username">
                    <label for="">Nhập email</label>
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" id="forgot_password" placeholder="Nhập email ...">
                    <!-- <span style="color: red;" id="err_password_old"></span> -->
                    </div>
                    <?php
                    ?>
                    <span style="color: green;"><?= isset($successMail) ? $successMail : "" ?></span>
                    <span style="color: red;"><?= isset($err_Mail) ? $err_Mail : "" ?></span>
                </div>

               
                

            </div>
         
            </div>
           
            <div class="infor_user_edittk">
            <button name="btn_forgot_password" class="btn btn-success">Xác nhận</button>
        </form>
        
            
        </div>
    </div>
    </div>
   
