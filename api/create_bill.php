<?php
    header('Content-Type: application/json');
    require_once('../bill_db.php');
    require_once('../customer_db.php');
    require_once('../product_db.php');
    require_once('functions.php');

    if (empty($_POST['customerid']) || empty($_POST['staffid']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['total'])) {
        error_response(1, 'Dữ liệu đầu vào không hợp lệ.');
    }

    $customer_id = $_POST['customerid'];
    $staff_id = $_POST['staffid'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $total = $_POST['total'];

    if (!find_customer($customer_id)){
        error_response(2, 'Không tồn tại khách hàng');
    } // kiểm tra có tồn tại khách hàng không
    $id  = create_bill($customer_id, $staff_id, $address, $phone, $total);
    if ($id==false){
        
        error_response(3,'Thêm hóa đơn thất bại');
    } // tạo hóa đơn
    
    if (empty($_POST['products'])) {
        error_response(4, 'Giỏ hàng trống.');
    } // kiểm tra giỏ hàng

    $products = $_POST['products']; //sản phẩm[mã sp, số lượng, thành tiền]
    foreach ($products as $product){
        // thêm hóa chi tiết các sản phẩm vào hóa đơn
        add_to_bill($id,$product[0],$product[1],$product[2]);
        // giảm số lượng trong bảng product
        update_quantity_product($product[0],$product[1]);
    } 

    success_response($id, 'thành công');
