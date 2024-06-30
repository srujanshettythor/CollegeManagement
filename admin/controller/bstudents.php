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
    $Fathername=$_POST['fathername'];
    $Mothername=$_POST['mothername'];
    // $register=$_POST['register'];
    $password=$_POST['password'];
    $class=$_POST['class'];
    $status="active";

    $stmt1=$admin->ret("SELECT * FROM `student` ORDER BY `s_id` DESC LIMIT 1");
   
    $num=$stmt1->rowCount();
    if($num > 0) {
        $row1=$stmt1->fetch(PDO::FETCH_ASSOC);
        $last_reg_number = explode('3',$row1['s_register']);
        $last_reg_number1 = $last_reg_number[1];
        // $last_reg_number1;
    } else {
        $last_reg_number1 = 100;
    }


    $next_reg_number = 'MC2023'.(int)$last_reg_number1+1;

    $stmt=$admin->cud("INSERT INTO `student`( `s_name`, `s_register`, `s_email`, `s_phone`, `s_fathername`, `s_mothername`, `s_gender`, `cl_id`, `s_address`, `s_city`, `s_state`, `s_pincode`, `s_password`, `s_created_date`, `s_status`) 
    VALUES ('$name','$next_reg_number','$email','$phone','$Fathername','$Mothername','$gender','$class','$address','$city','$state','$pincode','$password',Now(),'$status')","saved");
            echo "<script>alert('Student registered successfully');window.location='../students.php';</script>";

}

if(isset($_POST['update'])){
    $sid=$_POST['sid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $Fathername=$_POST['fathername'];
    $Mothername=$_POST['mothername'];
    $register=$_POST['register'];
    $password=$_POST['password'];
    $class=$_POST['class'];
    $stmt=$admin->cud("UPDATE `student` SET `s_name`='$name',`s_email`='$email',`s_phone`='$phone',`s_fathername`='$fathername',`s_mothername`='$mothername',`s_gender`='$gender',`cl_id`='$class',`s_address`='$address',`s_city`='$city',`s_state`='$state',`s_pincode`='$pincode', WHERE `s_id`='$sid'","saved");
            echo "<script>alert('Student updated successfully');window.location='../students.php';</script>";

}

if(isset($_POST['up'])){
    $sid=$_POST['sid'];
    $status=$_POST['status'];
    $stmt=$admin->cud("UPDATE `student` SET `s_status`='$status' WHERE `s_id`='$sid'","saved");
            echo "<script>alert('Student status updated successfully');window.location='../students.php';</script>";

}
?>