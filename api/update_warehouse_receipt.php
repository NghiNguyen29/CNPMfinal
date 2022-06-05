<?php
    header('Content-Type: application/json');
    require_once('../warehouse_receipt_db.php');
    require_once('functions.php');
 
    if (empty($_POST['idWR']) || empty($_POST['address']) || empty($_POST['phone'])){
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
        
    
    $id_warehouse_receipt = $_POST['idWR'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if (update_warehouse_receipt($id_warehouse_receipt, $address, $phone)) {
        success_response('', 'Cập nhật thành công.');
    }
    error_response(3, 'Cập nhật thất bại.');
?>