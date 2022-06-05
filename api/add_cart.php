<?php
    header('Content-Type: application/json');
    require_once('../cart_db.php');
    require_once('functions.php');

    if (empty($_POST['id_product']) || 
    empty($_POST['id_customer']) ||
    empty($_POST['quantity'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $id_product = $_POST['id_product'];
    $id_customer = $_POST['id_customer'];
    $quantity = $_POST['quantity'];

    $id = add_cart($id_product, $id_customer, $quantity);
    
    if ($id == 0) {
        error_response(3, 'Thêm giỏ hàng thất bại.');
    }

    success_response($id, 'Thêm giỏ hàng thành công.');
?>