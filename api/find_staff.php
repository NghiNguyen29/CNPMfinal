<?php
    header('Content-Type: application/json');
    require_once('../staff_db.php');
    require_once('functions.php');

    if (!empty($_POST['staffid'])) // ??? từ từ xem lại chỗ này là username
    {
        $staffid = $_POST['staffid'];
        $staff = find_staff($staffid);
    } else if (!empty($_POST['id']))
    {
        $id = $_POST['id'];
        $staff = find_staff_by_id(1*$id);     
    }
    
    
    if (!$staff) {
        error_response(3, 'Không tìm thấy nhân viên.');
    }

    success_response($staff, 'Thành công.');
    
?>