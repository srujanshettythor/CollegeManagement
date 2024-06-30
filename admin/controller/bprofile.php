<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['ndp'])){
    $dp="upload/".basename($_FILES['dp']['name']);
    move_uploaded_file($_FILES['dp']['tmp_name'],$dp);
    $stmt=$admin->cud("UPDATE `admin` SET `a_profilepic`='$dp' WHERE `a_id`='$aid'","updated");
    echo "<script>alert('Profile picture updated successful');window.location='../profile.php';</script>";
}
if(isset($_POST['up'])){
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    if($pass1==$pass2){
        $stmt=$admin->cud("UPDATE `admin` SET `a_password`='$pass2' WHERE `a_id`='$aid'","updated");
        echo "<script>alert('Password updated successful');window.location='../profile.php';</script>";
    } else {
        echo "<script>alert('Password is not matching');window.location='../profile.php';</script>";
    }
}
?>