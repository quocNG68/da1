

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php
                if (isset($load_all_danhmuc)) {
                    foreach ($load_all_danhmuc as $value) {
                        extract($value);
                        echo '
                        <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="../duan2/upload/' . $img . '">
                            <h5><a href="index.php?act=cuahang&iddm='.$id.'">' . $name . '</a></h5>
                        </div>
                    </div>
                        ';
                    }
                }
                ?>

               
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản Phẩm Giá Tốt</h2>
                </div>
                <div class="featured__controls">
                   
                </div>
            </div>
        </div>
        <div class="row featured__filter">
    <?php
    $load_sp_giatot = load_sp_giatot();
    foreach ($load_sp_giatot as $product) {
        extract($product);
        $price1 = $price - $price_saleoff;
    ?>
 
    <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $id ?>">
        <div class="featured__item">
       
            <div class="featured__item__pic set-bg" data-setbg="../duan2/upload/<?= $img ?>">
                <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a data-id="<?= $id ?>" onclick="addToCart(<?= $id ?>,<?= $iduser  ?>)"><i class="fa fa-shopping-cart"></i></a></li>

                </ul>
            </div>
         
            <div class="featured__item__text">
                <h6><a href="index.php?act=chitietsanpham&id=<?= $id ?>"><?= $name ?></a></h6>
                <h5>$<?= number_format($price1,3, '.',',').'VNĐ'; ?></h5>
            </div>
        </div>
    
    </div>

    <?php
    }
    ?>
</div>



    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="view/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="view/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Lượt xem nhiều nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <?php
                        if (isset($load_sp_luotxem)) {
                            $productChunks = array_chunk($load_sp_luotxem, 3); // Split products into groups of 3
                            foreach ($productChunks as $productGroup) {
                                echo '<div class="latest-prdouct__slider__item">';
                                foreach ($productGroup as $value) {
                                    extract($value);
                                    $price1 = $price - $price_saleoff;
                                    echo '
                                    <a href="index.php?act=chitietsanpham&id='.$id.'">
                <div class="latest-product__item">
                    <div class="latest-product__item__pic">
                        <img src="../duan2/upload/' . $img . '" alt="">
                    </div>
                    <div class="latest-product__item__text">
                        <h6>' . $name . '</h6>
                        <span>' . number_format($price1,3, '.', ',') . 'VNĐ</span>
                    </div>
                </div>
                </a>
                ';
                                }
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm mới nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <?php
                        if (isset($load_sp_moinhat)) {
                            $productChunks_moinhat = array_chunk($load_sp_moinhat, 3); // Split products into groups of 3
                            foreach ($productChunks_moinhat as $productGroup_moinhat) {
                                echo '<div class="latest-prdouct__slider__item">';
                                foreach ($productGroup_moinhat as $value) {
                                    extract($value);
                                    $price1 = $price - $price_saleoff;
                                    echo '
                                    <a href="index.php?act=chitietsanpham&id='.$id.'">
                <div class="latest-product__item">
                    <div class="latest-product__item__pic">
                        <img  src="../duan2/upload/' . $img . '" alt="">
                    </div>
                    <div class="latest-product__item__text">
                        <h6>' . $name . '</h6>
                        <span>' . number_format($price1,3, '.', ',') . 'VNĐ</span>
                    </div>
                </div>
                </a>
                ';
                                }
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm yêu thích</h4>
                    <div class="latest-product__slider owl-carousel">
                        <?php
                        if (isset($load_sp_yeuthich)) {
                            $productChunks_yeuthich = array_chunk($load_sp_yeuthich, 3); // Split products into groups of 3
                            foreach ($productChunks_yeuthich as $productGroup_yeuthich) {
                                echo '<div class="latest-prdouct__slider__item">';
                                foreach ($productGroup_yeuthich as $value) {
                                    extract($value);
                                    $price1 = $price - $price_saleoff;
                                    echo '
                                    <a href="index.php?act=chitietsanpham&id='.$id.'">
                <div class="latest-product__item">
                    <div class="latest-product__item__pic">
                        <img  src="../duan2/upload/' . $img . '" alt="">
                    </div>
                    <div class="latest-product__item__text">
                        <h6>' . $name . '</h6>
                        <span>' . number_format($price1,3, '.', ',') . 'VNĐ</span>
                    </div>
                </div>
                </a>
                ';
                                }
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
           
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <script>
       let totalProduct; // declare totalProduct globally

       $(document).ready(function() {
           totalProduct = document.getElementById('totalProduct');
       });

       function addToCart(productId, product_iduser) {

           $.ajax({
               type: 'POST',
               url: 'view/ajax/addTocart.php',
               data: {
                   id: productId,
                   iduser: product_iduser,

               },
               success: function(response) {
                   console.log(response);
                   totalProduct.innerHTML = response;
                   if(!product_iduser){
                    alert("Lỗi");

                }else{
                    
                    alert("Thành công");
                   }
          
               },
               error: function(error) {
                   console.log(error);
               }
           });
       }
   </script>

