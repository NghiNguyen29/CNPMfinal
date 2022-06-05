<?php
	session_start();
    require_once('../staff_db.php');
    $staff = find_staff($_SESSION['user']);
    $name_staff = $staff['FULLNAME'];
    $id_staff = $staff['ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../stylestaff.css">
    <title>Trang Thêm Hóa Đơn</title>
   
</head>
<body>
	<?php require_once("../includes/header.php"); ?>		

    <div class="row">
        <div class="col-lg-3" style="background-color: rgb(255,255,255)">
            <div class="mx-3">
                <div class="form-group mt-5">
                    <b>Tên nhân viên: <?=$name_staff?></b> <br/>
                    <i>Mã nhân viên:</i>  <i id="id-staff"><?=$id_staff?></i> <br/>

                    <label class="mt-3" for="id-product">Nhập ID sản phẩm</label>
                    <input id="id-product" type="text" name="id-product" class="form-control">
                    <div>Số lượng sản phẩm còn lại: <i id="remain-product"></i></div>
                </div>
                <div class="form-group">  
                    <div class="row mt-3 mb-3">
                        <div class="col-lg-6">
                            <label for="quantity">Nhập số Lượng</label>
                            <input id="quantity" type="text" name="quantity" class="form-control" value="1">
                        </div>
                        <div class="col-lg 6">
                            <label for="offer">Khuyến mãi (%)</label>
                            <input id="offer" type="text" name="offer" class="form-control" value="0">
                        </div>
                    </div>            
                </div>
                <div class="form-group">
                    <button onclick="addToBill()" type="button" class="btn btn-info" style="float:right">Thêm</button>
                    <button onclick="window.location.href='quan_ly_hoa_don.php'" type="button" class="btn btn-dark mb-4" style="float:right; margin-right: 20px">Trở về</button>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="mx-3">
                <div class="mt-3 mb-5" style="width:100%">
                    <table cellpadding="0" cellspacing="0" class="table table-striped mt-3 mb-5" style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <td colspan="5" style="text-align:center;"><b>Hóa Đơn</b></td>
                            </tr>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td>Giá</td>
                                <td>Số lượng</td>
                                <td>Thành tiền(VNĐ)</td>
                                <td>Chỉnh sửa</td>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            
                        </tbody>
                    </table>
                    <hr size="1">
                    <div class="form-group">
                        <label for="id-customer">Nhập mã khách hàng</label>
                        <input id="id-customer" type="text" name="id-customer" class="form-control" value="">

                        <label for="phone">Nhập số điện thoại</label>
                        <input id="phone" type="text" name="phone" class="form-control" value="">

                        <label for="address">Địa chỉ</label>
                        <input id="address" type="text" name="address" class="form-control" value="">
                    </div>
                    Ngày Lập: <?=date('Y-m-d');?>            
                    <a onclick="createBill()" class="btn btn-info" href="#" style="float:right; margin-bottom: 20px">Xuất Hóa Đơn</a>
                </div>
            </div>
        </div>
    </div>
	<?php require_once("../includes/footer.php"); ?>	

<!--create modal-->	 	
<div id="create-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action="" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Tạo hóa đơn</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">

                    <div class="form-group">
						<span>Tên khách hàng: </span>
						<i name="name-c" id="name-c"></i> <br/>

                        <span>mã khách hàng: </span>
						<i name="id-customer-c"  id="id-customer-c"></i><br/>

                        <span>Địa chỉ: </span>
						<i name="address-c" id="address-c"></i><br/>

                        <span>Số điện thoại: </span>
						<i name="phone-c" id="phone-c"></i><br/>
					</div>    
                    <div class="form-group">
						<table cellpadding="0" cellspacing="0" class="table table-striped mt-3" style="border-collapse: collapse;">
                            <thead>
                                <tr class="header">
                                    <td>Tên sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td>Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody id="bill-details">
                                
                            </tbody>
                        </table>
					</div>                
  
				</div>
				<div class="modal-footer">
					<input type="hidden" name="update">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button id="create-button" type="button" class="btn btn-success">Tạo</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
    let total = 0
    let products = [] // sản phẩm[mã sp, số lượng, thành tiền]
    function createBill(){ // tạo hóa đơn từ các sản phẩm
        let div = document.getElementById('table-body');
        let trs = div.getElementsByTagName("tr")
        // lấy thông tin để tạo hóa đơn
        let customerid = $('#id-customer').val() // mã khách hàng
        let address = $('#address').val() // địa chỉ
        let phone = $('#phone').val() // số điện thoại
        let staffid = $('#id-staff').html() // mã nhân viên
        let billDetails = ``
        products = []
        total = 0
        for (let i = 0; i < trs.length; i++){
            let tds = trs[i].getElementsByTagName("td")
            products.push([1*tds[4].innerHTML,1*tds[2].innerHTML,1*tds[5].innerHTML])
            total += 1*tds[5].innerHTML
            billDetails += `
            <tr">
                <td>`+tds[0].innerHTML+`</td>
                <td>`+tds[2].innerHTML+`</td>
                <td>`+tds[3].innerHTML+`</td>
            <tr>
            `
        }

        billDetails += `
            <tr">
                <td colspan="2"><b>Tổng tiền</b></td>
                <td style="display:none">`+total+`</td>
                <td>`+new Intl.NumberFormat().format(total)+`</td>
            <tr>
        `
        $('#bill-details').html(billDetails)

        if (address==''){
            $('#address').val('19 Nguyễn Hữu Thọ, P.Tân Phong, Q.7, HCM') // địa chỉ cửa hàng
        } 
        if (phone==''){
            $('#phone').val('0123456789') // sdt cửa hàng
        }
        
        $.post("http://localhost:8080/api/find_customer.php", { // lấy tên khách hàng
                customerid: customerid
			}, function(data){
                if (data.code==0){
                    $('#name-c').html(data.data.FULLNAME)
                } else {
                    showSuccessToast("Khách vãng lai")
                    $('#name-c').html('Khách vãng lai')
                    $('#id-customer').val('1')
                }
			},"json");

        $('#id-customer-c').html($('#id-customer').val())
        $('#address-c').html($('#address').val())
        $('#phone-c').html($('#phone').val())
        // hiện modal để tạo hóa đơn
        $('#create-modal').modal({show: true}) 
    }
    // tạo hóa đơn và chi tiết hóa đơn
    $("#create-button").click(function(){
        if ($('#id-customer').val()==''){
            $('#id-customer').val('1')
        }

        $.post("http://localhost:8080/api/create_bill.php", {
            customerid: $('#id-customer').val(),
            staffid: $('#id-staff').html(),
            address: $('#address').val(),
            phone: $('#phone').val(),
            total: total,
            products: products
        }, function(data){
            if (data.code==0){
                $("#create-modal").modal('hide')
                alert("Tạo hóa đơn thành công");
                window.location.href='quan_ly_hoa_don.php'
            } else {
                $("#create-modal").modal('hide')
                showErrorToast("Tạo hóa đơn thất bại")
            }
            
        },"json");
    })  

    function addToBill(){ // thêm sản phẩm vào màn hình
        let productid = $('#id-product').val() // id sản phẩm
        let quantity = $('#quantity').val() // số lượng
        let offer = $('#offer').val() // khuyến mãi

        let price = 0
        let productName = ''
        let remainingQuantity = 0
        if (offer < 0 || offer > 100){
            offer = 0
            showErrorToast("Dữ liệu không hợp lệ")
        } else if(quantity < 0){
            showErrorToast("Dữ liệu không hợp lệ")
        }  
        else {
            $.post("http://localhost:8080/api/read_product_by_id.php", {
                id: productid
                }, function(data){
                    console.log(data)
                    if (data.code == 2){
                        showErrorToast("Sản phẩm không tồn tại")
                    }
                    if (data.code==0){
                        price = data.data.PRICE
                        productName = data.data.TITLE
                        remainingQuantity = data.data.QUANTITY

                        let productForAdd = $('#table-body').html()
                        let p = document.getElementsByClassName("product-add")
                        let listID = []
                        for (let i = 0; i < p.length; i++){
                            listID.push(1*p[i].innerHTML)
                        }
                            
                        if (1*remainingQuantity-quantity < 0){
                            showErrorToast(`Chỉ còn <b>`+remainingQuantity+`</b> trong kho`)

                        } else if(listID.indexOf(1*productid) >= 0){// cập nhật lại số lượng sp đã thêm
                            showSuccessToast("Đã cập nhật lại số lượng sản phẩm")
                            let index = listID.indexOf(1*productid)
                            let tr = p[index].parentElement
                            let tds = tr.getElementsByTagName("td")
                            tds[2].innerHTML = 1*quantity + 1*tds[2].innerHTML
                            tds[3].innerHTML = new Intl.NumberFormat().format((quantity*price*((100-offer)/100)) + 1*tds[5].innerHTML)
                            tds[5].innerHTML = quantity*price*((100-offer)/100) + 1*tds[5].innerHTML
                        } else { // thêm sản phẩm khác
                            showSuccessToast("Đã thêm sản phẩm")
                            let toAdd = `
                            <tr>
                                <td>`+productName+`</td>
                                <td>`+new Intl.NumberFormat().format(price)+`</td>
                                <td>`+quantity+`</td>
                                <td>`+new Intl.NumberFormat().format((quantity*price*((100-offer)/100)))+`</td>
                                <td style=" display:none" class="product-add">`+productid+`</td>
                                <td style=" display:none" >`+(quantity*price*((100-offer)/100))+`</td>
                                <td><a href="#">Edit</a> | <a href="#" onclick="deleteThis(this)">Delete</a></td>
                                
                            </tr>
                            `
                            $('#table-body').html(productForAdd+toAdd)
                        }
                    }
                },"json"
            );
        }
        
    }
    
    $('#id-product').keyup(()=>{ // hiện số lượng của sản phẩm
        let productid = $('#id-product').val() // id sản phẩm
        if (productid != ''){
            $.post("http://localhost:8080/api/read_product_by_id.php", {
                id: productid
                }, function(data){
                    if (data.code == 2){
                    showErrorToast("Sản phẩm không tồn tại")
                    $("#remain-product").html(0)
                } else {
                    $("#remain-product").html(data.data.QUANTITY)
                }
                    
                },"json"
            );
        } else {
            $("#remain-product").html(0)
        }
    })
    function deleteThis(a){
        let td = a.parentElement
        let tr = td.parentElement
        tr.remove()
    }
</script>
</body>
<link rel="stylesheet" href="../stylestaff.css">
</html>