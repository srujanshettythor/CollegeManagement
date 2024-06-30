<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['a_id']))
{
  header('Location:index.php');
}
$aid=$_SESSION['a_id'];
$stmt=$admin->ret("SELECT * FROM `admin` where `a_id`='$aid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$smid=$_GET['sm_id'];
$stmt2=$admin->ret("SELECT * FROM `semesters` where `sm_id`='$smid'");
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mahaveera Portal | Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php
      include 'includes/sidebar.php';
      
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php
      include 'includes/header.php';
      
      ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            
            <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Timetable for <?php echo $row2['sm_name']; ?></h4>
                    <div class="table-responsive">
<style>
  .table {
    border-collapse: collapse;
    border: 2px solid black;
  }

  .table th,
  .table td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }

  .lunch-break {
    background-color: #0000004f;
    writing-mode: vertical-lr;
    padding: 0;
  }
</style>

<table class="table">
  <thead>
    <tr>
      <th rowspan="2">Days</th>
      <th colspan="3">Before Lunch</th>
      <th class="lunch-break"></th>
      <th colspan="2">After Lunch</th>
    </tr>
    <tr>
      <th>I</th>
      <th>II</th>
      <th>III</th>
      <th></th>
      <th>IV</th>
      <th>V</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $stmt = $admin->ret("SELECT DISTINCT tt_day, tt_id FROM `timetable` WHERE `sm_id`='$smid'");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $day = $row['tt_day'];
      $subjects = $admin->ret("SELECT tt_first, tt_second, tt_third, tt_fourth, tt_fifth FROM `timetable` WHERE tt_day = '$day' AND `sm_id`='$smid'");
      $subject_ids = $subjects->fetch(PDO::FETCH_ASSOC);
      $subject_names = array();
      foreach ($subject_ids as $subject_id) {
        $subject = $admin->ret("SELECT sb_name FROM `subjects` WHERE sb_id = $subject_id");
        $subject_row = $subject->fetch(PDO::FETCH_ASSOC);
        $subject_names[] = $subject_row['sb_name'];
      }
      ?>
      <tr>
        <td><?php echo $day; ?></td>
        <?php
        $before_lunch_subjects = array_slice($subject_names, 0, 3);
        $after_lunch_subjects = array_slice($subject_names, 3);
        foreach ($before_lunch_subjects as $subject) {
        ?>
          <td><?php echo $subject; ?></td>
        <?php
        }
        ?>
        <td class="lunch-break"></td>
        <?php
        foreach ($after_lunch_subjects as $subject) {
        ?>
          <td><?php echo $subject; ?></td>
        <?php
        }
        ?>
        <td>
            <div class="d-flex" style="gap:10px">
              <!-- <div class="mt-1">
                <a href="edit_timetable.php?tt_id=<?php echo $row['tt_id']; ?>">
                  <i class="mdi mdi-table-edit text-secondary" style="font-size:30px"></i>
                </a>
              </div> -->
              <div>
                <a onclick="return confirm('Are you sure, you want to delete?')" href="controller/delete_timetable.php?tt_id=<?php echo $row['tt_id']; ?>">
                  <i class="mdi mdi-delete-forever text-danger" style="font-size:30px"></i>
                </a>
              </div>
            </div>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>


                  </div>
                </div>
                <?php
                $s=$admin->ret("SELECT * FROM `timetable` WHERE `sm_id`='$smid'");
                $r=$s->fetch(PDO::FETCH_ASSOC);
                $n=$s->rowCount();
                if ($n<6) { ?>
                  <a href="post_timetable.php?sm_id=<?php echo $smid; ?>">
                    <button class="btn btn-success m-2">Post</button>
                  </a>  
                <?php } ?>
              </div>
            </div>  
          </div>
        </div>
            
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>