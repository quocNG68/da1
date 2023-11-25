<?php
function insert_hoadon($iduser,$ma_don_hang,$nguoinhan,$phone_nguoinhan,$diachi_nguoinhan,$phuongthuc_thanhtoan,$id_trangthai = 1){
    $sql = "INSERT INTO duan1.donhang(iduser,ma_don_hang,nguoinhan,phone_nguoinhan,diachi_nguoinhan,phuongthuc_thanhtoan,trangthai) 
    values
    ('$iduser','$ma_don_hang','$nguoinhan','$phone_nguoinhan','$diachi_nguoinhan','$phuongthuc_thanhtoan','$id_trangthai = 1')";
    return pdo_execute_returnLastInsertId($sql);
}

function insert_chitiet_donhang($id_hoadon,$id_pro,$amount,$price){
    $sql = "INSERT INTO duan1.chitiet_donhang(id_order,idpro,amount,price) values('$id_hoadon','$id_pro','$amount','$price')";
    pdo_execute($sql);
    // return pdo_execute_returnLastInsertId($sql);
}


function generateOrderCode() {
    $prefix = 'ORD'; // (tùy chọn) Đặt một tiền tố cho mã đơn hàng
    $unique_part = uniqid(); // Tạo một phần duy nhất dựa trên timestamp và số ngẫu nhiên

    $order_code = $prefix . $unique_part;
    return $order_code;
}
?>