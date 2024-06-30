<?php 
include '../config.php';
$admin =new Admin();

$smid=$_GET['sm_id'];

$stmt=$admin->ret("SELECT * FROM `subjects` where `sm_id`='$smid'");

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    echo "<option value='' hidden>Choose Subject</option>";
    echo "<option value='".$row['sb_id']."'>".$row['sb_name']."</option>";

}


?>