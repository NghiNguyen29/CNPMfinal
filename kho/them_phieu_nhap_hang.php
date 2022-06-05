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
    <title>Trang Thêm Phiếu Nhập Kho</title>
   
</head>
<body>
	<?php require_once("../includes/header.php"); ?>		


        <div class="row">
            <div class="col-lg-3" >
                <div class="mx-3">
                    <div class="form-group mt-5">
                        <b>Tên nhân viên: <?=$name_staff?></b> <br/>
                        <i>Mã nhân viên:</i>  <i id="id-staff"><?=$id_staff?></i> <br/>

                        <label class="mt-3" for="id-product">Nhập ID sản phẩm</label>
                        <input id="id-product" type="text" name="id-product" class="form-control">
                        <div>số lượng sản phẩm còn trong kho: <i id="remain-product"></i></div>
                    </div>
                    <div class="form-group">  
                        <label for="quantity">Nhập số Lượng</label>
                        <input id="quantity" type="text" name="quantity" class="form-control" value="1">    
                    </div>
                    <div class="form-group">
                        <button onclick="addToWR()" type="button" class="btn btn-info" style="float:right">Thêm</button>
                        <button onclick="window.location.href='quan_ly_phieu_nhap_hang.php'" type="button" class="btn btn-dark mb-4" style="float:right; margin-right: 20px">trở về</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="mx-3">
                    <div class="mt-3 mb-5" style="width:100%">
                        <table cellpadding="0" cellspacing="0" class="table table-striped mt-3 mb-5" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <td colspan="5" style="text-align:center;"><b>Phiếu nhập kho</b></td>
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
                            <label for="phone">Nhập số điện thoại</label>
                            <input id="phone" type="text" name="phone" class="form-control" value="">

                            <label for="address">Địa chỉ</label>
                            <input id="address" type="text" name="address" class="form-control" value="">
                        </div>
                        Ngày Lập: <?=date('Y-m-d');?>            
                        <a onclick="createBill()" class="btn btn-info" href="#" style="float:right; margin-bottom: 20px">Xuất phiếu nhập hàng</a>
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
					<h3 class="modal-title">Tạo phiếu nhập hàng</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">

                    <div class="form-group">
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
    let products;
    let total;
    function createBill(){ // tạo hóa đơn từ các sản phẩm
        let tbody = document.getElementById('table-body');
        let trs = tbody.getElementsByTagName("tr")

        // lấy thông tin để tạo hóa đơn
        let address = $('#address').val() // địa chỉ
        let phone = $('#phone').val() // số điện thoại
        let staffid = $('#id-staff').html() // mã nhân viên
        products = [] // sản phẩm[mã sp, số lượng, thành tiền]
        total = 0
        let billDetails = ``
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
                <td>`+new Intl.NumberFormat().format(total)+`</td>
            <tr>
        `
        // hiện thông tin lên modal trước khi tạo hóa đơn
        $('#bill-details').html(billDetails)

        $('#address-c').html($('#address').val())
        $('#phone-c').html($('#phone').val())

        // hiện modal để xác nhận tạp hóa đơn
        if (address==""){
            showErrorToast("Địa chỉ trống")
        } else if (phone==""){
            showErrorToast("Số điện thoại trống")
        } else if (products.length==0){
            showErrorToast("Chưa có sản phẩm được thêm")
        }
        else{
            $('#create-modal').modal({show: true})
        }
        // tạo phiếu nhập kho
          
    }
    $("#create-button").click(function(){
        if ($('#address').val()=="" || $('#phone').val() == ""){
            showErrorToast("Dữ liệu không được để trống")
            $('#create-modal').modal('hide')
        } else {
            $.post("http://localhost:8080/api/create_warehouse_receipt.php", {
                staffid: $('#id-staff').html(),
                address: $('#address').val(),
                phone: $('#phone').val(),
                total: total,
                products: products
            }, function(data){
                if (data.code==0){
                    $("#create-modal").modal('hide')
                    alert("Tạo phiếu nhập hàng thành công");
                    window.location.href='quan_ly_phieu_nhap_hang.php'
                } else {
                    $("#create-modal").modal('hide')
                    showErrorToast("Tạo phiếu nhập hàng thất bại")
                }
            },"json");
        }
        
    }) 


    function addToWR(){ // thêm sản phẩm vào màn hình
        let productid = $('#id-product').val() // id sản phẩm
        let quantity = $('#quantity').val() // số lượng
        if (quantity< 0){
            showErrorToast("Dữ liệu không hợp lệ")
        } else {
            $.post("http://localhost:8080/api/read_product_by_id.php", {
                id: productid
                }, function(data){ // có tồn tại
                        if (data.code==0){
                            let price = data.data.PRICE
                            let productName = data.data.TITLE

                            let productForAdd = $('#table-body').html()
                            let p = document.getElementsByClassName("product-add")
                            let listID = []
                            for (let i = 0; i < p.length; i++){
                                listID.push(1*p[i].innerHTML)
                            }
                            if (listID.indexOf(1*productid) >= 0){ // sp đã thêm 
                                showSuccessToast("Đã cập nhật số lượng sản phẩm")
                                let index = listID.indexOf(1*productid)
                                let tr = p[index].parentElement
                                let tds = tr.getElementsByTagName("td")
                                tds[2].innerHTML = 1*quantity + 1*tds[2].innerHTML // số lượng
                                tds[3].innerHTML = new Intl.NumberFormat().format((quantity*price + 1*tds[5].innerHTML))
                                tds[5].innerHTML = quantity*price + 1*tds[5].innerHTML // thành tiền
                            } else { // sp chưa thêm
                                showSuccessToast("Đã thêm sản phẩm")
                                let toAdd = `
                                <tr>
                                    <td>`+productName+`</td>
                                    <td>`+new Intl.NumberFormat().format(price)+`</td>
                                    <td>`+quantity+`</td>
                                    <td>`+new Intl.NumberFormat().format((quantity*price))+`</td>
                                    <td style=" display:none" class="product-add">`+productid+`</td>
                                    <td style=" display:none">`+(quantity*price)+`</td>
                                    <td><a href="#">Edit</a> | <a href="#" onclick="deleteThis(this)">Delete</a></td>
                                </tr>
                                `
                                $('#table-body').html(productForAdd+toAdd) 
                            }
                    } else {
                        showErrorToast(data.message);
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
                } else if (data.code == 0){
                    $("#remain-product").html(data.data.QUANTITY)
                } else {
                    showErrorToast(data.message)
                    $("#remain-product").html(0)
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