<?php
    header('Content-Type: application/json');
    require_once('../warehouse_receipt_db.php');
    require_once('functions.php');
 
    if (empty($_POST['idWR'])){
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $id_warehouse_receipt = $_POST['idWR'];
    
    if (delete_warehouse_receipt($id_warehouse_receipt)) {
        success_response('', 'Cập nhật thành công.');
    }
    error_response(3, 'Cập nhật thất bại.');
?>