<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['insert'])){
    $csid=$_POST['csid'];
    $name=$_POST['name'];
    $status="active";
    $stmt=$admin->cud("INSERT INTO `classes`(`cs_id`,`cl_name`, `cl_posted_date`, `cl_status`) VALUES ('$csid','$name',Now(),'$status')","saved");
    echo "<script>alert('Class posted successfully');window.location='../view_classes.php?cs_id=$csid';</script>";

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