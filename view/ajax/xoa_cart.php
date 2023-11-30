<?php
include "../../model/cart.php";
include "../../model/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ ajax đẩy lên
    $productId = $_POST['id'];
    $productUser = $_POST['iduser'];
    // $load_all_cart = load_all_cart($productUser);

    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
    // $index = array_search($productId, array_column($load_all_cart, 'id'));

    if (delete_cart($productId)) {        
        $load_all_cart1 = load_all_cart($productUser);
        echo 'Xóa sản phẩm thành công';
    } else {
        error_log('Lỗi khi xóa sản phẩm');
        echo 'Lỗi khi xóa sản phẩm';
    }
} else {
    echo 'Sản phẩm không tồn tại trong giỏ hàng';
}


