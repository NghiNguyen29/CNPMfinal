<?php
    require_once('../db.php');

    $role = $_SESSION['role'];
    $role_name = get_role($role)['data']['description'];

    $username = $_SESSION['user'];
    $user = get_info_nhanvien($username)['data'];
    $staff_name = $user['FULLNAME'];
    $image = $user['IMAGE'];
?>



<div class="image-top">
    <img src="../images/<?=$image?>" class="avatar">
</div>
<div class="content-top">
    <?=$staff_name?>
</div>
<div class="cv-top">
    <p>Nhân viên <?=$role_name?></p>
</div>


       