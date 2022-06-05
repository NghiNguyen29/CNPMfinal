<?php
    header('Content-Type: application/json');
    require_once('../product_db.php');
    require_once('functions.php');

    if (!empty($_GET['id'])) {
        $products = read_product_by_id($_GET['id']);
    } else if (!empty($_GET['title'])) {
        $products = read_product_by_title($_GET['title']);
    } else if (!empty($_GET['id_category'])) {
        $products = read_products_by_id_category($_GET['id_category']);
    } else {
        $products = read_all_products();
    }

    success_response($products, 'Đọc sản phẩm thành công.');
?>