<?php
// thêm sản phẩm
function addsp($namesp,$price,$price_saleoff,$filename,$mota_short,$mota_long,$status,$xuatxu,$trongluong,$soluong,$danhmuc,$date){
    $sql = "INSERT INTO duan1.sanpham(name,price,price_saleoff,img,mota_short,mota_long,id_tinhtrang,xuatxu,trongluong,soluong,iddm,ngaydang) values ('$namesp', '$price','$price_saleoff', '$filename', '$mota_short', '$mota_long', '$status', '$xuatxu','$trongluong','$soluong','$danhmuc','$date')";
    pdo_execute($sql);
}
function update_sanpham($id,$namesp,$price,$price_saleoff,$filename,$mota_short,$mota_long,$status,$xuatxu,$trongluong,$soluong,$danhmuc){
    if($filename!=''){
        $sql = "UPDATE duan1.sanpham set name = '$namesp', price = '$price',price_saleoff='$price_saleoff',img = '$filename',mota_short = '$mota_short',mota_long = '$mota_long',id_tinhtrang = '$status',xuatxu = '$xuatxu',trongluong = '$trongluong',soluong='$soluong',iddm = '$danhmuc' WHERE id ='$id'";
    }else{
        $sql = "UPDATE duan1.sanpham set name = '$namesp', price = '$price',price_saleoff='$price_saleoff',mota_short = '$mota_short',mota_long = '$mota_long',id_tinhtrang = '$status',xuatxu = '$xuatxu',trongluong = '$trongluong',soluong='$soluong',iddm = '$danhmuc' WHERE id ='$id'";
    }
    pdo_execute($sql);
}
// hàm hiển thị tất cả sản phẩm
function load_all_sanpham(){
    $sql = "SELECT * FROM duan1.sanpham order by id desc";
    $load_all_sanpham = pdo_query($sql);
    return $load_all_sanpham;
}
// load sản phẩm theo danh mục
// load sản phẩm cùng danh mục
function load_sp_samedm($id,$iddm){
    $sql = "SELECT * FROM duan1.sanpham where iddm = '$iddm' and id <> '$id'";
    $load_sp_samedm = pdo_query($sql);
    return $load_sp_samedm;
}
// hàm hiển thị sản phẩm theo lượt yêu thích nhất top 10
function load_sp_yeuthich(){
    $sql = "SELECT 
     sanpham.id,
    sanpham.name,
    sanpham.price,
    sanpham.price_saleoff,
    sanpham.img,
    sanpham.mota_short,
    sanpham.mota_long,
    sanpham.luotxem,
    sanpham.xuatxu,
    sanpham.trongluong,
    sanpham.luotyeuthich,
    sanpham.soluong,
    danhmuc.name as id_danhmuc
     FROM duan1.sanpham 
     inner join duan1.danhmuc on sanpham.iddm = danhmuc.id order by sanpham.luotyeuthich desc limit 0,10"
     ;
    $load_sp_yeuthich = pdo_query($sql);
    return $load_sp_yeuthich;
}
// hàm hiển thị sản phẩm theo lượt xem
function load_sp_luotxem(){
    $sql = "SELECT * FROM duan1.sanpham order by luotxem desc limit 0,6";
    $load_sp_luotxem = pdo_query($sql);
    return $load_sp_luotxem;
}
function load_sp_moinhat(){
    $sql = "SELECT * FROM duan1.sanpham order by id desc limit 0,6";
    $load_sp_moinhat = pdo_query($sql);
    return $load_sp_moinhat;
}
function load_sp_giatot(){
    $sql = "SELECT * FROM duan1.sanpham order by price asc limit 0,6";
    $load_sp_giatot = pdo_query($sql);
    return $load_sp_giatot;
}
function load_sp_giamgia(){
    $sql = "
    SELECT
                sanpham.*,
                tinhtrang.tinhtrang,
                danhmuc.name AS tendanhmuc
            FROM duan1.sanpham 
            INNER JOIN duan1.tinhtrang ON sanpham.id_tinhtrang = tinhtrang.id
            inner JOIN duan1.danhmuc ON sanpham.iddm = danhmuc.id
     where sanpham.price_saleoff order by price_saleoff desc limit 0,10";
    $load_sp_giamgia = pdo_query($sql);
    return $load_sp_giamgia;
}
function search_sanpham_keyword_view($iddm, $keyword, $start_record, $records_per_page, $start, $end, $sorting) {
    $sql = "
    SELECT 
        sanpham.id,
        sanpham.name,
        sanpham.price,
        sanpham.price_saleoff,
        sanpham.img,
        sanpham.mota_short,
        sanpham.mota_long,
        sanpham.luotxem,
        tinhtrang.tinhtrang,
        sanpham.xuatxu,
        sanpham.trongluong,
        sanpham.luotyeuthich,
        sanpham.soluong,
        danhmuc.name AS tendanhmuc
    FROM duan1.sanpham 
    INNER JOIN duan1.tinhtrang ON sanpham.id_tinhtrang = tinhtrang.id
    INNER JOIN duan1.danhmuc ON sanpham.iddm = danhmuc.id 
    ";
    if ($keyword != '') {
        $sql .= ' WHERE sanpham.name like "%' . $keyword . '%"';
    }
    if ($iddm > 0) {
        $sql .= ' AND sanpham.iddm = ' . $iddm;
    }
    if($start!=''&& $end==''){
        $sql.= " AND (sanpham.price - sanpham.price_saleoff) >=$start" ;
    }
    if($start==''&& $end!=''){
        $sql.= " AND (sanpham.price - sanpham.price_saleoff) <=$end" ;
    }
    if($start!=''&& $end!=''){
        $sql.= " AND (sanpham.price - sanpham.price_saleoff) >= $start AND sanpham.price <=$end" ;
    }
    if ($sorting === 'asc') {
        $sql .= ' ORDER BY (sanpham.price - sanpham.price_saleoff) ASC';
    } elseif ($sorting === 'desc') {
        $sql .= ' ORDER BY (sanpham.price - sanpham.price_saleoff) DESC';
    }

    // $sql.=' order by sanpham.id ASC';

    $search_sql = $sql . " LIMIT $start_record, $records_per_page";
    $total_records_sql = $sql; // No LIMIT for counting total records
    $search_sanpham_keyword_view = pdo_query($search_sql);

    $total_records = count(pdo_query($total_records_sql));
    return ['data' => $search_sanpham_keyword_view, 'total_records' => $total_records];
}



