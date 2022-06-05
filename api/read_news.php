<?php
    header('Content-Type: application/json');
    require_once('../news_db.php');
    require_once('functions.php');

    if (!empty($_POST['id'])) {
        $news = read_news_by_id($_POST['id']);
    } else if (!empty($_POST['title'])) {
        $news = read_news_by_title($_POST['title']);
    } else if (!empty($_POST['id_category'])) {
        $news = read_news_by_id_category($_POST['id_category']);
    } else {
        $news = read_all_news();
    }

    success_response($news, 'Đọc bài viết thành công.');
?>