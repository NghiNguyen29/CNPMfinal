<?php
    require_once "db.php";



    function add_news_category($name) {
        $sql = 'INSERT INTO newscategory(name) VALUES(?)';
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $name);
        
        $stm->execute();

        return ($stm->affected_rows == 1) ? $stm->insert_id : -1;
    }
    
    function read_all_news_categories() {
        $sql = 'SELECT * FROM newscategory';

        $conn = get_connection();
        $result = $conn->query($sql);
        $output = [];
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }
    // láy tên danh mục
    function read_category($id){
        $conn = get_connection();
        $sql = 'SELECT * FROM newscategory WHERE id=?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        $stm->execute();
        $result = $stm->get_result();
        if ($result->num_rows==0)
            return false;
        return $result->fetch_assoc();
    }

    function update_news_category($name, $id) {
        $sql = "UPDATE  newscategory
                SET     name = ?
                WHERE   id = ?;
        ";
        
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('si', $name, $id);
        
        $stm->execute();

        return ($stm->affected_rows == 1) ? true : false;
    }

    function delete_news_category($id) {
        $sql = "DELETE FROM newscategory WHERE id = ?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        
        $stm->execute();
        
        return $stm->affected_rows == 1;
    }
?>