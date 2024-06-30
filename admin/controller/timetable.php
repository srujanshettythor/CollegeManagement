<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['allot'])){
    $smid=$_POST['smid'];
    $weekday=$_POST['weekday'];
    $frst=$_POST['first'];
    $scnd=$_POST['second'];
    $thrd=$_POST['third'];
    $frth=$_POST['fourth'];
    $fth=$_POST['fifth'];
    $status="alloted";
    $stmt=$admin->cud("INSERT INTO `timetable`(`tt_date`, `tt_day`, `sm_id`, `tt_first`, `tt_second`, `tt_third`, `tt_fourth`, `tt_fifth`,`tt_status`) VALUES (Now(),'$weekday','$smid','$frst','$scnd','$thrd','$frth','$fth','$status')","saved");
    echo "<script>alert('Timetable posted successfully');window.location='../view_timetable.php?sm_id=$smid';</script>";

}
if(isset($_POST['update'])){
    $csid=$_POST['csid'];
    $id=$_POST['clid'];
    $name=$_POST['name'];
    $status=$_POST['status'];
    $stmt=$admin->cud("UPDATE `classes` SET `cl_name`='$name',`cl_updated_date`=Now(),`cl_status`='$status' WHERE `cl_id`='$id'","saved");
    echo "<script>alert('Class record updated successfully');window.location='../view_classes.php?cs_id=$csid';</script>";

}
?>