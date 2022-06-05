<?php
    header('Content-Type: application/json');
    require_once('../news_category_db.php');
    require_once('functions.php');

    if (empty($_POST['name'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $name = $_POST['name'];

    $id = add_news_category($name);
    
    if ($id < 0) {
        error_response(3, 'Thêm danh mục bài viết thất bại.');
    }

    success_response($id, 'Thêm danh mục bài viết thành công.');
?>