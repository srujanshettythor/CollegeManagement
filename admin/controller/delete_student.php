
<?php
include '../../config.php';
$admin=new Admin();
$sid=$_GET['s_id'];

$stmt=$admin->cud("DELETE FROM `student` WHERE `s_id`='$sid'","deleted");
echo "<script>alert('Student profile deleted successful');window.location='../students.php';</script>";


?>