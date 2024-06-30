<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['post'])){
    $t=$_POST['title'];
    $d=$_POST['desc'];
    $sd=$_POST['sdate'];
    $ed=$_POST['edate'];
    $status="active";
    $pic="upload/".basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$pic);
    $stmt=$admin->cud("INSERT INTO `announcement`(`an_title`, `an_description`, `an_starting_date`, `an_expiry_date`, `an_poster`, `an_posted_date`,  `an_status`) VALUES ('$t','$d','$sd','$ed','$pic',Now(),'$status')","saved");
    echo "<script>alert('Announcement has been posted successfull');window.location='../announcements.php';</script>";

}

if(isset($_POST['update'])){
    $t=$_POST['title'];
    $d=$_POST['desc'];
    $sd=$_POST['sdate'];
    $ed=$_POST['edate'];
    $anid=$_POST['anid'];
    $status=$_POST['sts'];
    $pic="upload/".basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$pic);
    $stmt=$admin->cud("UPDATE `announcement` SET `an_title`='$t',`an_description`='$d',`an_starting_date`='$sd',`an_expiry_date`='$ed',`an_poster`='$pic',`an_updated_date`=Now(),`an_status`='$status' WHERE `an_id`='$anid'","saved");
    echo "<script>alert('Announcement has been posted successfull');window.location='../announcements.php';</script>";

}
?>