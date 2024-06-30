<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['assign'])){
    $st=$_POST['stid'];
    $sb=$_POST['sbid'];

    $s=$admin->ret("SELECT * FROM `teacher` where `sb_id`='$sb'");
    $r=$s->fetch(PDO::FETCH_ASSOC);
    $n=$s->rowCount();
    if ($n>0) {
    echo "<script>alert('This subject is already assigned!');window.location='../assign_teacher.php';</script>";
    } else {
    $stmt=$admin->cud("INSERT INTO `teacher`(`st_id`, `sb_id`, `tr_assigned_date`, `tr_status`) VALUES ('$st','$sb',Now(),'assigned')","updated");
    echo "<script>alert('Teacher assigned successful');window.location='../teachers.php';</script>";
    }
}
?>