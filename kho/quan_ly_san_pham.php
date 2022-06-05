<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../stylestaff.css">
	<script src="../ckeditor/ckeditor.js"></script>
    <title>Trang Nhân Viên Kho</title>
</head>
<body>
    <?php require_once('../includes/header.php') ?>

    <div class="container">

        <div class="row mt-3">
			<?php require_once('../includes/daidienhoatdong.php'); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="margin: auto">
				<div style="margin-bottom:20px">
                    <a href="" class="btn" style = "font-weight: bold; color: white; background:#a29bfe; border: 1px solid black;width: 230px">Quản Lý Sản Phẩm</a>
                </div>
                <div>
                    <a href="quan_ly_danh_muc.php" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 230px">Quản Lý Danh Mục</a>
                </div>
                <div style="margin-top:20px">
                    <a href="quan_ly_phieu_nhap_hang.php" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 230px">Quản Lý phiếu nhập hàng</a>
                </div>
            </div>
        </div>
	
		<div class="row" style="margin-bottom: 20px;margin-top: 40px">
            <div class="col-lg-6 col-md-6 col-sm-5 col-12 text-center add" style="height: 55px">
				<a class="btn" style = "font-weight: bold; color: black; border: 1px solid black;display: block; margin-left: 0px; margin-right: auto;width: fit-content;" href="them_san_pham.php">Thêm Sản Phẩm +</a>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6 col-11">

            </div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-1 sort text-right">

            </div>
		</div>

		<div style="overflow-x:auto;">
			<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" class="table">
				<thead>
					<tr class="header">
						<td colspan="2"></td>
						<td>Mã sản phẩm</td>
						<td>Tên sản phẩm</td>
						<td>Giá</td>
						<td>Số lượng</td>
					</tr>
				</thead>					
				<tbody id="tbody">
					<tr class="item">
						<td style="width: 160px">
							<a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" data-toggle="modal" data-target="#info-modal">
								<span><i class="fas fa-eye"></i></span> 
							</a>
							<a href="#" class="btn edit idUpdate" style="border-radius: 70%; background-color: #D8D8D8" data-toggle="modal" data-target="#update-modal" >
							<span><i class="fas fa-pen"></i></span>
							</a>
							<a href="#" class="btn delete_department" style="border-radius: 70%; background-color: #D8D8D8" data-toggle="modal" data-target="#delete-modal" >
								<span><i class="fas fa-trash-alt"></i></span> 
							</a>
						</td>
						<td><img src="../images/user.png" style="width: 80px; height: 80px"></td>
						<td>SP01</td>
						<td>Mô hình user</td>
						<td>30</td>
						<td>200000</td>						
					</tr>
				</tbody>
			</table>
		</div>
     </div> 
	 <?php require_once('../includes/footer.php') ?>

<!--Update  modal-->	 	
<div id="update-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<form action="" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Cập nhật sản phẩm</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="title-u">Tên sản phẩm</label>
						<input id="title-u" type="text" name="title" class="form-control">
					</div>
					<img src="../images/1637069037_dochoitheophim_01_02.jpg" class="thumbnail" id="image-u">
					<div class="form-group">
						<label for="desc-u">Mô tả</label>
						<textarea id="desc-u" name="desc" rows="7" style="width: 100%" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="category-u">Danh mục</label>
						<select name="category" required class="form-control" id="category-u">
							
						</select>
					</div>
					<div class="form-group">
						<label for="price-u">Giá mua</label>
						<input id="price-u" type="text" name="price" class="form-control">
					</div>
					
                    <div class="form-group">
						<div class="custom-file">
							<input value=""name="thumbnail" type="file" class="custom-file-input" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp">
							<label class="custom-file-label" for="customFile">Thêm hình ảnh</label>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<input type="hidden" name="update">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button id="update-button" type="button" class="btn btn-success">Cập nhật</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!--View  modal-->	 
<div id="info-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Xem Sản Phẩm</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                
				<div class="modal-body">                   

					<div class="form-group">
						<span for="title">Tên Sản Phẩm: </span> </br>
						<b name="title" id="title"></b>
					</div>
					<div class="form-group">
						<img src="../images/user.png" class="thumbnail" id="image">
					</div>
					<div class="form-group">
						<span for="description">Mô tả: </span>
						<span name="description" id="description"></span>
					</div>
					<div class="form-group">
						<span for="id-product-category">Tên danh mục: </span>
						<i name="id-product-category"  id="id-product-category"></i>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
				</div>
			</div>
	</div>
</div>
<!-- Delete Confirm Modal -->
<div id="delete-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action="" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<hp class="modal-title">Xóa Sản phẩm</hp>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<p>Bạn có chắc rằng muốn xóa ?</p>
					<input readonly name="id-product" id="id-product-d" class='form-control'>
					<input readonly name="name-product" id="name-product-d" class='form-control mt-3'>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="delete">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<button id='delete-button' type="button" class="btn btn-danger">Xóa</button>
				</div>
			</div>
		</form>
	</div>
