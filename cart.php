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
                    <div class="col-2">
                        <img class="border rounded p-1" src="./images/1637069036_dochoitheophim_01.jpg" alt="">
                    </div>
                    <div class="col-5">
                        Nước Giặt OMO Matic Cho Quần Áo Bé Yêu, Túi 2.0kg
                    </div>
                    <div class="text-color font-weight-bold col-2">
                        114.840₫
                    </div>
                    <div class="col-3 text-center">
                        <button onclick="changeQuantity(this)" id="decrease"
                            class="adjust-btn btn btn-outline-info">-</button>
                        <input id="quantity" class="quantity-number" type="number" value="1" disabled>
                        <button onclick="changeQuantity(this)" id="increase"
                            class="adjust-btn btn btn-outline-info">+</button>
                        <div style="cursor: pointer;" class="p-2"><i class="fas fa-trash-alt"></i>Xóa</div>
                    </div>
                </div>
                <p class="w-100 bg-light" style="height: 3px;"></p>
            </div>

            <div class="col-4">
                <div class=" border rounded py-3">
                    <p class="text-info font-weight-bold px-3">Sử dụng phiếu quà tặng, giảm giá</p>
                    <div class="input-group p-3">
                        <input type="text" class="form-control mr-2" placeholder="Mã giảm giá">
                        <button style="border-radius: 100rem;" class="btn btn-outline-info">Áp dụng</button>
                    </div>
                    <p class="w-100 bg-light" style="height: 3px;"></p>

                    <div class="d-flex justify-content-between p-3">
                        <p class="font-weight-bold">Thành tiền</p>
                        <div class="text-right">
                            <p id="price" class="product-item-price font-weight-bold">0</p>
                            <p>(Đã bao gồm VAT)</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <button onclick="checkContinue()" style="border-radius: 100rem;" class="btn btn-info w-100">
                            Tiếp tục
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal nhập thông tin khách hàng -->
    <div class="modal fade" id="infoModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="add-user" method="post" action="./order.php">
                        <div class="form-group">
                            <label for="fullname">Họ và tên</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="number" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success px-5">Xác nhận</button>
                        <button type="reset" class="btn btn-danger px-5 ml-2">Xóa hết</button>
                </div>
                    </form>
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

    <div id="fail-alert" style="top: 10%; right: 0;" class="d-none alert alert-danger alert-dismissable position-fixed">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span>Cửa hàng chỉ còn <strong></strong> sản phẩm này</span>
    </div>

    <!-- Modal cannot continue -->
    <div class="modal" id="continueFail">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Giỏ hàng rỗng, không thể tiếp tục
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button onclick="history.back()" class="btn btn-success px-5 border">Quay lại</button>
                    <button class="btn btn-light px-5 ml-2 border"
                        data-dismiss="modal">Hủy</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            checkLogin('<?= $user?>')
            renderCart('<?= $user?>')
        })

        // render cart by username
        function renderCart(user) {
            const username = {username: user}
            let total = 0
            let price = 0

            $('#total span').remove()
            $('#cart-row div').remove()
            $("#price").html(price)

            $.post("http://localhost:8080/api/read_cart_by_username.php", username, function (res) {
                const data = res.data
                for (let i = 0; i < data.length; i++) {
                    let item = data[i]

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
                            <button onclick="changeQuantity(${item.ID_PRODUCT}, this, '${user}')" id="decrease"
                                class="adjust-btn btn btn-outline-info">-</button>
                            <input id="quantity" class="quantity-number" type="number" value="${item.QUANTITY_CART}" disabled>
                            <button onclick="changeQuantity(${item.ID_PRODUCT}, this, '${user}')" id="increase"
                                class="adjust-btn btn btn-outline-info">+</button>
                            <div><span onclick="deleteCart(${item.ID_CART}, '${user}')" style="cursor: pointer;"><i class="fas fa-trash-alt"></i>Xóa</span></div>
                        </div>`)

                    total += item.QUANTITY_CART
                    price += item.QUANTITY_CART * item.PRICE
                }

                $('#total').append(`<span class="text-dark font-weight-normal">( ${total} )</span>`)

                $('#price').html(parseInt(price).toLocaleString('vi', {style : 'currency', currency : 'VND'}))
            }, "json")
        }

        // Delete cart by id
        function deleteCart(id, user) {
            $.post("http://localhost:8080/api/delete_cart.php", {id: id}, function (res) {
                renderCart(user)
            }, 'json')
        }

        // increase and decrese quantiy incart
        function changeQuantity(idProduct, btn, user) {
            const action = $(btn).attr("id")

            const updCart = {
                id_product: idProduct,
                action: action
            }

            $.post("http://localhost:8080/api/update_cart_quantity.php", updCart, function (res) {
                renderCart(user)
            }, 'json') 

            let quantity = parseInt($('#quantity').val())
            if(action === 'decrease') {
                if(quantity > 1) {
                    $('#quantity').val(quantity - 1)
                }
            }
            else {
                $('#quantity').val(quantity + 1)
            }  
        }

        // check whether have any product in cart or not
        function checkContinue() {
            if($('#price').html() === '0'){
                $('#continueFail').modal('show')
            }
            else {
                $('#infoModal').modal('show')
            }
        }

        // show alert success or fail
        function showAlert(alertBox) {
            $(alertBox).toggleClass('d-none')
            setTimeout(() => $(alertBox).fadeOut(1000), 3000)
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