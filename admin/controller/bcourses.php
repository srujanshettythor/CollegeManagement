<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['insert'])){
    $name=$_POST['name'];
    $status="active";
    $stmt=$admin->cud("INSERT INTO `courses`(`cs_name`, `cs_posted_date`, `cs_status`) VALUES ('$name',Now(),'$status')","saved");
    echo "<script>alert('Course posted successfully');window.location='../courses.php';</script>";

}
if(isset($_POST['update'])){
    $id=$_POST['csid'];
    $name=$_POST['name'];
    $status=$_POST['status'];
    $stmt=$admin->cud("UPDATE `courses` SET `cs_name`='$name',`cs_updated_date`=Now(),`cs_status`='$status' WHERE `cs_id`='$id'","saved");
    echo "<script>alert('Course record updated successfully');window.location='../courses.php';</script>";

}
?>