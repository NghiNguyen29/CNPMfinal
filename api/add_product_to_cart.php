<?php
    session_start();

    header('Content-Type: application/json');
    require_once('functions.php');

    if (empty($_GET['product_id']) || empty($_GET['quantity'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $product_id = intval($_GET['product_id']);
    $quantity = intval($_GET['quantity']);
    $isInCart = false;

    foreach ($_SESSION['cart'] as $index => $productArr) {
        if ($product_id == $productArr['product_id']) {
            $quantity += $productArr['quantity'];

            $_SESSION['cart'][$index] = [
                "product_id" => $product_id,
                "quantity" => $quantity
            ];
            
            $isInCart = true;
        }
    }

    if ($isInCart == false) {
        $_SESSION['cart'][] = [
            "product_id" => $product_id,
            "quantity" => $quantity
        ];
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);

    success_response($_SESSION['cart'], 'Thêm sản phẩm vào giỏ hàng thành công.');
?>