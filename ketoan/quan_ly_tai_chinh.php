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
    <title>Trang Nhân Viên Kế Toán</title>
</head>
<body>
    <?php require_once('../includes/header.php') ?>

    <div class="container">
        <div class="row mt-3">
			<?php require_once('../includes/daidienhoatdong.php'); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="margin: auto">
                <div>
                    <a id="monthly" href="#" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 100%">Thống kê trong tháng</a>
                </div>
                <div style="margin-top:20px">
                    <a id="quarterly" href="#" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 100%">Thống kê trong quý</a>
                </div>
                <div style="margin-top:20px">
                    <a id="yearly" href="#" class="btn" style = "font-weight: bold; color: black; border: 1px solid black;width: 100%">Thống kê trong năm</a>
                </div>
            </div>
        </div>  
        <div class=" h6 text-center">Thống kê doanh thu</div>
        <hr size='1'>
		<div class="row" style="margin-bottom: 20px;margin-top: 20px">
            <div class="col-lg-6">
                <i >Từ ngày:</i> 
                <input type="date" placeholder="DD/MM/YYYY" class="form-control" id="from-date">
            </div>
            <div class="col-lg-6">
                <i>Đến ngày:</i> 
                <input type="date" placeholder="DD/MM/YYYY" value="<?=date('Y-m-d')?>" class="form-control" id="to-date">
            </div>
		</div>
            
		<div style="overflow-x:auto;">
            <table class="table table-hover">
                <tr>
                    <td>
                        Tổng thu: 
                    </td>
                    <td>
                        <div id="income">--</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tổng chi: 
                    </td>
                    <td>
                        <div id="invest">--</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Doanh thu <a id="method"></a>: 
                    </td>
                    <td>
                        <div id="total">--</div>
                    </td>
                </tr>
            </table>
            <button class="btn btn-success mb-5" onclick="viewRevenue()">In phiếu thống kê</button>
		</div>
     </div> 
     <?php require_once('../includes/footer.php') ?>
<!--View modal-->	 
<div id="revenue-modal" class="modal fade" role="dialog"> 
	<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Xem Phiếu Thống Kê</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
                
				<div class="modal-body">
                    <div class="form-group">
						<span for="id-staff">Tên nhân viên: </span>
						<i name="id-staff" id="id-staff"><?=$staff_name?></i>
					</div>
                    <div class="form-group">
						<span for="date">Ngày tạo: </span>
						<i  name="date" id="date"><?=date('Y-m-d')?></i>
					</div>
                    <div class="form-group">
						<span for="info">Thống kê doanh thu: </span>
						<i id="from"></i> : <i id="to"></i>
					</div>
					<table class="table table-hover">
                        <tr>
                            <td>
                                Tổng thu: 
                            </td>
                            <td>
                                <div id="income-review">--</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tổng chi: 
                            </td>
                            <td>
                                <div id="invest-review">--</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Doanh thu: 
                            </td>
                            <td>
                                <div id="total-review">--</div>
                            </td>
                        </tr>
                    </table>	
                    báo cáo: <b id='status'></b>				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Đóng</button>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#details-modal">Tạo</button>
				</div>
			</div>
	</div>
</div>
<script>
    var date = new Date();
    $("#monthly").click(()=>{
        let month = 1 + date.getMonth()
        let year = date.getFullYear()
        if (month<10){
            $("#from-date").val(year+'-0'+month+'-'+'01')
        } else $("#from-date").val(year+'-'+month+'-'+'01')
        $("#to-date").val('<?=date('Y-m-d')?>')
        $("#method").html('theo tháng')
        $.post("http://localhost:8080/api/caculate_revenue.php", {
			from: $("#from-date").val(),
            to: $("#to-date").val()
			}, function(data,status){
                if (data.code != 0){
                    $("#income").html("--")
                    $("#invest").html("--")
                    $("#total").html("--")
                } else {
                    $("#income").html(new Intl.NumberFormat().format(data.data.income))
                    $("#invest").html(new Intl.NumberFormat().format(data.data.invest))
                    $("#total").html(new Intl.NumberFormat().format(data.data.revenue))
                }
			},"json");
    })
    $("#quarterly").click(()=>{
        let year = date.getFullYear()
        let current = 1 + date.getMonth()
        let month=''
        if (current >=1 && current <= 3){
            month = '01'
        } else if (current >=4 && current <= 6){
            month='04'
        } else if (current >=7 && current <= 9){
            month='07'
        } else {
            month='10'
        }
        $("#from-date").val(year+'-'+month+'-'+'01')
        $("#to-date").val('<?=date('Y-m-d')?>')
        $("#method").html('theo quý')
        $.post("http://localhost:8080/api/caculate_revenue.php", {
			from: $("#from-date").val(),
            to: $("#to-date").val()
			}, function(data,status){
                if (data.code != 0){
                    $("#income").html("--")
                    $("#invest").html("--")
                    $("#total").html("--")
                } else {
                    $("#income").html(new Intl.NumberFormat().format(data.data.income))
                    $("#invest").html(new Intl.NumberFormat().format(data.data.invest))
                    $("#total").html(new Intl.NumberFormat().format(data.data.revenue))
                }
			},"json");
    })
    $("#yearly").click(()=>{
        let year = date.getFullYear()
        $("#from-date").val(year+'-'+'01'+'-'+'01')
        $("#to-date").val('<?=date('Y-m-d')?>')
        $("#method").html('theo năm')
        $.post("http://localhost:8080/api/caculate_revenue.php", {
			from: $("#from-date").val(),
            to: $("#to-date").val()
			}, function(data,status){
                if (data.code != 0){
                    $("#income").html("--")
                    $("#invest").html("--")
                    $("#total").html("--")
                } else {
                    $("#income").html(new Intl.NumberFormat().format(data.data.income))
                    $("#invest").html(new Intl.NumberFormat().format(data.data.invest))
                    $("#total").html(new Intl.NumberFormat().format(data.data.revenue))
                }
			},"json");
    })

    $("#from-date").change(()=>{
        $("#method").html('')
        $.post("http://localhost:8080/api/caculate_revenue.php", {
			from: $("#from-date").val(),
            to: $("#to-date").val()
			}, function(data,status){
                if (data.code != 0){
                    $("#income").html("--")
                    $("#invest").html("--")
                    $("#total").html("--")
                } else {
                    $("#income").html(new Intl.NumberFormat().format(data.data.income))
                    $("#invest").html(new Intl.NumberFormat().format(data.data.invest))
                    $("#total").html(new Intl.NumberFormat().format(data.data.revenue))
                }
			},"json");
    })

    $("#to-date").change(()=>{
        $("#method").html('')
        $.post("http://localhost:8080/api/caculate_revenue.php", {
			from: $("#from-date").val(),
            to: $("#to-date").val()
			}, function(data,status){
                if (data.code != 0){
                    $("#income").html("--")
                    $("#invest").html("--")
                    $("#total").html("--")
                } else {
                    $("#income").html(new Intl.NumberFormat().format(data.data.income))
                    $("#invest").html(new Intl.NumberFormat().format(data.data.invest))
                    $("#total").html(new Intl.NumberFormat().format(data.data.revenue))
                }
			},"json");
    })

    function viewRevenue(){
        $("#income-review").html($("#income").html())
        $("#invest-review").html($("#invest").html())
        $("#total-review").html($("#total").html())
        $("#from").html($("#from-date").val())
        $("#to").html($("#to-date").val())
        if (1*parseInt($("#total").html()) < 0){
            $("#status").html('Lỗ')
        } else $("#status").html('Lời')
        $("#revenue-modal").modal("show");
    }
</script>
</body>
</html>