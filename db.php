<?php
    function get_connection() {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $db_name = 'quanlycuahangdochoitreem';
        
        $conn = new mysqli($host, $username, $password, $db_name);

        if ($conn->connect_error) {
            die('Cannot connect: '.$conn->connect_error);
        }
        
        return $conn;
    }
    
    //----------------------------------------------------------------
    // lấy tất cả vai trò hiện có
    function get_all_role(){
        $sql = "SELECT * FROM role WHERE ID_ROLE!=0";
        $conn = get_connection();

        $result = $conn->query($sql);

        $data = array();
        while (($row = $result->fetch_assoc())){
            $data[] = $row;
        }
        return array('code' => 0, 'message' => 'success', 'data' => $data);
    }
    // lấy tên của vai trò
    function get_role($role){
        $sql = "SELECT * FROM role WHERE ID_ROLE=?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $role);
        if (!$stm->execute()){
            return array('code' => 1, 'message' => 'Không thể thực thi câu lệnh sql'); // return array(code, message)
        }

        $result = $stm->get_result();
		$data = $result->fetch_assoc();
        if ($result->num_rows==0){
            return array('code' => 2, 'message' => 'Không tồn tại vai trò'); // return array(code, message)
        }

        return array('code' => 0, 'message' => 'success', 'data' => $data);
    }
    // lấy thông tin nhân viên
    function get_info_nhanvien($username){
        $sql = "SELECT * FROM staff WHERE USERNAME=?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $username);
        if (!$stm->execute()){
            return array('code' => 1, 'message' => 'Không thể thực thi câu lệnh sql'); // return array(code, message)
        }

        $result = $stm->get_result();
		$data = $result->fetch_assoc();
        if ($result->num_rows==0){
            return array('code' => 2, 'message' => 'Không tồn tại tài khoản'); // return array(code, message)
        }

        return array('code' => 0, 'message' => 'success', 'data' => $data);
    }

    function update_avatar($image, $username){
        $conn = get_connection();
        $sql = "UPDATE staff SET IMAGE = ? WHERE USERNAME=?";

        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$image, $username);
        if (!$stm->execute()){
            return array('code' => 1, 'message' => 'Không thể thực thi câu lệnh sql'); // return array(code, message)
        }

        return array('code' => 0, 'message' => 'success');
    }

    function update_name_staff($name, $username){
        $conn = get_connection();
        $sql = "UPDATE staff SET FULLNAME = ? WHERE USERNAME=?";

        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$name, $username);
        if (!$stm->execute()){
            return array('code' => 1, 'message' => 'Không thể thực thi câu lệnh sql'); // return array(code, message)
        }
        return array('code' => 0, 'message' => 'success');
    }
    function change_pass($new, $username){
        $conn = get_connection();
        $sql = "UPDATE staff SET PWD = ? WHERE USERNAME=?";

        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$new, $username);
        if (!$stm->execute()){
            return array('code' => 1, 'message' => 'Không thể thực thi câu lệnh sql'); // return array(code, message)
        }
        return array('code' => 0, 'message' => 'success');
    }
?>