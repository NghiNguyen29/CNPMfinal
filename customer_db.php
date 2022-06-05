<?php
    require_once "db.php";

    // thêm khách hàng (đăng ký trong account_db)
    //đọc dữ liệu các khách hàng
    function read_all_customer(){
        $conn = get_connection();
        $sql = 'SELECT * FROM customer where id!=1';
        $result = $conn->query($sql);
        $output = [];
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }
    // kiểm tra khách hàng có tồn tại không
    function find_customer($customer_id){
        $sql = 'SELECT * from customer WHERE ID=?';
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $customer_id);
        $stm->execute();
        $result = $stm->get_result();
        if ($result->num_rows==0)
            return false;
        return $result->fetch_assoc();
    }

    //cập nhật khách hàng 
    function update_customer($username, $fullname, $address, $image){
        $conn = get_connection();
        $sql = 'UPDATE customer SET FULLNAME=?,ADDRESS=?,IMAGE=? WHERE USERNAME=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssss',$fullname, $address, $image, $username);
        if (!$stm->execute()){
            return false;
        }
        return true;
    }

    // xóa khách hàng
    function delete_customer($username){
        $conn = get_connection();
        $sql = 'DELETE FROM customer WHERE username=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$username);
        if (!$stm->execute()){
            return false;
        }
        return true;
    }

    function find_customer_by_username($username){
        $sql = 'SELECT * from customer WHERE username=?';
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $username);
        $stm->execute();
        $result = $stm->get_result();
        if ($result->num_rows==0)
            return false;
        return $result->fetch_assoc();
    }
    