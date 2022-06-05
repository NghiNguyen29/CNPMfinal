<?php 
	session_start();
	require_once('../db.php');

	$username = $_SESSION['user'];
	if (isset($_POST['avatar-update'])){
		if (!empty($_POST['avatar-update'])){
			$result = update_avatar($_POST['avatar-update'],$username);
		}
	}
	if (isset($_POST['name-update'])){
		if (!empty($_POST['name-update'])){
			update_name_staff($_POST['name-update'],$username);
		}
	}
	$error = "";
	if (isset($_POST['confirm-pass']) && isset($_POST['new-pass'])){
		if (!empty($_POST['confirm-pass']) && !empty($_POST['new-pass'])){
			if ($_POST['confirm-pass'] == $_POST['new-pass']){
				change_pass($_POST['new-pass'], $username);
			} else $error='Mật khẩu không khớp';
		} else $error='Không được để trống';
	}
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
    <title>Trang Hồ Sơ Nhân Viên</title>

</head>
<body>
    <?php require_once("../includes/header.php"); ?>
	
	<div class="row ml-2 mt-3">
		<div class="col-lg-4 col-md-12 left">
			<table cellpadding="10" cellspacing="10" class="table table-borderless" style="margin: auto;">
				<tbody>
					<tr>
						<td colspan="4">
							<?php require_once("../includes/daidiennhanvien.php") ?>
						</td>
					</tr>
					<tr class="control" style="text-align: left; font-weight: bold; font-size: 15px;">
						<td colspan="4">
							<a href="hoatdongnhanvien.php">Công việc</a>
						</td>
					</tr>
					<tr class="control" style="text-align: left; font-weight: bold; font-size: 15px; background-color: #F2F2F2">
						<td colspan="3">
							<a href="caidatnhanvien.php">Cài đặt</a>
						</td>
					</tr>
					
				</tbody>
			</table>

		</div>
		
		<div class="col-lg-8 col-md-12 mt-3">
			<form action="" method="POST">
				<div class="font-weight-bold ">Sửa đổi thông tin cá nhân</div> 
				<table id="changeinfo" cellpadding="10" cellspacing="10" border="0" class="table-borderless">
					<tbody>
						<tr>
							<td>
								<div class="form-group">
									<label for="name-update">Họ tên</label>
									<input id="name-update" type="text" name="name-update" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<label for="birth-update">Ngày sinh</label>
									<input id="birth-update" type="date" name="birth-update" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<label for="address-update">Địa chỉ</label>
									<input id="address-update" type="text" name="address-update" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<label for="email-update">Email</label>
									<input id="email-update" type="text" name="email-update" class="form-control">
								</div>
							</td>
						</tr>
						<tr>
							<td><button type="submit" class="btn btn-info">Cập nhật thông tin</button></td>
						</tr>
						<tr>
							<td style="pointer-events:none"><hr size="1"></td>
						</tr>
					</tbody>
				</table>
			</form>
			<button class="btn btn-info ml-3" data-toggle="modal" data-target="#add-avatar">Sửa ảnh</button>
			<button onclick="changePass()" class="btn btn-info ml-3">Đổi mật khẩu</button>
		</div>
	</div>
		

    <?php require_once("../includes/footer.php"); ?>
<!--change pass  modal-->	 	
<div id="change-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action="caidatnhanvien.php" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Đổi mật khẩu</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="name-product-category-c">Mật khẩu mới</label>
						<input  value="" name="new-pass" required class="form-control" type="password" id="name-product-category-c">
					</div>
					<div class="form-group">
						<label for="name-product-category-c">Xác nhận mật khẩu mới</label>
						<input  value="" name="confirm-pass" required class="form-control" type="password" id="name-product-category-c">
					</div>
                </div>

				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
					<button  type="submit" class="btn btn-success">Change</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!--Add modal avatar-->
<div id="add-avatar" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action="caidatnhanvien.php" method="POST" novalidate enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Đổi ảnh đại diện</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="custom-file">
							<input value="" name="image-update" type="file" class="custom-file-input" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp">
							<label class="custom-file-label" for="customFile">Ảnh đại diện</label>
						</div>
					</div>
				<div class="modal-footer">
					<input type="hidden" name="avatar-update" id="avatar-update">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-info">Đổi</button>
				</div>
			</div>
		</form>
	</div>
</div>
	 
<script src="../main.js"></script>
<script>
	function changePass(){
		$("#change-modal").modal('show');
	}
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		$("#avatar-update").val(fileName);
    });
</script>
</body>
<link rel="stylesheet" href="../stylestaff.css">
</html>