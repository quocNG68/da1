<?php
// thêm danh mục chính
function adddm($namedm, $filename,$trangthai)
{
    $sql = "INSERT INTO duan1.danhmuc (name, img,trangthai) VALUES ('$namedm', '$filename',$trangthai)";
    pdo_execute($sql);
}
// load danh mục chính
function load_all_danhmuc()
{
    $sql = "SELECT * FROM duan1.danhmuc";
    $load_all_danhmuc = pdo_query($sql);
    return $load_all_danhmuc;
}
function load_all_danhmuc_view()
{
    $sql = "SELECT
    danhmuc.id as madanhmuc,
    danhmuc.img,
    danhmuc.name as tendanhmuc
     FROM duan1.danhmuc";
    $load_all_danhmuc_view = pdo_query($sql);
    return $load_all_danhmuc_view;
}
// hàm xóa danh mục
function deletedm($id){
    $sql = "DELETE FROM duan1.danhmuc WHERE id = '$id'";
    pdo_execute($sql);
}
// hàm load one danh mục chính
function load_one_dm($id){
    $sql = "SELECT * FROM duan1.danhmuc where id = '$id'";
    $load_one_dm = pdo_query_one($sql);
    return $load_one_dm;
}
function load_one_iddm($iddm){
    $sql = "SELECT * FROM duan1.danhmuc where id = '$iddm'";
    $load_one_iddm = pdo_query_one($sql);
    return $load_one_iddm;
}
// load name danh mục
function load_name_danhmuc(){
    $sql = "SELECT danhmuc.name as tendanhmuc
     FROM duan1.sanpham inner join duan1.danhmuc on sanpham.iddm = danhmuc.id";
     $load_name_danhmuc = pdo_query_one($sql);
     return $load_name_danhmuc;
}
// hàm update danh mục chính
function updatedm($id,$namedm,$filename,$trangthai){
    $sql = "UPDATE duan1.danhmuc SET name = '$namedm',img = '$filename', trangthai = $trangthai WHERE id = '$id'";
    pdo_execute($sql);
}

function load_danhmuc_chinh_in_list(){
    $sql = "SELECT
    danhmuc.id as madanhmucchinh,
    danhmuc.name as tendanhmucchinh
   FROM duan1.danhmuc";
   $load_danhmuc_chinh_in_list = pdo_query($sql);
   return $load_danhmuc_chinh_in_list;
}

