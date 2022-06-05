<?php
    header('Content-Type: application/json');
    require_once('../warehouse_receipt_db.php');
    require_once('../product_db.php');
    require_once('functions.php');

    if (empty($_POST['staffid']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['total'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }
    if (empty($_POST['products'])) {
        error_response(4, 'Giỏ hàng trống.');
    } // kiểm tra giỏ hàng
    $staff_id = $_POST['staffid'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $total = $_POST['total'];

    // tạo phiếu nhập kho
    $id  = create_warehouse_receipt($staff_id, $address, $phone, $total);
    if ($id==false){
        error_response(3,'Thêm phiếu nhập kho thất bại');
    } 
    //sản phẩm[mã sp, số lượng, thành tiền]
    $products = $_POST['products']; 
    foreach ($products as $product){
        // thêm hóa chi tiết các sản phẩm vào phiếu nhập kho
        add_to_warehouse_receipt($id,$product[0],$product[1],$product[2]);
        // giảm số lượng trong bảng product
        add_quantity_product($product[0],$product[1]);
    } 

    success_response($id, 'thành công');
