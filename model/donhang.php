<?php
function insert_hoadon($iduser, $ma_don_hang, $nguoinhan, $phone_nguoinhan, $diachi_nguoinhan, $phuongthuc_thanhtoan, $id_trangthai = 1)
{
    $sql = "INSERT INTO duan1.donhang(iduser,ma_don_hang,nguoinhan,phone_nguoinhan,diachi_nguoinhan,phuongthuc_thanhtoan,trangthai) 
    values
    ('$iduser','$ma_don_hang','$nguoinhan','$phone_nguoinhan','$diachi_nguoinhan','$phuongthuc_thanhtoan','$id_trangthai = 1')";
    return pdo_execute_returnLastInsertId($sql);
}

function insert_chitiet_donhang($id_hoadon, $id_pro, $amount, $price)
{
    $sql = "INSERT INTO duan1.chitiet_donhang(id_order,idpro,amount,price) values('$id_hoadon','$id_pro','$amount','$price')";
    pdo_execute($sql);
    // return pdo_execute_returnLastInsertId($sql);
}


function generateOrderCode()
{
    $prefix = 'ORD'; // (tùy chọn) Đặt một tiền tố cho mã đơn hàng
    $unique_part = uniqid(); // Tạo một phần duy nhất dựa trên timestamp và số ngẫu nhiên

    $order_code = $prefix . $unique_part;
    return $order_code;
}

function load_all_donhang_admin()
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
    $load_all_donhang_admin = pdo_query($sql);
    return $load_all_donhang_admin;
}
function load_all_trangthai_donhang()
{
    $sql = "SELECT * FROM duan1.trangthai_donhang";
    $load_all_trangthai_donhang = pdo_query($sql);
    return $load_all_trangthai_donhang;
}

function load_chitiet_donhang_admin($id_order)
{
    $sql = "SELECT * FROM duan1.chitiet_donhang inner join duan1.sanpham on sanpham.id = chitiet_donhang.idpro
    where id_order = $id_order";
    $load_chitiet_donhang_admin = pdo_query($sql);
    return $load_chitiet_donhang_admin;
}

function load_one_trangthai($id_order)
{
    $sql = "SELECT * FROM duan1.donhang where id = $id_order";
    $load_one_trangthai = pdo_query_one($sql);
    return $load_one_trangthai;
}
function update_trangthai_donhang($id_order, $id_trangthai_donhang)
{
    $sql = "UPDATE duan1.donhang set trangthai = '$id_trangthai_donhang' where id = '$id_order';";
    pdo_execute($sql);
}


function load_all_donhang_thanhcong()
{
    $sql = "SELECT
    donhang.*,
    chitiet_donhang.*,
    trangthai_donhang.*,
    chitiet_donhang.*,
    donhang.id as madonhang,
    sum(chitiet_donhang.amount *
    chitiet_donhang.price) as tongtien
     FROM duan1.donhang
    inner join duan1.chitiet_donhang on donhang.id = chitiet_donhang.id_order
    inner join duan1.trangthai_donhang on donhang.trangthai = trangthai_donhang.id_trangthai
    inner join duan1.sanpham on chitiet_donhang.idpro = sanpham.id where trangthai = 4 group by donhang.id order by donhang.id desc";
    $load_all_donhang_thanhcong = pdo_query($sql);
    return $load_all_donhang_thanhcong;
}

function load_chitiet_donhang_thanhcong($id_order)
{
    $sql = "SELECT * FROM duan1.chitiet_donhang inner join duan1.sanpham on sanpham.id = chitiet_donhang.idpro
    where id_order = $id_order";
    $load_chitiet_donhang_admin = pdo_query($sql);
    return $load_chitiet_donhang_admin;
}
// function load_all_donhang($iduser){
//     $sql = "SELECT * FROM duan1.donhang
//     inner join duan1.sanpham on 
//      where iduser = $iduser";
//     $load_all_donhang = pdo_query($sql);
//     return $load_all_donhang;

// }
function load_all_donhang($iduser)
{
    $sql = "SELECT
    donhang.*,
    chitiet_donhang.*,
    trangthai_donhang.*,
    chitiet_donhang.*,
    donhang.id as madonhang,
    sanpham.name,
    sanpham.img,
    chitiet_donhang.amount as amount_sp_hoadon,
    chitiet_donhang.price as price_sp_hoadon
FROM
    duan1.donhang
    INNER JOIN duan1.chitiet_donhang ON donhang.id = chitiet_donhang.id_order
    INNER JOIN duan1.trangthai_donhang ON donhang.trangthai = trangthai_donhang.id_trangthai
    INNER JOIN duan1.sanpham ON chitiet_donhang.idpro = sanpham.id
WHERE
    donhang.iduser = $iduser
GROUP BY
    donhang.id, chitiet_donhang.id_order, trangthai_donhang.id_trangthai, sanpham.id;";
    $load_all_donhang = pdo_query($sql);
    return $load_all_donhang;
}


