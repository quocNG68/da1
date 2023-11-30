<tbody id="order">
    <?php
    if (isset($load_all_cart)) {
        foreach ($load_all_cart as $value){
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
                    <?= number_format($price1,3, '.', ',')?>VNĐ
                    <span style="text-decoration: line-through;font-weight:400;font-size:14px;"><?= number_format($price,3, '.', ',')?>VNĐ</span>
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <div class="pro-qty">
                            <span onclick="update_quantity(<?= $id ?>, <?= $amount ?>, 'increase',this)">+</span>
                            <input id="quantity" type="number" value="<?= $amount ?>" min="1" class="qty-input" data-id="<?= $id ?>" disabled>
                            <span onclick="update_quantity(<?= $id ?>, <?= $amount ?>, 'decrease',this)">-</span>
                            <input type="hidden" id="dongia" value="<?= $price1 ?>">
                        </div>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    <span id="totalValue_<?= $id ?>">
                        <?= number_format($product_total,3, '.', ',')?>VNĐ
                    </span>
                </td>
                <td class="shoping__cart__item__close">
                 <a onclick="return confirm_xoa()" href="index.php?act=delete_cart&id=<?= $id ?>"> <span class="icon_close"></span></a>
                 <script>
                    function confirm_xoa() {
                        return confirm('Bạn chắc chắc muốn xóa không');
                    }
                 </script>
                </td>
            </tr>


    <?php
        }
    }

    ?>






</tbody>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {

        totalProduct = document.getElementById('totalProduct');
    });

    function update_quantity(id, currentAmount, action, element) {
        var soluong = element.parentElement.querySelector('input');
        var dongia = element.parentElement.querySelector('#dongia');
        var thanhtien = element.parentElement.parentElement.parentElement.parentElement.querySelector('.shoping__cart__total').querySelector('span')
        thanhtien.innerHTML = (Number(soluong.value) * Number(dongia.value)).toFixed(3) + ' VNĐ';
        console.log(thanhtien);
        // console.log($dongia);
        // Get the quantity input element
        var quantityInput = $('input[data-id="' + id + '"]');

        // Check if the input element exists
        if (quantityInput.length) {
            // Get the current quantity value
            var quantityValue = parseInt(quantityInput.val());

            // Update the quantity based on the action
            if (action === 'increase') {
                quantityValue++;
            } else if (action === 'decrease' && quantityValue > 1) {
                quantityValue--;
            }

            // Update the input value
            quantityInput.val(quantityValue);
            // updateTotalValue(productId, quantity)
            updateTotalPrice()
            // Make an Ajax call to update the quantity in the database
            updateQuantityInDatabase(id, quantityValue);
        }
    }

    function updateQuantityInDatabase(productId, quantity) {
        $.ajax({
            type: 'POST',
            url: 'view/ajax/update_amount_listcart.php',
            data: {
                id: productId,
                quantity: quantity,
            },
            success: function(response) {
                console.log(response);
                totalProduct.innerHTML = response;
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function xoa_cart(id, product_user) {
        if (confirm("Bạn có đồng ý xóa sản phẩm hay không?")) {
            // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
            $.ajax({

                type: 'POST',
                url: 'view/ajax/xoa_cart.php',
                data: {
                    id: id,
                    iduser: product_user
                },
                success: function(response) {
                    console.log(response);
                    // Sau khi cập nhật thành công
                    if (response.trim() === 'Xóa sản phẩm thành công') {
                        $.post('view/giohang/order_cart.php', function(data) {
                            $('#order').html(data);
                        });
                    }
                }

            });
        }
    }
</script>