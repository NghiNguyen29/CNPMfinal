<?php
    header('Content-Type: application/json');
    require_once('../product_db.php');
    require_once('functions.php');

    if (empty($_POST['id'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ');
    }
    $product = read_product_by_id($_POST['id']);
    if (!$product) {
        error_response(2, 'Sản phẩm không tồn tại');
    }
    success_response($product, 'Đọc sản phẩm thành công.');
?>