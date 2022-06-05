<?php
    session_start();
    require_once "customer_db.php";// 
    $user = '';
    $customer = '';
    if(isset($_SESSION['who']) && $_SESSION['who'] == 0) {
        $user = $_SESSION['user'];
        $customer = find_customer_by_username($user);
    }
    $status = ['đang lấy hàng', 'đã lấy hàng', 'đã nhận hàng'];
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
                    <a class="nav-link text-white" href="index.php"><i class="fas fa-home"></i></a>
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
                <li class="nav-item pr-lg-4">
                    <button onclick="window.history.back()" class="btn btn-outline-light p-2">Quay lại</button>
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


    <div class="container bill">
        <div class="row my-5">
            <h1 class="text-center font-weight-bold">ĐƠN ĐẶT HÀNG CỦA TÔI</h1>
        </div>
        <div class="row">
            <div class="col-9 p-0">
                <?php
                require_once "news_db.php";// 
                require_once "news_category_db.php";//

                require_once "bill_db.php";
                require_once "product_db.php";
                $bills='';
                if (!empty($user)){
                    $bills = read_bill_by_username($user);
                }
                ?>

                <?php
                foreach ($bills as $bill) {
                    $bill_details = read_bill_details($bill['ID']);
                    echo '
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div style="font-size:20px;">Đơn hàng ngày : '.$bill['ORDER_DATE'].'</div>
                            </div>
                            <div class="col-4">
                                <div style="font-size:15px;">Trạng thái : '.$status[$bill['STATUS']].'</div>
                            </div>
                        </div>
                    </div>
                    ';
                    foreach ($bill_details as $details) {
                        $products = read_product_by_id($details["PRODUCT_ID"]);
                        echo '
                            <div class="container p-0 news-container">
                            <hr class="mt-3" style="height: 0.1px; background-color:rgba(179, 178, 180, 0.336)">
                                <div class="row pl-3">
                                    <div class="col-3 p-0 pr-1 news-image text-center">
                                        <img src="images/' . $products['IMAGE'] . '" alt="" style="width:100px">
                                    </div>

                                    <div class="col-6">
                                        <div style="font-size:15px;"> Số lượng: '.$details['QUANTITY'].'</div>
                                    </div>
                                    <div class="col-3">
                                        <div style="font-size:15px;">Giá: '.number_format($details['PRICE']).'</div>
                                    </div>
                                </div>
                                
                            </div>
                        ';
                    }
                    echo '
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div style="font-size:20px;"> '.'</div>
                            </div>
                            <div class="col-4">
                                <div style="font-size:15px;"><b>Tổng tiền : '.number_format($bill['TOTAL']).'</b></div>
                            </div>
                        </div>
                        <hr class="mt-3" style="height: 0.1px; background-color:#1F1F21">
                    </div>
                    ';
                    
                }
                ?>


            </div>
            <div class="col-3">

                <div class="card news-category mt-5 contact">
                    <div class="p-0 card-header text-center font-weight-bold">Đơn mua</div>
                    <div class="card-body p-0 px-4 py-4">
                        <ul>
                            <li class="text-muted mb-2 text-justify">
                                <div class="font-weight-bold">Khách hàng: </div>
                                <div><?=$customer['FULLNAME']?></div>
                            </li>
                            <li class="text-muted mb-2 text-justify">
                                <div class="font-weight-bold">Email:</div>
                                <div><?=$customer['EMAIL']?></div>
                            </li>
                        </ul>
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
                    <div class="product-item mb-5 col-lg-3 col-sm-6 d-flex flex-column">
                        <div class="product-item-image border rounded">
                            <img onclick="location.href = './detail.php?id=${item1.ID}';" src="./images/${item1.IMAGE}" alt="">
                        </div>
                        <div class="product-item-name py-2">
                            <p onclick="location.href = './detail.php?id=${item1.ID}';">${item1.TITLE}</p>
                        </div>
                        <div class="product-item-price mt-auto font-weight-bold">
                            ${parseInt(item1.PRICE).toLocaleString('vi', {style : 'currency', currency : 'VND'})}
                        </div>
                        <div class="product-item-buy">
                            <button onclick="location.href = './detail.php?id=${item1.ID}';" class="btn btn-sm btn-outline-info w-100 mt-2">Mua ngay</button>
                        </div>
                    </div>`)

                    // promotion
                    $('#promotion-row').append(`
                    <div class="product-item mb-5 col-lg-3 col-sm-6 d-flex flex-column">
                        <div class="product-item-image border rounded">
                            <img onclick="location.href = './detail.php?id=${item2.ID}';" src="./images/${item2.IMAGE}" alt="">
                        </div>
                        <div class="product-item-price mt-auto font-weight-bold">
                            <p onclick="location.href = './detail.php?id=${item2.ID}';">${item2.TITLE}</p>
                        </div>
                        <div class="product-item-price">
                            ${parseInt(item2.PRICE).toLocaleString('vi', {style : 'currency', currency : 'VND'})}
                        </div>
                        <div class="product-item-buy">
                            <button onclick="location.href = './detail.php?id=${item2.ID}';" class="btn btn-sm btn-outline-info w-100 mt-2">Mua ngay</button>
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