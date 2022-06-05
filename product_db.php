<?php
    require_once "db.php";

    function add_product($image, $title, $price,$quantity, $desc, $id_category) {
        $sql = '
            INSERT INTO product(image, title, price,quantity, discription, id_category) 
            VALUES(?, ?, ?, ?, ?, ?) 
        ';
        $conn = get_connection();
        $quantity = 0;
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssiisi', $image, $title, $price,$quantity, $desc, $id_category);
        
        $stm->execute();

        return ($stm->affected_rows == 1) ? $stm->insert_id : -1;
    }
    
    function read_all_products() {
        $sql = 'SELECT * FROM product';

        $conn = get_connection();
        $result = $conn->query($sql);
        $output = [];
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    function read_product_by_id($id) {
        $sql = "SELECT * FROM product WHERE id=?";
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        $stm->execute();

        $result = $stm->get_result();
        if ($result->num_rows==0)
            return false;
        return $result->fetch_assoc();
    }


    function read_product_by_title($title) {
        $sql = "SELECT * FROM product WHERE title LIKE CONCAT('%',?,'%')";
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param("s", $title);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    function read_products_by_id_category($id_category) {
        $sql = "SELECT * FROM product WHERE id_category = ?";
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param("i", $id_category);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    function update_product($id, $image, $title, $price, $desc, $id_category) {
        $sql = "UPDATE  product
                SET     image = ?,
                        title = ?, 
                        price = ?,
                        discription = ?,
                        id_category = ?
                WHERE   id = ?;
        ";

        // die($sql);

        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ssisii', $image, $title, $price, $desc, $id_category,$id);
        
        $stm->execute();

        return ($stm->affected_rows == 1) ? true : false;
    }

    function delete_product($id) {
        $sql = "DELETE FROM product WHERE id = ?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        
        $stm->execute();
        
        return $stm->affected_rows == 1;
    }
    // giảm số lượng sản phẩm khi lập hóa đơn
    function update_quantity_product($id_product, $quantity){
        $conn = get_connection();
        $sql = 'UPDATE product SET QUANTITY=QUANTITY-? WHERE ID = ?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('ii', $quantity, $id_product);
        return $stm->execute();
    }
    function add_quantity_product($id_product, $quantity){
        $conn = get_connection();
        $sql = 'UPDATE product SET QUANTITY=QUANTITY+? WHERE ID = ?';
        $stm = $conn->prepare($sql);
        $stm->bind_param('ii', $quantity, $id_product);
        return $stm->execute();
    }
?>