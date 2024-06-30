<?php 
include '../../config.php';
$admin=new Admin();
$sid=$_SESSION['s_id'];
if(isset($_POST['ndp'])){

	$dp="upload/".basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'],$dp);

		$stmt=$admin->cud("UPDATE `student` SET `s_profilepic`='$dp' WHERE `s_id`='$sid'","updated");
		echo "<script>alert('Profile picture updated successfull');window.location='../profile.php';</script>";
} 
if(isset($_POST['up'])){
    $op=$_POST['op'];
    $np=$_POST['np'];
    $cp=$_POST['cp'];

    $s=$admin->ret("SELECT * FROM `student` WHERE `s_id`='$sid'");
    $r=$s->fetch(PDO::FETCH_ASSOC);
    $p=$r['s_password'];
    if($op==$p){
    	if ($np==$cp) {
    		$st=$admin->cud("UPDATE `student` SET `s_password`='$cp' WHERE `s_id`='$sid'","saved");
    		echo "<script>alert('Password updated successfully!');window.location='../profile.php';</script>";
    	}else{
    		echo "<script>alert('Passwords are not matching!');window.location='../profile.php';</script>";
    	}

    } else{
    	echo "<script>alert('Old password is incorrect!');window.location='../profile.php';</script>";
    }
    
}

?>