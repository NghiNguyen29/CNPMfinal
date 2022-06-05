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

    $fullname = '';
    $phone = '';
    $address = '';

    if(!empty($_POST['fullname']) && !empty($_POST['phone']) && !empty($_POST['address'])) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
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

    <div style="min-height: calc(100vh - 265px);" class="container mt-4">
        <div class="row">
            <div class="col-8">
                <p id="total" class="text-info font-weight-bold">Sản phẩm
                    <span class="text-dark font-weight-normal">( 2 )</span>
                </p>
                <hr>
                <div id="cart-row" class="row my-3">
                </div>
                <p class="w-100 bg-light" style="height: 3px;"></p>

                <div class="row justify-content-center">
                    <div class="col-8">
                        <p class="text-info font-weight-bold py-3">Địa chỉ giao hàng</p>
                        <div class="border border-success rounded p-2">
                            <p><span id="fullname" class="text-info font-weight-bold"></span> | Điện thoại: <span id="phone"></span></p>
                            <p id="address"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class=" border rounded py-3">
                    <div class="d-flex justify-content-between px-3">
                        <p>Tiền hàng</p>
                        <div class="text-right">
                            <p id="price">0</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between p-3">
                        <p>Phí vận chuyển</p>
                        <div class="text-right">
                            <p>20.000₫</p>
                        </div>
                    </div>
                    <p class="w-100 bg-light" style="height: 3px;"></p>

                    <div class="d-flex justify-content-between p-3">
                        <p class="font-weight-bold">Thành tiền</p>
                        <div class="text-right">
                            <p id="total-price" class="detail-price">0</p>
                            <p>(Đã bao gồm VAT)</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <button onclick="orderSuccess()" id="orderBtn" style="border-radius: 100rem;" class="btn btn-info w-100 text-uppercase" data-toggle="modal"
                            data-target="#infoModal" disabled>
                            đặt hàng
                        </button>
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

    <!-- Modal order success -->
    <div class="modal" id="orderSuccess" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Đặt hàng thành công</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Bạn đã đặt hàng thành công</h4>
                    <p>Nhấn <a href="../index.php">vào đây</a> để tiếp tục mua sắm, hoặc trang web sẽ tự động chuyển hướng sau <span id="counter" class="text-danger">5</span> giây nữa.</p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button onclick="location.href='./index.php'" type="button" class="btn btn-success">Trang chủ</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            checkLogin('<?= $user?>')
            renderAddress('<?= $fullname?>', '<?= $phone?>', '<?= $address?>')
            renderOrder('<?= $user?>')
        })

        function renderAddress(fullname, phone, address) {
            $('#fullname').html(fullname)
            $('#phone').html(phone)
            $('#address').html(address)
        }
        let products = []
        // render order
        function renderOrder(user) {
            const username = {username: user}
            let total = 0
            let price = 0
            products = []
            $('#total span').remove()
            $('#cart-row div').remove()

            $.post("http://localhost:8080/api/read_cart_by_username.php", username, function (res) {
                const data = res.data
                for (let i = 0; i < data.length; i++) {
                    let item = data[i]
                    products.push([item.ID_PRODUCT,item.QUANTITY_CART,item.PRICE*item.QUANTITY_CART])
                    $('#cart-row').append(`
                        <div class="col-2">
                            <img class="border rounded p-1" src="./images/${item.IMAGE}" alt="">
                        </div>
                        <div class="col-5">
                            ${item.TITLE}
                        </div>
                        <div class="text-color font-weight-bold col-2">
                            ${parseInt(item.PRICE).toLocaleString('vi', {style : 'currency', currency : 'VND'})}
                        </div>
                        <div class="col-3 text-center">
                            <input id="quantity" class="quantity-number" type="number" value="${item.QUANTITY_CART}" disabled>
                        </div>`)

                    total += item.QUANTITY_CART
                    price += item.QUANTITY_CART * item.PRICE
                }

                $('#total').append(`<span class="text-dark font-weight-normal">( ${total} )</span>`)

                $('#price').html(parseInt(price).toLocaleString('vi', {style : 'currency', currency : 'VND'}))

                $('#total-price').html((parseInt(price) + 20000).toLocaleString('vi', {style : 'currency', currency : 'VND'}))
                $('#total-price').prop('title', parseInt(price) + 20000)

                $('#orderBtn').prop('disabled', false)
            }, "json")
        }

        // handle when customer order success
        function orderSuccess() {
            $.post("http://localhost:8080/api/create_bill.php", {
                customerid: '<?= $id_customer?>',
                staffid: 1,
                address: $('#address').html(),
                phone: $('#phone').html(),
                total: $('#total-price').prop('title'),
                products: products
			},"json");

            // Delete cart after order success
            $.post("http://localhost:8080/api/delete_cart_by_customer.php", {id_customer: '<?= $id_customer?>'}, 'json')

            $('#orderSuccess').modal('show')
            countDown()
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

        // Count down 5 seconds to return home page
        function countDown() {
            let duration = 5;
            let countDown = 5;
            let id = setInterval(() => {

                countDown --;
                if (countDown >= 0) {
                    $('#counter').html(countDown);
                }
                if (countDown == -1) {
                    clearInterval(id);
                    window.location.href = '../index.php';
                }

            }, 1000);
        }
    </script>


</body>

</html>