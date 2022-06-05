<?php
    header('Content-Type: application/json');
    require_once('../warehouse_receipt_db.php');
    require_once('functions.php');

    if (empty($_POST['idWR'])) {
        error_response(1, 'Thông tin không hợp lệ.');
    } 
    $id_warehouse_receipt = $_POST['idWR'];
    $warehouse_receipt_details = read_warehouse_receipt_details($id_warehouse_receipt);
    if (!$warehouse_receipt_details){
        error_response(2, 'Không có chi tiết hóa đơn.');
    }
    success_response($warehouse_receipt_details, 'Đọc hóa đơn thành công.');
?>