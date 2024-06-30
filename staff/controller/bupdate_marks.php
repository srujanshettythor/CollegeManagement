<?php
include '../../config.php';
$admin=new Admin();
$stid=$_SESSION['st_id'];
if(isset($_POST['update'])){
  $sid = $_POST['sid'];
  $mid = $_POST['mid'];
  $marx = $_POST['marx'];

  $st=$admin->ret("SELECT * FROM `marks` where `m_id`='$mid'");
  $ro=$st->fetch(PDO::FETCH_ASSOC);
  $tot=$ro['m_total_marks'];

    $prcntg=0;
    $prcntg=$marx/$tot*100;
    $grade=0;
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
    $stmt1 = $admin->cud("UPDATE `marks` SET `m_marks_obtained`='$marx',`m_grade`='$grade',`m_percentage`='$prcntg',`m_updated_date`=Now(),`m_status`='$status' WHERE `m_id`='$mid'","success");
echo "<script>alert('Marks Updated Successfully');window.location='../view_student_mark.php?s_id=$sid';</script>";
}
    ?>