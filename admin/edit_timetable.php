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

$ttid=$_GET['tt_id'];
$stmt2=$admin->ret("SELECT * FROM `timetable` inner join `semesters` on semesters.sm_id=timetable.sm_id inner join `subjects` on subjects.sb_id=timetable.tt_first where `tt_id`='$ttid'");
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
                        
                    <form class="form-sample" method="post" action="controller/timetable.php">
                      <p class="card-description"></p>
                      <input type="hidden" class="form-control" name="smid" value="<?php echo $smid; ?>">
                      <input type="hidden" class="form-control" name="ttid" value="<?php echo $ttid; ?>">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Day</label>
                            <div class="col-sm-9">
                              <select name="weekday" class="form-control" required>
                                <option class="form-control" hidden value=""><?php echo $row2['tt_day']; ?></option>
                                <option class="form-control" value="Monday">Monday</option>
                                <option class="form-control" value="Tuesday">Tuesday</option>
                                <option class="form-control" value="Wednesday">Wednesday</option>
                                <option class="form-control" value="Thursday">Thursday</option>
                                <option class="form-control" value="Friday">Friday</option>
                                <option class="form-control" value="Saturday">Saturday</option>
                              </select>                           
                            </div>
                          </div>
                        </div>

                      </div>
                      <p class="card-description"> Periods </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Hour</label>
                            <div class="col-sm-9">
                              <select name="first" class="form-control" required>
                                <option class="form-control" value="" hidden><?php echo $row2['sb_name']; ?></option>
                                
                                <?php $st=$admin->ret("SELECT * FROM `subjects` where `sm_id`='$smid'");
                                while($r=$st->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option class="form-control" value="<?php echo $r['sb_id']; ?>"><?php echo $r['sb_name']; ?></option>
                              <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Second Hour</label>
                            <div class="col-sm-9">
                              <select name="second" class="form-control" required>
                                <option class="form-control" value="" hidden><?php echo $row2['sb_name']; ?></option>
                                
                                <?php $st=$admin->ret("SELECT * FROM `subjects` where `sm_id`='$smid'");
                                while($r=$st->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option class="form-control" value="<?php echo $r['sb_id']; ?>"><?php echo $r['sb_name']; ?></option>
                              <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Third Hour</label>
                            <div class="col-sm-9">
                              <select name="third" class="form-control" required>
                                <option class="form-control" value="" hidden><?php echo $row2['tt_first']; ?></option>
                                
                                <?php $st=$admin->ret("SELECT * FROM `subjects` where `sm_id`='$smid'");
                                while($r=$st->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option class="form-control" value="<?php echo $r['sb_id']; ?>"><?php echo $r['sb_name']; ?></option>
                              <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fourth Hour</label>
                            <div class="col-sm-9">
                              <select name="fourth" class="form-control" required>
                                <option class="form-control" value="" hidden><?php echo $row2['tt_first']; ?></option>
                                
                                <?php $st=$admin->ret("SELECT * FROM `subjects` where `sm_id`='$smid'");
                                while($r=$st->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option class="form-control" value="<?php echo $r['sb_id']; ?>"><?php echo $r['sb_name']; ?></option>
                              <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fifth Hour</label>
                            <div class="col-sm-9">
                              <select name="fifth" class="form-control" required>
                                <option class="form-control" value="" hidden><?php echo $row2['tt_first']; ?></option>
                                
                                <?php $st=$admin->ret("SELECT * FROM `subjects` where `sm_id`='$smid'");
                                while($r=$st->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option class="form-control" value="<?php echo $r['sb_id']; ?>"><?php echo $r['sb_name']; ?></option>
                              <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sixth Hour</label>
                            <div class="col-sm-9">
                              <select name="sixth" class="form-control" required>
                                <option class="form-control" value="" hidden><?php echo $row2['tt_first']; ?></option>
                                
                                <?php $st=$admin->ret("SELECT * FROM `subjects` where `sm_id`='$smid'");
                                while($r=$st->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option class="form-control" value="<?php echo $r['sb_id']; ?>"><?php echo $r['sb_name']; ?></option>
                              <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <button style="float:right" class="btn btn-success p-2" name="allot">Allot</button>
                    </form>
                  </div>
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