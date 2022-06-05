<?php
    session_start();

    $user = '';
    if(isset($_SESSION['who']) && $_SESSION['who'] == 0) {
        $user = $_SESSION['user'];
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toy Story</title>
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
        <a class="logo-box navbar-brand text-white" href="index.php">toystory<span>.com</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="nav-list navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item pr-lg-4">
                    <a class="nav-link text-white" href="#"><i class="fas fa-home"></i></a>
                </li>
                <li class="nav-item pr-lg-4">
                    <a class="nav-link text-white" href="news.php"><i class="far fa-newspaper"></i></i></a>
                </li>
                <li class="cart nav-item pr-lg-4">
                    <a class="nav-link text-white" href="cart.php"><i class="fas fa-shopping-cart"></i></span></a>
                </li>   
                <li id="profile" class="nav-item pr-lg-4">
                    <a class="nav-link text-white" href="bill.php"><i class="fas fa-user"></i></a>
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
        <div class="row">
            <div id="category" class="category col-lg-3 px-0 p-4">
                <ul class="list-group">
                    <!-- <li class="category-item list-group-item">Đồ chơi theo phim<span>></span></li> -->
                </ul>
            </div>

            <div class="slider col-lg-6 px-0">
                <div id="slide" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#slide" data-slide-to="0" class="active"></li>
                        <li data-target="#slide" data-slide-to="1"></li>
                        <li data-target="#slide" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="slide-image carousel-item active">
                            <img src="images/slide1.jpg" alt="" width="1100" height="500">
                        </div>
                        <div class="slide-image carousel-item">
                            <img src="images/slide2.jpg" alt="" width="1100" height="500">
                        </div>
                        <div class="slide-image carousel-item">
                            <img src="images/slide3.jpg" alt="" width="1100" height="500">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#slide" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#slide" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="product">
        <div class="container">
            <h3 class="product-title col-12 px-0 text-info mt-5 pb-2">Deal Online ngẫu nhiên</h3>
            <div id="deal-row" class="row">
                <!-- <div class="product-item mb-5 col-lg-3 col-sm-6">
                        <div class="product-item-image border rounded">
                            <img src="images/toy1.png" alt="">
                        </div>
                        <div class="product-item-name py-2">
                            <p>Đồ chơi bồn tắm chim cánh cụt Farlin DC-20046</p>
                        </div>
                        <div class="product-item-price">
                            46.000đ
                        </div>
                        <div class="product-item-buy">
                            <button class="btn btn-sm btn-outline-info w-100 mt-2">Mua ngay</button>
                        </div>
                    </div> -->
            </div>

            <div class="promotion">
                <h3 class="product-title col-12 px-0 text-info pb-2">Khuyến mại ngẫu nhiên</h3>
                <div id="promotion-row" class="row">
        
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer class="footer mt-md-5 pb-3">
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

    <script>
        $(document).ready(function() {
            checkLogin('<?= $user?>')
            renderCategories()
            renderProducts()
        })

        // render all categories
        function renderCategories() {
            $('#category ul li').remove()

            $.get("http://localhost:8080/api/read_product_categories.php", function (res) {
                const data = res.data
                for (let i = 0; i < data.length; i++) {
                    let item = data[i]
                    $('#category ul').append(`
                        <li onclick="location.href = './category.php?id_category=${item.ID}';" class="category-item list-group-item">${item.NAME}<span>></span></li>`)
                }
            }, "json")
        }

        // render all products
        function renderProducts() {
            $('#event-img img').remove()
            $('#deal-row div').remove()
            $('#promotion-row div').remove()

            $.get("http://localhost:8080/api/read_products.php", function (res) {
                const data = res.data

                // render random event
                const randEvent = Math.floor(Math.random() * data.length);
                $('#event-img').append(`<img onclick="location.href='./detail.php?id=${data[randEvent].ID}'" 
                src="./images/${data[randEvent].IMAGE}" alt="">`)

                // render random 4 deal hot and 4 promotion
                for (let i = 0; i < 4; i++) {
                    const rand1 = Math.floor(Math.random() * data.length);
                    const rand2 = Math.floor(Math.random() * data.length);
                    let item1 = data[rand1]
                    let item2 = data[rand2]

                    // deal hot
                    $('#deal-row').append(`
                    <div class="product-item mb-5 col-lg-3 col-sm-6 d-flex flex-column" onclick="location.href = './detail.php?id=${item1.ID}';">
                        <div class="product-item-image border rounded" >
                            <img src="./images/${item1.IMAGE}" alt="">
                        </div>
                        <div class="product-item-name py-2">
                            <p>${item1.TITLE}</p>
                        </div>
                        <div class="product-item-price mt-auto font-weight-bold">
                            ${parseInt(item1.PRICE).toLocaleString('vi', {style : 'currency', currency : 'VND'})}
                        </div>
                        
                    </div>`)

                    // promotion
                    $('#promotion-row').append(`
                    <div class="product-item mb-5 col-lg-3 col-sm-6 d-flex flex-column " onclick="location.href = './detail.php?id=${item2.ID}';">
                        <div class="product-item-image border rounded">
                            <img src="./images/${item2.IMAGE}" alt="">
                        </div>
                        <div class="product-item-price mt-auto font-weight-bold">
                            <p >${item2.TITLE}</p>
                        </div>
                        <div class="product-item-price font-weight-bold">
                            ${parseInt(item2.PRICE).toLocaleString('vi', {style : 'currency', currency : 'VND'})}
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