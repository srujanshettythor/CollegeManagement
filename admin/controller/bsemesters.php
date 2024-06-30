<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['insert'])){
    $clid=$_POST['clid'];
    $name=$_POST['name'];
    $status="active";
    $stmt=$admin->cud("INSERT INTO `semesters`(`cl_id`, `sm_name`, `sm_posted_date`, `sm_status`) VALUES ('$clid','$name',Now(),'$status')","saved");
    echo "<script>alert('Semester posted successfully');window.location='../view_sems.php?cl_id=$clid';</script>";

}
if(isset($_POST['update'])){
    $clid=$_POST['clid'];
    $id=$_POST['smid'];
    $name=$_POST['name'];
    $status=$_POST['status'];
    $stmt=$admin->cud("UPDATE `semesters` SET `sm_name`='$name',`sm_updated_date`=Now(),`sm_status`='$status' WHERE `sm_id`='$id'","saved");
    echo "<script>alert('Semester record updated successfully');window.location='../view_sems.php?cl_id=$clid';</script>";

}
?>