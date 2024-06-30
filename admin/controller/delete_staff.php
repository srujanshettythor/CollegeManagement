
<?php
include '../../config.php';
$admin=new Admin();
$stid=$_GET['st_id'];

$stmt=$admin->cud("DELETE FROM `staff` WHERE `st_id`='$stid'","deleted");
echo "<script>alert('staff profile deleted successful');window.location='../staffs.php';</script>";


?>