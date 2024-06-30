<?php
include '../../config.php';
$admin=new Admin();
if(isset($_SESSION['st_id'])){
    session_destroy();
    unset($_SESSION['st_id']);
    $admin->redirect('../index');
}
?>