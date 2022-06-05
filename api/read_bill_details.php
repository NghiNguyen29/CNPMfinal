<?php
    header('Content-Type: application/json');
    require_once('../bill_db.php');
    require_once('functions.php');

    if (empty($_POST['idbill'])) {
        error_response(1, 'Thông tin không hợp lệ.');
    } 
    $id_bill = $_POST['idbill'];
    $bill_details = read_bill_details($id_bill);
    success_response($bill_details, 'Đọc hóa đơn thành công.');
?>