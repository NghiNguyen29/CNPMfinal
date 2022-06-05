<?php
    header('Content-Type: application/json');
    require_once('../news_db.php');
    require_once('functions.php');

    if (empty($_POST['news_id']) || empty($_POST['news_name']) 
        || empty($_POST['image']) || empty($_POST['summary'])
            || empty($_POST['content']) || empty($_POST['category_id'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }

    $news_id = $_POST['news_id'];
    $news_name = $_POST['news_name'];
    $image = $_POST['image'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];

    $id = update_news($news_id, $news_name, $image, $summary, $content, $category_id);
    if (!$id) {
        error_response(3, 'Chỉnh sửa bài viết thất bại.');
    }

    success_response($id, 'Chỉnh sửa bài viết thành công.');
?>