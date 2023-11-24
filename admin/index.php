<?php
session_start();
ob_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/taikhoan.php";
include "../model/tinhtrang.php";
include "../model/sanpham.php";
include "../model/binhluan.php";
include "header.php";
include "sidebar.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

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
                $check = true;


                if (empty($namedm)) {
                    $check = false;
                    $err_namedm = 'Vui lòng không để trống';
                }
                if (empty($_FILES['image_danhmuc']['name'])) {
                    $check = false;
                    $err_imagedm = 'Không được để trống';
                }
                  else{
                  if($_FILES['image_danhmuc']['size'] > 1000000) {
                        $check = false;
                        $err_imagedm = 'Ảnh quá kích cỡ';
                    } else {


                        $filename = time() . basename($_FILES['image_danhmuc']['name']);
                        $target = '../upload/' . $filename;
                        if (move_uploaded_file($_FILES['image_danhmuc']['tmp_name'], $target)) {
                            adddm($namedm, $filename);
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
                    updatedm($id, $namedm, $_POST['old_image']);
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

                $check = true; // Assume everything is okay initially

                if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
                    $files = $_FILES['images'];
                    $filenames = $files['name'];

                    foreach ($filenames as $key => $value) {
                        if ($files['error'][$key] === UPLOAD_ERR_OK) {
                            // Check the size of each mô tả image (adjust the size limit as needed)
                            if ($files['size'][$key] > 1000000) { // Adjust the size limit (in bytes) as needed
                                $err_filenames = "Kích thước ảnh mô tả quá lớn. Vui lòng chọn ảnh nhỏ hơn.";
                                $check = false;
                                break; // Exit the loop if any mô tả image is too large
                            }
                            if (!is_valid_image($_FILES['image']['name'])) {
                                $err_filenames = "Định dạng ảnh không hợp lệ. Chỉ chấp nhận JPG, JPEG, PNG, hoặc GIF";
                                $check = false;
                            }
                            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                                // Check the size of the main image (adjust the size limit as needed)
                                if ($_FILES['image']['size'] > 1000000) { // Adjust the size limit (in bytes) as needed
                                    $err_filename = "Kích thước ảnh sản phẩm quá lớn. Vui lòng chọn ảnh nhỏ hơn.";
                                    $check = false;
                                } elseif (!is_valid_image($_FILES['image']['name'])) {
                                    $err_filename = "Định dạng ảnh không hợp lệ. Chỉ chấp nhận JPG, JPEG, PNG, hoặc GIF";
                                    $check = false;
                                } else {
                                    $filename = time() . basename($_FILES['image']['name']);
                                    $target = "../upload/" . $filename;
                                    move_uploaded_file($_FILES['image']['tmp_name'], $target);
                                }
                            }
                            // Continue with other checks and image insertion
                            // ...
                        }
                    }

                    if ($check) {
                        // All checks passed, now call the addsp function to insert the product
                        addsp($namesp, $price, $price_saleoff, $filename, $mota_short, $mota_long, $status, $xuatxu, $trongluong, $soluong, $danhmuc, $date);
                        $id_product = $conn->lastInsertId();

                        // Now, insert image details into the database
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
                            // Everything is successful, redirect to the desired page
                            header("location: index.php?act=addsp");
                        }
                    }
                } else {
                    $err_filenames = "Vui lòng chọn ảnh mô tả";
                    $check = false;
                }

                // If $check is false at this point, there was an issue, and you can handle it as needed.

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
            // $page = isset($_GET['page']) ? $_GET['page']:1;
            $start_record = ($page - 1) * $records_per_page;

            // echo $start_record;
            // exit;

            $search_result = search_sanpham_keyword_iddm($keyword, $danhmuc_search, $start_record, $records_per_page, '');

            $search_sanpham_keyword_iddm = $search_result['data'];
            // echo "<pre>";
            // print_r($search_sanpham_keyword_iddm);
            // echo "</pre>";
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
            // $total_pages ='';
            // $img = '';
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
                    if (!is_valid_image($_FILES['image']['name']) || $_FILES['image']['size'] > 1000000) {
                        if ($_FILES['image']['size'] > 1000000) {
                            setcookie('err_image', 'Lỗi: Kích thước ảnh sản phẩm quá lớn. Vui lòng chọn ảnh nhỏ hơn', time() + 1, '/');
                        }
                        if (!is_valid_image($_FILES['image']['name'])) {
                            setcookie('err_image', 'Lỗi: Định dạng ảnh mô tả không hợp lệ. Chỉ chấp nhận JPG, JPEG, PNG, hoặc GIF', time() + 1, '/');
                        }
                        // Redirect back to the form to display errors
                        header('location:' . $_SERVER['HTTP_REFERER']);
                        exit();
                    } else {
                        setcookie('err_image', '', time() - 1, '/');
                    }

                    if ($check) {
                        $filename = time() . basename($_FILES['image']['name']);
                        $target_file = "../upload/" . $filename;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    }

                    if (!$check) {
                        // Handle the error, for example, redirect to an error page
                        header('location:' . $_SERVER['HTTP_REFERER']);
                        exit();
                    }
                }

                // ...

                if ($check) {
                    // Continue with other updates
                    update_sanpham($id, $namesp, $price, $price_saleoff, $filename, $mota_short, $mota_long, $status, $xuatxu, $trongluong, $soluong, $danhmuc);

                    // Handle image insertion and deletion
                    // ...

                    // Handle image insertion and deletion
                    if (isset($_FILES['images'])) {
                        $files = $_FILES['images'];
                        $filenames = $files['name'];

                        if (!empty(array_filter($filenames))) {
                            // Initialize an array to store the names of new images
                            $new_images = [];

                            // Process images
                            foreach ($filenames as $key => $value) {
                                if (!empty($value)) {
                                    // Check the size and format of each image
                                    if ($files['size'][$key] > 500000) { // Adjust the limit as needed
                                        setcookie('err_images', 'Kích thước ảnh ' . $value . ' quá lớn', time() + 36000, '/');
                                        // Redirect back to the form to display errors
                                        header('location:' . $_SERVER['HTTP_REFERER']);
                                        exit();
                                    } elseif (!is_valid_image($value)) {
                                        setcookie('err_images', 'Định dạng ảnh mô tả ' . $value . ' không hợp lệ. Chỉ chấp nhận JPG, JPEG, PNG, hoặc GIF', time() + 1, '/');
                                        // Redirect back to the form to display errors
                                        header('location:' . $_SERVER['HTTP_REFERER']);
                                        exit();
                                    } else {
                                        // Process the current image
                                        $file_path = '../upload/' . $value;

                                        // Move the uploaded file
                                        move_uploaded_file($files['tmp_name'][$key], $file_path);

                                        // Insert the image into the database
                                        $new_images[] = $value;
                                        echo 'Processed image: ' . $value . '<br>';
                                    }
                                }
                            }

                            // Delete old images associated with the product
                            del_image_mota_after_upload($id);

                            // Insert new images into the database
                            foreach ($new_images as $new_image) {
                                $query_insert = "INSERT INTO duan1.image_mota(id_pro_img,img_thum) values ('$id','$new_image')";
                                $result = $conn->query($query_insert);

                                if (!$result) {
                                    setcookie('err_images', 'Lỗi cập nhật ảnh ' . $new_image, time() + 36000, '/');
                                    // Redirect back to the form to display errors
                                    header('location:' . $_SERVER['HTTP_REFERER']);
                                    exit();
                                }
                            }
                        }
                    }

                    // ...

                    // No errors, clear error cookies and redirect



                    // No errors, clear error cookies and redirect
                    setcookie('err_image', '', time() - 36000, '/');
                    setcookie('err_images', '', time() - 36000, '/');
                    header("location: index.php?act=listsp");
                    exit();
                }
            }
            $load_name_danhmuc = load_name_danhmuc();
            // $search_result = search_sanpham_keyword_iddm('','',0,0);
            $load_all_danhmuc = load_all_danhmuc();
            // $search_sanpham_keyword_iddm = search_sanpham_keyword_iddm('','',0);
            $load_all_name_tinhtrang = load_all_name_tinhtrang();
            $load_all_image_mota = load_all_image_mota();
            header("location: index.php?act=listsp");
            // include 'sanpham/listsp.php';
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
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
};
include "footer.php";
