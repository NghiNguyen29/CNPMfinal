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
    <title>Trang Nhân Viên Biên Tập</title>
</head>
<body>
    <?php require_once('../includes/header.php') ?>

    <div class="container">

        <div class="row mt-3">
			<?php require_once('../includes/daidienhoatdong.php'); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="margin: auto">
                <div>
                    <a onclick="getNews()" href="" class="btn" style = "font-weight: bold; color: white; background:#a29bfe; border: 1px solid black;width: 100%">Quản lý bài viết</a>
                </div>
                <div style="margin-top:20px">
                    <a href="quan_ly_danh_muc.php" class="btn" style = "font-weight: bold; border: 1px solid black;width: 100%">Quản lý danh mục</a>
                </div>
            </div>
        </div>

        <div class="text-center add btn mt-5">
			<a class="btn" style = "font-weight: bold; border: 1px solid black;display: block; margin-left: 0px; margin-right: auto;width: fit-content;" href="soan_bai_viet.php">Thêm bài viết +</a>
        </div>

		<div style="overflow-x:auto;">
			<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto" class="table">
				<thead>
					<tr class="header">
						<td></td>
						<td>Tên bài viết</td>
						<td>Tóm tắt</td>
					</tr>
				</thead>
				
				<tbody id="tbody">
					
				</tbody>
                
            </table>
		</div>
     </div> 



 
<!--Update modal-->	 	
<div id="update-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<form action="sua_bai_viet.php" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Cập nhật bài viết</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="name-news-u">Tên bài viết</label>
						<input  value="" name="name-news" required class="form-control" type="text" id="name-news-u">
					</div>
					<div class="form-group">
						<label for="summary-u">Tóm tắt</label>
						<textarea name="summary" id="summary-u" class="form-control" cols="20" rows="4"></textarea>
					</div>
					<div class="form-group">
						<label for="content-u">Nội dung</label>
						<textarea name="content" id="content-u" class="form-control"  cols="30" rows="8"></textarea>
					</div>
					<div class="form-group">
						<label for="category-u">Danh mục</label>
						<select name="category" required class="form-control" id="category-u">
						</select>
					</div>
					<img src="../images/sasuke.png" class="mb-2 thumbnail" id="image-u">
					<input  value="" name="image"  type="hidden" id="image-post">
					<input  value="" name="id-news"  type="hidden" id="id-news-post">
					<div class="form-group">
						<div class="custom-file">
							<input value="" name="thumbnail" type="file" class="custom-file-input" id="customFile" accept="image/gif, image/jpeg, image/png, image/bmp">
							<label class="custom-file-label" for="customFile">Hình ảnh</label>
						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="submit" class="btn btn-light">Open in new tab</button>
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button id="update-button" type="button" class="btn btn-success">Cập nhật</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!--View  modal-->	 
<div id="info-modal" class="modal fade " role="dialog"> 
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Xem Bài viết</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                
				<div class="modal-body">
					<div class="form-group">
						<b id="title-view"></b>
					</div>
					<div class="form-group">
						<img src="../images/sasuke.png" class="thumbnail" id="image">
					</div>
					<div class="form-group">
						<b>Nội dung</b>
						<i name="content" id="content" rows="10" style="width:100%"></i>
					</div>
					<div class="form-group">
						<div><i>Tên danh mục: <i id="name-category">đồ chơi trẻ em</i></i></div>
						<div><i>Người Viết: <i id="name-staff">Nguyễn Hưng</i></i></div>
						<div><i>Mã bài viết: <i id="id-news">12</i></i></div>
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
					<hp class="modal-title">Xóa Bài viết</hp>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<p>Bạn có chắc rằng muốn xóa <strong></strong> ?</p>
					<input readonly class="form-control" name="id-news" id = "id-news-d">
					<input readonly class="form-control mt-3" name="id-news" id = "name-news-d">
				</div>
				<div class="modal-footer">
					<input type="hidden" name="delete">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<button id="delete-button" type="button" class="btn btn-danger">Xóa</button>
				</div>
			</div>
		</form>
	</div>
</div>	 
    <?php require_once('../includes/footer.php') ?>

