<?php
include '../../config.php';
$admin=new Admin();
$stid=$_SESSION['st_id'];
if(isset($_POST['submit'])){
  $day = $_POST['day'];
  $class = $_POST['class'];
  $class_starts = $_POST['class_starts'];
  $class_ends = $_POST['class_ends'];
  $clid = $_POST['clid'];
  $sbid = $_POST['sbid'];
  $date=date('Y-m-d');

  $s=$admin->ret("SELECT * FROM `subjects` where `sb_id`='$sbid'");
  $ro=$s->fetch(PDO::FETCH_ASSOC);
  $sname=$ro['sb_name'];


  $stmt=$admin->ret("SELECT * FROM `student` where `cl_id`='$clid'");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $status = $_POST[$row['s_id']];
    $sid=$row['s_id'];
    

 
    $stmt1 = $admin->cud("INSERT INTO `attendance`(`at_date`, `s_id`, `tr_id`, `sb_id`, `at_day`, `at_class`, `at_class_start`, `at_class_end`, `at_posted_date`,  `at_status`) VALUES (Now(),'$sid','$stid','$sbid','$day','$class','$class_starts','$class_ends',Now(),'$status')","success");
    echo"<script>alert('Attendence Submitted');window.location.href='../view_students.php?sb_id=$sbid';</script>";
    
  }

}
?>