<?php
session_start();
ob_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/taikhoan.php";
include "../model/tinhtrang.php";
include "../model/sanpham.php";
include "../model/binhluan.php";
include "../model/donhang.php";
include "../model/bieudo.php";
include "../model/thongke.php";
include "header.php";
include "sidebar.php";
if ($_SESSION['success_login_admin']['role'] != 1) {
    header("location: erro404.php");
    die;
}
$thongke_doanhthu = thongke_doanhthu();
$so_donhang_thanhcong = so_donhang_thanhcong();
$thongke_so_nguoidung = thongke_so_nguoidung();
$thong_ke_donhang_dadat = thong_ke_donhang_dadat();
$thong_ke_product_bestseller = thong_ke_product_bestseller();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            $result_filter =  statistical($date_start ?? "2023-11-01", $date_end ?? "2023-11-30", $type ?? "date");
            foreach ($result_filter as $key => $value) {
                if ($value['so_donhang'] == null) {
                    $result_filter[$key]['so_donhang'] = 0;
                }
                if ($value['doanhthu'] == null) {
                    $result_filter[$key]['doanhthu'] = 0;
                }
            }
            $date = array_column($result_filter, 'date');
            $so_donhang = array_column($result_filter, 'so_donhang');
            $doanhthu = array_column($result_filter, 'doanhthu');
            $result_filter = [];
            $result_filter['date'] = $date;
            $result_filter['so_donhang'] = $so_donhang;
            $result_filter['doanhthu'] = $doanhthu;
            $result_filter = json_encode($result_filter);
            
            if (isset($_POST['filter'])) {
                $date_start = $_POST['date_start'];
                $date_end = $_POST['date_end'];
                $type = $_POST['type'];
                $result_filter =  statistical($date_start, $date_end, $type );

                foreach ($result_filter as $key => $value) {
                    if ($value['so_donhang'] == null) {
                        $result_filter[$key]['so_donhang'] = 0;
                    }
                    if ($value['doanhthu'] == null) {
                        $result_filter[$key]['doanhthu'] = 0;
                    }
                }
                $date = array_column($result_filter, 'date');
                $so_donhang = array_column($result_filter, 'so_donhang');
                $doanhthu = array_column($result_filter, 'doanhthu');
                $result_filter = [];
                $result_filter['date'] = $date;
                $result_filter['so_donhang'] = $so_donhang;
                $result_filter['doanhthu'] = $doanhthu;
                $result_filter = json_encode($result_filter);
            }
            $thongke_danhmuc = thongke_danhmuc();
            include "home.php";
            break;
        case 'add_tk':
            if (isset($_POST['add_tk'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phone = $_POST['phone'];

                $diachi = $_POST['diachi'];
                $role = $_POST['role'];
                $check = true;
                if (check_isset_tk($email, '')) {
                    $check = false;
                    $err_email = 'Email đã tồn tại';
                } else {
                    $err_email = '';
                }
                if (check_isset_tk('', $phone)) {
                    $check = false;
                    $err_phone = 'Số điện thoại đã tồn tại';
                } else {
                    $err_phone = '';
                }

                if ($check) {
                    add_tk_admin($username, $password, $email, $diachi, $phone, $role);
                    echo "<script>alert('Thêm tài khoản thành công')</script>";
                    header("location: index.php?act=list_tk");
                }
            }
            include 'taikhoan/add_tk.php';
            break;
        case 'delete_tk':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_tk($id);
            }
            $load_all_taikhoan = load_all_taikhoan();
            include "taikhoan/list_tk.php";
            break;
        case 'edit_tk':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $load_one_tk = load_one_tk($id);
            }
            include "taikhoan/edit_tk.php";
            break;
        case 'update_tk':
            if (isset($_POST['update_tk'])) {
                $id = $_POST['id'];

                $username = $_POST['username'];

                $password = $_POST['password'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];
                $check = true;

                if (check_isset1_tk($id, $email, '')) {
                    $check = false;
                    setcookie('err_email', 'Email đã tồn tại', time() + 1, '/');
                } else {
                    setcookie('err_email', '', time() - 1, '/');
                }
                if (check_isset1_tk($id, '', $phone)) {
                    $check = false;
                    setcookie('err_phone', 'Số điện thoại đã tồn tại', time() + 1, '/');
                } else {
                    setcookie('err_phone', '', time() - 1, '/');
                }
                if ($check) {
                    update_tk_admin($id, $username, $password, $email, $diachi, $phone, $role);
                    header("location: index.php?act=list_tk");
                } else {
                    header('location:' . $_SERVER['HTTP_REFERER']);
                }
            }
            break;

            // danh sách tài khoản
        case 'list_tk':
            $load_all_taikhoan = load_all_taikhoan();
            include 'taikhoan/list_tk.php';
            break;
            // thêm danh mục
        case 'adddm':
            if (isset($_POST['adddm'])) {

                $namedm = $_POST['namedm'];
                $trangthai = isset($_POST['trangthai']) ? 1 : 0;
                $check = true;
                if (empty($namedm)) {
                    $check = false;
                    $err_namedm = 'Vui lòng không để trống';
                }
                if (empty($_FILES['image_danhmuc']['name'])) {
                    $check = false;
                    $err_imagedm = 'Không được để trống';
                } else {
                    if ($_FILES['image_danhmuc']['size'] > 1000000) {
                        $check = false;
                        $err_imagedm = 'Ảnh quá kích cỡ';
                    } else {


                        $filename = time() . basename($_FILES['image_danhmuc']['name']);
                        $target = '../upload/' . $filename;
                        if (move_uploaded_file($_FILES['image_danhmuc']['tmp_name'], $target)) {
                            adddm($namedm, $filename, $trangthai);
                        } else {
                            echo "Failed to upload image.";
                        }
                    }
                }
            }

            include 'danhmuc/adddm.php';
            break;



            // danh sách danh mục chính
        case 'listdm':
            $load_all_danhmuc = load_all_danhmuc();
            include "danhmuc/listdm.php";
            break;
            // danh sách danh mục

        case 'deletedm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                deletedm($id);
                header("location: index.php?act=listdm");
            }
            break;
            // lấy value cũ danh mục chính
        case 'editdm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $load_one_dm = load_one_dm($id);
            }
            include 'danhmuc/editdm.php';
            break;
            // cập nhật danh mục    
        case 'updatedm':
            $filename = '';
            if (isset($_POST['updatedm'])) {
                $id = $_POST['id'];
                $namedm = $_POST['namedm'];
                $trangthai = $_POST['trangthai'] ? 1 : 0;
                $check = true;


                if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                    if ($_FILES['image']['size'] > 1000000) {
                        $check = false;
                        setcookie('err_imagedm', 'Ảnh quá kích cỡ', time() + 1, '/');
                    } else {
                        setcookie('err_imagedm', '', time() + 1, '/');
                    }
                    if ($check) {
                        // Kiểm tra xem có tệp ảnh mới được tải lên hay không
                        $filename = time() . basename($_FILES['image']['name']);
                        $target = "../upload/" . $filename;

                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                            // Tệp ảnh mới đã được tải lên thành công, sử dụng tên tệp mới
                            updatedm($id, $namedm, $filename);
                        }
                    }
                } else {
                    // Không có tệp ảnh mới, không thay đổi tên tệp ảnh
                    updatedm($id, $namedm, $_POST['old_image'], $trangthai);
                }

                if ($check) {
                    header("location: index.php?act=listdm");
                } else {
                    header('location:' . $_SERVER['HTTP_REFERER']);
                }
            }


            break;





            // Kết thúc phần danh mục
            // danh sách tình trạng
        case 'listtt':
            $load_all_tinhtrang = load_all_tinhtrang();
            include 'tinhtrang/listtt.php';
            break;
            // thêm tình trạng
        case 'addtt':
            if (isset($_POST['addtt'])) {
                $namett = $_POST['namett'];
                addtt($namett);
                header("location: index.php?act=listtt");
            }
            include 'tinhtrang/addtt.php';
            break;
            // xóa tình trạng       
        case 'deletett':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_tinhtrang($id);
            }
            $load_all_tinhtrang = load_all_tinhtrang();
            include 'tinhtrang/listtt.php';
            break;
            // load 1 tình trạng
        case 'edittt':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $load_one_tt = load_one_tinhtrang($id);
            }
            include 'tinhtrang/updatett.php';
            break;
            // cập nhật tình trạng
        case 'updatett':
            if (isset($_POST['updatett'])) {
                $id = $_POST['id'];
                $namett = $_POST['namett'];
                update_tinhtrang($id, $namett);
                header("location: index.php?act=listtt");
            }
            break;

            // kết thúc phần tình trạng
        case 'addsp':
            $filename = '';
            $filenames = array();
            $id_product = '';
            if (isset($_POST['addsp'])) {
                $namesp = $_POST['namesp'];
                $price = $_POST['price'];
                $price_saleoff = $_POST['price_saleoff'];
                $mota_short = $_POST['mota_short'];
                $mota_long = $_POST['mota_long'];
                $status = $_POST['status'];
                $xuatxu = $_POST['xuatxu'];
                $trongluong = $_POST['trongluong'];
                $soluong = $_POST['soluong'];
                $danhmuc = $_POST['danhmuc'];
                $check = true;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date("Y-m-d H:i:s");
                if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
                    $files = $_FILES['images'];
                    $filenames = $files['name'];

                    foreach ($filenames as $key => $value) {
                        if ($files['error'][$key] === UPLOAD_ERR_OK) {
                            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                                $filename = time() . basename($_FILES['image']['name']);
                                $target = "../upload/" . $filename;
                                move_uploaded_file($_FILES['image']['tmp_name'], $target);
                            }
                        }
                    }

                    if ($check) {
                        addsp($namesp, $price, $price_saleoff, $filename, $mota_short, $mota_long, $status, $xuatxu, $trongluong, $soluong, $danhmuc, $date);
                        $id_product = $conn->lastInsertId();

                        foreach ($filenames as $key => $value) {
                            $query_insert = "INSERT INTO duan1.image_mota(id_pro_img,img_thum) values ('$id_product','$value')";
                            move_uploaded_file($files['tmp_name'][$key], '../upload/' . $value);
                            $result = $conn->query($query_insert);
                            if (!$result) {
                                echo "Lỗi khi thêm dữ liệu vào bảng image_mota";
                                $check = false;
                            }
                        }

                        if ($check) {
                            header("location: index.php?act=addsp");
                        }
                    }
                }
            }

            $load_all_danhmuc = load_all_danhmuc();
            $load_all_tinhtrang = load_all_tinhtrang();
            include 'sanpham/addsp.php';
            break;



            // đã xong phần thêm sản phẩm    
        case 'listsp':
            $keyword = '';
            $danhmuc_search = '';


            if (isset($_POST['search'])) {
                $keyword = $_POST['keyword'];
                $danhmuc_search = $_POST['namedm'];
                $start_record = 0;
                // Không gán lại giá trị của $start_record ở đây
            }

            $records_per_page = 3;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $start_record = ($page - 1) * $records_per_page;
            $search_result = search_sanpham_keyword_iddm($keyword, $danhmuc_search, $start_record, $records_per_page, '');
            $search_sanpham_keyword_iddm = $search_result['data'];
            $total_records = $search_result['total_records'];
            $total_pages = ceil($total_records / $records_per_page);
            $load_name_danhmuc = load_name_danhmuc();
            $load_all_danhmuc = load_all_danhmuc();
            $load_all_name_tinhtrang = load_all_name_tinhtrang();
            $load_all_image_mota = load_all_image_mota();

            include 'sanpham/listsp.php';
            break;

            // đã xong phần list sản phẩm
        case 'deletesp':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                deletesp($id);
                header("location: index.php?act=listsp");
            }
            break;
        case 'editsp':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $load_one_sanpham = load_one_sanpham($id);
            }
            $load_danhmuc_chinh_in_list = load_danhmuc_chinh_in_list();
            $load_tinhtrang_in_list = load_tinhtrang_in_list();
            $load_all_image_mota = load_all_image_mota();
            include 'sanpham/editsp.php';
            break;
        case 'updatesp':
            $filename = '';
            $target = '';
            if (isset($_POST['updatesp'])) {
                $id = $_POST['id'];
                $namesp = $_POST['namesp'];
                $price = $_POST['price'];
                $price_saleoff = $_POST['price_saleoff'];
                $mota_short = $_POST['mota_short'];
                $mota_long = $_POST['mota_long'];
                $status = $_POST['status'];
                $xuatxu = $_POST['xuatxu'];
                $trongluong = $_POST['trongluong'];
                $soluong = $_POST['soluong'];
                $danhmuc = $_POST['danhmuc'];
                $check = true;

                if (!empty($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $filename = time() . basename($_FILES['image']['name']);
                    $target_file = "../upload/" . $filename;
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                }
                if ($check) {
                    update_sanpham($id, $namesp, $price, $price_saleoff, $filename, $mota_short, $mota_long, $status, $xuatxu, $trongluong, $soluong, $danhmuc);
                    if (isset($_FILES['images'])) {
                        $files = $_FILES['images'];
                        $filenames = $files['name'];

                        if (!empty(array_filter($filenames))) {
                            $new_images = [];
                            foreach ($filenames as $key => $value) {
                                if (!empty($value)) {
                                    $file_path = '../upload/' . $value;
                                    move_uploaded_file($files['tmp_name'][$key], $file_path);
                                    $new_images[] = $value;
                                    echo 'Processed image: ' . $value . '<br>';
                                }
                            }
                            del_image_mota_after_upload($id);
                            foreach ($new_images as $new_image) {
                                $query_insert = "INSERT INTO duan1.image_mota(id_pro_img,img_thum) values ('$id','$new_image')";
                                $result = $conn->query($query_insert);
                            }
                        }
                    }
                }
            }
            $load_name_danhmuc = load_name_danhmuc();
            $load_all_danhmuc = load_all_danhmuc();
            $load_all_name_tinhtrang = load_all_name_tinhtrang();
            $load_all_image_mota = load_all_image_mota();
            header("location: index.php?act=listsp");
            break;

        case 'list_product_binhluan':
            $list_product_comment = list_product_comment();
            include 'binhluan/list_product_comment.php';
            break;

        case 'list_comment':
            if (isset($_GET['idpro'])) {
                $idpro = $_GET['idpro'];
                $load_all_comment = load_all_comment($idpro);
            }


            include 'binhluan/list_comment.php';
            break;
        case 'delete_comment':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_comment($id);
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
            break;

        case 'trangthai_donhang':

            $load_all_trangthai_donhang = load_all_trangthai_donhang();
            $load_all_donhang_admin = load_all_donhang_admin();
            include "donhang/trangthai_donhang.php";
            break;
        case 'chitiet_donhang':
            if (isset($_GET['id_order'])) {
                $id_order = $_GET['id_order'];
                $load_chitiet_donhang_admin = load_chitiet_donhang_admin($id_order);
            }
            include "donhang/chitiet_donhang.php";
            break;
        case 'edit_trangthai_donhang':
            if (isset($_GET['id_order'])) {
                $id_order = $_GET['id_order'];
                $load_one_trangthai = load_one_trangthai($id_order);
            }
            $load_all_trangthai_donhang = load_all_trangthai_donhang();
            include "donhang/edit_trangthai_donhang.php";
            break;
        case 'update_trangthai_donhang':
            if (isset($_POST['update_trangthai_donhang'])) {
                $id_trangthai_donhang = $_POST['id_trangthai_donhang'];
                $id_order = $_POST['id_order'];
                update_trangthai_donhang($id_order, $id_trangthai_donhang);
                header("location: index.php?act=trangthai_donhang");
            }
            break;
        case 'donhang_thanhcong':
            $load_all_donhang_thanhcong = load_all_donhang_thanhcong();
            include "donhang/donhang_thanhcong.php";
            break;
        case 'chitiet_donhang_thanhcong':
            if (isset($_GET['id_order'])) {
                $id_order = $_GET['id_order'];
                $load_chitiet_donhang_thanhcong = load_chitiet_donhang_thanhcong($id_order);
            }
            include "donhang/chitiet_donhang_thanhcong.php";
            break;
        case 'xoa_donhang_thanhcong':
            if (isset($_GET['id_order'])) {
                $id_order = $_GET['id_order'];
                xoa_donhang_thanhcong($id_order);
                header("location: index.php?act=donhang_thanhcong");
            }
            break;


        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
};
include "footer.php";
