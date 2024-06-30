<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['a_id']))
{
  header('Location:index.php');
}
$aid=$_SESSION['a_id'];
$clid=$_GET['cl_id'];

$stmt=$admin->ret("SELECT * FROM `admin` where `a_id`='$aid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mahaveera Portal | Staff</title>
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
                    <h4 class="card-title">Students</h4>
                    <form action="controller/bmarks.php" method="POST">
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Sl no </th>
                            <th> Reg No </th>
                            <th> Student </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                            $stmt=$admin->ret("SELECT * FROM `student` inner join `classes` on classes.cl_id=student.cl_id inner join `courses` on courses.cs_id=classes.cs_id where student.cl_id='$clid'");
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                          <tr>
                          <td> <?php echo $i++; ?> </td>
                          <td> <?php echo $row['s_register']; ?> </td>
                          <td> <?php echo $row['s_name']; ?> </td>
                            <td>
                            <div class="d-flex" style="gap:10px">
                              <!-- <div class="mt-1">
                                <a data-toggle="modal" data-target="#exampleModal<?php echo $r['at_id'] ?>" data-whatever="@mdo">
                                  <i class="mdi mdi-border-color text-secondary" style="font-size:25px"></i>
                                </a>
                              </div> -->
                              <div>
                                <a href="view_student_mark.php?s_id=<?php echo $row['s_id']; ?>">
                                  <i class="mdi mdi-eye" style="font-size:30px"></i>
                                </a>
                              </div>
                              <!-- <div>
                                <a onclick="return confirm('Are you sure, you want to delete?')" href="controller/delete_teacher.php?tr_id=<?php echo $row['tr_id']; ?>">
                                  <i class="mdi mdi-delete-forever text-danger" style="font-size:30px"></i>
                                </a>
                              </div> -->
                            </div>
                          </td>
                        </tr>
                        <div class="modal fade" id="exampleModal<?php echo $r['at_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <!-- <form action="controller/staff_attendence.php" method="POST"> -->
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Update Attendence
                                  </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="container">
                                    <input type="hidden" name="atid" value="<?php echo $r['at_id'] ?>" id="atid">
                                    <label>
                                      <input type="radio" name="at_id" value="Present" id="check"
                                          onchange="store(event,<?php echo $r['at_id']; ?>)" />
                                      <span>Present</span>
                                    </label>
                                    <label>
                                      <input type="radio" name="at_id" value="Absent" id="checq"
                                          onchange="store(event,<?php echo $r['at_id']; ?>)" />
                                      <span>Absent</span>
                                    </label>
                                  </div>
                                </div>
                                <!-- </form> -->
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </tbody>
                  </table>
                </div> 
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
    <script>
            function store(event, atid) {
                var c = event.target.value;

                window.location.href = "controller/bupdate_attendance.php?" + "at_id=" + c + "&atid=" + atid;

            }
        </script>
    <!-- End custom js for this page -->
  </body>
</html>