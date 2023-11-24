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
            <form onsubmit="return change_pass_user_view()" action="index.php?act=change_pass" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
            <div class="infor_user_full">
            <div class="infor_user_view">
                <div class="username">
                    <label for="">Mật khẩu cũ</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="password_old" id="password_old" placeholder="Nhập mật khẩu cũ ...">
                    <span style="color: red;" id="err_password_old"><?= $err_password_old ?? "" ?></span>
                    </div>
                </div>

                <input type="hidden" name="password">
                <div class="address">
                    <label for="">Mật khẩu mới</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="password_new" id="password_new" placeholder="Mật khẩu mới ...">
                    <span id="err_password_new"></span>
                    </div>
                </div>

            </div>
            <div class="infor_user_view">
                <div class="email">
                    <label for="">Xác nhận mật khẩu</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="password_repass" id="password_repass" placeholder="Xác nhận mật khẩu ...">
                    <span style="color: red;" id="err_password_repass"><?= $err_password_repass??"" ?></span>
                    </div>
                </div>
            </div>
            </div>
           
            <div class="infor_user_edittk">
            <button name="changepass_infor_user" class="btn btn-success">Xác nhận</button>
        </form>
        
            
        </div>
    </div>
    </div>
   
