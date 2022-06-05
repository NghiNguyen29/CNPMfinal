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
                    <a href="danh_sach_nhan_vien.php" class="btn" style = "font-weight: bold; border: 1px solid black;width: 220px">Quản lý nhân viên</a>
                </div>
                <div style="margin-top:20px">
                    <a onclick="getCustomer()" href="" class="btn" style = "background:#a29bfe; font-weight: bold; color: white; border: 1px solid black;width: 220px">Danh sách khách hàng</a>
                </div>
                <div style="margin-top:20px">
                    <a href="danh_sach_hoa_don.php" class="btn" style = "font-weight: bold; border: 1px solid black;width: 220px">Danh sách hóa đơn</a>
                </div>
            </div>
        </div>

		<div style="overflow-x:auto;" class="w-75 mx-auto mt-5">
			<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" class="table table-hover mt-5">
				<thead>
                    <tr class="header">
                        <th></th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
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
					<h3 class="modal-title">Xem thông tin khách hàng</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                
				<div class="modal-body">
                    <div class="form-group">
						<img src="../images/user.png" class="avatar" style="display:block; margin: auto; width:120px; height: 120px">
					</div>
					<div class="form-group">
						<span for="id-customer">Mã khách hàng: </span>
						<b id="id-customer"></b>    
					</div>
					<div class="form-group">
						<span for="name-customer">Tên khách hàng: </span>
						<b id="name-customer"></b>
					</div>
					<div class="form-group">
						<span for="email">Email: </span>
						<b id="email"></b>
					</div>
                    <div class="form-group">
						<span for="address">Địa chỉ: </span>
						<span id="address"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
				</div>
			</div>
	</div>
</div>
    <?php require_once('../includes/footer.php') ?>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    // xem toàn bộ khách hàng
    function getCustomer(){
        $.get("http://localhost:8080/api/read_all_customer.php", function(data, status) {
            let tableBody = ``
            data.data.forEach(element => {
                tableBody += `
                <tr class="item">
                    <td style="width:100px">
                        <a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" onclick="readCustomer(this)">
                            <span><i class="fas fa-eye"></i></span> 
                        </a>
                    </td>
                    <td style="display:none">`+element.ID+`</td>
                    <td>`+element.FULLNAME+`</td>
                    <td style="display:none">`+element.USERNAME+`</td>

                    <td>`+element.EMAIL+`</td>
                    <td>`+element.ADDRESS+`</td>
                    <td style="display:none">`+element.IMAGE+`</td>
                </tr>
                `
            })
            $('#tbody').html(tableBody);
        },"json");
    }
    getCustomer()
    // xem chi tiết khách hàng
    function readCustomer(aTag){
        let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

        let id = tds[1].innerHTML
        let fullname = tds[2].innerHTML
        let username = tds[3].innerHTML
        let email = tds[4].innerHTML
        let address = tds[5].innerHTML
        let image = tds[6].innerHTML

        $("#id-customer").html(id)
        $("#name-customer").html(fullname)
        $("#email").html(email)
        $("#address").html(address)
		$(".avatar").attr("src", "../images/"+image);

        $('#info-modal').modal({show: true});
    }
</script>
</body>
</html>