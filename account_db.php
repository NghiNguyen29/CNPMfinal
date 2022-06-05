<?php
    require_once('db.php');
//login
    function login($user, $pass){
		$actor = login_customer($user, $pass);
        if ($actor['code'] == 0){
            $actor['who'] = 0;
            return $actor;
        }
        $actor = login_staff($user, $pass);
        if ($actor['code'] == 0){
            $actor['who'] = 1;
            return $actor;
        }
        return $actor;
    }
    // chức năng đăng nhập của khách hàng
    function login_customer($user, $pass){
        $conn = get_connection();
        $sql = "SELECT * FROM customer WHERE USERNAME=?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $user);
        if (!$stm->execute()){
            return array('code' => 1, 'message' => 'Không thể thực thi câu lệnh sql'); // return array(code, message)
        }
        $result = $stm->get_result();
		$data = $result->fetch_assoc();
        if ($result->num_rows==0){
            return array('code' => 2, 'message' => 'Không tồn tại tài khoản'); // return array(code, message)
        }
		$password = $data['PWD'];
        if (!($pass == $password)){
            return array('code' => 3, 'message' => 'Sai mật khẩu'); // return array(code, message)
        }
        return array('code'=>0, 'message' =>'success', 'data' => $data);
    }
    // chức năng đăng nhập của nhân viên
    function login_staff($user, $pass){
        $conn = get_connection();
        $sql = "SELECT * FROM staff WHERE USERNAME=?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $user);
        if (!$stm->execute()){
            return array('code' => 1, 'message' => 'Không thể thực thi câu lệnh sql'); // return array(code, message)
        }
        $result = $stm->get_result();
		$data = $result->fetch_assoc();
        if ($result->num_rows==0){
            return array('code' => 2, 'message' => 'Không tồn tại tài khoản'); // return array(code, message)
        }
		$password = $data['PWD'];
        if (!($pass == $password)){
            return array('code' => 3, 'message' => 'Sai mật khẩu'); // return array(code, message)
        }
        return array('code'=>0, 'message' =>'success', 'data' => $data);
    }
    //-------------------------------------------------------------------------
    //đăng ký
    function register($fullname, $username, $email, $pwd){
        if (is_email_exists($email)){
            return array('code' => 2, 'message' => 'Email đã tồn tại');; // return array(code, message)
        }
        if (is_username_exists($username)){
            return array('code' => 2, 'message' => 'Username đã tồn tại');; // return array(code, message)
        }
        $conn = get_connection();
        $sql = 'INSERT INTO customer(FULLNAME,USERNAME,EMAIL,PWD,ADDRESS,IMAGE) value(?,?,?,?, "", "user.png")';
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssss',$fullname, $username, $email, $pwd);
        if (!$stm->execute()){
            return array('code' => 1, 'message' => 'không thể thực thi câu lệnh sql');; // return array(code, message)
        }
        return array('code' => 0, 'message' => 'thành công');
    }

    // kiểm tra email tồn tại chưa
	function is_email_exists($email){
        $sql = "SELECT * FROM customer WHERE EMAIL=?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $email);
        if (!$stm->execute()){
            return false;
        } 

        $result = $stm->get_result();
        if ($result->num_rows==0){
            return false; 
        } else return true; 
    }
	
	// kiểm tra username tồn tại chưa kiểm tra ở cả 2 bảng nhân viên và khách hàng
	function is_username_exists($username){
        $sql = "SELECT USERNAME, FULLNAME FROM customer WHERE USERNAME=? UNION ALL SELECT USERNAME, FULLNAME FROM staff WHERE USERNAME=?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ss', $username, $username);
        if (!$stm->execute()){
            return false;
        } 

        $result = $stm->get_result();
        if ($result->num_rows==0){
            return false; 
        } else return true; 
    }
    //-------------------------------------------------------------------------
