<?php
    header('Content-Type: application/json');
    require_once('../news_db.php');
    require_once('functions.php');

    if (empty($_POST['id_staff']) || empty($_POST['name']) 
        || empty($_POST['image']) || empty($_POST['content'])
            || empty($_POST['summary']) || empty($_POST['id_category'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    
    $id_staff = $_POST['id_staff'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $id_category = $_POST['id_category'];

    $id = add_news($id_staff, $name, $image, $summary, $content, $id_category);
    
    if ($id < 0) {
        error_response(3, 'Thêm bài viết thất bại.');
    }

    success_response($id, 'Thêm bài viết thành công.');
?>