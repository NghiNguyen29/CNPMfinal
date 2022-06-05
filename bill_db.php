<?php
    require_once "db.php";
    require_once "customer_db.php";
    // biến offer mà để tượng trưng cho khuyến mãi để ra cái giá thực tế khi tính tiền
    // còn price là giá sau khuyến mãi
    function add_to_bill($bill_id, $product_id, $quantity, $price){
        $conn = get_connection();
        $sql = 'INSERT INTO billdetails(BILL_ID, PRODUCT_ID, QUANTITY, PRICE) VALUES (?,?,?,?)';
        $stm = $conn->prepare($sql);
        $stm->bind_param('iiii',$bill_id, $product_id, $quantity, $price);
        return $stm->execute();
    }
    function create_bill($customer_id, $staff_id, $address, $phone,$total){
        $conn = get_connection();
        $sql = 'INSERT INTO bill(ID,CUSTOMER_ID, STAFF_ID, ADDRESS, PHONE, ORDER_DATE, NAME,TOTAL) value (?,?,?,?,?,?,?,?)';
        $customer = find_customer($customer_id);
        if ($customer==false){
            $customer_name = '';
        } else $customer_name = $customer['FULLNAME'];
        $date = date('Y-m-d');
        $id = 1+1*max_id_bill(); // ý nghĩa như là id tự động tăng
        $stm = $conn->prepare($sql);
        $stm->bind_param('iiissssi',$id, $customer_id, $staff_id, $address, $phone,$date,$customer_name,$total);
        if (!$stm->execute())
            return false;
        return $id;
    }
    // ý nghĩa như là id tự động tăng
    function max_id_bill(){
        $conn = get_connection();
        $sql = 'SELECT max(ID) FROM bill';
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        return $data['max(ID)'];
    }
    function delete_bill($id) {
        $sql = "DELETE FROM bill WHERE id = ?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        
        return $stm->execute();
    }
    function update_bill($id_bill, $address, $phone, $status){
        $conn = get_connection();
        $sql = 'UPDATE bill SET address = ?, phone = ?, status=? WHERE ID=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssii', $address, $phone, $status, $id_bill);
        if (!$stm->execute())
            return false;
        return true;
    }
    function read_all_bills() {
        $sql = 'SELECT * FROM bill';

        $conn = get_connection();
        $result = $conn->query($sql);
        $output = [];
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    function read_bill_by_id($id) {
        $sql = "SELECT * FROM bill WHERE id=?";

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
    function read_bill_by_username($username){
        $sql = "SELECT bill.* FROM bill,customer WHERE username=? AND bill.customer_id=customer.id";

        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $username);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    /*
    function add_bill($cart) {
        
        foreach (array_values($cart) as $productArr) {
            $productIds[] = $productArr['product_id'];
        }

        $sql = "SELECT * FROM SANPHAM WHERE ID IN (".(implode(", ", $productIds)).")";
        
        $conn = get_connection();
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }

        $total = 0;
        foreach ($output as $queryValue) {
            foreach ($cart as $itemKey => $itemValue) {
                if ($itemValue['product_id'] == $queryValue['ID']) {
                    $total += $itemValue['quantity'] * $queryValue['PRICE'];
                    $product_in_cart_arr[] = [
                        'product_id' => $itemValue['product_id'], 
                        'quantity' => $itemValue['quantity'], 
                        'price' => $queryValue['PRICE']
                    ];
                }
            }
        }

        $sql = '
            INSERT INTO `bill` (`ID`, `CUSTOMER_ID`, `ORDER_DATE`, `NAME`, `ADDRESS`, `PHONE`, `TOTAL`, `STATUS`) 
            VALUES (
                NULL, 
                1, 
                ' . time() . ', 
                "ABC", 
                "XYZ", 
                "DEF", 
                ' . $total . ',
                0
            )';
        
        $conn = get_connection();

        $stm = $conn->prepare($sql);        
        $stm->execute();

        $sql = 'INSERT INTO `chitietbill` (`ID`, `ORDER_ID`, `PRODUCT_ID`, `QUANTITY`, `PRICE`) VALUES ';
        
        foreach ($product_in_cart_arr as $key => $value) {
            $sql .= '(NULL, ' . $stm->insert_id . ', ' . $value['product_id'] . ', ' . $value["quantity"] . ', ' . $value['price'] . '),';
        }

        $sql = substr_replace($sql, "", -1);

        $stm = $conn->prepare($sql);        
        $stm->execute();

        unset($_SESSION['cart']);
        
        return ($stm->affected_rows == 1) ? $stm->insert_id : -1;
    }
    */
    function read_bill_details($id_bill) {
        $sql = "SELECT billdetails.*, product.TITLE FROM billdetails, product WHERE BILL_ID=? and billdetails.PRODUCT_ID=product.ID";

        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id_bill);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    
?>