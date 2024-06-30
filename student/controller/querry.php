<?php
include '../../config.php';
$admin=new Admin();
$sid=$_SESSION['s_id'];
if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $sub=$_POST['querry'];
    $stmt=$admin->cud("INSERT INTO `query`(`q_title`, `q_description`, `s_id`, `q_posted_date`, `q_status`) VALUES ('$title','$sub','$sid',Now(),'posted')","saved");
        echo "<script>alert('Querry submitted successful');window.location='../query.php';</script>";
}
?>