<?php
    header('Content-Type: application/json');
    require_once('../staff_db.php');
    require_once('functions.php');

    if (empty($_POST['username']))
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    
    
    $username = $_POST['username'];

    if (delete_staff($username)) {
        success_response('', 'Xóa nhân viên thành công.');
    }
    error_response(3, 'Xóa nhân viên thất bại.');
    
?>