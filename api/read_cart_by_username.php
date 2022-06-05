<?php
    header('Content-Type: application/json');
    require_once('../cart_db.php');
    require_once('functions.php');

    if (empty($_POST['username'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ');
    }
    $cart = read_cart_by_username($_POST['username']);
    if (!$cart) {
        error_response(2, 'Sản phẩm không tồn tại');
    }
    success_response($cart, 'Đọc sản phẩm thành công.');
?>