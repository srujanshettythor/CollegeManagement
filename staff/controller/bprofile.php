<?php
include '../../config.php';
$admin=new Admin();
$stid=$_SESSION['st_id'];
if(isset($_POST['ndp'])){
    $dp="upload/".basename($_FILES['dp']['name']);
    move_uploaded_file($_FILES['dp']['tmp_name'],$dp);
    $stmt=$admin->cud("UPDATE `staff` SET `st_profilepic`='$dp' WHERE `st_id`='$stid'","updated");
    echo "<script>alert('Profile picture updated successful');window.location='../profile.php';</script>";
}
if(isset($_POST['up'])){
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    if($pass1==$pass2){
        $stmt=$admin->cud("UPDATE `staff` SET `st_password`='$pass2' WHERE `st_id`='$stid'","updated");
        echo "<script>alert('Password updated successful');window.location='../profile.php';</script>";
    } else {
        echo "<script>alert('Password is not matching');window.location='../profile.php';</script>";
    }
}if(isset($_POST['update'])){
    $name=$_POST['name'];
    $phone=$_POST['phonenumber'];
    $email=$_POST['email'];
    $adrs=$_POST['address'];
    $ct=$_POST['city'];
    $st=$_POST['state'];
    $pin=$_POST['pincode'];
        $stmt=$admin->cud("UPDATE `staff` SET `st_name`='$name',`st_phone`='$phone',`st_email`='$email',`st_address`='$adrs',`st_city`='$ct',`st_state`='$st',`st_pincode`='$pin',`st_updated_date`=Now() WHERE `st_id`='$stid'","updated");
        echo "<script>alert('Profile updated successfully');window.location='../profile.php';</script>";
    
}
?>