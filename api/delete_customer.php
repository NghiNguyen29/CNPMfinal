<?php
    header('Content-Type: application/json');
    require_once('../customer_db.php');
    require_once('functions.php');

    if (empty($_POST['username']))
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    
    
    $username = $_POST['username'];

    if (delete_customer($username)) {
        success_response('', 'Xóa khách hàng thành công.');
    }
    error_response(3, 'Xóa khách hàng thất bại.');
    
?>