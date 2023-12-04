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

<section class="shoping-cart spad" id="">
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
                                include "view/giohang/order_cart.php";
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="shoping__cart__checkbox">
                        <input class="btn btn-success" id="check-all" type="button" value="Chọn tất cả">
                        <button onclick="return confirm_xoa()" name="delete-all" class="btn btn-danger" id="delete-all">Xóa</button>
                        <script>
                            function confirm_xoa() {
                                return confirm('Bạn chắc chắc muốn xóa không');
                            }
                        </script>
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
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Tổng phụ<span id="subtotal">0.000</span></li>
                            <li>Tổng cộng<span id="total">0.000</span></li>

                            <button class="primary-btn" id="muahang" name="muahang">
                                mua hàng
                            </button>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </form>
</section>
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
        subtotalElement.innerText = subtotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + 'VNĐ';
        totalElement.innerText = total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + 'VNĐ';
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
            event.preventDefault();
            return false;
        } else {

            form.setAttribute('action', 'index.php?act=list_cart');
        }
    });
    form.addEventListener('submit', function() {
        if (check_select() == false) {
            alert('Vui lòng chọn sản phẩm thanh toán');
            event.preventDefault();
            return false;
        }

    });
</script>