</div>	    

<script>
	var image = "user.png"
	getProduct()	
	$.get("http://localhost:8080/api/read_product_categories.php", { // lấy tên khách hàng
		}, function(data){
			let option = ``
			data.data.forEach(element=>{
				option += `
				<option value="`+element.ID+`">`+element.NAME+`</option>
				`
			})
			$("#category-u").html(option)
		},"json");
	function getProduct(){
		$.get("http://localhost:8080/api/read_products.php", function(data, status) {
            let tableBody = ``
            data.data.forEach(element => {
                tableBody += `
                <tr class="item">
					<td style="width:160px;">
						<a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" onclick="readProduct(this)">
							<span><i class="fas fa-eye"></i></span> 
						</a>
						<a href="#" class="btn edit idUpdate" style="border-radius: 70%; background-color: #D8D8D8" onclick='updateProduct(this)'>
							<span><i class="fas fa-pen"></i></span>
						</a>
						<a href="#" class="btn delete" style="border-radius: 70%; background-color: #D8D8D8" onclick='deleteProduct(this)'>
							<span><i class="fas fa-trash-alt"></i></span> 
						</a>
					</td>
					<td><img src="../images/`+element.IMAGE+`" style="width: 80px; height: 80px" class="thumbnail"></td>
					<td>`+element.ID+`</td>					
					<td>`+element.TITLE+`</td>
					<td>`+new Intl.NumberFormat().format(element.PRICE)+`</td>
					<td>`+new Intl.NumberFormat().format(element.QUANTITY)+`</td>
					<td style="display:none">`+element.DISCRIPTION+`</td>
					<td style="display:none">`+element.ID_CATEGORY+`</td>
					<td style="display:none">`+element.IMAGE+`</td>
					<td style="display:none">`+element.PRICE+`</td>
				</tr>
                `
            })
            $('#tbody').html(tableBody);
        },"json");
	}
	function readProduct(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

		let image = tds[8].innerHTML 
		let idProduct = tds[2].innerHTML // id sản phẩm
		let title = tds[3].innerHTML
		
		let desc = tds[6].innerHTML 
		let idCategory = tds[7].innerHTML 

		$("#title").html(title)
		$("#image").attr('src', '../images/'+image)
		$("#description").html(desc)
		
		$.post("http://localhost:8080/api/read_product_categories.php", {
			id: idCategory,
		}, function(data,status){
			$("#id-product-category").html(data.data.NAME)
		},"json");
	
		$("#info-modal").modal('show');
	}
	let idProduct;
	let dsc = CKEDITOR.replace("desc-u")
	function updateProduct(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

		let image = tds[8].innerHTML 
		idProduct = tds[2].innerHTML // id sản phẩm
		let title = tds[3].innerHTML
		let price = tds[9].innerHTML
		let desc = tds[6].innerHTML 
		let idCategory = tds[7].innerHTML 
		
		$("#title-u").val(title)
		$("#image-u").attr('src', '../images/'+image)
		dsc.setData(desc)
		$("#price-u").val(price)
		$("#category-u").val(idCategory)
	
		$('#update-modal').modal('show');
	}
	$("#update-button").click(function(){
		title = $("#title-u").val()
		price = $("#price-u").val()
		desc = dsc.getData()
		idCategory = $("#category-u").val()
		image = $('#image-u').attr('src').split('/').pop()
		if (desc == '' || title=='' || price=='' || idCategory=='' || image==''){
			showErrorToast("Không được để trống thông tin")
			$('#update-modal').modal('hide');
		} else {
			$.post("http://localhost:8080/api/update_product.php", {
				id: idProduct,
				image: image,
				title: title,
				price: price,
				desc: desc,
				id_category: idCategory
			}, function(data,status){
				if (data.code == 0){
					$('#update-modal').modal('hide');
					showSuccessToast("Cập nhật sản phẩm thành công")
					getProduct()
				} else {
					$('#update-modal').modal('hide');
					showErrorToast("Cập nhật sản phẩm thất bại")
					getProduct()
				}
			},"json");
		}
		
	})

	function deleteProduct(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

		let idProduct = tds[2].innerHTML // id sản phẩm
		let nameProduct = tds[3].innerHTML //
		$("#id-product-d").val(idProduct)
		$("#name-product-d").val(nameProduct)
		$("#delete-modal").modal("show");
	}
	$("#delete-button").click(function(){
		$.post("http://localhost:8080/api/delete_product.php", {
		id: $("#id-product-d").val(),
		}, function(data,status){
			if (data.code == 0){
				$('#delete-modal').modal('hide');
				showSuccessToast("Xóa sản phẩm thành công")
				getProduct()
			} else {
				$('#delete-modal').modal('hide');
				showErrorToast("Xóa sản phẩm thất bại")
				getProduct()
			}
		},"json");
	})
   
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		image = fileName
		$('#image-u').attr('src','../images/'+image)
		showSuccessToast("Hình ảnh đã được đổi")
    });

</script>
</body>
</html>