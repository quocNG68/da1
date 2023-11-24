<?php
session_start();
ob_start();
include "./model/pdo.php";
include "./model/sanpham.php";
include "./model/taikhoan.php";
include "./model/danhmuc.php";
include "./model/cart.php";
include "./model/donhang.php";
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
// print_r($user_infor);
$load_cart_view_icon = load_cart_view_icon($iduser);
// print_r($user_infor);
$use_home_header = true; // Mặc định sử dụng header_home.php

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    // Kiểm tra nếu người dùng chọn trang khác (không phải trang chủ)
    if ($act !== 'home') {
        $use_home_header = false;
    }
}

// Bao gồm header_home.php hoặc header.php dựa trên giá trị của $use_home_header
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
                        // echo "<script>alert('thành công nha')</script>";
                        $_SESSION['success_login'] = $check_login['id'];
                        // echo ($_SESSION['success_login']);
                        // print_r($_SESSION['success_login']);
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

                // $check_register = check_register($username,$email);

                // if(check_register($username,'')){
                //     $err_username = 'Tên đăng nhập đã tồn tại';
                //     $check = false;
                // }else{
                //     $err_username = '';
                // }
                if (check_register($email)) {
                    $err_email = 'Email đã tồn tại';
                    $check = false;
                } else {
                    $err_email = '';
                }
                // $check_register = check_register($username,$email);
                if ($check) {
                    add_taikhoan($username, $email, $password);
                    header("location: index.php?act=login");
                    die;
                }
            }
            include 'view/taikhoan/register.php';
            break;

        case 'taikhoan':
            // print_r($_SESSION['success_login']);
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
        case 'addtocart':
            if ($_SESSION['success_login']) {
                if (isset($_POST['addtocart'])) {
                    // $iduser = $_POST['iduser'];
                    $idpro = $_POST['idpro']; // Sửa đổi tên biến này
                    $amount = $_POST['soluong'];

                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date("Y-m-d H:i:s");

                    $stateCheck = checkProCart($idpro);
                    if ($stateCheck) {
                        $amount_after_add = $stateCheck['amount'] + $amount;
                        updateCart($stateCheck['id'], $amount_after_add);
                    } else {

                        add_to_cart($iduser, $idpro, $amount, $date);
                    }
                    echo "<script>alert('Đã thêm sản phẩm thành công')</script>";
                    // Đảm bảo hàm add_to_cart đã được định nghĩa và chứa logic cần thiết
                    header("Location: index.php?act=list_cart");
                }
            } else {
                header("Location: index.php?act=login");
            }
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
            // case 'gioithieu':
            //     include 'view/gioithieu.php';
            //     break;
            // case 'sanpham':
            //     include 'view/sanpham.php';
            //     break;
        case 'cuahang':

            $start = '';
            $end = '';
            $sorting = '';
            // $keyword = '';
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

            $records_per_page = 5;
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
            // echo  "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // lấy dữ liệu vào checkout
            if (isset($_POST['muahang'])) {

                $data = [];
                foreach ($_POST['product_carts'] as $cart) {
                    $data[] = list_cart__bill($cart);
                };

                $_SESSION['order'] = $data;
            }




            // foreach($_SESSION['order'] as $value1){
            //     echo "<pre>";
            //     var_dump($value1);
            //     echo "</pre>";

            // }

            if (isset($_POST['thanhtoan'])) {


                $diachi_nguoinhan = $_POST['address'];
                $phone_nguoinhan = $_POST['phone'];
                $phuongthuc_thanhtoan = $_POST['payment-method'];
                $nguoinhan = $_POST['nguoinhan'];
             
                if (isset($_POST['payment-method']) && $_POST['payment-method'] == 'tienmat') {
                    // $id_pro = $_POST;
                    //    echo $id_pro;
                    //    exit;

                    $ma_don_hang = generateOrderCode();
                    insert_hoadon($iduser, $ma_don_hang, $nguoinhan, $phone_nguoinhan, $diachi_nguoinhan, $phuongthuc_thanhtoan,$id_thanhtoan = 1);
                    $id_hoadon = $conn->lastInsertId();
                    foreach ($_SESSION['order'] as $value) {
                        insert_chitiet_donhang($id_hoadon, $value['idpro'], $value['amount'], $value['price']);
                        del_cart_after_order($value['idcart']);
                        header("location: index.php?act=camon");
                    }
                } else {

                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://localhost/duan2/index.php?act=camon";
                    $vnp_TmnCode = "U1O190H6"; //Mã website tại VNPAY 
                    $vnp_HashSecret = "PWHVECGGWZPNBSQLHRNJVJGYBOSYMPOV"; //Chuỗi bí mật

                    $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Noi dung thanh toan';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = 10000 * 100;
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
                    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                    // }

                    //var_dump($inputData);
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                    );
                    if ((isset($_POST['payment-method']) && $_POST['payment-method'] == 'online')) {
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
                }
            }
            include "view/order/checkout.php";
            break;

        case 'lienhe':
            include 'view/lienhe.php';
            break;
        case 'camon':
            include 'view/camon.php';
            break;

        default:
            include 'view/main.php';
            break;
    }
} else {
    include 'view/main.php';
}
include "./view/footer.php";;