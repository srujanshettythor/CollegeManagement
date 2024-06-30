
<?php
include '../../config.php';
$admin=new Admin();
$anid=$_GET['an_id'];

$stmt=$admin->cud("DELETE FROM `announcement` WHERE `an_id`='$anid'","deleted");
echo "<script>alert('Announcement deleted successful');window.location='../announcements.php';</script>";


?>