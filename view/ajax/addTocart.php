<?php
session_start();
include "../../model/cart.php";
include "../../model/pdo.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];
    $product_iduser = $_POST['iduser'];
    $productAmount = 1;
    $load_all_cart = load_all_cart($product_iduser);
    $index = array_search($productId, array_column($load_all_cart, 'idpro'), true);
if ($index !== false) {
    $productIdToUpdate = $load_all_cart[$index]['id'];
    update_cart($load_all_cart[$index]['amount'] + 1, $productIdToUpdate);
} else {
    $product = add_to_cart($productId, $product_iduser, $productAmount);
    $load_all_cart[] = $product;
}

    echo count($load_all_cart);
} else {
    echo "Invalid request";
}
