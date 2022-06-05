<?php
    session_start();

    header('Content-Type: application/json');
    require_once('functions.php');

    if (empty($_GET['product_id'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $product_id = intval($_GET['product_id']);

    foreach ($_SESSION['cart'] as $index => $productArr) {
        if ($product_id == $productArr['product_id']) {
            unset($_SESSION['cart'][$index]);
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);

    success_response($_SESSION['cart'], 'Thêm danh mục sản phẩm thành công.');
?>