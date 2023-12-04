<?php
include "../../model/cart.php";
include "../../model/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];
    $product_iduser = $_POST['iduser'];
    $productAmount = $_POST['quantity'];
    $load_all_cart = load_all_cart($product_iduser);

    // Check if the product is already in the cart
    $index = array_search($productId, array_column($load_all_cart, 'idpro'), true);

    if ($index !== false) {
        // Product is already in the cart, update the quantity
        $productIdToUpdate = $load_all_cart[$index]['id'];
        update_cart($load_all_cart[$index]['amount'] + $productAmount, $productIdToUpdate);
    } else {
        // Product is not in the cart, add a new entry
        $product = add_to_cart($productId, $product_iduser, $productAmount);
        $load_all_cart[] = $product;
    }

    echo count($load_all_cart);
} else {
    echo "Invalid request";
}
