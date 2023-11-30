<section class="breadcrumb-section set-bg" data-setbg="public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Chi tiết sản phẩm</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <?php
                        if (isset($load_one_sanpham)) {
                            extract($load_one_sanpham);
                            echo '
                                <img class="product__details__pic__item--large"
                                src="../duan2/upload/' . $img . '" alt="">
                                ';
                        }

                        ?>

                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <?php
                        if (isset($load_one_anh_mota) && is_array($load_one_anh_mota)) {
                            foreach ($load_one_anh_mota as $value) {


                                extract($value);
                                echo '
                            <img data-imgbigurl="../duan2/upload/' . $img_thum . '" src="../duan2/upload/' . $img_thum . '" alt="">

                            ';
                            }
                        }
                        ?>

                    </div>

                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <?php
                if (isset($load_one_sanpham)) {
                    extract($load_one_sanpham);
                    $price1 = $price - $price_saleoff;

                ?>

                    <div class="product__details__text">
                        <h3><?= $name ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>

                        <div class="product__details__price">
                            <h3><?=  number_format($price1,3, '.', ',') ?>VNĐ</h3>
                            <p>Giá gốc : <?=  number_format($price,3, '.', ',') ?>VNĐ</p>
                        </div>
                        <p><?= $mota_short ?></p>
                        <p style="color: red;" id="errAmount"></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <span style="border:none;outline:none;" type="button" onclick="remote('-')" class="dec qtybtn">-</span>
                                    <input name="soluong" type="text" class="amount__flex" id="amount__flex" min="1" max="<?= $soluong ?>" value="1">
                                    <span style="border:none;outline:none;" type="button" onclick="remote('+')" class="inc qtybtn">+</span>
                                </div>
                                <script>

                                </script>
                            </div>



                        </div>
                        <?php
                        if ($tinhtrang == 'Còn hàng') {
                        ?>

                            <?php
                            if (isset($_SESSION['success_login'])) {
                                // extract($_SESSION['success_login']);
                            }
                            ?>
                            <button style="border:none;outline:none;" type="button" onclick="addToCart(<?= $id ?>,<?= $iduser ?> , $('#amount__flex').val())" class="inc qtybtn">Thêm vào giỏ hàng</button>
                            <!-- Add this div for the success message -->
                            <div id="successMessage" style="display: none;" class="alert alert-success">Sản phẩm đã được thêm vào giỏ hàng thành công!</div>

                        <?php



                        }

                        ?>

                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Tình trạng</b>
                                <?php if ($tinhtrang == 'Còn hàng') {
                                ?>
                                    <span style="color: green;"><?= $tinhtrang ?></span>
                            </li>

                        <?php
                                } else {
                        ?>
                            <span style="color: red;"><?= $tinhtrang ?></span></li>
                        <?php
                                }
                        ?>
                        <li><b>Xuất xứ</b> <span><?= $xuatxu ?></span></li>
                        <li><b>Trọng lượng</b> <span><?= $trongluong ?></span></li>
                        <li><b>Danh mục</b> <span><?= $tendanhmuc ?></span></li>
                        </ul>
                    </div>
                    </form>
                <?php
                }
                ?>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Bình luận</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <p>
                                    <?= $mota_long; ?>
                                </p>

                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $("#comment").load("view/binhluan/binhluan_form.php", {
                                            idpro: <?= $id ?>

                                        });
                                    });
                                </script>
                                <div class="mb " id="comment">


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản Phẩm Liên Quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($load_sp_samedm) && is_array($load_sp_samedm)) {
                foreach ($load_sp_samedm as $value) {
                    extract($value);
                    $price1 = $price - $price_saleoff;
            ?>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="../duan2/upload/<?= $img ?>">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="index.php?act=chitietsanpham&id=<?= $id ?>"><?= $name ?></a></h6>
                                <h5><?=  number_format($price1,3, '.', ',')   ?>VNĐ</h5>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    let totalProduct; // declare totalProduct globally

    $(document).ready(function() {
        totalProduct = document.getElementById('totalProduct');
    });

    function addToCart(productId, product_iduser, quantity) {
        $.ajax({
            type: 'POST',
            url: 'view/ajax/add_cart_detail.php',
            data: {
                id: productId,
                iduser: product_iduser,
                quantity: quantity, // Include quantity in the data
            },
            success: function(response) {
                console.log(response);
                totalProduct.innerHTML = response;
                alert("Bạn đã thêm vào giỏ hàng thành công");
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>


<script>
    function showSuccessMessage() {
        document.getElementById('successMessage').style.display = 'block';
        // You can customize the display duration or add a close button as needed
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000); // 3000 milliseconds = 3 seconds
    }
</script>