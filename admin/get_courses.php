<?php 
include '../config.php';
$admin =new Admin();

$csid=$_GET['cs_id'];

$stmt=$admin->ret("SELECT * FROM `semesters` inner join `classes` on classes.cl_id=semesters.cl_id where `cs_id`='$csid'");

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

    echo "<option value='' hidden>Choose Semester</option>";
    echo "<option value='".$row['sm_id']."'>".$row['sm_name']." - ".$row['cl_name']."</option>";
}


?>