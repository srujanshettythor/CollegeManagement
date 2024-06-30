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
$trid=$_GET['tr_id'];
$stmt2=$admin->ret("SELECT * FROM `teacher` inner join `subjects` on subjects.sb_id=teacher.sb_id inner join `staff` on staff.st_id=teacher.st_id where teacher.tr_id='$trid'");
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
                    <h4 class="card-title">Course Details</h4>
                    <form class="form-sample" method="post" action="controller/bteacher.php">
                      <p class="card-description"></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Lecturer</label>
                            <div class="col-sm-7">
                              <select name="stid" required class="form-control bg-light text-dark">
                              <option value="" hidden><?php echo $row2['st_name']; ?></option>
                              <?php 
                              $st=$admin->ret("SELECT * FROM `staff` where `st_status`='active'");
                              while($ro=$st->fetch(PDO::FETCH_ASSOC)){
                               ?>
                                <option value="<?php echo $ro['st_id']; ?>"><?php echo $ro['st_name']; ?></option>
                              <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-8">
                              <select name="sbid" required class="form-control bg-light text-dark w-100">
                              <option value="" hidden><?php echo $row2['sb_name']; ?></option>
                              <?php 
                              $st=$admin->ret("SELECT * FROM `subjects` inner join `semesters` on semesters.sm_id=subjects.sm_id where `sb_status`='active' order by `sb_id` asc");
                              while($ro=$st->fetch(PDO::FETCH_ASSOC)){
                               ?>
                                <option value="<?php echo $ro['sb_id']; ?>"><?php echo $ro['sb_name']; ?> [ <?php echo $ro['sm_name']; ?> ]</option>
                              <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <button class="btn btn-success" style="float:right;" name="assign">Update</button>
                    </form>
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