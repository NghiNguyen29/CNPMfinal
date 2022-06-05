<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../stylestaff.css">
    <title>Trang Nhân Viên Bán Hàng</title>
</head>
<body>
    <?php require_once('../includes/header.php') ?>

    <div class="container">
        <div class="row mt-3">
			<?php require_once('../includes/daidienhoatdong.php'); ?>
			<div class="col-lg-3 col-md-3 col-sm-12 col-12" style="margin: auto">
                <div>
                    <a href="quan_ly_hoa_don.php" class="btn" style = "font-weight: bold; color: white; background:#a29bfe; border: 1px solid black;width: 100%">Quản lý hóa đơn</a>
                </div>
                <div style="margin-top:20px">
                    <a href="xem_san_pham.php" class="btn" style = "font-weight: bold; border: 1px solid black;width: 100%">Danh sách sản phẩm</a>
                </div>
                
            </div>
        </div>

		<div class="row" style="margin-bottom: 20px;margin-top: 20px">
            <div class="col-lg-6 col-md-6 col-sm-5 col-12 text-center add" style="height: 55px">
				<a class="btn" style = "font-weight: bold; color: black; border: 1px solid black;display: block; margin-left: 0px; margin-right: auto;width: fit-content;" href="them_hoa_don.php">Thêm hóa đơn +</a>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6 col-11">

            </div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-1 sort text-right">

            </div>
		</div>

		<div style="overflow-x:auto;">
			<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" class="table">
				<thead>
					<tr>
						<td></td>
						<td>Mã Hóa Đơn</td>
						<td>Địa chỉ</td>				
						<td>Tổng Tiền</td>
						<td>Trạng thái</td>
					</tr>
				</thead>
				
                <tbody id="tbody">
                    
                </tbody>
                
			</table>
		</div>
     </div> 
	 <?php require_once('../includes/footer.php') ?>


<!--Update modal-->	 	
<div id="update-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action="" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Cập nhật hóa đơn</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">

                    <div class="form-group">
						<label for="name-u">Tên khách hàng</label>
						<input readonly value="" name="name" required class="form-control" type="text" id="name-u">
					</div>
                    <div class="form-group">
						<label for="phone">Số điện thoại</label>
						<input  value="" name="phone" required class="form-control" type="text" id="phone-u">
					</div>
					<div class="form-group">
						<label for="address-u">Địa chỉ</label>
						<input  value="" name="address-u" required class="form-control" type="text" id="address-u">
					</div>                    
                    <div class="form-group">
						<label for="status-u">Trạng thái</label>
						<select name="status-u" required class="form-control" id="status-u">
							<option value="0">Đang lấy hàng</option>
							<option value="1">Đã lấy hàng</option>
							<option value="2">Đã nhận hàng</option>
            			</select>
					</div>
				</div>
				<div class="modal-footer">
					<input  name="id-bill-u" type="hidden" id="id-bill-u">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button id="update-button" type="button" class="btn btn-success">Cập nhật</button>
				</div>
			</div>
		</form>
	</div>
</div>	 
<!--View modal-->	 
<div id="info-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Xem Hóa Đơn</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                
				<div class="modal-body">
					<div class="form-group">
						<span for="name-customer">Tên khách hàng: </span>
						<b name="name-customer"  id="name-customer"></b>
					</div>
                	<div class="form-group">
						<span for="id-customer">Mã khách hàng: </span>
						<b  name="id-customer" id="id-customer"></b>
					</div>
                    <div class="form-group">
						<span for="id-staff">Mã nhân viên: </span>
						<b  name="id-staff" id="id-staff"></b>
					</div>
                    <div class="form-group">
						<span for="phone">Số điện thoại: </span>
						<b name="phone" id="phone"></b>
					</div>
					<div class="form-group">
						<span for="order-date">Ngày lập: </span>
						<b name="order-date"  id="order-date"></b>
					</div>
					
                    
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#details-modal">Chi tiết</button>
				</div>
			</div>
	</div>
</div>
<!--View details modal-->	 
<div id="details-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Xem Chi Tiết Hóa Đơn</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                
				
					<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" class="table">
						<thead>
							<tr>
								<td>Tên sản phẩm</td>
								<td>Số lượng</td>				
								<td>Đơn giá</td>
							</tr>
						</thead>
						
						<tbody id="tbody-details">
							
						</tbody>
						
					</table>                  
			
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
				</div>
			</div>
	</div>
</div>
<!-- Delete Confirm Modal -->
<div id="delete-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action="" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<hp class="modal-title">Xóa Hóa đơn</hp>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<p>Bạn có chắc rằng muốn xóa <strong></strong> ?</p>
					<div class="form-group">
						<label for="status-u">Mã hóa đơn</label>
						<input readonly  value="" class="form-control" name="id-bill" id="id-bill-d">
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="delete">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<button id="delete-button" type="button" class="btn btn-danger">Xóa</button>
				</div>
			</div>
		</form>
	</div>
