<?php
    require_once "db.php";

    function add_to_warehouse_receipt($warehouse_receipt_id, $product_id, $quantity, $price){
        $conn = get_connection();
        $sql = 'INSERT INTO wareshousereceiptdetails(WR_ID, PRODUCT_ID, QUANTITY, PRICE) VALUES (?,?,?,?)';
        $stm = $conn->prepare($sql);
        $stm->bind_param('iiii',$warehouse_receipt_id, $product_id, $quantity, $price);
        return $stm->execute();
    }
    function create_warehouse_receipt($staff_id, $address, $phone,$total){
        $conn = get_connection();
        $sql = 'INSERT INTO wareshousereceipt(ID,STAFF_ID, RECEIVED_DATE, DELIVERY_PLACE, PHONE,TOTAL) value (?,?,?,?,?,?)';
        $date = date('Y-m-d');
        $id = 1+1*max_id_warehouse_receipt(); // ý nghĩa như là id tự động tăng

        $stm = $conn->prepare($sql);
        $stm->bind_param('iisssi',$id, $staff_id, $date, $address, $phone, $total);
        if (!$stm->execute())
            return false;
        return $id;
    }
    // ý nghĩa như là id tự động tăng
    function max_id_warehouse_receipt(){
        $conn = get_connection();
        $sql = 'SELECT max(ID) FROM wareshousereceipt';
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['max(ID)'];
    }
    function delete_warehouse_receipt($id) {
        $sql = "DELETE FROM wareshousereceipt WHERE id = ?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        
        return $stm->execute();
    }
    function update_warehouse_receipt($id_warehouse_receipt, $address, $phone){
        $conn = get_connection();
        $sql = 'UPDATE wareshousereceipt SET DELIVERY_PLACE = ?, PHONE = ? WHERE ID=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssi', $address, $phone, $id_warehouse_receipt);
        if (!$stm->execute())
            return false;
        return true;
    }
    // lấy hết các phiếu nhập kho
    function read_all_warehouse_receipts() {
        $sql = 'SELECT * FROM wareshousereceipt';

        $conn = get_connection();
        $result = $conn->query($sql);
        $output = [];
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }
    // đọc hóa đơn từ id
    function read_warehouse_receipt_by_id($id) {
        $sql = "SELECT * FROM wareshousereceipt WHERE id=?";

        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }
    function read_warehouse_receipt_details($id_warehouse_receipt) {
        $sql = "SELECT wareshousereceiptdetails.*, product.TITLE FROM wareshousereceiptdetails,product WHERE WR_ID=? AND wareshousereceiptdetails.PRODUCT_ID=product.ID";

        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id_warehouse_receipt);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return ($output!=[]) ? $output : false;
    }

    
?>