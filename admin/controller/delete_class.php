
<?php
include '../../config.php';
$admin=new Admin();
$id=$_GET['cl_id'];

$st=$admin->ret("SELECT * FROM `classes` where `cl_id`='$id'");
$row=$st->fetch(PDO::FETCH_ASSOC);
$csid=$row['cs_id'];

$stmt=$admin->cud("DELETE FROM `classes` WHERE `cl_id`='$id'","deleted");
echo "<script>alert('Class deleted successfully');window.location='../view_classes.php?cs_id=$csid';</script>";


?>