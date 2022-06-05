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

	<div class="row ml-2 mt-3">
		<div class="col-lg-4 col-md-12 left">
			<table cellpadding="0" cellspacing="0" class="table table-borderless" style="margin: auto;">
				<tbody>
					<tr>
						<td colspan="4">
							<?php require_once("../includes/daidiennhanvien.php") ?>
						</td>
					</tr>
					<tr class="control" style="text-align: left; font-weight: bold; font-size: 15px; background-color: #F2F2F2"">
						<td colspan="4">
							<a href="">Công việc</a>
						</td>
					</tr>
					<tr class="control" style="text-align: left; font-weight: bold; font-size: 15px">
						<td colspan="3">
							<a href="../common/caidatnhanvien.php">Cài đặt</a>
						</td>
					</tr>

				</tbody>
			</table>

		</div>
		<div class="col-lg-8 card-info">
			<div class="container">
				<div>
					<a onclick="getStaff()" href="" class="btn" style="font-weight: bold; color: white; background:#a29bfe; border: 1px solid black;">Quản lý nhân viên</a>
				</div>
				<div class="mt-2">
					<a href="danh_sach_khach_hang.php" class="btn" style="font-weight: bold; color: black; border: 1px solid black;">Danh Sách khách hàng</a>
				</div>
				<div class="mt-2">
					<a href="danh_sach_hoa_don.php" class="btn" style="font-weight: bold; color: black; border: 1px solid black;">Danh sách hóa đơn</a>
				</div>
				<div class="mt-5 mb-2 add">
					<a class="btn" style="font-weight: bold; color: black; border: 1px solid black;display: block; margin-left: 0px; margin-right: auto;width: fit-content;" href="them_nhan_vien.php">Thêm nhân viên +</a>
				</div>

				<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse;" class="table">
					<thead style="font-weight: bold;">
						<tr style="pointer-events: none;">
							<th class="text-left">Tên nhân viên</td>
							<th class="text-center">Chức vụ</td>
							<th>
								</td>
						</tr>
					</thead>
					<tbody id="tbody" class="nhanvien">
					</tbody>
				</table>
			</div>

		</div>
	</div>
	</div>



	<!--Update modal-->
	<div id="update-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<form action="" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Cập thông tin nhân viên</h3>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" value="" name="username-employee" id="username-employee-u">
						</div>
						<div class="form-group">
							<label for="name-employee-u">Tên nhân viên</label>
							<input readonly value="" name="name-employee" required class="form-control" type="text" id="name-employee-u">
						</div>
						<div class="form-group">
							<label for="role-u">Chức vụ</label>
							<select name="role" required class="form-control" id="role-u">
								<option value="1">kế toán</option>
								<option value="2">kho</option>
								<option value="3">bán hàng</option>
								<option value="4">biên tập</option>

							</select>
						</div>
					</div>

					<div class="modal-footer">
						<input type="hidden" name="update">
						<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
						<button id="change-pwd-button" type="button" class="btn btn-info">Đặt lại mật khẩu</button>
						<button id="update-button" type="button" class="btn btn-success">Cập nhật</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<?php
	require_once('../includes/footer.php');
	?>


	<!--View modal-->
	<div id="info-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Xem thông tin nhân viên</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<img src="../images/user.png" class="avatar" style="display:block; margin: auto; width:120px; height: 120px">
					</div>
					<div class="form-group">
						<span for="id-employee">Mã nhân viên: </span>
						<b id="id-employee"></b>
					</div>
					<div class="form-group">
						<span for="username-employee">Tên đăng nhập: </span>
						<b id="username-employee"></b>
					</div>
					<div class="form-group">
						<span for="name-employee">Tên nhân viên: </span>
						<b id="name-employee"></b>
					</div>
					<div class="form-group">
						<span for="role">Chức vụ: </span>
						<b id="role"></b>
					</div>
				</div>
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
						<hp class="modal-title">Xóa nhân viên</hp>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p>Bạn có chắc rằng muốn xóa ?</p>
						<input readonly value="" class="form-control" name="id-employee" id="name-employ-d">
						<input type="hidden" value="" class="form-control" name="id-employee" id="username-employ-d">
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
		$(".custom-file-input").on("change", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
		// READ 1
		function readInfo(aTag) {
			let td = aTag.parentElement
			let tr = td.parentElement
			let tds = tr.getElementsByTagName("td")

			let id = tds[0].innerHTML
			let fullname = tds[1].innerHTML
			let role = tds[2].innerHTML
			let image = tds[3].innerHTML
			let username = tds[4].innerHTML

			$("#id-employee").html(id)
			$("#username-employee").html(username)
			$("#name-employee").html(fullname)
			$("#role").html(role)
			$(".avatar").attr("src", "../images/" + image);

			$('#info-modal').modal({
				show: true
			});
		}
		// UPDATE
		function updateStaff(aTag) {
			let td = aTag.parentElement
			let tr = td.parentElement
			let tds = tr.getElementsByTagName("td")

			let usernameu = tds[5].innerHTML
			$("#username-employee-u").val(usernameu)
			$("#name-employee-u").val(tds[2].innerHTML)

			$('#update-modal').modal({
				show: true
			});
		}
		// pass
		$('#change-pwd-button').click(function() {
			$.post("http://localhost:8080/api/update_staff.php", {
				username: $("#username-employee-u").val(),
				role: ''
			}, function(data) {
				console.log(data)
				if (data.code == 0) {
					showSuccessToast("Đổi mật khẩu nhân viên thành công")
					$('#update-modal').modal('hide');
					getStaff()
				} else showErrorToast("Đổi mật khẩu nhân viên thất bại")
			})
		})

		$('#update-button').click(function() {
			$.post("http://localhost:8080/api/update_staff.php", {
				username: $("#username-employee-u").val(),
				role: $("#role-u").val()
			}, function(data) {
				console.log(data)
				if (data.code == 0) {
					showSuccessToast("Cập nhật nhân viên thành công")
					$('#update-modal').modal('hide');
					getStaff()
				} else showErrorToast("Cập nhật nhân viên thất bại")
			})
		})
		//DELETE
		function deleteStaff(aTag) {
			let td = aTag.parentElement
			let tr = td.parentElement
			let tds = tr.getElementsByTagName("td")

			let usernamed = tds[5].innerHTML
			let fullname = tds[2].innerHTML
			$("#username-employ-d").val(usernamed)
			$("#name-employ-d").val(fullname)
			$('#delete-modal').modal({
				show: true
			});
		}
		$('#delete-button').click(function(data) {
			$.post("http://localhost:8080/api/delete_staff.php", {
				username: $("#username-employ-d").val(),
			}, function(data) {
				if (data.code == 0) {
					console.log(data)
					showSuccessToast("Xóa nhân viên thành công")
					$('#delete-modal').modal('hide');
					getStaff()
				} else showErrorToast("Xóa nhân viên thất bại")
			})
		})
		// READ all
		function getStaff() {
			$.get("http://localhost:8080/api/read_all_staff.php", function(data, status) {
				let tableBody = ``
				data.data.forEach(element => {
					tableBody += `
                <tr class="item">
					<td style="display:none">`+element.ID+`</td>
                    <td class="text-left">` + element.FULLNAME + `</td>
                    <td class="text-center">` + element.description + `</td>
					<td style="display:none">`+element.IMAGE+`</td>
                    <td style="display:none">`+element.USERNAME+`</td>
					<td class="text-right">
                        <a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" onclick='readInfo(this)'>
                            <span><i class="fas fa-eye"></i></span> 
                        </a>
                        <a href="#" class="btn edit idUpdate" style="border-radius: 70%; background-color: #D8D8D8" onclick='updateStaff(this)'>
                        <span><i class="fas fa-pen"></i></span>
                        </a>
                        <a href="#" class="btn delete" style="border-radius: 70%; background-color: #D8D8D8" onclick='deleteStaff(this)'>
                            <span><i class="fas fa-trash-alt"></i></span> 
                        </a>
                    </td>
                </tr>
                `
				})
				$('#tbody').html(tableBody);
			}, "json");
		}
		getStaff()
	</script>

</body>

</html>