function search_sanpham_keyword_iddm($keyword, $danhmuc_search, $start_record, $records_per_page){

    $sql = "
    SELECT 
                sanpham.id,
                sanpham.name,
                sanpham.price,
                sanpham.price_saleoff,
                sanpham.img,
                sanpham.mota_short,
                sanpham.mota_long,
                sanpham.luotxem,
                tinhtrang.tinhtrang,
                sanpham.xuatxu,
                sanpham.ngaydang,
                sanpham.trongluong,
                sanpham.luotyeuthich,
                sanpham.soluong,
                danhmuc.name AS tendanhmuc
            FROM duan1.sanpham 
            INNER JOIN duan1.tinhtrang ON sanpham.id_tinhtrang = tinhtrang.id
            inner JOIN duan1.danhmuc ON sanpham.iddm = danhmuc.id 
    ";
    if($keyword!=''){
        $sql.=' and sanpham.name like "%'.$keyword.'%"';
    }
    if($danhmuc_search>0){
        $sql.=' and sanpham.iddm = '.$danhmuc_search.'';
    }
    $search_sql = $sql . " ORDER BY sanpham.id ASC LIMIT $start_record, $records_per_page";
    $total_records_sql = $sql; // Không có LIMIT để tính tổng số bản ghi
    $search_sanpham_keyword_iddm = pdo_query($search_sql);
    $total_records = count(pdo_query($total_records_sql));
    return ['data' => $search_sanpham_keyword_iddm, 'total_records' => $total_records];
} 


// load 1 sản phẩm
function load_one_sanpham($id){
    $sql = "SELECT 
    sanpham.id,
    sanpham.name,
    sanpham.price,
    sanpham.price_saleoff,
    sanpham.img,
    sanpham.mota_short,
    sanpham.mota_long,
    sanpham.luotxem,
    sanpham.xuatxu,
    sanpham.trongluong,
    sanpham.luotyeuthich,
    tinhtrang.tinhtrang,
    sanpham.soluong,
    danhmuc.id as madanhmuzc,
    tinhtrang.id as matinhtrang,
    danhmuc.name as tendanhmuc
FROM duan1.sanpham
INNER JOIN duan1.tinhtrang ON sanpham.id_tinhtrang = tinhtrang.id
INNER JOIN duan1.danhmuc ON sanpham.iddm = danhmuc.id
WHERE sanpham.id = $id

      ";
    $load_one_sanpham = pdo_query_one($sql);
    return $load_one_sanpham;
}
// hàm xóa sản phẩm
function deletesp($id){
    $sql = "DELETE FROM duan1.sanpham WHERE id = '$id'";
    pdo_execute($sql);
}
// hàm lấy tất cả ảnh mô tả
function load_all_image_mota(){
    $sql = "SELECT
     image_mota.id as ma_image_mota,
     image_mota.img_thum,
     image_mota.id_pro_img FROM duan1.image_mota";
    $load_all_image_mota = pdo_query($sql);
    return $load_all_image_mota;
}
// load one ảnh mô tả
function load_one_anh_mota($id){
    $sql = "SELECT * FROM duan1.image_mota where id_pro_img = '$id'";
    $load_one_anh_mota = pdo_query($sql);
    return $load_one_anh_mota;
}
// hàm xóa ảnh mô tả để chuẩn bị upload ảnh mới
function del_image_mota_after_upload($id){
    $sql = "DELETE FROM duan1.image_mota WHERE id_pro_img = '$id'";
    pdo_execute($sql);
}
function update_luotxem($id){
    $sql = "UPDATE duan1.sanpham set luotxem = luotxem + 1 where id = '$id'";
    pdo_execute($sql);
}
function is_valid_image($filename) {
    $allowed_formats = ['jpg', 'jpeg', 'png', 'gif']; // Add more formats if needed
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    return in_array($file_extension, $allowed_formats);
}

?>