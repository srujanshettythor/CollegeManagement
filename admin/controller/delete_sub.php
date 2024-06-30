
<?php
include '../../config.php';
$admin=new Admin();
$id=$_GET['sb_id'];

$st=$admin->ret("SELECT * FROM `subjects` where `sb_id`='$id'");
$row=$st->fetch(PDO::FETCH_ASSOC);
$smid=$row['sm_id'];

$stmt=$admin->cud("DELETE FROM `subjects` WHERE `sb_id`='$id'","deleted");
echo "<script>alert('Semester deleted successfully');window.location='../view_subjects.php?sm_id=$smid';</script>";


?>