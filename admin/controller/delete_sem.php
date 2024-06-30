
<?php
include '../../config.php';
$admin=new Admin();
$id=$_GET['sm_id'];

$st=$admin->ret("SELECT * FROM `semesters` where `sm_id`='$id'");
$row=$st->fetch(PDO::FETCH_ASSOC);
$clid=$row['cl_id'];

$stmt=$admin->cud("DELETE FROM `semesters` WHERE `sm_id`='$id'","deleted");
echo "<script>alert('Semester deleted successfully');window.location='../view_sems.php?cl_id=$clid';</script>";


?>