function load_all_donhang_1($iduser)
{
    $sql = "SELECT
    donhang.*,
    chitiet_donhang.*,
    trangthai_donhang.*,
    chitiet_donhang.*,
    donhang.id as madonhang,
    sanpham.name,
    sanpham.img,
    chitiet_donhang.amount as amount_sp_hoadon,
    chitiet_donhang.price as price_sp_hoadon
FROM
    duan1.donhang
    INNER JOIN duan1.chitiet_donhang ON donhang.id = chitiet_donhang.id_order
    INNER JOIN duan1.trangthai_donhang ON donhang.trangthai = trangthai_donhang.id_trangthai
    INNER JOIN duan1.sanpham ON chitiet_donhang.idpro = sanpham.id
WHERE
    donhang.iduser = $iduser and donhang.trangthai = 1
GROUP BY
    donhang.id, chitiet_donhang.id_order, trangthai_donhang.id_trangthai, sanpham.id;";
    $load_all_donhang_1 = pdo_query($sql);
    return $load_all_donhang_1;
}
function load_all_donhang_2($iduser)
{
    $sql = "SELECT
    donhang.*,
    chitiet_donhang.*,
    trangthai_donhang.*,
    chitiet_donhang.*,
    donhang.id as madonhang,
    sanpham.name,
    sanpham.img,
    chitiet_donhang.amount as amount_sp_hoadon,
    chitiet_donhang.price as price_sp_hoadon
FROM
    duan1.donhang
    INNER JOIN duan1.chitiet_donhang ON donhang.id = chitiet_donhang.id_order
    INNER JOIN duan1.trangthai_donhang ON donhang.trangthai = trangthai_donhang.id_trangthai
    INNER JOIN duan1.sanpham ON chitiet_donhang.idpro = sanpham.id
WHERE
    donhang.iduser = $iduser and donhang.trangthai = 2
GROUP BY
    donhang.id, chitiet_donhang.id_order, trangthai_donhang.id_trangthai, sanpham.id;";
    $load_all_donhang_2 = pdo_query($sql);
    return $load_all_donhang_2;
}

function load_all_donhang_3($iduser)
{
    $sql = "SELECT
    donhang.*,
    chitiet_donhang.*,
    trangthai_donhang.*,
    chitiet_donhang.*,
    donhang.id as madonhang,
    sanpham.name,
    sanpham.img,
    chitiet_donhang.amount as amount_sp_hoadon,
    chitiet_donhang.price as price_sp_hoadon
FROM
    duan1.donhang
    INNER JOIN duan1.chitiet_donhang ON donhang.id = chitiet_donhang.id_order
    INNER JOIN duan1.trangthai_donhang ON donhang.trangthai = trangthai_donhang.id_trangthai
    INNER JOIN duan1.sanpham ON chitiet_donhang.idpro = sanpham.id
WHERE
    donhang.iduser = $iduser and donhang.trangthai = 3
GROUP BY
    donhang.id, chitiet_donhang.id_order, trangthai_donhang.id_trangthai, sanpham.id;";
    $load_all_donhang_3 = pdo_query($sql);
    return $load_all_donhang_3;
}
function load_all_donhang_4($iduser)
{
    $sql = "SELECT
    donhang.*,
    chitiet_donhang.*,
    trangthai_donhang.*,
    chitiet_donhang.*,
    donhang.id as madonhang,
    sanpham.name,
    sanpham.img,
    chitiet_donhang.amount as amount_sp_hoadon,
    chitiet_donhang.price as price_sp_hoadon
FROM
    duan1.donhang
    INNER JOIN duan1.chitiet_donhang ON donhang.id = chitiet_donhang.id_order
    INNER JOIN duan1.trangthai_donhang ON donhang.trangthai = trangthai_donhang.id_trangthai
    INNER JOIN duan1.sanpham ON chitiet_donhang.idpro = sanpham.id
WHERE
    donhang.iduser = $iduser and donhang.trangthai = 4
GROUP BY
    donhang.id, chitiet_donhang.id_order, trangthai_donhang.id_trangthai, sanpham.id;";
    $load_all_donhang_4 = pdo_query($sql);
    return $load_all_donhang_4;
}
function xoa_donhang_thanhcong($id_order)
{
    $sql = "DELETE FROM duan1.donhang where id = $id_order";
    pdo_execute($sql);
}
