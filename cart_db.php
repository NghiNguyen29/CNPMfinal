<?php
    require_once "db.php";

    // get all cart by username
    function read_cart_by_username($username) {
        $sql = "SELECT cart.*, cart.QUANTITY as QUANTITY_CART, cart.ID as ID_CART, product.* 
        FROM cart, customer, product 
        WHERE cart.ID_PRODUCT = product.ID and cart.ID_CUSTOMER = customer.ID and customer.USERNAME = ?";
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param("s", $username);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    // add product to cart
    function add_cart($id_product, $id_customer, $quantity) {
        $id_product = (int)$id_product;
        $id_customer = (int)$id_customer;
        $quantity = (int)$quantity;

        $sql_check = 'select * from cart where ID_PRODUCT = ?';
        $conn = get_connection();
        $stm = $conn->prepare($sql_check);
        $stm->bind_param('i', $id_product);
        $stm->execute();
        $result = $stm->get_result();

        // product already exist in cart, update quanitty
        if($result->num_rows > 0) {

            $sql1 = 'update cart set QUANTITY = QUANTITY + ? where ID_PRODUCT = ?';

            $stm1 = $conn->prepare($sql1);
            $stm1->bind_param('ii', $quantity, $id_product);

            $stm1->execute();

            return ($stm1->affected_rows == 1) ? true : false;
        }
        else {  // add product to cart
            $sql2 = "insert into cart(ID_PRODUCT, ID_CUSTOMER, QUANTITY) values(?, ?, ?)";

            $stm2 = $conn->prepare($sql2);
            $stm2->bind_param('iii', $id_product, $id_customer, $quantity);

            $stm2->execute();

            return ($stm2->affected_rows == 1) ? $stm2->insert_id : -1;
        }
    }

    // delete product in cart
    function delete_cart($id) {
        $sql = "DELETE FROM cart WHERE id = ?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        
        $stm->execute();
        
        return $stm->affected_rows == 1;
    }

    // update quantity in cart
    function update_cart_quantity($id_product, $action) {
        if($action == 'increase') {
            $sql = 'update cart set QUANTITY = QUANTITY + 1 where ID_PRODUCT = ?';
        }
        else {
            $sql = 'update cart set QUANTITY = QUANTITY - 1 where QUANTITY > 1 and ID_PRODUCT = ?';
        }

            $conn = get_connection();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i', $id_product);

            $stm->execute();

            return ($stm->affected_rows == 1) ? true : false;
    }

    // delete cart by customer id
    function delete_cart_by_customer($id_customer) {
        $sql = "DELETE FROM cart WHERE ID_CUSTOMER = ?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id_customer);
        
        $stm->execute();
        
        return $stm->affected_rows == 1;
    }
?>