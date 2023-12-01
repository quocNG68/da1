
<?php
session_start();
include "../../model/binhluan.php";
include "../../model/pdo.php";
$idpro = isset($_REQUEST['idpro']) ? $_REQUEST['idpro'] : null;
$result_comment = load_comment($idpro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <h6>Bình luận</h6>
    <div class="product-details-comment">
        <div class="product-details-comment">
            <?php
            foreach($result_comment as $value){
                extract($value);
                ?>
 <div class="product-details-comment_item">
                <p class="username"><?= $tennguoidung ?></p>
                <p class="content_comment"><?= $noidung ?></p>
                <p><?= $ngaybinhluan ?></p>
                
            </div>

                <?php
            }

            ?>
           
        </div>
        <?php
        if(isset($_SESSION['success_login'])){

            ?>

<div class="form-send_comment">
    <form onsubmit="return check_comment()" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <textarea style="width:100%" name="noidung" id="content_comment" cols="30" rows="10" placeholder="Nội dung bình luận ..."></textarea>
        <br>
        <span id="err_comment"></span>
        <input type="hidden" name="idpro" value="<?= $idpro ?>">
        <input type="hidden" name="date">
        <button name="btn_comment">Gửi bình luận</button>
    </form>
</div>

<?php
$iduser = $_SESSION['success_login'] ?? 0;
// $user_infor = select_user_by_id($iduser);
if(isset($_POST['btn_comment'])){
    $noidung = $_POST['noidung'];
    $idpro = $_POST['idpro'];
    
    $date = date("Y-m-d H:i:s");
    add_binhluan($noidung,$iduser,$idpro,$date);
    // echo '<script>window.location = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
    header("location:".$_SERVER['HTTP_REFERER']."");

}

?>
            <?php
        }else{
            echo '<p style="color:red;font-weight:450;font-size:17px;font-family:Roboto,sans-serif">Vui lòng đăng nhập tài khoản để bình luận</p>';
        }

        ?>
    </div>
</body>
</html>

<script>
    function check_comment(){
        var content_comment = document.getElementById('content_comment');
        var err_comment = document.getElementById('err_comment');
var count = 0;
if(content_comment.value == ""){
    err_comment.textContent = 'Vui lòng nhập bình luận';
    err_comment.style.color = 'red';
    count++;
}else{
    err_comment.textContent = '';
}
if(count>0){
        
        return false;
    }else{
        return true;
    }
    
    }
</script>