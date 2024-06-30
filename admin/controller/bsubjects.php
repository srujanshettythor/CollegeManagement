<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['insert'])){
    $smid=$_POST['smid'];
    $name=$_POST['name'];
    $status="active";
    $stmt=$admin->cud("INSERT INTO `subjects`(`sm_id`,`sb_name`, `sb_posted_date`, `sb_status`) VALUES ('$smid','$name',Now(),'$status')","saved");
    echo "<script>alert('Subject posted successfully');window.location='../view_subjects.php?sm_id=$smid';</script>";

}
if(isset($_POST['update'])){
    $smid=$_POST['smid'];
    $id=$_POST['sbid'];
    $name=$_POST['name'];
    $status=$_POST['status'];
    $stmt=$admin->cud("UPDATE `subjects` SET `sb_name`='$name',`sb_updated_date`=Now(),`sb_status`='$status' WHERE `sb_id`='$id'","saved");
    echo "<script>alert('Subject record updated successfully');window.location='../view_subjects.php?sm_id=$smid';</script>";

}
?>