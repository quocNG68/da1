<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Multiple Buttons</title>
</head>
<body>

    <form id="myForm" action="process.php" method="post">
        <!-- Các trường và thông tin khác trong form -->

        <!-- Nút Submit -->
        <button type="submit" name="submit">Submit</button>

        <!-- Nút Chuyển Hướng -->
        <button type="button" name="redirect" onclick="redirectToOtherPage()">Redirect to Other Page</button>
    </form>

    <script>
        // Hàm xử lý khi nhấn vào nút chuyển hướng
        function redirectToOtherPage() {
            // Chuyển hướng đến trang khác
            window.location.href = "other_page.php"; // Thay đổi đường dẫn tương ứng với trang khác của bạn
        }
    </script>

</body>
</html>
