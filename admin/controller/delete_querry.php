
<?php
include '../../config.php';
$admin=new Admin();
$qid=$_GET['q_id'];

$stmt=$admin->cud("DELETE FROM `query` WHERE `q_id`='$qid'","deleted");
echo "<script>alert('query deleted successful');window.location='../queries.php';</script>";


?>