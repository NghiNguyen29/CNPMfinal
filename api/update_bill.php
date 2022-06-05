<?php
    header('Content-Type: application/json');
    require_once('../bill_db.php');
    require_once('functions.php');
 
    if (empty($_POST['idbill']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['status'])){
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
        
    
    $id_bill = $_POST['idbill'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    if (update_bill($id_bill, $address, $phone, $status)) {
        success_response('', 'Cập nhật thành công.');
    }
    error_response(3, 'Cập nhật thất bại.');
?>