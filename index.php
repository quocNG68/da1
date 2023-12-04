<?php
session_start();
ob_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/taikhoan.php";
include "./model/danhmuc.php";
include "./model/cart.php";
include "./model/donhang.php";
include "./model/bill.php";
include "./model/tinhtrang.php";
// $load_all_danhmuc = load_all_danhmuc();

$load_all_danhmuc_view = load_all_danhmuc_view();
$load_all_danhmuc = load_all_danhmuc();
$load_sp_yeuthich = load_sp_yeuthich();
$load_sp_luotxem = load_sp_luotxem();
$load_sp_moinhat = load_sp_moinhat();
$load_sp_giatot = load_sp_giatot();
// $load_all_sanpham = load_all_sanpham();
// Xác định nếu trang hiện tại là trang home

// Sử dụng header_home.php nếu đang truy cập trang chủ, ngược lại sử dụng header.php
$iduser = $_SESSION['success_login'] ?? 0;
$user_infor = select_user_by_id($iduser);
$_SESSION['success_login_admin'] = $user_infor;
$load_all_cart = load_all_cart($iduser);
// $_SESSION['success_login'] = $iduser;
// print_r($user_infor);
$load_cart_view_icon = load_cart_view_icon($iduser);
// print_r($user_infor);
$use_home_header = true; // Mặc định sử dụng header_home.php

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    if ($act !== 'home') {
        $use_home_header = false;
    }
}

