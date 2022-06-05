<?php
    header('Content-Type: application/json');
    require_once('../product_category_db.php');
    require_once('functions.php');

    if (empty($_POST['name'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $name = $_POST['name'];

    $id = add_product_category($name);
    
    if ($id == 0) {
        error_response(3, 'Thêm danh mục sản phẩm thất bại.');
    }

    success_response($id, 'Thêm danh mục sản phẩm thành công.');
?>