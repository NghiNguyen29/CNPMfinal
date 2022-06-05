<?php
    require_once "db.php";

    

    function add_product_category($category_name) {
        $sql = 'INSERT INTO productcategory(name) VALUES(?)';
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $category_name);
        
        $stm->execute();

        return ($stm->affected_rows == 1) ? $stm->insert_id : -1;
    }
    
    function read_all_product_categories() {
        $sql = 'SELECT * FROM productcategory';

        $conn = get_connection();
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }
    function read_product_category_by_id($id){
        $sql = 'SELECT * FROM productcategory WHERE ID=?';

        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        $stm->execute();

        $result = $stm->get_result();
        return $result->fetch_assoc();
    }

    function update_product_category($name, $id) {
        $sql = "
            UPDATE  productcategory
            SET     name = ?
            WHERE   id = ?;
        ";
        
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('si', $name, $id);
        
        $stm->execute();

        return ($stm->affected_rows == 1) ? true : false;
    }

    function delete_product_category($id) {
        $sql = "DELETE FROM productcategory WHERE id = ?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        
        $stm->execute();
        
        return $stm->affected_rows == 1;
    }
?>