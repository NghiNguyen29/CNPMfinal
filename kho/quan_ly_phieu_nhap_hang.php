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
    <title>Trang Nhân Viên Kho</title>
</head>
<body>
    <?php require_once('../includes/header.php') ?>

    <div class="container">

		<div class="row mt-3">
			<?php require_once('../includes/daidienhoatdong.php'); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="margin: auto">
				<div style="margin-bottom:20px">
                    <a href="quan_ly_san_pham.php" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 230px">Quản Lý Sản Phẩm</a>
                </div>
                <div>
                    <a href="quan_ly_danh_muc.php" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 230px">Quản Lý Danh Mục</a>
                </div>
                <div style="margin-top:20px">
                    <a href="" class="btn" style = "font-weight: bold; color: white; background:#a29bfe; border: 1px solid black;width: 230px">Quản Lý phiếu nhập hàng</a>
                </div>
            </div>
        </div>

		<div class="row" style="margin-bottom: 20px;margin-top: 20px">
            <div class="col-lg-6 col-md-6 col-sm-5 col-12 text-center add" style="height: 55px">
				<a class="btn" style = "font-weight: bold; color: black; border: 1px solid black;display: block; margin-left: 0px; margin-right: auto;width: fit-content;" href="them_phieu_nhap_hang.php">Thêm phiếu nhập hàng +</a>
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
						<td>Mã phiếu nhập</td>
						<td>Nơi giao</td>				
						<td>Tổng Tiền</td>
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
					<h3 class="modal-title">Cập nhật phiếu nhập hàng</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">

                    <div class="form-group">
						<label for="idWR-u">Mã phiếu nhập hàng</label>
						<input readonly value="" name="idWR-u" required class="form-control" type="text" id="idWR-u">
					</div>
                    <div class="form-group">
						<label for="phone-u">Số điện thoại</label>
						<input  name="phone-u" required class="form-control" type="text" id="phone-u">
					</div>
					<div class="form-group">
						<label for="address-u">Địa chỉ</label>
						<input  name="address-u" required class="form-control" type="text" id="address-u">
					</div>                    
				</div>
				<div class="modal-footer">
					<input type="hidden" name="update">
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
					<h3 class="modal-title">Xem Phiếu nhập hàng</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                
				<div class="modal-body">
                    <div class="form-group">
						<span for="id-staff">Tên nhân viên: </span>
						<b name="id-staff" id="id-staff"></b>
					</div>
                    <div class="form-group">
						<span for="phone">Số điện thoại: </span>
						<b  name="phone" id="phone"></b>
					</div>
					<div class="form-group">
						<span for="received-date">Ngày nhận: </span>
						<b name="received-date" id="received-date"></b>
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
					<h3 class="modal-title">Xem Chi Tiết Phiếu nhập hàng</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
					<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" class="table">
						<thead>
							<tr>
								<td>Tên sản phẩm</td>
								<td>Số lượng</td>				
								<td>Thành tiền</td>
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
						<input readonly  value="" class="form-control" name="id-WR" id="id-WR-d">
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
	getWR()
	function getWR(){
        $.get("http://localhost:8080/api/read_warehouse_receipt.php", function(data, status) {
            let tableBody = ``
            data.data.forEach(element => {
                tableBody += `
                <tr class="item">
					<td>
						<a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" onclick="readWR(this)">
							<span><i class="fas fa-eye"></i></span> 
						</a>
						<a href="#" class="btn edit idUpdate" style="border-radius: 70%; background-color: #D8D8D8" onclick='updateWR(this)'>
                        	<span><i class="fas fa-pen"></i></span>
                        </a>
                        <a href="#" class="btn delete" style="border-radius: 70%; background-color: #D8D8D8" onclick='deleteWR(this)'>
                            <span><i class="fas fa-trash-alt"></i></span> 
                        </a>
					</td>
					<td>`+element.ID+`</td>
					<td style="display:none">`+element.STAFF_ID+`</td>
					<td style="display:none">`+element.RECEIVED_DATE+`</td>
					<td>`+element.DELIVERY_PLACE+`</td>
					<td style="display:none">`+element.PHONE+`</td>
					<td>`+new Intl.NumberFormat().format(element.TOTAL)+`</td>
				</tr>
                `
            })
            $('#tbody').html(tableBody);
        },"json");
	}
	function readWR(aTag){
        let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

		let idWR = tds[1].innerHTML
        let idStaff = tds[2].innerHTML
        let receivedDate = tds[3].innerHTML
        let deliveryPlace = tds[4].innerHTML
        let phone = tds[5].innerHTML
        let total = tds[6].innerHTML

		$("#phone").html(phone)
		$("#received-date").html(receivedDate);

		$.post("http://localhost:8080/api/find_staff.php", {
			id: idStaff,
		}, function(data,status){
			$("#id-staff").html(data.data.FULLNAME)
		},"json");
        $('#info-modal').modal({show: true});
		// load chi tiết
		$.post("http://localhost:8080/api/read_warehouse_receipt_details.php", {
			idWR: idWR,
		}, function(data,status){
			console.log(data)
			if (data.code==0){
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
			} else {
				$('#tbody-details').html('');
				showErrorToast("Không có chi tiết hóa đơn này")
			}
			
		},"json");
    }
	// cập nhật số điện thoại, nơi giao
	function updateWR(aTag){ // 
        let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

        let idWR = tds[1].innerHTML
        let deliveryPlace = tds[4].innerHTML
        let phone = tds[5].innerHTML

		$('#idWR-u').val(idWR)
        $("#phone-u").val(phone)
		$("#address-u").val(deliveryPlace);
	
		$('#update-modal').modal({show: true});

    }
	$("#update-button").click(function(){
		if ($('#idWR-u').val()=='' || $('#phone-u').val()=='' || $('#address-u').val()==''){
			showErrorToast("Thông tin không được để trống")
		} else {
			$.post("http://localhost:8080/api/update_warehouse_receipt.php", {
				idWR: $('#idWR-u').val(),
				address: $("#address-u").val(),
				phone: $("#phone-u").val(),
			}, function(data){
				if (data.code == 0){
					$('#update-modal').modal('hide');
					showSuccessToast("Cập nhật phiếu nhập hàng thành công")
					getWR()
				} else {
					$('#update-modal').modal('hide');
					showErrorToast("Cập nhật phiếu nhập hàng thất bại")
					getWR()
				}
			},"json");
		}
		
	})

	function deleteWR(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

		let idWR = tds[1].innerHTML

		console.log($('#id-WR-d').val())
		$('#delete-modal').modal({show: true});
	}
	$("#delete-button").click(function(){
		$.post("http://localhost:8080/api/delete_warehouse_receipt.php", {
			idWR: $('#id-WR-d').val(),
		}, function(data){
			if (data.code == 0){
				$('#delete-modal').modal('hide');
				showSuccessToast("Xóa phiếu nhập hàng thành công")
				getWR()
			} else {
				$('#delete-modal').modal('hide');
				showErrorToast("Xóa phiếu nhập hàng thất bại")
				getWR()
			}
		},"json");
	})

</script>
</body>
</html>