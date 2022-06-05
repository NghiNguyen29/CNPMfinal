<?php
    header('Content-Type: application/json');
    require_once('../staff_db.php');
    require_once('functions.php');


    $staff = read_all_staff();
    success_response($staff,'Lấy thông tin nhân viên thành công');
    
?>