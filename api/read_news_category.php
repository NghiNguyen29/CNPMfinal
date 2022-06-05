<?php
    header('Content-Type: application/json');
    require_once('../news_category_db.php');
    require_once('functions.php');

    if (!empty($_POST['idcategory'])){
        $news_categories = read_category($_POST['idcategory']);
    } else $news_categories = read_all_news_categories();

    success_response($news_categories, 'Đọc danh mục sản phẩm thành công.');
?>