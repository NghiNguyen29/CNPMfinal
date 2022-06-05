<?php
	session_start();
    $role = $_SESSION['role'];

	if ($role == 0){
		header('Location: ../admin/danh_sach_nhan_vien.php');
	}
	if ($role == 3){
		header('Location: ../banhang/quan_ly_hoa_don.php');
	}
	if ($role == 1){
		header('Location: ../ketoan/quan_ly_tai_chinh.php');
	}
	if ($role == 2){
		header('Location: ../kho/quan_ly_san_pham.php');
	}
	if ($role == 4){
		header('Location: ../bientap/quan_ly_bai_dang.php');
	}

?>