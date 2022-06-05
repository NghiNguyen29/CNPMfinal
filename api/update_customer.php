<?php
    header('Content-Type: application/json');
    require_once('../customer_db.php');
    require_once('functions.php');

    if (empty($_POST['username']) || empty($_POST['fullname']) || empty($_POST['address']) || empty($_POST['image']))
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $image = $_POST['image'];
    if (update_customer($username, $fullname, $address, $image)) {
        success_response('', 'Cập nhật thành công.');
    }
    error_response(3, 'Cập nhật thất bại.');
?>