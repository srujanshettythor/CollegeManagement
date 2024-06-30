
<?php
include '../../config.php';
$admin=new Admin();
$id=$_GET['tt_id'];

$st=$admin->ret("SELECT * FROM `timetable` where `tt_id`='$id'");
$row=$st->fetch(PDO::FETCH_ASSOC);
$smid=$row['sm_id'];

$stmt=$admin->cud("DELETE FROM `timetable` WHERE `tt_id`='$id'","deleted");
echo "<script>alert('Timetable has been removed from the semester');window.location='../view_timetable.php?sm_id=$smid';</script>";


?>