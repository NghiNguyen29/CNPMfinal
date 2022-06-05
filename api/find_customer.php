<?php
    header('Content-Type: application/json');
    require_once('../customer_db.php');
    require_once('functions.php');

    if (empty($_POST['customerid']))
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    
    $customerid = $_POST['customerid'];
    $customer = find_customer($customerid);
    if (!$customer) {
        error_response(3, 'Không tìm thấy khách hàng.');
    }
    success_response($customer, 'Thành công.');
    
?>