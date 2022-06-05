<?php
    header('Content-Type: application/json');
    require_once('../bill_db.php');
    require_once('functions.php');
 
    if (empty($_POST['idbill'])){
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
        
    
    $id_bill = $_POST['idbill'];
    
    if (delete_bill($id_bill)) {
        success_response('', 'Cập nhật thành công.');
    }
    error_response(3, 'Cập nhật thất bại.');
?>