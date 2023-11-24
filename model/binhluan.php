<?php
function add_binhluan($noidung,$iduser,$idpro,$date){
    $sql = "INSERT INTO duan1.binhluan (noidung,iduser,idpro,ngaybinhluan) VALUES ('$noidung','$iduser','$idpro','$date')";
    pdo_execute($sql);
}
function list_product_comment(){
    $sql = "SELECT * FROM duan1.binhluan inner join duan1.user on binhluan.iduser = user.id
    inner join duan1.sanpham on binhluan.idpro = sanpham.id group by sanpham.id order by sanpham.id desc";
    $list_product_comment = pdo_query($sql);
    return $list_product_comment;
}

function load_all_comment($idpro){
    $sql = "SELECT 
    binhluan.iduser,
    user.id as userid,
    binhluan.idpro,
    sanpham.id as masanpham,
    user.username,
    sanpham.img,
    sanpham.name,
    binhluan.noidung,
    binhluan.id as mabinhluan,
    binhluan.ngaybinhluan
FROM duan1.binhluan  
INNER JOIN duan1.user ON binhluan.iduser = user.id
INNER JOIN duan1.sanpham ON binhluan.idpro = sanpham.id 
WHERE binhluan.idpro = '$idpro' ";


    $load_all_comment = pdo_query($sql);
    return $load_all_comment;
}

function load_comment($idpro){
    $sql = "SELECT 
    
    binhluan.id,
    binhluan.noidung,
    binhluan.iduser,
    binhluan.idpro,
    binhluan.ngaybinhluan,
    user.username as tennguoidung
    
     FROM duan1.binhluan inner join duan1.user on binhluan.iduser = user.id  where idpro = ".$idpro;
    
    $result_comment = pdo_query($sql);
    return $result_comment;
}

function delete_comment($id){
    $sql = "DELETE FROM duan1.binhluan WHERE id = ".$id;
    pdo_execute($sql);
}