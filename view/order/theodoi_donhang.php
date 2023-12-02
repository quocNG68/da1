<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    .row-top_content_item_full {
        margin-bottom: 8px;
        background-color: #fff;
        /* Set background color to white */
        padding: 16px;
        /* Add padding for spacing and to separate content from the border */
        border: 2px solid rgb(221, 221, 221);
        /* Add border for better separation */
        border-radius: 8px;
        /* Add border radius for rounded corners */
    }

    .row-top_content_item_full:last-child {
        margin-bottom: 0;
    }

    .row-top_content_item_row {
        display: flex;
        justify-content: space-between;
    }

    .row-top_content_item_full:last-child {
        margin-bottom: 0;
    }

    .row-top_title {
        background-color: #f5f5f5;
    }

    .row-top_title ul.row-top_title-infor {
        display: flex;
        justify-content: center;
        gap: 40px;
        align-items: center;
        font-size: 18px;
        list-style: none;
        padding: 10px;
    }

    .row-top_title {
        position: relative;
    }

    .row-top_title-infor {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .row-top_title-infor li {
        margin-right: 20px;
        padding-bottom: 10px;
        cursor: pointer;
        position: relative;
    }

    .row-top_title-infor li:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 5px;
        border-radius: 3px;
        background-color: transparent;
        /* Set the initial color to transparent */
        transition: background-color 0.3s ease;

        /* Add transition for a smoother effect */
    }

    .row-top_title-infor li.active:after {
        background-color: #7fad39;
        /* Replace with the desired color */
    }

    .row-top_content_item.active {
        display: block;
    }

    .row-top_content {
        margin: 20px 0;
        background-color: #f5f5f5;
    }

    .row-top_content_item {
        display: none;
    }

    .row-top_content_item_row {
        display: flex;
        justify-content: space-between;
        padding: 16px;
        border-bottom: 1px solid rgb(221, 221, 221);
    }



    .infor_item-right .price {
        display: flex;
        gap: 8px;
    }

    .infor_item-right .price .price__old {
        font-size: 14px;
        text-decoration: line-through;
    }

    .infor_item-right .price .price__new {
        font-size: 16px;
        font-weight: 550;
        color: #7fad39;
    }

    .infor_item-left {
        display: flex;
        gap: 8px;
    }

    .row-top_content_item_full .thanhtien {
        display: flex;
        justify-content: space-between;

    }

    .row-top_content_item_full .thanhtien .thanhtien_item {
        padding-right: 16px;

    }

    p.status {
        color: green;
        font-weight: 600;
        font-size: 19px;
    }

    .row-top_content_item_full .thanhtien .thanhtien_item p {
        font-size: 19px;

        color: red;
    }

    .row-top_title-infor li {
        margin-right: 20px;
        padding-bottom: 10px;
        cursor: pointer;
        position: relative;
        display: flex;
        align-items: center;
        /* Center the content vertically */
    }

    .infor_item p {
        width: 90%;
    }

    .row-top_title-infor li .count {
        border-radius: 50%;
        /* Make it a circle */
        background-color: #7fad39;
        /* Background color of the circle */
        color: #fff;
        /* Text color */
        width: 19px;
        /* Set width */
        height: 19px;
        /* Set height */
        display: flex;
        align-items: center;
        /* Center the content horizontally */
        justify-content: center;
        /* Center the content vertically */
        position: absolute;
        top: 0;
        right: -19px;
        font-size: 12px;
        /* Adjust font size as needed */
    }
