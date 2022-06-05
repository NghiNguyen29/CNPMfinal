<?php
    require_once "db.php";

    function read_bill_by_date($from, $to){
        $conn = get_connection();
        $sql = "SELECT * FROM `bill` WHERE ORDER_DATE >= ? AND ORDER_DATE <= ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$from, $to);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return ($output!=[]) ? $output:false;
    }
    function caculate_bill_details($id_bill){
        $conn = get_connection();
        $sql = "SELECT sum(price) FROM `billdetails` WHERE bill_id = ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id_bill);
        $stm->execute();
        $result = $stm->get_result();
        $data = $result->fetch_assoc();
        return $data['sum(price)'];
    }

    function read_warehouse_reiceipt_by_date($from, $to){
        $conn = get_connection();
        $sql = "SELECT * FROM `wareshousereceipt` WHERE RECEIVED_DATE >= ? AND RECEIVED_DATE <= ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$from, $to);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        return ($output!=[]) ? $output:false;
    }
    function caculate_warehouse_reiceipt_details($id_wr){
        $conn = get_connection();
        $sql = "SELECT sum(price) FROM `wareshousereceiptdetails` WHERE wr_id = ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id_wr);
        $stm->execute();
        $result = $stm->get_result();
        $data = $result->fetch_assoc();
        return $data['sum(price)'];
    }
