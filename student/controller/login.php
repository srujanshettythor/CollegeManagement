<?php 
include '../../config.php';
$admin=new Admin();
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];
$hmt=$admin->ret("SELECT * FROM `student` WHERE `s_email`='$email' AND `s_password`='$password'");
$row=$hmt->fetch(PDO::FETCH_ASSOC);
$num=$hmt->rowCount();
if($num>0){
	$sid=$row['s_id'];
	$_SESSION['s_id']=$sid;
	echo "<script> alert('Login Successfull');window.location='../homepage.php';</script>";

} else{
	echo "<script> alert('Login Unsuccessfull');window.location='../index.php';</script>";
}
}
?>