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
    <title>Trang Quản Lý</title>
</head>
<body>
    <?php require_once('../includes/header.php') ?>

    <div class="container">

        <div class="row mt-3">
            <?php require_once('../includes/daidienhoatdong.php'); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="margin: auto">
                <div>
                    <a href="danh_sach_nhan_vien.php" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 220px">Quản lý nhân viên</a>
                </div>
                <div style="margin-top:20px">
                    <a href="danh_sach_khach_hang.php" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 220px">Danh sách khách hàng</a>
                </div>
                <div style="margin-top:20px">
                    <a onclick="getBill()" href="#" class="btn" style = "font-weight: bold; color: white; background:#a29bfe; border: 1px solid black;width: 220px">Danh sách hóa đơn</a>
                </div>
            </div>
        </div>

		<div style="overflow-x:auto;" class="mt-5">
			<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" class="table table-hover mt-4">
				<thead>
					<tr>
						<th></th>
						<th>Mã Hóa Đơn</th>
						<th>Địa chỉ</th>				
						<th>Tổng Tiền</th>
						<th>Trạng thái</th>
					</tr>
				</thead>
				
                <tbody id="tbody">
                    
                </tbody>
                
			</table>
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
						<span for="name-customer">Tên khách hàng</span>
						<b id="name-customer"></b>
					</div>
                	<div class="form-group">
						<span for="id-customer">Mã khách hàng</span>
						<b id="id-customer"></b>
					</div>
                    <div class="form-group">
						<span for="id-staff">Mã nhân viên</span>
						<b id="id-staff"></b>
					</div>
                    <div class="form-group">
						<span for="phone">Số điện thoại</span>
						<b id="phone"></b>
					</div>
					<div class="form-group">
						<span for="order-date">Ngày lập</span>
						<b id="order-date"></b>
					</div>
					
                    
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#details-modal">Chi Tiết</button>
				</div>
			</div>
	</div>
</div>
<!--View modal-->	 
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
    <?php require_once('../includes/footer.php') ?>
<script>
	
	function getBill(){
        $.get("http://localhost:8080/api/read_bill.php", function(data, status) {
            let tableBody = ``
            data.data.forEach(element => {
				const status = ['Đang lấy hàng','Đã lấy hàng', 'đã nhận hàng']
                tableBody += `
                <tr class="item">
					<td style="width:100px">
						<a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" onclick="readBill(this)">
							<span><i class="fas fa-eye"></i></span> 
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
</script>
</body>
</html>