</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Đơn hàng của tôi</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Đơn hàng của tôi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section style="margin: 16px;" class="status_order">
    <div style="width: 900px;" class="container">
        <form style="text-align: right; margin:8px 0;" action="index.php?act=theodoi_donhang" method="POST">
            <input style="padding: 5px; border-radius:3px;border:1px solid #7fad39;" type="text" name="keyword" placeholder="Tìm kiếm đơn hàng ...">
            <button style="background:#7fad39; padding: 5px; border-radius:3px;border:1px solid #7fad39;color:white" name="search_order">Tìm kiếm</button>
        </form>
        <div class="row">
            <div class="col-lg-12">
                <div class="row-top_title">
                    <ul class="row-top_title-infor">
                        <li class="active"><span>Tất cả</span>

                        </li>
                        <li><span>Chờ xác nhận</span>
                            <?php
                            if (count($load_all_donhang_1) == 0) {
                            } else {
                            ?>
                                <div class="count">
                                    <?php
                                    echo  count($load_all_donhang_1);
                                    ?>
                                </div>

                            <?php

                            }
                            ?>
                        </li>
                        <li><span>Đã xác nhận</span>
                            <?php
                            if (count($load_all_donhang_2) == 0) {
                            } else {
                            ?>
                                <div class="count">
                                    <?php
                                    echo  count($load_all_donhang_2);
                                    ?>
                                </div>

                            <?php

                            }
                            ?>
                        </li>
                        <li><span>Đang giao</span>
                            <?php
                            if (count($load_all_donhang_3) == 0) {
                            } else {
                            ?>
                                <div class="count">
                                    <?php
                                    echo  count($load_all_donhang_3);
                                    ?>
                                </div>

                            <?php

                            }
                            ?>
                        </li>
                        <li><span>Hoàn thành</span>
                            <?php
                            if (count($load_all_donhang_4) == 0) {
                            } else {
                            ?>
                                <div class="count">
                                    <?php
                                    echo  count($load_all_donhang_4);
                                    ?>
                                </div>

                            <?php

                            }
                            ?>
                        </li>
                    </ul>
                    <div class="line"></div>
                </div>

                <div class="row-top_content">
                    <div class="row-top_content_item active">

                        <?php
                        if (empty($load_all_donhang)) {
                        ?>
                            <div style="text-align:center" class="non_order">
                                <div style="padding: 16px;" class="non_order_item">
                                    <img src="./public/img/khong_thay_don_hang.png" alt="">
                                    <h5>Chưa có đơn hàng</h5>
                                </div>
                            </div>
                            <?php
                        } else {
                            foreach ($load_all_donhang as $value) {
                            ?>
                                <div class="row-top_content_item_full">

                                    <div class="row-top_content_item_row">

                                        <div class="infor_item-left">
                                            <img style="width:100px;height:100px" src="./upload/<?= $value['img'] ?>" alt="">
                                            <div class="infor_item">
                                                <p>Đã mua ngày: <?= $value['ngaymua'] ?></p>
                                                <span><?= $value['name'] ?></span>
                                                <br>
                                                <span>x<?= $value['amount_sp_hoadon'] ?></span>
                                            </div>
                                        </div>


                                        <div class="infor_item-center">
                                            <p class="infor_item-center_method">Phương thức thanh toán: <?= $value['phuongthuc_thanhtoan'] ?></p>
                                            <p class="infor_item-center_madonhang">Mã đơn hàng: <?= $value['ma_don_hang'] ?></p>
                                            <p class="infor_item-center_madonhang">Người nhận: <?= $value['nguoinhan'] ?><br><?= $value['phone_nguoinhan'] ?><br><?= $value['diachi_nguoinhan'] ?></p>

                                        </div>


                                        <div class="infor_item-right">
                                            <p class="status"><?= $value['tentrangthai'] ?></p>
                                            <div class="price">
                                                <!-- <p class="price__old">128.000vnd</p> -->
                                                <p class="price__new"><?= number_format($value['price'], 3, ',', '.') ?>VNĐ</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="thanhtien">
                                        <div></div>
                                        <div class="thanhtien_item">

                                            <p>Thành tiền: <?= number_format($value['price_sp_hoadon'] * $value['amount_sp_hoadon'], 3, ',', '.') ?>VNĐ</p>

                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row-top_content_item">
                        <?php
                        if (empty($load_all_donhang_1)) {
                        ?>
                            <div style="text-align:center" class="non_order">
                                <div style="padding: 16px;" class="non_order_item">
                                    <img src="./public/img/khong_thay_don_hang.png" alt="">
                                    <h5>Chưa có đơn hàng</h5>
                                </div>
                            </div>
                            <?php
                        } else {
                            foreach ($load_all_donhang_1 as $value) {
                            ?>
                                <div class="row-top_content_item_full">

                                    <div class="row-top_content_item_row">

                                        <div class="infor_item-left">
                                            <img style="width:100px;height:100px" src="./upload/<?= $value['img'] ?>" alt="">
                                            <div class="infor_item">
                                                <p>Đã mua ngày: <?= $value['ngaymua'] ?></p>
                                                <span><?= $value['name'] ?></span>
                                                <br>
                                                <span>x<?= $value['amount_sp_hoadon'] ?></span>
                                            </div>
                                        </div>


                                        <div class="infor_item-center">
                                            <p class="infor_item-center_method">Phương thức thanh toán: <?= $value['phuongthuc_thanhtoan'] ?></p>
                                            <p class="infor_item-center_madonhang">Mã đơn hàng: <?= $value['ma_don_hang'] ?></p>
                                        </div>


                                        <div class="infor_item-right">
                                            <p class="status"><?= $value['tentrangthai'] ?></p>
                                            <div class="price">
                                                <!-- <p class="price__old">128.000vnd</p> -->
                                                <p class="price__new"><?= number_format($value['price'], 3, ',', '.') ?>VNĐ</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="thanhtien">
                                        <div></div>
                                        <div class="thanhtien_item">
                                            <p>Thành tiền: <?= number_format($value['price_sp_hoadon'] * $value['amount_sp_hoadon'], 3, ',', '.') ?>VNĐ</p>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row-top_content_item">
                        <?php
                        if (empty($load_all_donhang_2)) {
                        ?>
                            <div style="text-align:center" class="non_order">
                                <div style="padding: 16px;" class="non_order_item">
                                    <img src="./public/img/khong_thay_don_hang.png" alt="">
                                    <h5>Chưa có đơn hàng</h5>
                                </div>
                            </div>
                            <?php
                        } else {
                            foreach ($load_all_donhang_2 as $value) {
                            ?>
                                <div class="row-top_content_item_full">

                                    <div class="row-top_content_item_row">

                                        <div class="infor_item-left">
                                            <img style="width:100px;height:100px" src="./upload/<?= $value['img'] ?>" alt="">
                                            <div class="infor_item">
                                                <p>Đã mua ngày: <?= $value['ngaymua'] ?></p>
                                                <span><?= $value['name'] ?></span>
                                                <br>
                                                <span>x<?= $value['amount_sp_hoadon'] ?></span>
                                            </div>
                                        </div>


                                        <div class="infor_item-center">
                                            <p class="infor_item-center_method">Phương thức thanh toán: <?= $value['phuongthuc_thanhtoan'] ?></p>
                                            <p class="infor_item-center_madonhang">Mã đơn hàng: <?= $value['ma_don_hang'] ?></p>
                                        </div>


                                        <div class="infor_item-right">
                                            <p class="status"><?= $value['tentrangthai'] ?></p>
                                            <div class="price">
                                                <!-- <p class="price__old">128.000vnd</p> -->
                                                <p class="price__new"><?= number_format($value['price'], 3, ',', '.') ?>VNĐ</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="thanhtien">
                                        <div></div>
                                        <div class="thanhtien_item">
                                            <p>Thành tiền: <?= number_format($value['price_sp_hoadon'] * $value['amount_sp_hoadon'], 3, ',', '.') ?>VNĐ </p>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row-top_content_item">
                        <?php
                        if (empty($load_all_donhang_3)) {
                        ?>
                            <div style="text-align:center" class="non_order">
                                <div style="padding: 16px;" class="non_order_item">
                                    <img src="./public/img/khong_thay_don_hang.png" alt="">
                                    <h5>Chưa có đơn hàng</h5>
                                </div>
                            </div>
                            <?php
                        } else {
                            foreach ($load_all_donhang_3 as $value) {
                            ?>
                                <div class="row-top_content_item_full">

                                    <div class="row-top_content_item_row">

                                        <div class="infor_item-left">
                                            <img style="width:100px;height:100px" src="./upload/<?= $value['img'] ?>" alt="">
                                            <div class="infor_item">
                                                <p>Đã mua ngày: <?= $value['ngaymua'] ?></p>
                                                <span><?= $value['name'] ?></span>
                                                <br>
                                                <span>x<?= $value['amount_sp_hoadon'] ?></span>
                                            </div>
                                        </div>


                                        <div class="infor_item-center">
                                            <p class="infor_item-center_method">Phương thức thanh toán: <?= $value['phuongthuc_thanhtoan'] ?></p>
                                            <p class="infor_item-center_madonhang">Mã đơn hàng: <?= $value['ma_don_hang'] ?></p>
                                        </div>


                                        <div class="infor_item-right">
                                            <p class="status"><?= $value['tentrangthai'] ?></p>
                                            <div class="price">
                                                <!-- <p class="price__old">128.000vnd</p> -->
                                                <p class="price__new"><?= number_format($value['price'], 3, ',', '.') ?>VNĐ</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="thanhtien">
                                        <div></div>
                                        <div class="thanhtien_item">
                                            <p>Thành tiền: <?= number_format($value['price_sp_hoadon'] * $value['amount_sp_hoadon'], 3, ',', '.') ?>VNĐ </p>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row-top_content_item">
                        <?php
                        if (empty($load_all_donhang_4)) {
                        ?>
                            <div style="text-align:center" class="non_order">
                                <div style="padding: 16px;" class="non_order_item">
                                    <img src="./public/img/khong_thay_don_hang.png" alt="">
                                    <h5>Chưa có đơn hàng</h5>
                                </div>
                            </div>
                            <?php
                        } else {
                            foreach ($load_all_donhang_4 as $value) {
                            ?>
                                <div class="row-top_content_item_full">

                                    <div class="row-top_content_item_row">

                                        <div class="infor_item-left">
                                            <img style="width:100px;height:100px" src="./upload/<?= $value['img'] ?>" alt="">
                                            <div class="infor_item">
                                                <p>Đã mua ngày: <?= $value['ngaymua'] ?></p>
                                                <span><?= $value['name'] ?></span>
                                                <br>
                                                <span>x<?= $value['amount_sp_hoadon'] ?></span>
                                            </div>
                                        </div>


                                        <div class="infor_item-center">
                                            <p class="infor_item-center_method">Phương thức thanh toán: <?= $value['phuongthuc_thanhtoan'] ?></p>
                                            <p class="infor_item-center_madonhang">Mã đơn hàng: <?= $value['ma_don_hang'] ?></p>
                                        </div>


                                        <div class="infor_item-right">
                                            <p class="status"><?= $value['tentrangthai'] ?></p>
                                            <div class="price">
                                                <!-- <p class="price__old">128.000vnd</p> -->
                                                <p class="price__new"><?= number_format($value['price'], 3, ',', '.') ?>VNĐ</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="thanhtien">
                                        <div></div>
                                        <div class="thanhtien_item">
                                            <p>Thành tiền: <?= number_format($value['price_sp_hoadon'] * $value['amount_sp_hoadon'], 3, ',', '.') ?>.VNĐ </p>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>


            </div>
            <script>
                $(document).ready(function() {
                    $('.row-top_title-infor li').each(function() {
                        // Calculate the width of the text inside li
                        var textWidth = $(this).find('span').width(); // Assuming there's a span tag, adjust as needed

                        // Set the left position for the count div dynamically
                        $(this).find('.count').css('left', textWidth + 20); // Adjust the offset as needed
                    });
                });
            </script>
            <script>
                const $ = document.querySelector.bind(document);
                const $$ = document.querySelectorAll.bind(document);

                const tabs = $$('.row-top_title-infor li');
                const panes = $$('.row-top_content .row-top_content_item');

                const tabActive = $('.row-top_content .row-top_content_item.active');
                // const line = $('.row-top_title .line');

                // line.style.left = tabActive.offsetLeft + 'px';
                // line.style.width = tabActive.offsetWidth + 'px';

                tabs.forEach((tab, index) => {
                    const pane = panes[index];
                    console.log(pane)
                    tab.onclick = function() {
                        $('.row-top_title-infor li.active').classList.remove('active');
                        $('.row-top_content_item.active').classList.remove('active');

                        // line.style.left = this.offsetLeft + 'px';
                        // line.style.width = this.offsetWidth + 'px';

                        this.classList.add('active');
                        pane.classList.add('active');
                    };
                });
            </script>

        </div>

    </div>
</section>