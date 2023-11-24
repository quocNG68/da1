<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <script>
        // Hàm xử lý khi nhấn vào nút checkout
        function handleCheckout() {
            // Chuyển hướng sang trang checkout
            window.location.href = "checkout.php"; // Thay đổi đường dẫn tương ứng với trang checkout của bạn
        }

        // Hàm xử lý khi nhấn vào nút delete-all
        function handleDeleteAll() {
            // Chuyển hướng sang trang xóa
            window.location.href = "delete.php"; // Thay đổi đường dẫn tương ứng với trang xóa của bạn
        }
    </script>
</head>
<body>

    <form action="checkout.php" method="post">
        <!-- Các trường và thông tin khác trong form -->

        <!-- Nút Checkout -->
        <button type="button" name="checkout" onclick="handleCheckout()">Checkout</button>

        <!-- Nút Delete All -->
        <button type="button" name="delete-all" onclick="handleDeleteAll()">Delete All</button>
    </form>

</body>
</html>
