<?php

    include "../../model/pdo.php";
    
    include "../../model/cart.php";

function updateQuantityInDatabase($productId, $quantity) {
    update_cart($quantity, $productId);
    echo $quantity;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have sanitized the input
    $productId = $_POST['id'];
    $quantity = $_POST['quantity'];
    updateQuantityInDatabase($productId, $quantity);
} else {
    echo "Invalid request";
}
?>
