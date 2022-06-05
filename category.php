<?php
    session_start();

    $user = '';
    if(isset($_SESSION['who']) && $_SESSION['who'] == 0) {
        $user = $_SESSION['user'];
    }

    if(isset($_GET['id_category'])) {
        $id_category = $_GET['id_category'];
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap"; rel="stylesheet">
    <link rel="stylesheet" href="./stylecus.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="heading navbar navbar-expand-lg navbar-light px-lg-5">
        <a class="logo-box navbar-brand text-white" href="./index.php">toystory<span>.com</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="nav-list navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item pr-lg-4">
                    <a class="nav-link text-white" href="./index.php"><i class="fas fa-home"></i></a>
                </li>
                <li class="nav-item pr-lg-4">
                    <a class="nav-link text-white" href="news.php"><i class="far fa-newspaper"></i></i></a>
                </li>
                <li class="cart nav-item pr-lg-4">
                    <a class="nav-link text-white" href="cart.php"><i class="fas fa-shopping-cart"></i></span></a>
                </li>
                <li id="profile" class="nav-item pr-lg-4">
                    <a class="nav-link text-white" href="#"><i class="fas fa-user"></i></a>
                </li>

                <li id="login" class="login-box nav-item">
                    <button onclick="location.href='./taikhoan/login.php'" class="btn btn-outline-light p-2">Đăng nhập</button>
                </li>
                <li id="logout" class="logout-box nav-item">
                    <button onclick="location.href='./taikhoan/logout.php'" class="btn btn-outline-light p-2">Đăng xuất</button>
                </li>
            </ul>

        </div>
    </nav>

    <div class="container-fluid">
        <div class="product row pt-5">
            <div class="container pt-5">
                <div id="category-row" class="row">
                </div>
            </div>
        </div>

        <footer class="footer row mt-md-3 pb-3">
            <div class="container">
                <div class="footer-info row">
                    <div class="logo-box col-md-2 col-sm-12 pt-3">
                        <div class="logo">toystory<span>.com</span></div>
                    </div>

                    <div class="contact col-md-6 col-sm-12 pt-3">
                        <p class="contact-text">công ty cổ phần toy story</p>
                        <p><strong>Điện thoại: </strong>098 765 4321</p>
                        <p><strong>Email: </strong>toystory@gmail.com</p>
                        <p><strong>Văn phòng: </strong>19 Nguyễn Hữu Thọ, P.Tân Phong, Q.7, HCM</p>
                    </div>

                    <div class="social col-md-4 col-sm-12 pt-3">
                        <p class="social-text">Kết nối với chúng tôi</p>
                        <div class="social-icon mt-2">
                            <i class="fab fa-facebook px-3"></i>
                            <i class="fab fa-youtube px-3"></i>
                            <i class="fab fa-instagram px-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        $(document).ready(function() {
            checkLogin('<?= $user?>')
            renderProducts()
        })

        // render all products by id
        function renderProducts() {
            $('#category-row div').remove()

            $.get("http://localhost:8080/api/read_products.php?id_category=<?= $id_category?>", function (res) {
                const data = res.data
                for (let i = 0; i < data.length; i++) {
                    let item = data[i]
                    $('#category-row').append(`
                    <div class="product-item mb-5 col-lg-3 col-sm-6 d-flex flex-column">
                        <div class="product-item-image border rounded">
                            <img onclick="location.href = './detail.php?id=${item.ID}';" src="./images/${item.IMAGE}" alt="">
                        </div>
                        <div class="product-item-name py-2">
                            <p onclick="location.href = './detail.php?id=${item.ID}';">${item.TITLE}</p>
                        </div>
                        <div class="product-item-price mt-auto font-weight-bold">
                        ${parseInt(item.PRICE).toLocaleString('vi', {style : 'currency', currency : 'VND'})}
                        </div>
                        <div class="product-item-buy">
                            <button onclick="location.href = './detail.php?id=${item.ID}';" class="btn btn-sm btn-outline-info w-100 mt-2">Mua ngay</button>
                        </div>
                    </div>`)
                }
            }, "json")
        }

        function checkLogin(user) {
            if(user !== '') {
                $('#login').hide()
                $('#logout').show()
                $('#profile').show()
            }
            else {
                $('#login').show()
                $('#logout').hide()
                $('#profile').hide()
            }
        }
    </script>

</body>

</html>