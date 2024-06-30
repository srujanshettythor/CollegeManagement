<?php
include '../../config.php';
$admin=new Admin();
$aid=$_SESSION['a_id'];
if(isset($_POST['insert'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $department=$_POST['department'];
    $designation=$_POST['designation'];
    $password=$_POST['password'];
    $status="active";
    $stmt=$admin->cud("INSERT INTO `staff`(`st_name`, `st_dept`, `st_desig`, `st_gender`, `st_phone`, `st_email`, `st_password`, `st_address`, `st_city`, `st_state`, `st_pincode`, `st_created_date`, `st_status`) 
    VALUES ('$name','$department','$designation','$gender','$phone','$email','$password','$address','$city','$state','$pincode',Now(),'$status')","saved");
            echo "<script>alert('Staff registered successfully');window.location='../staffs.php';</script>";

}
if(isset($_POST['update'])){
    $stid=$_POST['stid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phonenumber'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $department=$_POST['department'];
    $designation=$_POST['designation'];
    $stmt=$admin->cud("UPDATE `staff` SET `st_name`='$name',`st_dept`='$department',`st_desig`='$designation',`st_gender`='$gender',`st_phone`='$phone',`st_email`='$email',`st_address`='$address',`st_city`='$city',`st_state`='$state',`st_pincode`='$pincode' WHERE `st_id`='$stid'","saved");
            echo "<script>alert('Staff record updated successfully');window.location='../staffs.php';</script>";

}

if(isset($_POST['up'])){
    $stid=$_POST['stid'];
    $status=$_POST['status'];
    $stmt=$admin->cud("UPDATE `staff` SET `st_status`='$status' WHERE `st_id`='$stid'","saved");
            echo "<script>alert('Staff status updated successfully');window.location='../staffs.php';</script>";

}
?>