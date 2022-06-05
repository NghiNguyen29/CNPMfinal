<?php
	session_start();
    require_once('../account_db.php');
	if(isset($_COOKIE['user']) && isset($_COOKIE['pass']))
	{
		$user = $_COOKIE['user'];
		$pass = $_COOKIE['pass'];
	}
	else
	{
		$user = '';
		$pass = '';
	}
	
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        } else {
            $result = login($user, $pass);
            if ($result['code']==0){
                $data = $result['data'];
				if(isset($_POST['remember']))
				{
					setcookie('user', $user, time() + 3600 *24);
					setcookie('pass', $pass, time() + 3600 *24);
				}
				$_SESSION['user'] = $user;
                $_SESSION['role'] = $data['ID_ROLE'];
                
                $who = $result['who'];
                $_SESSION['who'] = $who;
                $_SESSION['id_customer'] = $data['ID'];
                if ($who==0){ // chuyển hướng
                    header('Location: ../index.php');
                } else if ($who==1) 
                    header('Location: ../common/hoatdongnhanvien.php');
            }  
			else {
                $error = 'Invalid username or password';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Login Page</title>
    <style>
	
		*{
			box-sizing: border-box;
		}
		
        body {
            font-family: "Poppins", sans-serif;
            font-size: 16px;
        }

        a {
            color: inherit;
        }

        .form-group {
            position: relative;
            width: 100%;
            margin: 0 0 32px 0;
        }

        .form-group input[type=text],
        .form-group input[type=password] {
            padding: 0 20px;
            width: 100%;
            height: 50px;
            transition: 0.25s ease;
            border: 1px solid #eee;
            border-radius: 8px;
            outline: none;
        }

        .form-group label {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 21px;
            user-select: none;
            color: #999;
            pointer-events: none;
            font-size: 16px;
            transition: 0.25s ease;
        }

        .form-group input[type=text]:focus,
        .form-group input[type=password]:focus {
            border: 1px solid #1DD1A1;
        }

        .form-group input[type=text]:not(:placeholder-shown)+label,
        .form-group input[type=password]:not(:placeholder-shown)+label,
        .form-group input[type=text]:focus+label,
        .form-group input[type=password]:focus+label {
            top: 0;
            left: 11px;
            padding: 0 10px;
            display: inline-block;
            background-color: #ffff;
            color: #1DD1A1;
        }

        button:hover {
            opacity: 0.8;
        }

        .text-center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
            margin-bottom: 4px;
        }

        .flex-1 {
            flex: 1;
        }

        @media (max-width: 400px) {
            body {
                font-size: 12px;
            }

            .wrapper {
                margin-top: 30px;
            }
        }

        .login {
            background: #a29bfe;
            background: linear-gradient(85deg, #f0fdfa 0%, #a29bfe 100%);
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            background-color: #fff;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 16px;
            width: 500px;
            padding: 24px 50px;
        }

        @media (max-width: 400px) {
            .login-form a {
                font-size: 14px;
            }
        }

        .login-form form {
            max-width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
		
		.login-form form input{
            max-width: 100%;
            min-width: 100%;
        }

        .login-form form img {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form form h1 {
            margin: 0 auto;
            margin-bottom: 16px;
        }

        

        .login-form form button {
            width: 100%;
            background-color: #a29bfe;
            padding: 12px 16px;
            border: none;
            outline: none;
            border-radius: 8px;
            color: #fff;
            cursor: pointer;
            font-size: 20px;
        }

        .login-form form button:hover~ion-icon {
            transform: translate(-50%, -50%);
        }

        @media (max-width: 520px) {
            .login-form {
                width: 95%;
            }
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="login-form">
            <form action="" method="post" id="loginForm">
                <h1>Toy Story</h1>
                <div class="form-group">
                    <input type="text" placeholder=" " name="user" id="username" value="<?=$user?>">
                    <label for="username">Tên người dùng</label>
                </div>
                <div class="form-group">
                    <input type="password" placeholder=" " name="pass" id="password" value="<?=$pass?>">
                    <label for="password">Mật khẩu</label>
                </div>
				<div class="form-group custom-control custom-checkbox">
                    <input name = "remember" type="checkbox" class="custom-control-input" id="remember">
                    <label class="custom-control-label" for="remember">Ghi nhớ đăng nhập</label>
                </div>
                <div class="form-group">
					<?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
                    <button>Đăng nhập</button>
                </div>
            </form>
            <div class="form-group">
				<p>Nhấn <a href="register.php" style="color:#a29bfe">vào đây</a> để tạo tài khoản.</p>
            </div>
        </div>
    </div>
</body>

</html>