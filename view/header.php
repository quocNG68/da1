<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/duan1/public/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/duan1/public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/duan1/public/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/duan1/public/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/duan1/public/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/duan1/public/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/duan1/public/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/duan1/public/css/style.css" type="text/css">
    <link rel="stylesheet" href="/duan1/public/css/bootstrap.min.css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php?act=home"><img src="public/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <?php
                if (isset($_SESSION['success_login']) && is_array($_SESSION['success_login'])) {
                    extract($_SESSION['success_login']);
                ?>
                    <a href="index.php?act=taikhoan"><i class="fa fa-user"></i>Xin chào: <?= $user_infor['username'] ?></a>
                    <a href="index.php?act=logout">Đăng xuất</a>
                    <?php

                    if ($user_infor['role'] == 1) {
                    ?>
                        <a href="/duan2/admin/index.php"><i class="fa fa-user"></i>Quản lý admin</a>
                    <?php
                    }
                } else {
                    ?>

                    <a href="index.php?act=login"><i class="fa fa-user"></i>Đăng nhập</a>
                <?php
                }
                ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php?act=home">Trang chủ</a></li>
                <li><a href="index.php?act=cuahang">Cửa hàng</a>
                    <ul class="header__menu__dropdown">
                        <?php
                        if (isset($load_all_danhmuc)) {
                            foreach ($load_all_danhmuc as $value) {
                                extract($value);
                                echo '
                                <li><a href="index.php?act=cuahang&iddm=' . $id . '">' . $name . '</a></li>
                                ';
                            }
                        }

                        ?>
                        <!-- <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li> -->
                    </ul>
                </li>
                <li><a href="index.php?act=sanpham">Sản phẩm</a>

                </li>
                <li><a href="index.php?act=giohang&iduser=<?= $_SESSION['success_login']['iduser'] ?>">Chúng tôi</a></li>
                <li><a href="index.php?act=gioithieu">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                </img src="view/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <?php
                                if (isset($_SESSION['success_login'])) {

                                ?>
                                    <a href="index.php?act=taikhoan"><i class="fa fa-user"></i>Xin chào: <?= $user_infor['username'] ?></a>
                                    <a href="index.php?act=logout">Đăng xuất</a>
                                    <?php

                                    if ($user_infor['role'] == 1) {
                                    ?>
                                        <a href="/duan2/admin/index.php"><i class="fa fa-user"></i>Quản lý admin</a>
                                    <?php
                                    }
                                } else {
                                    ?>

                                    <a href="index.php?act=login"><i class="fa fa-user"></i>Đăng nhập</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php?act=home"><img src="public/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php?act=home">Trang chủ</a></li>
                            <li><a href="index.php?act=list_cart">Giỏ hàng</a></li>
                            <li><a href="index.php?act=cuahang">Cửa hàng</a>

                                <ul class="header__menu__dropdown">
                                    <?php
                                    if (isset($load_all_danhmuc)) {
                                        foreach ($load_all_danhmuc as $value) {
                                            extract($value);
                                            echo '
                                <li><a href="index.php?act=cuahang&iddm=' . $id . '">' . $name . '</a></li>
                                ';
                                        }
                                    }

                                    ?>
                                    <!-- <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li> -->
                                </ul>
                            </li>
                            <li><a href="index.php?act=sanpham">Sản phẩm</a>

                            </li>
                            <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li class="cart-icon-container">
                                <a href="index.php?act=list_cart"><i class="fa fa-shopping-bag"></i> <span id="totalProduct"><?= isset($load_all_cart)?count($load_all_cart):0 ?></span></a>
                                <i class="fa-solid fa-caret-down"></i>
                                <div class="cart-dropdown">
                                    <!-- Nội dung giỏ hàng dropdown ở đây -->

                                    <div class="cart_dropdown_item">
                                        <?php
                                        if (isset($load_cart_view_icon)) {
                                            foreach ($load_cart_view_icon as $value) {
                                                extract($value);
                                                $price1 = $price-$price_saleoff;
                                        ?>
                                        <a href="index.php?act=chitietsanpham&id=<?= $idpro ?>">

                                                <div class="cart_dropdown_item__cart">

                                                    <img width="70px" src="./upload/<?= $img ?>" alt="">
                                                    <p class="name"><?= $name ?></p>
                                                    <p class="price"><?= '$'.number_format($price1, 2, '.', ',') ?></p>
                                                </div>
                                                </a>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </div>

                                </div>
                            </li>
                            <li><a href="index.php?act=theodoi_donhang"><i class="fa-solid fa-rectangle-list"></i></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <style>
        .cart-icon {
            position: relative;
        }

        .header__cart ul {
            position: relative;
        }

        .fa-caret-down {
            position: absolute;
            font-size: 45px;
            top: 8px;
            color: black;
            right: -12px;
            color: #fff;
            transform: rotate(180deg);
        }
        .cart_dropdown_item a{
            text-decoration: none;
        }

        .cart-icon ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .cart-icon li {
            margin-right: 20px;
            position: relative;
        }

        .cart-icon a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
        }

        .cart-dropdown {
            /* left: -62px; */
            right: -85px;
            top: 35px;
            /* left: -170px; */
            position: absolute;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            padding: 5px;
            min-width: 300px;
            z-index: 1;
        }

        .cart-dropdown:hover,
        .cart-icon-container:hover .cart-dropdown {
            display: block;
        }

        .cart_dropdown_item {
            padding: 5px 0;
        }

        .cart_dropdown_item__cart:hover {
            background-color: #f1f1f1;
        }

        .cart_dropdown_item__cart {
            display: flex;
            padding: 5px 0;
            justify-content: space-between;
        }

        .cart_dropdown_item__cart p {
            font-size: 14px;
        }
        .cart_dropdown_item__cart p.name{
            padding-right: 75px;
        }
      

        .cart_dropdown_item__cart p.price {
            color: #7fad39;
            padding-left: 8px;
        }

        .cart-icon-container__noi {
            width: 30px;
        }
    </style>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <ul class="header__menu__dropdown">
                            <?php
                            if (isset($load_all_danhmuc)) {
                                foreach ($load_all_danhmuc as $value) {
                                    extract($value);
                                    echo '
                                <li><a href="index.php?act=cuahang&iddm=' . $id . '">' . $name . '</a></li>
                                ';
                                }
                            }

                            ?>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="index.php?act=cuahang" method="get" onsubmit="return saveSearchKeyword()">
                                <input type="hidden" id="act" name="act" value="cuahang">
                                <input type="hidden" name="page" value="<?= isset($_GET['page']) ? $_GET['page'] : 1 ?>">
                                <input type="text" placeholder="Bạn cần gì ..." name="keyword" id="searchKeyword">
                                <button type="submit" name="search" class="site-btn">SEARCH</button>
                            </form>
                            <script>
                                function saveSearchKeyword() {
                                    var keyword = document.getElementById("searchKeyword").value;
                                    var page = document.querySelector('input[name="page"]').value;
                                    localStorage.setItem("searchKeyword", keyword);
                                    localStorage.setItem("currentPage", page);
                                    return true;
                                }

                                window.onload = function() {
                                    var savedKeyword = localStorage.getItem("searchKeyword");
                                    var savedPage = localStorage.getItem("currentPage");
                                    if (savedKeyword !== null) {
                                        document.getElementById("searchKeyword").value = savedKeyword;
                                    }
                                    if (savedPage !== null) {
                                        document.querySelector('input[name="page"]').value = savedPage;
                                    }
                                };
                            </script>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->