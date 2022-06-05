<?php
    header('Content-Type: application/json');
    require_once('../cart_db.php');
    require_once('functions.php');

    if (empty($_POST['id_product']) || empty($_POST['action'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }

    $id_product = $_POST['id_product'];
    $action = $_POST['action'];

    $id = update_cart_quantity($id_product, $action);
    
    if ($id == false) {
        error_response(3, 'Chỉnh sửa giỏ hàng thất bại.');
    }

    success_response($id, 'Chỉnh sửa giỏ hàng thành công.');
?>