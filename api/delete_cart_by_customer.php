<?php
    header('Content-Type: application/json');
    require_once('../cart_db.php');
    require_once('functions.php');
    
    if (empty($_POST['id_customer'])) {
        error_response(4, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $result = delete_cart_by_customer($_POST['id_customer']);
    
    success_response($result, 'Xóa giỏ hàng thành công.');