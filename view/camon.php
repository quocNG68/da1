<main class="bg_gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div id="confirm">
                    <div style="display: flex; justify-content:center;" class="icon icon--order-success svg add_bottom_15">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                <circle cx="36" cy="36" r="35"
                                    style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                    style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                            </g>
                        </svg>
                    </div>
                    <a style="color: #7fad39; display:flex;align-items:center;position:relative;"  href="index.php?act=cuahang"><i style="position: absolute;top: 6px;
    left: -15px;" class="fa-solid fa-angle-left"></i>Quay về</a>
                    <h2 style="display: flex; justify-content:center;">Cảm ơn bạn đã đặt hàng</h2>

                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <div class="container margin_30">
        <?php
        if(isset($load_bill_after_buy) && (is_array($load_bill_after_buy))) {
            extract($load_bill_after_buy);
        } ?>
        <div class="d-flex ">
            <div>
                <h4><strong>Thông tin đơn hàng </strong></h4>
                <li>
                    <strong>
                        <em>Mã đơn hàng :</em>
                    </strong>
                    <?= $ma_don_hang ?>
                </li>
                <li>
                    <strong>
                        <em>Ngày đặt hàng :</em>
                    </strong>
                    <?= $ngaymua ?>
                </li>

                <li>
                    <strong>
                        <em>phương thức thanh toán :</strong>
                    </em>
                    <?= $phuongthuc_thanhtoan ?>
                </li>
                <li>
                    <strong>
                        <em>Tổng đơn hàng :</em>
                    </strong>
                    <?= number_format($tongtien,3, '.', ',') ?> VND
                </li>
            </div>
            <hr>

            <div class="mx-5">
                <h4><strong>Thông tin người mua </strong></h4>
                <li>
                    <strong>
                        <em>Tên người mua:</em>
                    </strong>
                    <?= $nguoinhan ?>
                </li>
                <li>
                    <strong>
                        <em>Địa chỉ:</em>
                    </strong>
                    <?= $diachi_nguoinhan ?>
                </li>
                <li>
                    <strong>
                        <em>Số điện thoại: </em>
                    </strong>

                    <?= $phone_nguoinhan ?>
                </li>
            </div>
        </div>
        <div class="pt-3"> <a href="index.php?act=my_orders" class="btn_1  btn-width">Xem danh sách đơn hàng</a></div>
        <hr>
        
        <table class="table table-striped cart-list">
        <h4>Chi tiết đơn hàng</h4>
            <thead>
                <tr>

                    <th>Tên sản phẩm</th>
                    <th>Ảnh </th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                   

                </tr>
            </thead>
            <hr>
            <tbody id="cart">
                <?php

                foreach($load_bill_detail as $key => $value) {
                    extract($value);

                    echo '<tr>
                                   <td>
                                       <span class="item_cart mb-4">
                                           '.$name.'
                                       </span>
                                   </td>
                                   <td>
                                       <div class="thumb_cart">
           
                                           <img style="width:100px" src="./upload/'.$img.'" class="item-box" alt="">
           
                                       </div>
                                   </td>
           
           
                                   <td>
                                       '.number_format($price_detail,3, '.', ',').'VNĐ
                                   </td>
                                   <!-- số lượng  -->
                                   <td>
                                       <div class="numbers">
                                         <p>'.$amount_detail.'</p>
           
                                       </div>
           
           
                                   </td>
                               
                                 
                                  
                               </tr>';
                }
                ?>


                <!--  -->

            </tbody>


        </table>
    </div>

</main>