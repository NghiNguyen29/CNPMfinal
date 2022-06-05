<?php
    session_start();

    header('Content-Type: application/json');
    require_once('../product_category_db.php');
    require_once('functions.php');

    // unset($_SESSION['cart']);die();

    if (!isset($_SESSION['cart'])) {
        error_response(6, 'Giỏ hàng rỗng.');
    }

    success_response($_SESSION['cart'], 'Hiển thị giỏ hàng thành công.');
?>