if ($use_home_header) {
    include "./view/header_home.php";
} else {
    include "./view/header.php";
}
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'login':
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $check = true;
                $err_email = '';
                $err_password = '';
                if (!check_login($email, '')) {
                    $err_email = 'Email không tồn tại';
                    $check = false;
                } else {
                    $err_email = '';
                }
                if (!check_login('', $password)) {
                    $err_password = 'Mật khẩu sai';
                    $check = false;
                } else {
                    $err_password = '';
                }
                $check_login = check_login($email, $password);

                if ($check) {
                    if (is_array(check_login($email, $password))) {
                        $_SESSION['success_login'] = $check_login['id'];
                        header("location: index.php?act=home");
                    }
                }
            }
            include 'view/taikhoan/login.php';
            break;
        case 'logout':
            unset($_SESSION['success_login']);
            header("location: index.php?act=home");
            break;
        case 'register':
            if (isset($_POST['register'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $check = true;
                if (check_register($email)) {
                    $err_email = 'Email đã tồn tại';
                    $check = false;
                } else {
                    $err_email = '';
                }
                if ($check) {
                    add_taikhoan($username, $email, $password);

                    echo "<script>alert('Đăng kí thành công'); window.location='index.php?act=login';</script>";
                    die;
                }
            }
            include 'view/taikhoan/register.php';
            break;

        case 'taikhoan':
            include 'view/taikhoan/infor_taikhoan.php';
            break;
        case 'edit_infor_user':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $load_one_tk = load_one_tk($id);
            }
            include 'view/taikhoan/edit_infor.php';
            break;
        case 'update_infor_user':
            if (isset($_POST['update_infor_user'])) {
                $id = $_POST['id'];

                $username = $_POST['username'];
                $password = $_POST['password'];
                $diachi = $_POST['diachi'];
                $email = $_POST['email'];
                $role = $_POST['role'];
                $phone = $_POST['phone'];
                $check = true;
                if (check_isset1_tk($id, $email, '')) {
                    $check = false;
                    setcookie('err_email', 'Không thể cập nhật email đã tồn tại', time() + 1, '/');
                } else {
                    setcookie('err_email', '', time() - 1, '/');
                }

                if (check_isset1_tk($id, '', $phone)) {
                    $check = false;
                    setcookie('err_phone', 'Không thể cập nhật số điện thoại đã tồn tại', time() + 1, '/');
                } else {
                    setcookie('err_phone', '', time() - 1, '/');
                }
                if ($check) {
                    update_tk_admin($id, $username, $password, $email, $diachi, $phone, $role);
                    echo "<script>alert('Cập nhật thành công')</script>";
                    header("location: index.php?act=taikhoan");
                    echo "<script>";
                    echo "alert('Cập nhật thành công');";
                    echo "window.location.href = 'index.php?act=taikhoan';";
                    echo "</script>";
                } else {
                    header('location:' . $_SERVER['HTTP_REFERER']);
                }
            }
            break;
        case 'change_pass':
            if (isset($_POST['changepass_infor_user'])) {
                $password_old = $_POST['password_old'];
                $password_new = $_POST['password_new'];

                $password_repass = $_POST['password_repass'];
                $check = true;

                if (!check_pass($password_old)) {
                    $err_password_old = 'Mật khẩu cũ không đúng';
                    $check = false;
                } else {
                    $err_password_old = '';
                }

                if ($password_repass != $password_new) {
                    $err_password_repass = 'Xác nhận mật khẩu không khớp';
                    $check = false;
                } else {
                    $err_password_repass = '';
                }
                if ($check) {
                    update_pass_user($password_repass);
                    echo "<script>alert('Đổi mật khẩu thành công')</script>";
                }
            }
            include 'view/taikhoan/change_pass.php';
            break;
        case 'quenMatKhau':
            if (isset($_POST['btn_forgot_password'])) {
                $email = $_POST['email'];
                $sendMail = sendMail($email);
                if (empty($email)) {
                    $err_Mail = 'Vui lòng nhập email';
                } else {

                    if ($sendMail) {
                        $successMail = 'Mật khẩu của bạn là' . $sendMail['pass'];
                    } else {
                        $err_Mail = 'Email của bạn không tồn tại';
                    }
                }
            }
            if (isset($_POST['btn_forgot_password'])) {
                $email = $_POST['email'];
                $sendMail = sendMail($email);
                if ($sendMail) {
                    checkemailPass($email, $sendMail['username'], $sendMail['pass']);
                    $successMail = 'Gửi email thành công bạn vui lòng kiểm tra lại email của mình';
                } else {
                    $err_Email = "Email của bạn không tồn tại trên hệ thống";
                }
            }
            include 'view/taikhoan/forgot_password.php';

            break;
        case 'home':
            include 'view/main.php';
            break;
        case 'chitietsanpham':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $load_one_sanpham = load_one_sanpham($id);
                update_luotxem($id);
                extract($load_one_sanpham);
                $load_sp_samedm = load_sp_samedm($id, $madanhmuzc);
                $load_one_anh_mota = load_one_anh_mota($id);
            }
            include 'view/chitietsanpham.php';
            break;
        case 'list_cart':
            if (isset($_SESSION['success_login'])) {
                $load_all_cart = load_all_cart($iduser);
                if (isset($_POST['delete-all'])) {
                    $id = $_POST['product_carts'];
                    delete_cart_checkbox($id);
                    header("location: index.php?act=list_cart");
                    exit; // Add exit to stop further execution
                }
            } else {
                header("location: index.php?act=login");
            }
            include "view/giohang/list_cart.php";
            break;


        case 'delete_cart':
            if (isset($_GET['id'])) {
                $idcart = $_GET['id'];
                delete_cart($idcart);
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
            break;
        case 'cuahang':


            $start = '';
            $end = '';
            $sorting = '';
            $keyword = '';
            $iddm = '';

            if (isset($_GET['start']) || isset($_GET['end'])) {
                $start = $_GET['start'];
                $end = $_GET['end'];
            }

            if (isset($_GET['sorting'])) {
                $sorting = $_GET['sorting'];
            }

            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
                $load_one_iddm = load_one_iddm($iddm);
            }

            if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $start_record = 0;
            } else {
                $keyword = '';
            }

            $records_per_page = 6;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start_record = ($page - 1) * $records_per_page;

            $search_result_view = search_sanpham_keyword_view($iddm, $keyword, $start_record, $records_per_page, $start, $end, $sorting);
            $search_sanpham_keyword_view = $search_result_view['data'];

            $total_records = $search_result_view['total_records'];
            $total_pages = ceil($total_records / $records_per_page);

            $pagination_params = [
                'sorting' => $sorting,
                'iddm' => $iddm,
                'start' => $start,
                'end' => $end,
                'keyword' => $keyword
            ];

            $load_sp_giamgia = load_sp_giamgia();
            $load_sp_moinhat = load_sp_moinhat();
            $load_all_danhmuc = load_all_danhmuc();
            include 'view/cuahang.php';
            break;
        case 'checkout':
            if (isset($_POST['muahang'])) {
                $data = [];
                foreach ($_POST['product_carts'] as $cart) {
                    $data[] = list_cart__bill($cart);
                }
                $_SESSION['order'] = $data;
            }

            $_SESSION['cart'] = $_POST;

            if (isset($_POST['thanhtoan'])) {

                // print_r($_POST);
                // exit;

                $_SESSION['pt_thanhtoan'] = $_POST['payment-method'];

                if (isset($_POST['payment-method']) && $_POST['payment-method'] == 'online') {

                    $tongtien = 0;
                    foreach ($_SESSION['order'] as $key => $value) {
                        $thanhtien = $value['amount'] * ($value['price'] - $value['price_saleoff']);
                        $tongtien = $tongtien + $thanhtien;
                    }

                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://localhost/duan2/index.php?act=camon";
                    $vnp_TmnCode = "U1O190H6"; //Mã website tại VNPAY 
                    $vnp_HashSecret = "PWHVECGGWZPNBSQLHRNJVJGYBOSYMPOV"; //Chuỗi bí mật

                    $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Noi dung thanh toan';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = $tongtien * 100000;
                    $vnp_Locale = 'vn';
                    $vnp_BankCode = 'NCB';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef
                        // "vnp_ExpireDate"=>$vnp_ExpireDate
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }

                    ksort($inputData);
                    $query = http_build_query($inputData);

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash =   hash_hmac('sha512', $query, $vnp_HashSecret);
                        $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
                    }

                    $returnData = array(
                        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                    );
                    if (isset($_POST['thanhtoan']) && $_POST['payment-method'] == 'online') {
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                        die();
                    }
                } else {
                    $tongtien = 0;
                    foreach ($_SESSION['order'] as $key => $value) {
                        $thanhtien = $value['amount'] * ($value['price'] - $value['price_saleoff']);
                        $tongtien = $tongtien + $thanhtien;
                    }
                    header('Location: index.php?act=camon');
                }
            }
            include "view/order/checkout.php";
            break;

        case "camon":
            if ($_SESSION['pt_thanhtoan'] == 'online') {
                if (isset($_GET["vnp_Amount"]) && $_GET['vnp_ResponseCode'] == '00') {

                    // Get the current date and time in Asia/Ho_Chi_Minh timezone
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaymua = date("Y-m-d H:i:s");

                    // Check if user ID is set
                    if (isset($iduser)) {
                        // Generate a unique order code
                        $ma_don_hang = generateOrderCode();
                        $loai_thanhtoan = 'vnpay';
                        // Set payment method to 'VNPAY'

                        $data = [];

                        // Retrieve cart details for each product
                        foreach ($_SESSION['cart']['id_cart'] as $cart) {
                            $data[] = list_cart__bill($cart);
                            del_cart_after_order($cart);
                        }

                        // Insert order details into the database
                        $id_hoadon = insert_hoadon(
                            $iduser,
                            $ma_don_hang,
                            $_SESSION['cart']['nguoinhan'],
                            $_SESSION['cart']['phone'],
                            $_SESSION['cart']['address'],
                            $loai_thanhtoan,
                            $id_trangthai = 1
                        );
                        // insert vào bảng chi tiết đơn hàng
                        foreach ($data as $value) {
                            extract($value);
                            insert_chitiet_donhang($id_hoadon, $idpro, $amount, $price - $price_saleoff);
                        }

                        // các điều kiện liên quan đến vnpay
                        $vnp_BankCode = $_GET["vnp_BankCode"];
                        $vnp_BankTranNo = $_GET["vnp_BankTranNo"];
                        $vnp_CardType = $_GET["vnp_CardType"];
                        $vnp_OrderInfo = $_GET["vnp_OrderInfo"];
                        $vnp_PayDate = $_GET["vnp_PayDate"];
                        $vnp_TmnCode = $_GET["vnp_TmnCode"];
                        $vnp_TransactionNo = $_GET["vnp_TransactionNo"];
                        header("location: index.php?act=camon_final&id_hoadon=$id_hoadon");
                    }
                } else {
                    // thông báo nếu không thanh toán thành công
                    echo "<script>alert('Đã hủy thanh toán');</script>";
                    echo '<script>window.location.href = "index.php?action=checkout";</script>';
                    die();
                }
            } else {
                $data = [];

                foreach ($_SESSION['cart']['id_cart'] as $cart) {
                    $data[] = list_cart__bill($cart);
                    del_cart_after_order($cart);
                }
                $ma_don_hang = generateOrderCode();
                $loai_thanhtoan = 'tienmat';
                $id_hoadon = insert_hoadon(
                    $iduser,
                    $ma_don_hang,
                    $_SESSION['cart']['nguoinhan'],
                    $_SESSION['cart']['phone'],
                    $_SESSION['cart']['address'],
                    $loai_thanhtoan,
                    $id_trangthai = 1
                );
                foreach ($data as $value) {
                    extract($value);
                    insert_chitiet_donhang($id_hoadon, $idpro, $amount, $price - $price_saleoff);
                }
                header("location: index.php?act=camon_final&id_hoadon=$id_hoadon");
            }
            break;
        case 'camon_final':
            if (isset($_GET['id_hoadon'])) {
                $id_hoadon = $_GET['id_hoadon'];
                $load_bill_after_buy = load_bill_after_buy($id_hoadon);
                $load_bill_detail = load_bill_detail($id_hoadon);
            }
            include "view/camon.php";
            break;
        case 'theodoi_donhang':
            
            if (isset($_POST['search_order'])) {
                $keyword = $_POST['keyword'];
            }else{
                $keyword = '';
            }
            $load_all_donhang = load_all_donhang($iduser,$keyword);
            $load_all_donhang_1 = load_all_donhang_1($iduser, $keyword);
            $load_all_donhang_2 = load_all_donhang_2($iduser, $keyword);
            $load_all_donhang_3 = load_all_donhang_3($iduser, $keyword);
            $load_all_donhang_4 = load_all_donhang_4($iduser, $keyword);
           
            include "view/order/theodoi_donhang.php";
            break;
        default:
            include 'view/main.php';
            break;
    }
} else {
    include 'view/main.php';
}
include "./view/footer.php";;
