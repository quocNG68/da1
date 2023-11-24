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
        display: flex;
        justify-content: center;
        gap: 20%;
        padding: 12px 0 0 0;
    }
    .infor_user_edittk{
        text-align: center;
    }
    .infor_user_edittk a.btn-edit{
        padding: 7px 16px;
        color: white;
        background-color: #7fad39;
        margin-bottom: 16px;
    }
    .infor_user_edittk a.btn-change_pass{
        margin-bottom: 16px;
        padding: 7px 16px;
        color: white;
        background-color: #7fad39;
 
    }
    .infor_user_edittk a:hover{
        color: white;
        background-color: #51a01d;
    }
</style>
<?php
// if(isset($_SESSION['success_login'])){
//     extract($_SESSION['success_login']);
// }
?>
<div class="container">
    <div class="wrapper_user">
        <div class="infor_user">
            <h4>Thông tin tài khoản</h4>
            <div class="infor_user_full">
            <div class="infor_user_view">
                <div class="username">
                    <label for="">Tên người dùng</label>
                    <p><?= $user_infor['username']??"" ?></p>
                </div>
                
                <div class="address">
                    <label for="">Địa chỉ</label>
                    <p class="address__p">
                            <?= $user_infor['address']??"" ?>
                    </p>
                </div>

            </div>
            <div class="infor_user_view">
                <div class="email">
                    <label for="">Email</label>
                    <p><?= $user_infor['email']??"" ?></p>
                </div>
                <div class="phone">
                    <label>Số điện thoại</label>
                    <p><?= $user_infor['phone']??"" ?></p>
                </div>
            </div>
            </div>
            <div class="infor_user_edittk">
            <a href="index.php?act=edit_infor_user&id=<?= $id ?>" class="btn btn-edit">Sửa</a>
            <a href="index.php?act=change_pass&id=<?= $id ?>" class="btn btn-change_pass">Đổi mật khẩu</a>
            </div>
            
        </div>
    </div>
    </div>