</div>	 

    
<script>
	function getBill(){
        $.get("http://localhost:8080/api/read_bill.php", function(data, status) {
            let tableBody = ``
            data.data.forEach(element => {
				const status = ['Đang lấy hàng','Đã lấy hàng', 'đã nhận hàng']
                tableBody += `
                <tr class="item">
					<td>
						<a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" onclick="readBill(this)">
							<span><i class="fas fa-eye"></i></span> 
						</a>
						<a href="#" class="btn edit idUpdate" style="border-radius: 70%; background-color: #D8D8D8" onclick='updateBill(this)'>
                        	<span><i class="fas fa-pen"></i></span>
                        </a>
                        <a href="#" class="btn delete" style="border-radius: 70%; background-color: #D8D8D8" onclick='deleteBill(this)'>
                            <span><i class="fas fa-trash-alt"></i></span> 
                        </a>
					</td>
					<td>`+element.ID+`</td>
					<td style="display:none">`+element.CUSTOMER_ID+`</td>
					<td style="display:none">`+element.STAFF_ID+`</td>
					<td style="display:none">`+element.ORDER_DATE+`</td>
					<td style="display:none">`+element.NAME+`</td>
					<td>`+element.ADDRESS+`</td>
					<td style="display:none">`+element.PHONE+`</td>
					<td>`+new Intl.NumberFormat().format(element.TOTAL)+`</td>
					<td>`+status[element.STATUS]+`</td>
					<td style="display:none">`+element.STATUS+`</td>
				</tr>
                `
            })
            $('#tbody').html(tableBody);
        },"json");
	}
	getBill()
	function readBill(aTag){
        let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

        let idCustomer = tds[2].innerHTML
        let idStaff = tds[3].innerHTML
        let orderDate = tds[4].innerHTML
        let nameCustomer = tds[5].innerHTML
        let phone = tds[7].innerHTML

        $("#name-customer").html(nameCustomer)
        $("#id-customer").html(idCustomer)
        $("#id-staff").html(idStaff)
        $("#phone").html(phone)
		$("#order-date").html(orderDate);

        $('#info-modal').modal({show: true});

		let idBill = tds[1].innerHTML
		$.post("http://localhost:8080/api/read_bill_details.php", {
			idbill: idBill,
		}, function(data,status){
			let tableBody = ``
            data.data.forEach(element => {
                tableBody += `
                <tr>
					<td>`+element.TITLE+`</td>
					<td>`+element.QUANTITY+`</td>
					<td>`+new Intl.NumberFormat().format(element.PRICE)+`</td>
				</tr>
                `
			})
			$('#tbody-details').html(tableBody);
		},"json");
    }
	function updateBill(aTag){
        let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

        let status = tds[10].innerHTML
        let nameCustomer = tds[5].innerHTML
        let phone = tds[7].innerHTML
		let address = tds[6].innerHTML
		let idBill = tds[1].innerHTML

        $("#name-u").val(nameCustomer)
        $("#status-u").val(status)
        $("#phone-u").val(phone)
		$("#address-u").val(address);
		$("#id-bill-u").val(idBill)	

        $('#update-modal').modal({show: true});
    }
	$("#update-button").click(function(){
		$.post("http://localhost:8080/api/update_bill.php", {
			idbill: 1*$("#id-bill-u").val()	,
			address: $("#address-u").val(),
			phone: 1*$("#phone-u").val(),
			status: 1*$("#status-u").val()
		}, function(data){
			if (data.code == 0){
				$('#update-modal').modal('hide');
				showSuccessToast("Sửa hóa đơn thành công")
				getBill()
			} else {
				$('#update-modal').modal('hide');
				showErrorToast("Sửa hóa đơn thất bại")
				getBill()
			}
		},"json");
	})

	function deleteBill(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

		let idBill = tds[1].innerHTML
		$('#id-bill-d').val(idBill)
		$('#delete-modal').modal({show: true});
	}
	$("#delete-button").click(function(){
		$.post("http://localhost:8080/api/delete_bill.php", {
			idbill: $('#id-bill-d').val(),
		}, function(data){
			if (data.code == 0){
				$('#delete-modal').modal('hide');
				showSuccessToast("Xóa hóa đơn thành công")
				getBill()
			} else {
				$('#delete-modal').modal('hide');
				showErrorToast("Xóa hóa đơn thất bại")
				getBill()
			}
		},"json");
	})

</script>
</body>
</html>