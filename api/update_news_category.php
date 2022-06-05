<?php
    header('Content-Type: application/json');
    require_once('../news_category_db.php');
    require_once('functions.php');

    if (empty($_POST['id']) || empty($_POST['name'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    
    $id = update_news_category($name, $id);
    
    if ($id == false) {
        error_response(3, 'Chỉnh sửa danh mục sản phẩm thất bại.');
    }

    success_response($id, 'Chỉnh sửa danh mục sản phẩm thành công.');
?>