<?php
    header('Content-Type: application/json');
    require_once('../customer_db.php');
    require_once('functions.php');


    $customer = read_all_customer();
    success_response($customer,'Lấy thông tin khách hàng thành công');
    
?>