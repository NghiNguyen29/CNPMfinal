<?php
    session_start();

    $user = '';
    $id_customer = '';
    if(isset($_SESSION['who']) && $_SESSION['who'] == 0) {
        $user = $_SESSION['user'];
    }

    if(isset($_SESSION['id_customer'])) {
        $id_customer = $_SESSION['id_customer'];
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap"; rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./stylecus.css">


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
                    <a class="nav-link text-white" href="bill.php"><i class="fas fa-user"></i></a>
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

    <div class="container-fluid">
        <div id="success-alert" style="top: 10%; right: 0;" class="d-none alert alert-warning alert-dismissable position-fixed">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span>Sản phẩm đã được thêm vào giỏ hàng</span>
        </div>
        <div id="fail-alert" style="top: 10%; right: 0;" class="d-none alert alert-danger alert-dismissable position-fixed">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span>Cửa hàng chỉ còn <strong></strong> sản phẩm này</span>
        </div>

        <div id="detail" class="product row">
            
        </div>

        <footer class="footer row mt-3 pb-3">
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


    <!-- Modal redirect to login -->
    <div class="modal fade" id="check">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Bạn cần đăng nhập để sửa dụng chức năng này</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button onclick="location.href='./taikhoan/login.php'" class="btn btn-danger px-5 border">Đăng nhập</button>
                        <button class="btn btn-light px-5 ml-2 border"
                            data-dismiss="modal">Hủy</button>
                    </div>

                </div>
            </div>
        </div>

    <script>
        $(document).ready(function() {
            checkLogin('<?= $user?>')
            renderDetail()
        })

        // render detail product by id
        function renderDetail() {
            $('#detail div').remove()

            $.get("http://localhost:8080/api/read_products.php?id=<?= $id?>", function (res) {
                const data = res.data
                $('#detail').append(`
                <div class="container pt-5">
                    <div class="row">
                        <div class="image--shadow mb-5 col-lg-6 col-md-12">
                            <img src="./images/${data.IMAGE}" alt="detail">
                        </div>

                        <div class="detail-info col-lg-6 col-md-12 pl-lg-5">
                            <h3 class="detail-name">${data.TITLE}</h3>
                            <p class="detail-price">${parseInt(data.PRICE).toLocaleString('vi', {style : 'currency', currency : 'VND'})}</p>
                            <div class="note p-3 my-3">
                                <div class="note-text mb-2">
                                    <i class="fas fa-check-circle pt-1"></i>
                                    <p class="pl-2">Deal không áp dụng đồng thời với bất kỳ CTKM & Tích luỹ khác</p>
                                </div>
                                <div class="note-text mb-2">
                                    <i class="fas fa-check-circle pt-1"></i>
                                    <p class="pl-2">Không áp dụng Phiếu quà tặng/ Mã giảm giá theo ngành hàng</p>
                                </div>
                            </div>
                            <div class="quantity mb-3">
                                <p class="quantity-text mb-3">Số lượng</p>
                                <button onclick="changeQuantity(this)" id="decrease" class="adjust-btn btn btn-outline-info">-</button>
                                <input id="quantity" class="quantity-number" type="number" value="1" disabled>
                                <button onclick="changeQuantity(this)" id="increase" class="adjust-btn btn btn-outline-info">+</button>
                            </div>
                            <div class="detail-buy">
                                <button onclick="checkCart('<?= $user?>', '<?= $id_customer?>', ${data.ID}, ${data.QUANTITY})" class="btn btn-info px-5 py-3">
                                    <span><i class="fas fa-shopping-cart mr-1"></i></span> thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>

                    <h3 class="product-title text-info">Mô tả sản phẩm</h3>
                    <p>${data.DISCRIPTION}</p>
                </div>`)
            }, "json")
        }

        // check and handle when click Thêm vào giỏ hàng
        function checkCart(user, idCustomer, idProduct, quantity) {
            if(user === '') {
                $('#check').modal('show')
            }
            else {
                addCart(idCustomer, idProduct, quantity)
            }
        }

        // add product to cart
        function addCart(idCustomer, idProduct, quantity) {
            if(parseInt($('#quantity').val()) > quantity) {
                $('#fail-alert span strong').html(quantity)
                showAlert($('#fail-alert'))
            }
            else {
                const newCart = {
                    id_product: idProduct,
                    id_customer: idCustomer,
                    quantity: parseInt($('#quantity').val())
                }

                $.post("http://localhost:8080/api/add_cart.php", newCart, function (res) {
                    showAlert($('#success-alert'))
                }, 'json')
            }
        }

        // show alert success or fail
        function showAlert(alertBox) {
            $(alertBox).toggleClass('d-none')
            setTimeout(() => $(alertBox).fadeOut(1000), 3000)
        }

        // increase and decrese quantiy by click button
        function changeQuantity(btn) {
            let quantity = parseInt($('#quantity').val())
            if($(btn).attr("id") === 'decrease') {
                if(quantity > 1) {
                    $('#quantity').val(quantity - 1)
                }
            }
            else {
                $('#quantity').val(quantity + 1)
            }
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