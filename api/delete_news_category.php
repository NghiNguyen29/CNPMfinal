<?php
    header('Content-Type: application/json');
    require_once('../news_category_db.php');
    require_once('functions.php');
    
    if (empty($_POST['id'])) {
        error_response(4, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $result = delete_news_category($_POST['id']);
    
    success_response($result, 'Xóa danh mục bài viết thành công.');
?>