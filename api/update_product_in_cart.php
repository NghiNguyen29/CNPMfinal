<?php
    session_start();

    header('Content-Type: application/json');
    require_once('functions.php');

    if (empty($_GET['product_id']) || empty($_GET['action'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $product_id = intval($_GET['product_id']);
    $action = $_GET['action'];

    foreach ($_SESSION['cart'] as $index => $productArr) {
        if ($product_id == $productArr['product_id']) {
            if ($action == 'increase') {
                $quantity = $productArr['quantity'] + 1;
            } else if ($action == 'decrease') {
                $quantity = $productArr['quantity'] - 1;
            }

            $_SESSION['cart'][$index] = [
                "product_id" => $product_id,
                "quantity" => $quantity
            ];
        }
    }

    

    success_response($_SESSION['cart'], 'Thêm danh mục sản phẩm thành công.');
?>