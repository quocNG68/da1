   <!-- Product Section Begin -->
   <style>
       .product__pagination .active {
           background: #7fad39;
           color: white;

       }
   </style>
   <section class="product spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-3 col-md-5">
                   <div class="sidebar">

                   <div class="sidebar__item">
                           <h4>Khoảng giá</h4>
                           <div class="sidebar__item__size">
                               <form action="index.php?act=cuahang" method="get">
                                   <input type="hidden" id="act" name="act" value="cuahang">
                                   <div class="search_input">
                                       <input type="text" placeholder="$ Từ" name="start" value="">
                                       <input type="text" placeholder="$ Đến" name="end" value="">
                                   </div>
                                   <?php
                                    if (isset($err_loc)) {
                                    ?>
                                       <span style="color: red; font-size:13px;"><?= $err_loc ?></span>
                                   <?php
                                    }

                                    ?>



                                   <button name="apdung">Áp dụng</button>
                               </form>
                           </div>

                       </div>
                       <div class="sidebar__item">
                           <div class="latest-product__text">
                               <h4>Mới nhất</h4>
                               <?php
                                if (isset($load_sp_moinhat)) {
                                    $productChunks_moinhat = array_chunk($load_sp_moinhat, 3); // Split products into groups of 3
                                    foreach ($productChunks_moinhat as $productGroup_moinhat) {
                                        echo '<div class="latest-prdouct__slider__item">';
                                        foreach ($productGroup_moinhat as $value) {
                                            extract($value);
                                            $price1 = $price - $price_saleoff;
                                ?>
                                           <div class="latest-product__item">
                                               <div class="latest-product__item__pic">
                                                   <img style="width:125px;" src="../duan2/upload/<?= $img ?>" alt="">
                                               </div>
                                               <div class="latest-product__item__text">
                                                   <a href="index.php?act=chitietsanpham&id=<?= $id ?>">
                                                       <h6><?= $name ?></h6>
                                                   </a>
                                                   <span><?=  number_format($price1,3, '.', ',') . 'VNĐ' ?></span>
                                               </div>
                                           </div>
                               <?php
                                        }
                                        echo '</div>'; // Close the latest-prdouct__slider__item div
                                    }
                                }
                                ?>


                           </div>
                       </div>
                   </div>
               </div>


               <div class="col-lg-9 col-md-7">
                   <div class="product__discount">
                       <div class="section-title product__discount__title">
                           <h2>Hot sale</h2>
                       </div>
                       <div class="row">
                           <div class="product__discount__slider owl-carousel">
                               <?php
                                if (isset($load_sp_giamgia)) {
                                    foreach ($load_sp_giamgia as $value) {
                                        extract($value);
                                        $price1 = $price - $price_saleoff;
                                        $percent_saleoff = intval($price_saleoff / $price * 100);
                                ?>
                                       <div class="col-lg-4">
                                           <div class="product__discount__item">
                                               <div class="product__discount__item__pic set-bg" data-setbg="../duan2/upload/<?= $img ?>">
                                                   <div class="product__discount__percent"><?= -$percent_saleoff . '%' ?></div>
                                                   <ul class="product__item__pic__hover">
                                                       <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                       <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                       <li><a data-id="<?= $id ?>" onclick="addToCart(<?= $id ?>,<?= $iduser  ?>)"><i class="fa fa-shopping-cart"></i></a></li>
                                                   </ul>
                                               </div>
                                               <div class="product__discount__item__text">
                                                   <span><?= $tendanhmuc ?></span>
                                                   <h5><a href="index.php?act=chitietsanpham&id=<?= $id ?>"><?= $name ?></a></h5>
                                                   <div class="product__item__price"><?=  number_format($price1,3, '.', ',') . 'VNĐ' ?> <span><?=  number_format($price,3, '.', ',') . 'VNĐ' ?></span></div>
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
                   <div class="filter__item">
                       <div class="row">
                           <div class="col-lg-4 col-md-5">


                               <span>Tìm kiếm :</span>
                               <div class="custom-select" id="myCustomSelect">
                                   <span class="selected-option">Tất cả</span>
                                   <ul class="options">
                                       <li data-value="ALL">Tất cả</li>
                                       <li data-value="asc"><a href="index.php?act=cuahang&sorting=asc">Tăng dần</a></li>
                                       <li data-value="desc"><a href="index.php?act=cuahang&sorting=desc">Giảm dần</a></li>
                                   </ul>
                               </div>

                               <style>
                                   .custom-select {
                                       position: relative;
                                       display: inline-block;
                                       width: 50%;
                                       border: none;
                                   }
                               </style>



                               <script>
                                   document.addEventListener('click', function(e) {
                                       var customSelect = document.getElementById('myCustomSelect');
                                       if (!customSelect.contains(e.target)) {
                                           // Đóng danh sách tùy chọn nếu click bên ngoài custom-select
                                           customSelect.classList.remove('active');
                                       }
                                   });

                                   document.querySelector('.selected-option').addEventListener('click', function() {
                                       // Toggle lớp 'active' khi người dùng click vào .selected-option
                                       document.getElementById('myCustomSelect').classList.toggle('active');
                                   });
                               </script>

                           </div>
                           <div class="col-lg-4 col-md-4">
                               <div class="filter__found">
                                   <h5>Kết quả tìm kiếm với từ khóa: <span style="font-weight: bold;"><?= $keyword ?></span> </h5>
                                   <h6><span><?php
                                                if (isset($search_sanpham_keyword_view)) {
                                                    $count = count($search_sanpham_keyword_view);
                                                }
                                                echo $count ?></span> Sản phẩm được tìm thấy</h6>
                               </div>
                           </div>
                           <div class="col-lg-4 col-md-3">
                               <div class="filter__option">
                                   <span class="icon_grid-2x2"></span>
                                   <span class="icon_ul"></span>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <?php
                        if (isset($search_sanpham_keyword_view)) {
                            $count = count($search_sanpham_keyword_view);
                            foreach ($search_sanpham_keyword_view as $value) {
                                extract($value);
                                $price1 = $price - $price_saleoff;
                        ?>
                               <div class="col-lg-4 col-md-6 col-sm-6">
                                   <div class="product__item">
                                       <div class="product__item__pic set-bg" data-setbg="../duan2/upload/<?= $img ?>">
                                           <ul class="product__item__pic__hover">
                                               <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                               <li><a href="#"><i class="fa fa-retweet"></i></a></li>

                                               <li><a data-id="<?= $id ?>" onclick="addToCart(<?= $id ?>,<?= $iduser  ?>)"><i class="fa fa-shopping-cart"></i></a></li>
                                           </ul>
                                       </div>
                                       <div class="product__item__text">
                                           <h6><a href="index.php?act=chitietsanpham&id=<?= $id ?>"><?= $name ?></a></h6>
                                           <h5><?=  number_format($price1,3, '.', ',') . 'VNĐ'; ?></h5>
                                       </div>
                                   </div>
                               </div>
                       <?php
                            }
                        }

                        ?>

                   </div>
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




               </div>
           </div>

       </div>
       </div>
   </section>
   <!-- Product Section End -->

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
                   alert("Bạn đã thêm vào giỏ hàng thành công");
               },
               error: function(error) {
                   console.log(error);
               }
           });
       }
   </script>