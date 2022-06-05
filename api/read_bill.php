<?php
    header('Content-Type: application/json');
    require_once('../bill_db.php');
    require_once('functions.php');

    if (!empty($_GET['id'])) {
        $bills = read_bill_by_id(intval($_GET['id']));
    } else {
        $bills = read_all_bills();
    }

    success_response($bills, 'Đọc hóa đơn thành công.');
?>