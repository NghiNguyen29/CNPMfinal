<?php
    require_once "db.php";

    // thêm nhân viên
    function add_staff($fullname, $username, $role){
        $conn = get_connection();
        $sql = 'INSERT INTO staff (fullname,pwd, username, ID_ROLE) VALUES (?,?,?,?)';
        $stm = $conn->prepare($sql);
        $stm->bind_param('sssi',$fullname,$username, $username, $role);
        if (!$stm->execute())
            return false;
        return true ;
    }
    // kiểm tra username của nhân viên
    function check_username_staff($username){
        $conn = get_connection();
        $sql = 'SELECT * FROM staff WHERE username=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$username);
        $stm->execute();
        $result = $stm->get_result();
        if ($result->num_rows==0)
            return false;
        return true;
    }
    // tìm nhân viên bằng username
    function find_staff($username){
        $conn = get_connection();
        $sql = 'SELECT ID, USERNAME, FULLNAME, ID_ROLE, IMAGE FROM staff WHERE username=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$username);
        $stm->execute();
        $result = $stm->get_result();
        if ($result->num_rows==0)
            return false;
        return $result->fetch_assoc();
    }
    // tìm nhân viên bằng id
    function find_staff_by_id($id){
        $conn = get_connection();
        $sql = 'SELECT ID, USERNAME, FULLNAME, ID_ROLE, IMAGE FROM staff WHERE ID=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);
        $stm->execute();
        $result = $stm->get_result();
        if ($result->num_rows==0)
            return false;
        return $result->fetch_assoc();
    }

    //cập nhật nhân viên viên
    function update_staff($username){
        $conn = get_connection();
        $sql = 'UPDATE staff SET PWD=? WHERE USERNAME=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$username,$username);
        if (!$stm->execute()){
            return false;
        }
        return true;
    }
    // cập nhật role cho nhân viên 
    function update_role_staff($username, $role){
        $conn = get_connection();
        $sql = 'UPDATE staff SET ID_ROLE=? WHERE USERNAME=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$role,$username);
        if (!$stm->execute()){
            return false;
        }
        return true;
    }
    // xóa nhân viên 
    function delete_staff($username){
        $conn = get_connection();
        $sql = 'DELETE FROM staff WHERE username=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$username);
        if (!$stm->execute()){
            return false;
        }
        return true;
    }
    //đọc dữ liệu các nhân viên trừ quản lý
    function read_all_staff(){
        $conn = get_connection();
        $sql = 'SELECT * FROM staff, role where staff.ID_ROLE = role.ID_ROLE and role.ID_ROLE!=0';
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }