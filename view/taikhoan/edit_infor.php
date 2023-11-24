<style>
    /* .wrapper_user{
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 32px;
    } */
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
            <h4>Cập nhật tài khoản</h4>
            <form onsubmit="return update_taikhoan_view()" action="index.php?act=update_infor_user" method="post">
                <input type="hidden" name="id" value="<?= $user_infor['id'] ?>">
            <div class="infor_user_full">
            <div class="infor_user_view">
                <div class="username">
                    <label for="">Tên người dùng</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" value="<?= $user_infor['username']??"" ?>">
                    <span style="color: red;" id="err_username"></span>
                    </div>
                </div>

                <input type="hidden" name="password" value="<?= $user_infor['pass']??"" ?>">
                <div class="address">
                    <label for="">Địa chỉ</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="diachi" id="diachi" value="<?= $user_infor['address']??"" ?>">
                    <span id="err_diachi"></span>
                    </div>
                </div>

            </div>
            <div class="infor_user_view">
                <div class="email">
                    <label for="">Email</label>
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" value="<?= $user_infor['email']??"" ?>">
                    <span style="color: red;" id="err_email"><?= $_COOKIE['err_email']??"" ?></span>
                    </div>
                </div>
                <div class="phone">
                    <label>Số điện thoại</label>
                    <div class="form-group">
                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $user_infor['phone']??"" ?>">
                    <span style="color: red;" id="err_phone"><?= $_COOKIE['err_phone']??"" ?></span>
                    </div>
                </div>
                <input type="hidden" name="role" value="<?= $user_infor['role'] ?>">
            </div>
            </div>
           
            <div class="infor_user_edittk">
            <button name="update_infor_user" class="btn btn-success">Cập nhật</button>
        </form>
        
            
        </div>
    </div>
    </div>
