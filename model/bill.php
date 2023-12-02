<?php
function load_bill_after_buy($id_hoadon)
{
    $sql = "SELECT
    chitiet_donhang.*,
    donhang.*,
    sanpham.*,
    user.*,
    sum(chitiet_donhang.amount *
    chitiet_donhang.price) as tongtien
     FROM duan1.donhang
    inner JOIN duan1.chitiet_donhang on donhang.id = chitiet_donhang.id_order
    inner JOIN duan1.sanpham on chitiet_donhang.idpro = sanpham.id
    inner JOIN duan1.user on user.id = donhang.iduser where donhang.id = $id_hoadon";
    $load_bill_after_buy = pdo_query_one($sql);
    return $load_bill_after_buy;
}

function load_bill_detail($id_hoadon)
{
    $sql = "SELECT 
    sanpham.*,
    chitiet_donhang.*,
    chitiet_donhang.price as price_detail,
    chitiet_donhang.amount as amount_detail
    
     FROM duan1.chitiet_donhang
    inner join duan1.sanpham on chitiet_donhang.idpro = sanpham.id
    where id_order = $id_hoadon";
    $load_bill_detail = pdo_query($sql);
    return $load_bill_detail;
}
