<?php
    header('Content-Type: application/json');
    require_once('../news_db.php');
    require_once('functions.php');
    
    if (empty($_POST['id'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $result = delete_news($_POST['id']);
    
    success_response($result, 'Xóa bài viết thành công.');
?>