<?php
include '../../config.php';
$admin=new Admin();
$stid=$_SESSION['st_id'];

    $status =$_GET['at_id'];
    $date=date('Y-m-d');
    $atid=$_GET['atid'];
    $st=$admin->ret("SELECT * FROM `attendance` where `at_id`='$atid'");
    $r=$st->fetch(PDO::FETCH_ASSOC);
    $sid=$r['s_id'];
    $stmt1 = $admin->cud("UPDATE `attendance` SET `at_updated_date`='$date',`at_status`='$status' WHERE `at_id`='$atid'","success");
echo "<script>alert('Attendence Updated Successfully');window.location='../view_student.php?s_id=$sid';</script>";
    ?>