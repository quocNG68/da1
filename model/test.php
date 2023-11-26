<?php
function load_all_donhang_admin()
{
    $sql = "SELECT
    donhang.*,
    chitiet_donhang.*,
    trangthai_donhang.*,
    chitiet_donhang.*,
    donhang.id as madonhang,
    chitiet_donhang.amount as amount_sp_hoadon,
    chitiet_donhang.price as price_sp_hoadon

     FROM duan1.donhang 
    inner join duan1.chitiet_donhang on donhang.id = chitiet_donhang.id_order
    inner join duan1.trangthai_donhang on donhang.trangthai = trangthai_donhang.id_trangthai
    inner join duan1.sanpham on chitiet_donhang.idpro = sanpham.id
    where donhang.trangthai in(1,2,3)
     group by  donhang.id order by donhang.id desc";
    $load_all_donhang_admin = pdo_query($sql);
    return $load_all_donhang_admin;
}
