<?php
    header('Content-Type: application/json');
    require_once('../staff_db.php');
    require_once('../account_db.php');
    require_once('functions.php');

    if (empty($_POST['fullname']) || empty($_POST['username']) || empty($_POST['role'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    if (is_username_exists($username)){
        error_response(2, 'Tài khoản đã tồn tại');
    }
    if (add_staff($fullname, $username, $role)){
        success_response('','Thêm nhân viên thành công');
    } else {
        error_response(3,'Thêm nhân viên thất bại');
    }