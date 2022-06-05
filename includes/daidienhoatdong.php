<?php
    require_once('../db.php');

    $role = $_SESSION['role'];
    $username = $_SESSION['user'];
    $user = get_info_nhanvien($username)['data'];

    $role_name = get_role($role)['data']['description'];
    $staff_name = $user['FULLNAME'];
    $image = $user['IMAGE'];
?>

<div class="col-lg-3 col-md-3 col-sm-12 col-12">
    <div class="image-user">
        <img src="../images/<?=$image?>" class="rounded-circle" style="width:150px; height:150px;display: block; margin-left: auto; margin-right: auto;">
    </div>
</div>      
<div class="col-lg-6 col-md-6 col-sm-12 col-12 text-user">
    <h6 class="content-top"><?=$staff_name?></h6>
    <h3>Nhân viên <?=$role_name?></h3>
    
</div>