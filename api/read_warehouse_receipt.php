<?php
    header('Content-Type: application/json');
    require_once('../warehouse_receipt_db.php');
    require_once('functions.php');

    if (!empty($_POST['id'])) {
        $warehouse_receipts = read_warehouse_receipt_by_id(intval($_POST['id']));
    } else {
        $warehouse_receipts = read_all_warehouse_receipts();
    }

    success_response($warehouse_receipts, 'Đọc hóa đơn thành công.');
?>