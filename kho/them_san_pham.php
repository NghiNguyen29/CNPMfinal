<?php
	session_start();
    require_once('../staff_db.php');
    $staff = find_staff($_SESSION['user']);
    $name_staff = $staff['FULLNAME'];
    $id_staff = $staff['ID'];
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
    <script src="../ckeditor/ckeditor.js"></script>
    <title>Trang Thêm Hóa Đơn</title>
   
</head>
<body>
	<?php require_once("../includes/header.php"); ?>		

	<div class="container mt-4">
        <div class="form-group">
            <b>Tên nhân viên: <?=$name_staff?></b> <br/>
            <i>Mã nhân viên:</i>  <i id="id-staff"><?=$id_staff?></i> <br/>
        </div>
        
        <div class="form-group">
            <label for="name-product">Tên sản phẩm</label>
            <input id="name-product" type="text" name="name-product" class="form-control">
        </div>
        <div class="form-group">
            <label for="desc">Mô tả</label>
            <textarea id="desc" name="desc" rows="7" style="width: 100%" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="category">Danh mục</label>
            <select name="category" required class="form-control" id="category">
                
            </select>
        </div>
        <div class="form-group">
            <label for="price">Giá mua</label>
            <input id="price" type="text" name="price" class="form-control">
        </div>
        <img src="../images/user.png" class="thumbnail" id="image">
     
        <hr size="1">
            
        <div class="form-group mb-5">
            <button onclick="addProduct()" class="btn btn-info" style="float:right">Thêm bài viết</button>
            <button onclick="addThumbnail()" class="btn btn-info" style="float:right; margin-right:20px">sửa ảnh</button>          
        </div>

    </div>
	<?php require_once("../includes/footer.php"); ?>

<!--Add modal-->
<div id="add-thumbnail" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Thêm hình ảnh</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <div class="custom-file">
                        <input value="" name="thumbnail" type="file" class="custom-file-input" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp">
                        <label class="custom-file-label" for="customFile">Thêm hình ảnh</label>
                    </div>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
            </div>
        </div>
	</div>
</div>
<!--confirm modal-->
<div id="add-product" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Xác nhận</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <i>Bạn có chắc muốn đăng bài viết ?</i>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
                <button id="create-button" type="button" class="btn btn-info">Đăng</button>
            </div>
        </div>
	</div>
</div>

<script>
    $.get("http://localhost:8080/api/read_product_categories.php", { // lấy tên khách hàng
        }, function(data){
            let option = ``
            data.data.forEach(element=>{
                option += `
                <option value="`+element.ID+`">`+element.NAME+`</option>
                `
            })
            $("#category").html(option)
        },"json");
    var dsc = CKEDITOR.replace('desc')
    let image = 'user.png' // hình ảnh

    function addProduct(){
        if (image=='' || $("name-product").val()=='' || $('#price').val()=='' || $('#category').val()=='' || dsc.getData()==''){
            showErrorToast("Thông tin không được để trống")
        } else {
            $("#add-product").modal('show')
        }
    }
    $('#create-button').click(()=>{
        if (image=='' || $("name-product").val()=='' || $('#price').val()=='' || $('#category').val()=='' || dsc.getData()==''){
            showErrorToast("Không được để trống thông tin")
            $("#add-product").modal('hide')
        } else {
            $.post("http://localhost:8080/api/add_product.php", { 
            image: image,
            quantity: 1,
            title: $('#name-product').val(),
            price: $('#price').val(),
            desc: dsc.getData(),
            id_category: $('#category').val()
        }, function(data){

            if (data.code==0){
                $("#add-product").modal('hide')
                alert("Thêm sản phẩm thành công");
                window.location.href='quan_ly_san_pham.php'
            } else {
                $("#add-product").modal('hide')
                showErrorToast("Thêm sản phẩm thất bại")
            }
        },"json");
        }
        
    })


    function addThumbnail(){
        $('#add-thumbnail').modal('show');
    }
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        image = fileName
        $('#image').attr('src','../images/'+image)
        $("#add-thumbnail").modal('hide');
        showSuccessToast("Hình ảnh đã được đổi")
    });

</script>
</body>
<link rel="stylesheet" href="../stylestaff.css">
</html>