<?php
    header('Content-Type: application/json');
    require_once('../product_db.php');
    require_once('functions.php');

    if ( empty($_POST['image']) || empty($_POST['title']) 
        || empty($_POST['price']) || empty($_POST['quantity'])
            || empty($_POST['desc']) || empty($_POST['id_category']) ) 
            {
                error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
            }
    
    $image = $_POST['image'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $desc = $_POST['desc']; 
    $id_category = $_POST['id_category'];
            
    if ($price < 1) {
        error_response(2, 'Giá sản phẩm phải lớn hơn hoặc bằng 1');
    }

    $id = add_product($image, $title, $price,$quantity, $desc, $id_category);
    if ($id < 0) {
        error_response(3, 'Thêm sản phẩm thất bại.');
    }

    success_response($id, 'Thêm sản phẩm thành công.');
?>