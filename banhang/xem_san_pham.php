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

    <div class="container" >

        <div class="row mt-3">
			<?php require_once('../includes/daidienhoatdong.php'); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="margin: auto">
                <div>
                    <a href="quan_ly_hoa_don.php" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 100%">Quản lý hóa đơn</a>
                </div>
                <div style="margin-top:20px">
                    <a href="xem_san_pham.php" class="btn" style = "font-weight: bold; color: white; background:#a29bfe; border: 1px solid black;width: 100%">Danh sách sản phẩm</a>
                </div>
                
            </div>
        </div>
	


		<div style="overflow-x:auto;" class="mt-5">
			<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" class="table table-hover mt-4">
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

						</td>				
					</tr>
				</tbody>
			</table>
		</div>
     </div> 
	 <?php require_once('../includes/footer.php') ?>

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
						<label for="title">Tên Sản Phẩm: </label> </br>
						<i name="title" id="title"></i>
					</div>
					<div class="form-group">
						<img src="../images/user.png" class="thumbnail" id="image">
					</div>
					<div class="form-group">
						<label for="description">Mô tả: </label>
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
    

<script>
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
					<td style="width:160px;" class="align-middle">
						<a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" onclick="readProduct(this)">
							<span><i class="fas fa-eye"></i></span> 
						</a>
					</td>
					<td class="align-middle"><img src="../images/`+element.IMAGE+`" style="width: 80px; height: 80px" class="thumbnail"></td>
					<td class="align-middle">`+element.ID+`</td>					
					<td class="align-middle">`+element.TITLE+`</td>
					<td class="align-middle">`+new Intl.NumberFormat().format(element.PRICE)+`</td>
					<td class="align-middle">`+new Intl.NumberFormat().format(element.QUANTITY)+`</td>
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
		let idProduct = tds[2].innerHTML
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
    $("#search").keyup(function(){
        let productid = $('#search').val() // id sản phẩm
        if (productid != ''){
            $.post("http://localhost:8080/api/read_product_by_id.php", {
                id: productid
                }, function(data){
                    if (data.code != 0){
						showErrorToast("Không tồn tại sản phẩm")
                        getProduct()
                    } else {
                        let element = data.data
                        tableBody = `
                        <tr class="item">
                            <td style="width:160px;">
                                <a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" onclick="readProduct(this)">
                                    <span><i class="fas fa-eye"></i></span> 
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
                    $('#tbody').html(tableBody);
                }
                    
                },"json"
            );
        } else {
            getProduct()
        }
    })

</script>
</body>
</html>