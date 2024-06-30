<?php 
include '../config.php';
$admin =new Admin();

$csid=$_GET['cs_id'];

$stmt=$admin->ret("SELECT * FROM `classes` where `cs_id`='$csid'");

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    echo "<option value='".$row['cl_id']."'>".$row['cl_name']."</option>";
}


?>