<script>
	// đọc danh mục
	$.get("http://localhost:8080/api/read_news_category.php", function(data){
        let option = ``
        data.data.forEach(element=>{
            option += `
            <option value="`+element.ID+`">`+element.NAME+`</option>
            `
        })
        $("#category-u").html(option)
        },"json");
	getNews()
	// load bài viết
	function getNews(){
		$.get("http://localhost:8080/api/read_news.php", function(data, status) {
            let tableBody = ``
            data.data.forEach(element => {
                tableBody += `
                <tr class="item">
					<td style="width:160px;">
						<a href="#" class="btn view" style="border-radius: 70%; background-color: #D8D8D8" onclick="readNews(this)">
							<span><i class="fas fa-eye"></i></span> 
						</a>
						<a href="#" class="btn edit idUpdate" style="border-radius: 70%; background-color: #D8D8D8" onclick='updateNews(this)'>
							<span><i class="fas fa-pen"></i></span>
						</a>
						<a href="#" class="btn delete" style="border-radius: 70%; background-color: #D8D8D8" onclick='deleteNews(this)'>
							<span><i class="fas fa-trash-alt"></i></span> 
						</a>
					</td>
					<td style="display:none">`+element.ID+`</td>
					<td style="display:none">`+element.ID_STAFF+`</td>
					<td>`+element.NAME+`</td>
					<td style="display:none">`+element.IMAGE+`</td>
					<td>`+element.SUMMARY+`</td>
					<td style="display:none">`+element.CONTENT+`</td>
					<td style="display:none">`+element.ID_NEWS_CATEGORY+`</td>
				</tr>
                `
            })
            $('#tbody').html(tableBody);
        },"json");
	}
	// đọc chi tiết
	function readNews(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

		let idNews = tds[1].innerHTML // để lấy thông tin bài viết
		let idStaff = tds[2].innerHTML // để lấy tên nhân viên
		let title = tds[3].innerHTML // để lấy tên nhân viên
		let image = tds[4].innerHTML
		let content = tds[6].innerHTML 
		let idNewsCategory = tds[7].innerHTML // để lấy tên danh mục

		$('#title-view').html(title)
		$('#image').attr('src','../images/'+image)
		$('#content').html(content)
		$('#id-news').html(idNews)
		// lấy tên nhân viên và tên danh mục
		$.post("http://localhost:8080/api/find_staff.php", {
			id: idStaff,
		}, function(data,status){
			$('#name-staff').html(data.data.FULLNAME)
		},"json");
		$.post("http://localhost:8080/api/read_news_category.php", {
			idcategory: idNewsCategory,
		}, function(data,status){
			$('#name-category').html(data.data.NAME)
		},"json");
		
		$('#info-modal').modal({show: true});
	}
	var sumr = CKEDITOR.replace('summary-u')
	var	cont = CKEDITOR.replace('content-u')
	
	function updateNews(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")

        let idNews = tds[1].innerHTML
		let nameNews = tds[3].innerHTML
		let image = tds[4].innerHTML
		let summary = tds[5].innerHTML
		let content = tds[6].innerHTML
		let idNewsCategory = tds[7].innerHTML

		$("#image-post").val(image)
		$("#name-news-u").val(nameNews)
		$("#category-u").val(idNewsCategory)
		$("#image-u").attr("src","../images/"+image)
		$("#id-news-post").val(idNews)
		sumr.setData(summary)
		cont.setData(content)

		$('#update-modal').modal({show: true});

	}
	$("#update-button").click(function(){
		$.post("http://localhost:8080/api/update_news.php", {
			news_id: $("#id-news-post").val(),
			news_name: $("#name-news-u").val(),
			image: $("#image-u").attr("src").split('/').pop(),
			summary: sumr.getData(),
			content: cont.getData(),
			category_id: $("#category-u").val()
		}, function(data,status){
			if (data.code==0){
				showSuccessToast("Cập nhật bài viết thành công")
				$('#update-modal').modal('hide');	
				getNews()
			} else {
				showErrorToast("Cập nhật bài viết thất bại")
				$('#update-modal').modal('hide');	
				getNews()
			}
			
		},"json");
	})

	function deleteNews(aTag){
		let td = aTag.parentElement
        let tr = td.parentElement
        let tds = tr.getElementsByTagName("td")
		let nameNews = tds[3].innerHTML
        let idNews = tds[1].innerHTML

		$('#id-news-d').val(idNews)
		$('#name-news-d').val(nameNews)
		$('#delete-modal').modal({show: true});
		
	}
	
	$('#delete-button').click(()=>{
		$.post("http://localhost:8080/api/delete_news.php", {
			id: $('#id-news-d').val(),
		}, function(data,status){
			if (data.code == 0){
				$('#delete-modal').modal('hide');	
				getNews()
				showSuccessToast("Xóa bài viết thành công")
			} else {
				showErrorToast("Xóa bài viết thành công")
			}
			
		},"json");
	})

	// lấy tên hình ảnh
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		$("#image-u").attr("src","../images/"+fileName)
		showSuccessToast("Hình ảnh đã được đổi")
    });

</script>
</body>
</html>