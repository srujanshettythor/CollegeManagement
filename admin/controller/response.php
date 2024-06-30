<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['submit'])){
    $qid=$_POST['qid'];
    $res=$_POST['res'];
    $status="responded";
    $stmt=$admin->cud("UPDATE `query` SET `q_updated_date`=Now(),`q_status`='$status' WHERE `q_id`='$qid'","saved");
    $stmt=$admin->cud("INSERT INTO `response`(`r_date`, `q_id`, `r_description`, `r_status`) VALUES (Now(),'$qid','$res','$status')","saved");
            echo "<script>alert('Your response has been submitted successfull');window.location='../queries.php';</script>";

}
?>