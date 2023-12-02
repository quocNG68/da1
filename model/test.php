<?php
function load_all_donhang_admin($start_record,$records_per_page)
{
    $sql = "SELECT
    donhang.*,
    chitiet_donhang.*,
    trangthai_donhang.*,
    chitiet_donhang.*,
    donhang.id as madonhang,
    chitiet_donhang.amount as amount_sp_hoadon,
    chitiet_donhang.price as price_sp_hoadon,
    sum(chitiet_donhang.amount *
    chitiet_donhang.price) as tongtien
     FROM duan1.donhang 
    inner join duan1.chitiet_donhang on donhang.id = chitiet_donhang.id_order
    inner join duan1.trangthai_donhang on donhang.trangthai = trangthai_donhang.id_trangthai
    inner join duan1.sanpham on chitiet_donhang.idpro = sanpham.id
    where donhang.trangthai in(1,2,3)
     group by donhang.iduser order by donhang.id desc";
     $search_sql = $sql . " LIMIT $start_record, $records_per_page";
     $total_records_sql = $sql; // No LIMIT for counting total records
     $load_all_donhang_admin = pdo_query($sql);
     $total_records = count(pdo_query($total_records_sql));
     return ['data' => $load_all_donhang_admin, 'total_records' => $total_records];
    

}


function thongke_doanhmuc()
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
    $thongke_doanhmuc = pdo_query($sql);
    return $thongke_doanhmuc;
}