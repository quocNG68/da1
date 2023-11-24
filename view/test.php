<div class="product__pagination">
    <?php
    if ($total_pages > 1) {
        if ($page > 1) {
            echo '<a href="index.php?act=cuahang&page=' . ($page - 1) . '&' . http_build_query(['sorting' => $sorting, 'iddm' => $iddm, 'start' => $start, 'end' => $end, 'keyword' => $keyword]) . '"><i class="fa fa-long-arrow-left"></i></a>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<a href="index.php?act=cuahang&page=' . $i . '&' . http_build_query(['sorting' => $sorting, 'iddm' => $iddm, 'start' => $start, 'end' => $end, 'keyword' => $keyword]) . '" ' . ($page == $i ? 'class="active"' : '') . '>' . $i . '</a>';
        }

        if ($page < $total_pages) {
            echo '<a href="index.php?act=cuahang&page=' . ($page + 1) . '&' . http_build_query(['sorting' => $sorting, 'iddm' => $iddm, 'start' => $start, 'end' => $end, 'keyword' => $keyword]) . '"><i class="fa fa-long-arrow-right"></i></a>';
        }
    }
    ?>
</div><?
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
INNER JOIN duan1.danhmuc ON sanpham.iddm = danhmuc.id where 1
"; // Thêm điều kiện WHERE và bắt đầu với 1 = 1



if ($iddm > 0) {
    $sql .= ' AND sanpham.iddm = ' . $iddm;
}

if ($start > 0) {
    $sql .= ' AND (sanpham.price - sanpham.price_saleoff) BETWEEN ' . $start . ' AND ' . $end;
}

if ($sorting === 'asc') {
    $sql .= ' ORDER BY (sanpham.price - sanpham.price_saleoff) ASC';
} elseif ($sorting === 'desc') {
    $sql .= ' ORDER BY (sanpham.price - sanpham.price_saleoff) DESC';
}
if ($keyword != '') {
    $sql .= ' WHERE sanpham.name LIKE "%' . $keyword . '%"';
}

    $sql .= " LIMIT $start_record, $records_per_page";
    // $sql .= " ORDER BY sanpham.id ASC";

    $search_sql = $sql;
    $total_records_sql = str_replace('LIMIT ' . $start_record . ', ' . $records_per_page, '', $sql); // Sửa ở đây

    $search_sanpham_keyword_view = pdo_query($search_sql);

    $total_records = count(pdo_query($total_records_sql));
    return ['data' => $search_sanpham_keyword_view, 'total_records' => $total_records];
}
<?
            $start = '';
            $end = '';

            if (isset($_POST['apdung'])) {
                $start = $_POST['start'];
                $end = $_POST['end'];

                if ($end <= $start) {
                    $err_loc = 'Vui lòng nhập đúng khoảng giá';
                    $check = false;
                }
            }

            $sorting = '';
            if (isset($_GET['sorting'])) {
                $sorting = $_GET['sorting'];
            }


            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
                $load_one_iddm = load_one_iddm($iddm);
            } else {
                $iddm = '';
            }

            // Xử lý tìm kiếm
            $keyword = '';
            if (isset($_POST['search'])) {
                $keyword = trim($_POST['keyword']);
                echo 'Keyword: ' . $keyword;  // Loại bỏ các khoảng trắng thừa


                $start_record = 0;

                // Chuyển thông tin sắp xếp và bộ lọc từ POST sang GET khi tìm kiếm
                $url = "index.php?act=cuahang";
                if ($iddm != '') {
                    $url .= "&iddm=$iddm";
                }
                if ($sorting != '') {
                    $url .= "&sorting=$sorting";
                }
                if ($start != '' && $end != '') {
                    $url .= "&start=$start&end=$end";
                }
                $url .= "&keyword=$keyword";
                header("Location: $url");
                exit();
            }


            $records_per_page = 3;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start_record = ($page - 1) * $records_per_page;

            $search_result_view = search_sanpham_keyword_view($iddm, $keyword, $start_record, $records_per_page, $start, $end, $sorting);
            $search_sanpham_keyword_view = $search_result_view['data'];

            $total_records = $search_result_view['total_records'];
            $total_pages = ceil($total_records / $records_per_page);

            $load_sp_giamgia = load_sp_giamgia();
            $load_sp_moinhat = load_sp_moinhat();
            $load_all_danhmuc = load_all_danhmuc();

            include 'view/cuahang.php';
            break;


            case "addTocart":
                if(isset($_POST['addTocart'])) {  
 
                    if ($user) {
                        $stateCheck = checkProCartBySizeColor($_POST['id_sanpham'],$_POST['size'],$_POST['color']);
    
                        if ($stateCheck) {
                            $amount = $stateCheck['amount'] + $_POST['amount__flex'];
                            updateCart($stateCheck['cart_id'], $amount);
                        } else {
                            add_cart($userID, $_POST['id_sanpham'], $_POST['amount__flex'], $_POST['size'], $_POST['color']);                   
                        }
    
                        $message = $_POST['id_sanpham'];
                        header("Location: index.php?action=chi-tiet-sanpham&detail_product={$_POST['id_sanpham']}&message=$message");
                        exit();
                    } else {
                        header('Location: index.php?action=login');
                        exit();
                    }
    
                }

                break;