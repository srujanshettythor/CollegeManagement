<?php
include '../../config.php';
$admin=new Admin();
$stid=$_SESSION['st_id'];
if(isset($_POST['submit'])){
  $tot = $_POST['totmarks'];
  $exm = $_POST['exam'];
  
  $clid = $_POST['clid'];
  $sbid = $_POST['sbid'];
  $stmt=$admin->ret("SELECT * FROM `student` where `cl_id`='$clid'");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $marx = $_POST[$row['s_id']];
    $sid=$row['s_id'];


    $prcntg=$marx/$tot*100;
    $grade='0';
    if ($prcntg>75 || $prcntg==75) {
      $grade='A';
    } elseif ($prcntg>50 || $prcntg==50) {
      $grade='B';
    }elseif ($prcntg>25 || $prcntg==25) {
      $grade='C';
    }elseif ($prcntg<24) {
      $grade='D';
    }
    if ($grade=="D") {
      $status='Fail';
    } else {
      $status="Pass";
    }
    $date=date('Y-m-d');

    $stmt1 = $admin->cud("INSERT INTO `marks`(`m_exam`, `tr_id`, `s_id`, `sb_id`, `m_total_marks`, `m_marks_obtained`, `m_grade`, `m_percentage`, `m_posted_date`, `m_status`) VALUES ('$exm','$stid','$sid','$sbid','$tot','$marx','$grade','$prcntg',Now(),'$status')","success");
    echo"<script>alert('Marks submitted successfuly');window.location.href='../visit_students.php?sb_id=$sbid';</script>";
    }

}
?>