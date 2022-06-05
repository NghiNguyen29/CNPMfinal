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
    <title>Trang Nhân Viên Biên Tập</title>
</head>
<body>
    <?php require_once('../includes/header.php') ?>

    <div class="container">

        <div class="row mt-3">
			<?php require_once('../includes/daidienhoatdong.php'); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="margin: auto">
                <div>
                    <a href="quan_ly_bai_dang.php" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 100%">Quản Lý Bài Viết</a>
                </div>
                <div style="margin-top:20px">
                    <a href="" class="btn" style = "font-weight: bold; color: white; background:#a29bfe; border: 1px solid black;width: 100%">Quản lý danh mục</a>
                </div>
            </div>
        </div>

		
		<div class="row" style="margin-bottom: 20px;margin-top: 40px">
            <div class="col-lg-6 col-md-6 col-sm-5 col-12 text-center add" style="height: 55px">
				<a class="btn" data-toggle="modal" data-target="#create-modal" style = "font-weight: bold; color: black; border: 1px solid black;display: block; margin-left: 0px; margin-right: auto;width: fit-content;" href="#">
                Thêm danh mục +
                </a>
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
						<td></td>
						<td>Mã Danh Mục</td>
						<td>Tên Danh Mục</td>
					</tr>
				</thead>
				
				<tbody id="tbody">
					<tr class="item">
						<td>
							<a href="#" class="btn edit idUpdate" style="border-radius: 70%; background-color: #D8D8D8" >
							<span><i class="fas fa-pen"></i></span>
							</a>
							<a href="#" class="btn delete_department" style="border-radius: 70%; background-color: #D8D8D8" >
								<span><i class="fas fa-trash-alt"></i></span> 
							</a>
							
						</td>
						<td>DM01</td>
						<td>ROBOT</td>
					</tr>
				</tbody>
                
			</table>
		</div>
     </div> 
	 <?php require_once('../includes/footer.php') ?>



<!--Create  modal-->	 	
<div id="create-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action="" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Thêm Danh Mục</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="name-news-category-c">Tên Danh Mục</label>
						<input  value="" name="name-news-category" required class="form-control" type="text" id="name-news-category-c">
					</div>
                </div>

				<div class="modal-footer">
					<input type="hidden" name="create">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button id="create-button" type="button" class="btn btn-success">Tạo</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!--Update  modal-->	 	
<div id="update-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action="" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Cập nhật Danh Mục</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">

					<div class="form-group">
						<label for="id-news-category-u">Mã Danh Mục</label>
						<input readonly value="" name="id-news-category" required class="form-control" type="text" id="id-news-category-u">
					</div>
					<div class="form-group">
						<label for="name-news-category-u">Tên Danh Mục</label>
						<input value="" name="name-news-category" required class="form-control" type="text" id="name-news-category-u">
					</div>
                </div>

				<div class="modal-footer">
					<input type="hidden" name="update">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button id='update-button' type="button" class="btn btn-success">Cập nhật</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Delete Confirm Modal -->
<div id="delete-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action="" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<hp class="modal-title">Xóa Danh Mục</hp>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<p>Bạn có chắc rằng muốn xóa ?</p>
					<input readonly class="form-control" name="id-news-category" id="news-category-d" value="">
				</div>
				<div class="modal-footer">
					<input type="hidden" name="delete">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button id="delete-button" type="button" class="btn btn-danger">Xóa</button>
				</div>
			</div>
		</form>
	</div>
</div>	 

<script>
	getCategory()
	function getCategory(){
		$.get("http://localhost:8080/api/read_news_category.php", function(data, status) {
            let tableBody = ``
            data.data.forEach(element => {
                tableBody += `
                <tr class="item">
					<td style="width:160px;">
						<a href="#" class="btn edit idUpdate" style="border-radius: 70%; background-color: #D8D8D8" onclick='updateCategory(this)'>
							<span><i class="fas fa-pen"></i></span>
						</a>
						<a href="#" class="btn delete" style="border-radius: 70%; background-color: #D8D8D8" onclick='deleteCategory(this)'>
							<span><i class="fas fa-trash-alt"></i></span> 
						</a>
					</td>
					<td>`+element.ID+`</td>
					<td>`+element.NAME+`</td>
				</tr>
                `
            })
            $('#tbody').html(tableBody);
        },"json");
	}
	$('#create-button').click(()=>{
		if ($('#name-news-category-c').val()==''){
			showErrorToast("Tên bài viết không được trống")
			$("#create-modal").modal('hide')
		} else {
			$.post("http://localhost:8080/api/add_news_category.php", {
			name: $('#name-news-category-c').val()
			}, function(data,status){
				if (data.code==0){
					$("#create-modal").modal('hide')
					getCategory()
					showSuccessToast("Thêm danh mục thành công")
				} else {
					$("#create-modal").modal('hide')
					showErrorToast("Thêm danh mục thất bại")
				}
			},"json");
		}

	})
	function updateCategory(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

		let idCategory = tds[1].innerHTML 
		let nameCategory = tds[2].innerHTML 
		$('#id-news-category-u').val(idCategory)
		$('#name-news-category-u').val(nameCategory)

		$("#update-modal").modal("show");	
	}
	$("#update-button").click(function(){
		if ($('#name-news-category-u').val()==''){
			showErrorToast("Tên bài viết không được trống")
			$("#update-modal").modal('hide')
		} else {
			$.post("http://localhost:8080/api/update_news_category.php", {
			id: $('#id-news-category-u').val(),
			name: $('#name-news-category-u').val()
			}, function(data,status){
				if (data.code==0){
					$("#update-modal").modal('hide')
					getCategory()
					showSuccessToast("Cập nhật danh mục bài viết thành công")
				} else {
					$("#update-modal").modal('hide')
					showErrorToast("Cập nhật danh mục bài viết thất bại")
				}
			},"json");
		}
		
	})

	function deleteCategory(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

		let idCategory = tds[1].innerHTML  
		$('#news-category-d').val(idCategory)
		$("#delete-modal").modal("show");	
	}
	$("#delete-button").click(function(){
		$.post("http://localhost:8080/api/delete_news_category.php", {
			id: $('#news-category-d').val(),
		}, function(data,status){
			if (data.code==0){
				$("#delete-modal").modal('hide')
				getCategory()
				showSuccessToast("Xóa danh mục bài viết thành công")
			} else {
				$("#delete-modal").modal('hide')
				showErrorToast("Xóa danh mục bài viết thất bại")
			}
		},"json");
	})
	
</script>
</body>
</html>