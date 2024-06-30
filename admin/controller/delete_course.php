
<?php
include '../../config.php';
$admin=new Admin();
$id=$_GET['cs_id'];

$stmt=$admin->cud("DELETE FROM `courses` WHERE `cs_id`='$id'","deleted");
echo "<script>alert('Course deleted successfully');window.location='../courses.php';</script>";


?>