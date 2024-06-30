<?php 
include '../../config.php';
$admin=new Admin();
if(isset($_SESSION['s_id'])){
	session_destroy();
	unset($_SESSION['s_id']);
	$admin->redirect('../index');
}
?>