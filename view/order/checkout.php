<section class="checkout spad">
    <div class="container">

        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="index.php?act=checkout" method="post">
                <!-- <input type="hidden" name="id-cart" value=""> -->

                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Họ và tên người nhận<span>*</span></p>
                            <input type="text" name="nguoinhan" value="<?= $user_infor['username'] ?>">
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="address" value="<?= $user_infor['address'] ?>" placeholder="Street Address" class="checkout__input__add">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input name="phone" value="<?= $user_infor['phone'] ?>" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input name="email" value="<?= $user_infor['email'] ?>" type="text">
                                </div>
                            </div>
                        </div>


                        <div class="checkout__input__checkbox">
                            <label for="pay-on-delivery">
                                <input type="radio" id="pay-on-delivery" value="tienmat" name="payment-method" checked>
                                Thanh toán khi nhận hàng
                            </label>

                            <label for="pay-online" class="pay_online">
                                <input type="radio" id="pay-online" value="online" name="payment-method">
                                Thanh toán online
                            </label>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <?php
                                $tong = 0;
                                $subtotal = 0;
                                foreach ($_SESSION['order'] as $key => $value) {
                                    $total = ($value['price'] - $value['price_saleoff']) * $value['amount'];

                                    $subtotal += $total;
                                ?>
                                    <li style="display: flex; justify-content:space-between;padding-top:5px;"><img width="70px" src="./upload/<?= $value['img'] ?>" alt=""><?= $value['name'] ?> <span><?= number_format($total, 3, '.', ',') . 'VNĐ' ?></span></li>
                                    <input type="hidden" name="id_cart[]" value="<?= $_POST['product_carts'][$key] ?>">
                                    <input type="hidden" name="subtotal" value="<?= number_format($subtotal, 3, '.', ',') . 'VNĐ' ?>">
                                    <!-- <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li> -->

                                <?php

                                }

                                ?>
                            </ul>

                            <div class="checkout__order__subtotal">Subtotal <span><?= number_format($subtotal, 3, '.', ',') . 'VNĐ'  ?></span></div>
                            <div class="checkout__order__total">Total <span><?= number_format($subtotal, 3, '.', ',') . 'VNĐ' ?></span></div>
                            <button name="thanhtoan" type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>