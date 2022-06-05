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
    <title>Trang Soạn Bài Viết</title>
   
</head>
<body>
	<?php require_once("../includes/header.php"); ?>		

	<div class="container mt-4">
        <div class="form-group">
            <b>Tên nhân viên: <?=$name_staff?></b> <br/>
            <i>Mã nhân viên:</i>  <i id="id-staff"><?=$id_staff?></i> <br/>
        </div>
        
        <div class="form-group">
            <label for="name-news">Tên bài viết</label>
            <input id="name-news" type="text" name="name-news" class="form-control" value="<?=$_POST['name-news']?>">
        </div>

        <div class="form-group">
            <label for="summary">Tóm tắt</label>
            <textarea id="summary" name="summary" rows="3" style="width: 100%" class="form-control"><?=$_POST['summary']?></textarea>
        </div>

        <div class="form-group">
            <label for="content">Bài viết</label>
            <textarea id="content" name="content" rows="7" style="width: 100%" class="form-control"><?=$_POST['content']?></textarea>
        </div>

        <div class="form-group">
            <label for="category">Danh mục</label>
            <select name="category" required class="form-control" id="category">
            </select>
        </div>

        <img src="../images/<?=$_POST['image']?>" class="thumbnail" id="image">
     
        <hr size="1">
            
        <div class="form-group mb-5">
            Ngày Đăng: <?=date('Y-m-d')?>  | Mã bài viết: <i id="id-news"><?=$_POST['id-news']?></i>
            <button onclick="addNews()" class="btn btn-info"  style="float:right; margin-left: 20px">Cập nhật bài viết</button>
            <button onclick="addThumbnail()" class="btn btn-info"  style="float:right">sửa ảnh</button>          
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
<div id="add-news" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Xác nhận</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <i>Bạn có chắc muốn đăng bài viết?</i>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
                <button id="create-news" type="button" class="btn btn-info">Đăng</button>
            </div>
        </div>
	</div>
</div>

<script>
    var sumr = CKEDITOR.replace('summary')
    var cont = CKEDITOR.replace('content')
    $.get("http://localhost:8080/api/read_news_category.php", function(data){
        let option = ``
        data.data.forEach(element=>{
            option += `
            <option value="`+element.ID+`">`+element.NAME+`</option>
            `
        })
        $("#category").html(option)
        },"json");
    

    function addNews(){
        let name = $('#name-news').val()
        let image = $("#image").attr('src').split('/').pop()
        let summary = sumr.getData()
        let content = cont.getData()
        let idCategory = $('#category').val()
        let idNews = $("#id-news").html()
        if (idCategory=='' || idNews=='' || name=='' || content=='' || idCategory=='' || summary==''){
            showErrorToast("Thông tin không được để trống")
        } else {
            $("#add-news").modal('show')
        }
       
    }
    $("#create-news").click(()=>{
        $.post("http://localhost:8080/api/update_news.php", {
            news_id: $("#id-news").html(),
            news_name: $('#name-news').val(),
            image: $("#image").attr('src').split('/').pop(),
            summary: sumr.getData(),
            content: cont.getData(),
            category_id: $('#category').val()
        }, function(data,status){
            if (data.code==0){
                $("#add-news").modal('hide')
                alert("Cập nhật bài viết thành công");
                window.location.href='quan_ly_bai_dang.php'
            } else {
                $("#add-news").modal('hide')
                showErrorToast("Cập nhật bài viết thất bại")
            }
        },"json");
    })

    function addThumbnail(){
        $('#add-thumbnail').modal('show');
    }
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        $("#image").attr("src",'../images/'+fileName)
        showSuccessToast("Hình ảnh đã được đổi")
    });

</script>
</body>
<link rel="stylesheet" href="../stylestaff.css">
</html>