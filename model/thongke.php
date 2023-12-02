<?php
function thong_ke_product_bestseller(){
    $sql = "SELECT chitiet_donhang.*,sanpham.*,SUM(amount) as total_amount
    FROM `chitiet_donhang` inner JOIN sanpham on chitiet_donhang.idpro = sanpham.id
    WHERE 1 GROUP by idpro ORDER by total_amount desc";
    $thong_ke_product_bestseller = pdo_query($sql);
    return $thong_ke_product_bestseller;
}

function thongke_doanhthu(){
    $sql = "SELECT  donhang.*,chitiet_donhang.*,sum(chitiet_donhang.price * chitiet_donhang.amount) as tongdoanhthu FROM duan1.donhang
     inner join chitiet_donhang on donhang.id = chitiet_donhang.id_order
     where donhang.trangthai = 4
     ";
    $thongke_doanhthu = pdo_query($sql);
    return $thongke_doanhthu;
}
function thongke_danhmuc()
{
    $sql = "
    select
    danhmuc.id as madanhmuc,
    danhmuc.name as tendanhmuc,
    count(sanpham.id) as soluong_sp,
    max(sanpham.price) as maxprice,
    min(sanpham.price) as minprice,
    avg(sanpham.price) as avgprice
    from duan1.sanpham inner join duan1.danhmuc
    on sanpham.iddm = danhmuc.id
    group by danhmuc.id 
    order by danhmuc.id desc
    ";
    $thongke_danhmuc = pdo_query($sql);
    return $thongke_danhmuc;
}
function so_donhang_thanhcong(){
    $sql = "SELECT count(id)as so_donhang_thanhcong FROM duan1.donhang WHERE trangthai=4";
    $so_donhang_thanhcong = pdo_query($sql);
    return $so_donhang_thanhcong;
}
function thongke_so_nguoidung(){
    $sql = "SELECT count(id) as thongke_so_nguoidung FROM duan1.user";
    $thongke_so_nguoidung = pdo_query_one($sql);
    return $thongke_so_nguoidung;
}
function thong_ke_donhang_dadat(){
    $sql = "SELECT count(id) as thong_ke_donhang_dadat from duan1.donhang";
    $thong_ke_donhang_dadat = pdo_query_one($sql);
    return $thong_ke_donhang_dadat;
}