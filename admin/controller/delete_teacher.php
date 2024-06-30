
<?php
include '../../config.php';
$admin=new Admin();
$id=$_GET['tr_id'];

$st=$admin->ret("SELECT * FROM `teacher` where `tr_id`='$id'");
$row=$st->fetch(PDO::FETCH_ASSOC);
$stid=$row['st_id'];

$stmt=$admin->cud("DELETE FROM `teacher` WHERE `tr_id`='$id'","deleted");
echo "<script>alert('Subject has been removed from the teacher');window.location='../view_assigned_subjects.php?st_id=$stid';</script>";


?>