<?php
    require_once('../account_db.php');
    
    $fullname = '';
    $email = '';
    $username = '';
    $pwd = '';
    $pwd_confirm = '';
    $address='';

    if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['pwd-confirm']))
    {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $pwd_confirm = $_POST['pwd-confirm'];

        if (empty($fullname)) {
            $error = 'Please enter your name';
        }
        else if (empty($email)) {
            $error = 'Please enter your email';
        }
		else if (empty($username)) {
            $error = 'Please enter your username';
        }
        else if (empty($pwd)) {
            $error = 'Please enter your password';
        }
        else if (empty($pwd_confirm)) {
            $error = 'Please confirm your password';
        }
        else if ($pwd_confirm != $pwd) {
            $error = 'Your password do not match';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'This is not a valid email address';
        }
        else {
            // register a new account
            $result = register($fullname, $username, $email, $pwd);
            if ($result['code'] == 0)
			{
				header('Location: login.php');
				exit();
            } 
			else if ($result['code'] == 2)
			{
				$error = $result['message'];
			}
			else if ($result['code'] == 1)
			{
				$error = $result['message'];
			}
			else 
			{
                $error = "An error occured. Please try again.";
            }
        }
    }
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
            background: #a29bfe;
            background: linear-gradient(85deg, #f0fdfa 0%, #a29bfe 100%);
            background-position: 0% 0%;
            background-repeat: repeat;
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
            <div class="col-xl-5 col-lg-6 col-md-8 border rounded my-5 p-4  mx-3 register-form">
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Tạo tài khoản mới</h3>
                <form method="post" action="" novalidate>
                    <div class="form-row">
                        <label for="fullname">Họ và tên</label>
                        <input value="<?=$fullname?>" name="fullname" required class="form-control" type="text" placeholder="" id="fullname">
                        <div class="invalid-tooltip">Last name is required</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?=$email?>" name="email" required class="form-control" type="email" placeholder="" id="email">
                    </div>
                    <div class="form-group">
                        <label for="username">Tên tài khoản</label>
                        <input value="<?=$username?>" name="username" required class="form-control" type="text" placeholder="" id="username">
                        <div class="invalid-feedback">Please enter your username</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu</label>
                        <input value="<?=$pwd?>" name="pwd" required class="form-control" type="password" placeholder="" id="pwd">
                        <div class="invalid-feedback">Please enter your password</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd-confirm">Xác nhận mật khẩu</label>
                        <input value="<?=$pwd_confirm?>" name="pwd-confirm" required class="form-control" type="password" placeholder="" id="pwd-confirm">
                        <div class="invalid-feedback">Please confirm your password</div>
                    </div>
				
                    <div class="form-group">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button type="submit" style="background:#a29bfe" class="btn text-white px-5 mt-3 mr-2">Đăng ký</button>
                        <button type="reset" class="btn btn-outline-info px-5 mt-3">Đặt lại</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>
</html>

