<?php
include '../../config.php';
$admin=new Admin();
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt=$admin->ret("SELECT * FROM `staff` where `st_email`='$email' and `st_password`='$password'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    if($num>0){
        $stid=$row['st_id'];
        $_SESSION['st_id']=$stid;
        echo "<script>alert('Login successfull');window.location='../dashboard.php';</script>";   
    }
    else{
        echo "<script>alert('Login Unsuccessfull');window.location='../index.php';</script>";
    }
?>
