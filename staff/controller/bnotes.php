<?php
include '../../config.php';
$admin=new Admin();
$stid=$_SESSION['st_id'];
if(isset($_POST['submit'])){
	$sbid=$_POST['sbid'];
	$title=$_POST['title'];
	$desc=$_POST['desc'];
	$file="files/".basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'],$file);
	 $stmt1 = $admin->cud("INSERT INTO `study_material`(`sm_date`, `sb_id`, `sm_file`, `sm_title`, `sm_description`, `st_id`, `sm_posted_date`, `sm_status`) VALUES (Now(),'$sbid','$file','$title','$desc','$stid',Now(),'posted')","success");
    echo"<script>alert('Notes posted successfuly');window.location.href='../notes.php?sb_id=$sbid';</script>";
}
?>