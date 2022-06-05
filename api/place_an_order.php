<?php
    session_start();

    header('Content-Type: application/json');
    require_once('../invoice_db.php');
    require_once('functions.php');

    if (!isset($_SESSION['cart'])) {
        error_response(6, 'Giỏ hàng rỗng.');
    }

    $id = add_invoice($_SESSION['cart']);
    
    if ($id == 0) {
        error_response(3, 'Thêm sản phẩm thất bại.');
    }

    success_response($id, 'Thêm sản phẩm thành công.');
?>