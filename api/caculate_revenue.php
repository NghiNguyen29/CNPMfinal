<?php
    header('Content-Type: application/json');
    require_once('../accountant_db.php');
    require_once('functions.php');

    if (empty($_POST['from']) || empty($_POST['to'])){
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }

    $from = $_POST['from'];
    $to = $_POST['to'];
    $revenue = [];

    // id hóa đơn từ ngày đến ngày
    $id_bill = read_bill_by_date($from, $to); 
    if (!$id_bill){
        error_response(2, 'không tồn tại hóa đơn trong ngày này');
    }
    $sum = 0;
    foreach ($id_bill as $id){
        $sum += caculate_bill_details($id['ID']);
    }
    $revenue['income'] = $sum;

    // id phiếu nhập hàng từ ngày đến ngày
    $id_wr = read_warehouse_reiceipt_by_date($from, $to); 
    if (!$id_wr){
        error_response(2, 'không tồn tại hóa đơn trong ngày này');
    }
    $sum_wr = 0;
    foreach ($id_wr as $id){
        $sum_wr += caculate_warehouse_reiceipt_details($id['ID']);
    }
    $revenue['invest'] = $sum_wr;
    // tính thu nhập
    $revenue['revenue'] = $sum-$sum_wr;

    success_response($revenue, 'success');
    
    