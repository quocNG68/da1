<?php
// danh sách tình trạng sản phẩm
function load_all_tinhtrang(){
    $sql = "SELECT * FROM duan1.tinhtrang";
    $load_all_tinhtrang = pdo_query($sql);
    return $load_all_tinhtrang;
}
// hiển thị tên tình trạng trong list sản phẩm
function load_all_name_tinhtrang(){
    $sql = "SELECT 
    tinhtrang.tinhtrang
     FROM duan1.sanpham inner join duan1.tinhtrang on sanpham.id_tinhtrang = tinhtrang.id";
     $load_all_name_tinhtrang = pdo_query_one($sql);
     return $load_all_name_tinhtrang;
}
function load_tinhtrang_in_list(){
    $sql = "SELECT 
    tinhtrang.id as matinhtrang,
    tinhtrang.tinhtrang as tentinhtrang
     FROM duan1.tinhtrang";
     $load_tinhtrang_in_list = pdo_query($sql);
     return $load_tinhtrang_in_list;
}
// xóa tình trạng
function delete_tinhtrang($id){
    $sql = "DELETE FROM duan1.tinhtrang where id = $id";
    pdo_execute($sql);
}
// thêm tình trạng
function addtt($tinhtrang){
    $sql = "INSERT INTO duan1.tinhtrang(tinhtrang) values('$tinhtrang')";
    pdo_execute($sql);
}
// load 1 tình trạng
function load_one_tinhtrang($id){
    $sql = "SELECT * FROM duan1.tinhtrang where id = '$id'";
    $load_one_tt = pdo_query_one($sql);
    return $load_one_tt;
}
// cập nhật tình trạng
function update_tinhtrang($id,$namett){
    $sql = "UPDATE duan1.tinhtrang SET tinhtrang = '$namett' WHERE id = $id";
    pdo_execute($sql);
}
?>