<?php
    header('Content-Type: application/json');
    require_once('../staff_db.php');
    require_once('functions.php');

    if (empty($_POST['username']))
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    
    $username = $_POST['username'];
    $role = $_POST['role'];
    if (!empty($role)){
        if (update_role_staff($username,$role))
            return success_response('','Đổi chức vụ thành công');
        else return error_response(3, 'Đổi chức vụ thất bại.');
    }
    if (!update_staff($username)) {
        error_response(3, 'Sửa mật khẩu cho nhân viên thất bại.');
    }
    success_response('', 'Đổi mật khẩu cho nhân viên thành công.');
?>