<?php
    header('Content-Type: application/json');
    require_once('../product_category_db.php');
    require_once('functions.php');

    if (!empty($_POST['id'])){
        $product_categories = read_product_category_by_id($_POST['id']);
    }else 
        $product_categories = read_all_product_categories();

    success_response($product_categories, 'Đọc danh mục sản phẩm thành công.');
?>