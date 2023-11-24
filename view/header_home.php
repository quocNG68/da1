<?php

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organic | Green cửa hàng chuyên bán hoa quả tươi</title>



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
                <img src="/duan1/public/img/language.png" alt="">
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
                    <a href="index.php?act=taikhoan"><i class="fa fa-user"></i>Xin chào: <?= $username ?></a>
                    <a href="index.php?act=logout">Đăng xuất</a>
                    <?php

                    if ($role == 1) {
                    ?>
                        <a href="duan1/admin"><i class="fa fa-user"></i>Quản lý admin</a>
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
                    </ul>
                </li>
                <li><a href="index.php?act=sanpham">Sản phẩm</a>

                </li>
                <li><a href="index.php?act=giohang">Chúng tôi</a></li>
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
                                </img src="/duan1/public/img/language.png" alt="">
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
                                        <a href="/duan1/admin/index.php"><i class="fa fa-user"></i>Quản lý admin</a>
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

                                </ul>
                            </li>
                            <li><a href="index.php?act=list_cart">Giỏ hàng</a></li>
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
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
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
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <ul>
                            <?php
                            if (isset($load_all_danhmuc)) {
                                foreach ($load_all_danhmuc as $value) {
                                    extract($value);
                                    echo '<li><a href="index.php?act=cuahang&iddm=' . $id . '">' . $name . '</a></li>';
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
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="hidden" name="page" value="<?= isset($_GET['page']) ? $_GET['page'] : 1 ?>">
                                <input type="text" placeholder="Bạn cần gì ..." name="keyword" id="searchKeyword">
                                <button type="submit" name="search" class="site-btn">SEARCH</button>
                                

                            </form>
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
                    <div class="hero__item set-bg" data-setbg="/duan2/public/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->