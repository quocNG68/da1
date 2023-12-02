<?php
        case 'theodoi_donhang':
            $page ='';
            $total_records = 10;
            $records_per_page = 5;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start_record = ($page - 1) * $records_per_page;
            $load_all_donhang = load_all_donhang($iduser,$start_record,$records_per_page);
       
            // $search_result_view = search_sanpham_keyword_view($iddm, $keyword, $start_record, $records_per_page, $start, $end, $sorting);
            $load_all_donhang = $load_all_donhang['data'];
            $total_records = $load_all_donhang['total_records'];
            $total_pages = ceil($total_records / $records_per_page);
            $load_all_donhang_1 = load_all_donhang_1($iduser);
            $load_all_donhang_2 = load_all_donhang_2($iduser);
            $load_all_donhang_3 = load_all_donhang_3($iduser);
            $load_all_donhang_4 = load_all_donhang_4($iduser);
            include "view/order/theodoi_donhang.php";
            break;


            function load_all_donhang($start_record,$records_per_page)
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
     $total_records_sql = $search_sql; // No LIMIT for counting total records
     $load_all_donhang = pdo_query($sql);
     $total_records = count(pdo_query($total_records_sql));
     return ['data' => $load_all_donhang, 'total_records' => $total_records];
}

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
                include "view/camon.php";
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
        $load_bill_after_buy = load_bill_after_buy($id_hoadon);
        $load_bill_detail = load_bill_detail($id_hoadon);
        include "view/camon.php";
    }
    break;


    <div class="product__pagination">
                    <?php
                    if ($total_pages > 1) {
                        $pagination_params['page'] = $page;

                        if ($page > 1) {
                            $pagination_params['page'] = $page - 1;
                            echo '<a href="index.php?act=cuahang&' . http_build_query($pagination_params) . '"><i class="fa fa-long-arrow-left"></i></a>';
                        }

                        for ($i = 1; $i <= $total_pages; $i++) {
                            $pagination_params['page'] = $i;
                            echo '<a href="index.php?act=cuahang&' . http_build_query($pagination_params) . '" ' . ($page == $i ? 'class="active"' : '') . '>' . $i . '</a>';
                        }

                        if ($page < $total_pages) {
                            $pagination_params['page'] = $page + 1;
                            echo '<a href="index.php?act=cuahang&' . http_build_query($pagination_params) . '"><i class="fa fa-long-arrow-right"></i></a>';
                        }
                    }
                    ?>
                </div>
