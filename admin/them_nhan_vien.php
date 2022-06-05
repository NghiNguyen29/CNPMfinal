<?php
    require_once('../db.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register an account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .bg {
            background: #eceb7b;
        }
        body {

            /* Color & Background */
            background-attachment: scroll;
            background-color: #a29bfe;
            background-image: linear-gradient(85deg, #f0fdfa 0%, #a29bfe 100%);
            background-position: 0% 0%;
            background-repeat: repeat;
            color: rgb(33, 37, 41);

        }

        
        h3 {
            font-family: Poppins, sans-serif;
        }
        .register-form {
            background: white;
            border-radius: 20px !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 border my-5 p-4 rounded mx-3 register-form">
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Tạo tài khoản nhân viên</h3>
                <form method="post" action="" novalidate>
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input value="" name="fullname" required class="form-control" type="text" placeholder="Nhập họ và tên" id="fullname">
                    </div>
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input value="" name="username" required class="form-control" type="text" placeholder="Tên đăng nhập" id="username">
                        <div class="invalid-feedback">Vui lòng nhập tên đăng nhập</div>
                    </div>
                    <div class="form-group">
						<label for="role">Chức vụ</label>
						<select name="role" required class="form-control" id="role">
                            <option value="1">kế toán</option>
                            <option value="2">kho</option>
                            <option value="3">bán hàng</option>
                            <option value="4">biên tập</option>
							
						</select>
					</div>
				
                    <div class="form-group">
                        <div id="validate" style="display:none" class="alert alert-danger text-center"></div>
                        <button type="button" id="register-button" style="background:#a29bfe" class="btn text-white px-5 mt-3 mr-2">Thêm nhân viên</button>
                        <button type="reset" class="btn btn-outline-success px-5 mt-3">Đặt lại</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>
<script>
    $("#register-button").click(function () {
        let fullnameC = $('#fullname').val()
        let usernameC = $('#username').val()
        let roleC = $('#role').val();
        if (fullname=='' || username=='' || role==''){
            console.log('empty info');
        }else {
            $.post("http://localhost:8080/api/add_staff.php", {
                fullname: fullnameC,
                username: usernameC,
                role: roleC,
            }, function(data) {
                if (data.code==0){
                    alert(data.message)
                    window.location.href="danh_sach_nhan_vien.php"
                } else {
                    $("#validate").html(data.message)
                    $("#validate").show()
                }
            })
        }
    });
</script>
</html>

