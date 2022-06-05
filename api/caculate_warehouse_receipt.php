<?php
    header('Content-Type: application/json');
    require_once('../accountant_db.php');
    require_once('functions.php');

    if (empty($_POST['from']) || empty($_POST['to'])){
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }

    $from = $_POST['from'];
    $to = $_POST['to'];

    $id_bill = read_warehouse_reiceipt_by_date($from, $to); // id hóa đơn từ ngày đến ngày

    if (!$id_bill){
        error_response(2, 'không tồn tại hóa đơn trong ngày này');
    }
    $sum = 0;
    foreach ($id_bill as $id){
        $sum += caculate_warehouse_reiceipt_details($id['ID']);
    }
    success_response($sum, 'success');
    