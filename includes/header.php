<?php
?>
<nav class="heading navbar navbar-expand-lg navbar-light px-lg-5">
	<p class="logo-box navbar-brand text-white disable">toystory<span>.com</span></p>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
		aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="nav-list navbar-nav ml-auto mt-2 mt-lg-0">
			<li class="nav-item pr-lg-4">
				<button onclick="window.history.back()" class="btn btn-outline-light p-2">Quay lại</button>
			</li>

			<li id="logout" class="logout-box nav-item">
				<button onclick="location.href='../taikhoan/logout.php'" class="btn btn-outline-light p-2">Đăng xuất</button>
			</li>
		</ul>
	</div>
</nav>

<div id="toast">
</div>
<script type="text/javascript" src="../main.js"></script>