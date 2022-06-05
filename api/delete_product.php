<?php
    header('Content-Type: application/json');
    require_once('../product_db.php');
    require_once('functions.php');
    
    if (empty($_POST['id'])) {
        error_response(4, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $result = delete_product($_POST['id']);
    
    success_response($result, 'Xóa sản phẩm thành công.');
?>