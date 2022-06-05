<?php
    header('Content-Type: application/json');
    require_once('../product_db.php');
    require_once('functions.php');

    if (empty($_POST['id']) ||empty($_POST['image']) 
            || empty($_POST['title']) || empty($_POST['price']) || empty($_POST['desc']) 
                    || empty($_POST['id_category'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $id_product = intval($_POST['id']);
    $image = $_POST['image'];
    $title = $_POST['title'];
    $price = intval($_POST['price']);
    $desc = $_POST['desc'];
    $id_category = $_POST['id_category'];


    if ($price < 1) {
        error_response(2, 'Giá sản phẩm phải lớn hơn hoặc bằng 1');
    }

    $id = update_product($id_product, $image, $title, $price, $desc, $id_category);
    
    if ($id == false) {
        error_response(3, 'Chỉnh sửa sản phẩm thất bại.');
    }

    success_response($id, 'Chỉnh sửa sản phẩm thành công.');
?>