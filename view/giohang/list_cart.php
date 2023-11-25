<section class="breadcrumb-section set-bg" data-setbg="public/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section Begin -->

<section class="shoping-cart spad">
    <form action="index.php?act=checkout" id="form__send" method="post">
        <div class="container">


            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($load_all_cart)) {
                                    foreach ($load_all_cart as $value) {
                                        // echo "<pre>";
                                        // print_r($load_all_cart);
                                        // echo "</pre>";
                                        extract($value);
                                        $price1 = $price - $price_saleoff;
                                        $product_total = $price1 * $amount;
                                ?>

                                        <tr>
                                            <td><input type="checkbox" value="<?= $value['id'] ?>" name="product_carts[]" class="checkbox"></td>
                                            <?php

                                            ?>
                                            <td class="shoping__cart__item">
                                                <img style="width:100px" src="./upload/<?= $img  ?>" alt="">
                                                <h5><?= $name ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <?= number_format($price1, 3, '.', ',').'VNĐ' ?>
                                                <span style="text-decoration: line-through;font-weight:400;font-size:14px;"><?= number_format($price, 3, '.', ',').'VNĐ' ?></span>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <span onclick="updateTotal('<?= $id ?>', '<?= number_format($price1, 3, '.', ',').'VNĐ' ?>', this)">+</span>
                                                        <input type="text" value="<?= $amount ?>" min="1" class="qty-input" data-id="<?= $id ?>" disabled>
                                                        <span onclick="updateTotal('<?= $id ?>', '-<?= number_format($price1, 3, '.', ',').'VNĐ' ?>', this)">-</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                <?= number_format($product_total, 3, '.', ',').'VNĐ' ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="index.php?act=delete_cart&id=<?= $value['id'] ?>"> <span class="icon_close"></span></a>
                                            </td>
                                        </tr>


                                <?php
                                    }
                                }

                                ?>






                            </tbody>
                        </table>
                    </div>
                    <div class="shoping__cart__checkbox">
                        <input class="btn btn-success" id="check-all" type="button" value="Chọn tất cả">
                        <button name="delete-all" class="btn btn-danger" id="delete-all">Xóa</button>

                        <!-- <input class="btn btn-danger" id="delete-all" type="submit" value="Xóa"> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a style="background:#7fad39;" href="index.php?act=cuahang" class="btn btn-success">CONTINUE SHOPPING</a>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <!-- <form action="#">
                             <input type="text" placeholder="Enter your coupon code">
                             <button type="submit" class="site-btn">APPLY COUPON</button>
                         </form> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Tổng phụ<span id="subtotal">0.00</span></li>
                            <li>Tổng cộng<span id="total">0.00</span></li>
                            <button id="muahang" name="muahang">
                                mua hàng
                            </button>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </form>
</section>
<!-- Shoping Cart Section End -->
<script>
    let check_all = document.getElementById('check-all');
    let delete_all = document.getElementById('delete-all');
    let checkout_button = document.getElementById('checkout-button'); // Add an ID to your checkout button
    let checkbox = document.getElementsByClassName('checkbox');
    let subtotalElement = document.getElementById('subtotal');
    let totalElement = document.getElementById('total');
    let qtyInputs = document.getElementsByClassName('qty-input');
    let form = document.querySelector('#form__send');

   

    check_all.addEventListener('click', function() {
        const isAnyUnchecked = Array.from(checkbox).some(cb => !cb.checked);
        for (let i = 0; i < checkbox.length; i++) {
            checkbox[i].checked = isAnyUnchecked;
        }
        updateTotalPrice();
    });

    function updateTotalPrice() {
        let subtotal = 0;
        for (let i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                const productPrice = parseFloat(checkbox[i].closest('tr').querySelector('.shoping__cart__total').innerText.replace('$', '').replace(',', ''));
                subtotal += productPrice;
            }
        }
        const total = subtotal;
        subtotalElement.innerText = subtotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'VNĐ';
        totalElement.innerText = total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'VNĐ';
    }

    for (let i = 0; i < checkbox.length; i++) {
        checkbox[i].addEventListener('change', function() {
            updateTotalPrice();
        });
    }




    function check_select() {
        for (let i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked == true) {
                return true;
            }
        }
        return false;
    }

    delete_all.addEventListener('click', function() {

    })







    delete_all.addEventListener('click', function() {
        if (check_select() == false) {
            alert("Bạn cần chọn ít nhất 1 danh mục để xóa");
            event.preventDefault(); //Không cho phép kích hoạt sự kiện gửi dữ liệu lên server
            return false;
        } else {

            form.setAttribute('action', 'index.php?act=list_cart');
        }
    });
    form.addEventListener('submit', function(){
       if(check_select()==false) {
        alert('Vui lòng chọn sản phẩm thanh toán');
        event.preventDefault();
        return false;
       } 
    
    }
    );
</script>