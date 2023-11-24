<?php

function add_to_cart($iduser,$idpro,$amount,$ngaythem){
    $sql = "INSERT INTO duan1.giohang (iduser,idpro,amount,ngaythem) values('$iduser','$idpro','$amount','$ngaythem')";
    pdo_execute($sql);
}

function load_all_cart($iduser){
    $sql = "SELECT 
    giohang.id,
    sanpham.*,
    giohang.*
     FROM duan1.giohang inner join duan1.sanpham on giohang.idpro = sanpham.id where iduser='$iduser'";
    $load_all_cart = pdo_query($sql);
    return $load_all_cart;
}
function delete_cart($idcart){
    $sql = "DELETE FROM duan1.giohang where id = '$idcart'";
    pdo_execute($sql);
}
function checkProCart($idpro) {
    $sql = "SELECT * FROM duan1.giohang WHERE idpro = '$idpro'";
    $checkProCart = pdo_query_one($sql);
    return $checkProCart;
}
function updateCart($id,$amount_after_add) {
    $sql = "UPDATE duan1.giohang SET amount = '".$amount_after_add."' WHERE id = '$id'";
    pdo_execute($sql);
}

function delete_cart_checkbox($id){
    $ma_cart = implode(',',$id);
    $sql = "DELETE FROM duan1.giohang WHERE id in ($ma_cart)";
    pdo_execute($sql);
}

function list_cart__bill($cart){
    $sql= "SELECT giohang.*,giohang.id as idcart,sanpham.* FROM duan1.giohang inner join duan1.sanpham on giohang.idpro=sanpham.id where giohang.id = $cart";
    $list_cart__bill = pdo_query_one($sql);
    return $list_cart__bill;
}

// function count_cart($iduser){
//     $sql = "SELECT COUNT(giohang.id) as soluong FROM duan1.giohang where iduser=$iduser";
//     $count_cart = pdo_query_one($sql)['soluong'];
//     return $count_cart;
// }

function load_cart_view_icon($iduser){
    $sql = "SELECT duan1.sanpham.*,
    sanpham.id as idpro,
    giohang.id as idcart
     FROM duan1.giohang inner join duan1.sanpham on giohang.idpro=sanpham.id where iduser = $iduser";
     $load_cart_view_icon = pdo_query($sql);
     return $load_cart_view_icon;
}

function del_cart_after_order($id_cart){
    $sql = "DELETE FROM duan1.giohang where id = $id_cart";
    pdo_execute($sql);
}