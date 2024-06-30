
<?php
include '../../config.php';
$admin=new Admin();
$id=$_GET['sm_id'];

$st=$admin->ret("SELECT * FROM `study_material` where `sm_id`='$id'");
$row=$st->fetch(PDO::FETCH_ASSOC);
$sbid=$row['sb_id'];

$stmt=$admin->cud("DELETE FROM `study_material` WHERE `sm_id`='$id'","deleted");
echo "<script>alert('Note deleted successfully');window.location='../notes.php?sb_id=$sbid';</script>";


?>