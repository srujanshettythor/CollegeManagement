<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['st_id']))
{
  header('Location:index.php');
}
$stid=$_SESSION['st_id'];
$stmt=$admin->ret("SELECT * FROM `staff` inner join `courses` on courses.cs_id=staff.st_dept where staff.st_id='$stid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);


$sid=$_GET['s_id'];
$stmt2=$admin->ret("SELECT * FROM `student` inner join `classes` on classes.cl_id=student.cl_id where `s_id`='$sid'");
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
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
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Profile</h4>
                    <?php if($row2['s_profilepic']==""){ ?>
                    <img src="assets/images/student(female).jpg" alt="abc" style="margin-left:20%;border-radius:10%;width:200px;height:200px;overflow:hidden;object-fit:cover;">
                    <?php } else { ?>
                      <img src="../student/controller/<?php echo $row2['s_profilepic']; ?>" alt="abc" style="margin-left:20%;border-radius:10%;width:200px;height:200px;overflow:hidden;object-fit:cover;">
                      <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Information</h4>
                    <form class="forms-sample" method="post" action="controller/bstudents.php">
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                        <input readonly type="hidden" name="sid" value="<?php echo $sid; ?>" >
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Register Number</label>
                          <div class="col-sm-9">
                            <input readonly type="text" value="<?php echo $row2['s_register']; ?>" class="form-control bg-dark" name="registernumber" id="exampleInputUsername2" placeholder="Register number">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input readonly type="text" class="form-control bg-dark"name="name" value="<?php echo $row2['s_name']; ?>" id="exampleInputUsername2" placeholder="name">
                          </div>
                        </div>
                      </div>
                    
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input readonly type="text" class="form-control bg-dark"name="email" value="<?php echo $row2['s_email']; ?>" id="exampleInputUsername2" placeholder="email">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">phone Number</label>
                          <div class="col-sm-9">
                            <input readonly type="text" pattern="[0-9]{10}" class="form-control bg-dark" name="phonenumber"value="<?php echo $row2['s_phone']; ?>"id="exampleInputUsername2" placeholder="phone number">
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Fathername</label>
                          <div class="col-sm-9">
                            <input readonly type="text" class="form-control bg-dark" name="fathername"value="<?php echo $row2['s_fathername']; ?>" id="exampleInputUsername2" placeholder="Fathername">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Mothername</label>
                          <div class="col-sm-9">
                            <input readonly type="text" class="form-control bg-dark" name="mothername"value="<?php echo $row2['s_mothername']; ?>"id="exampleInputUsername2" placeholder="Mothername">
                          </div>
                        </div>
                      </div>

                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <input readonly type="text" class="form-control bg-dark" name="address"value="<?php echo $row2['s_address']; ?>"id="exampleInputUsername2" placeholder="address">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">City</label>
                          <div class="col-sm-9">
                            <input readonly type="text" class="form-control bg-dark" name="city" value="<?php echo $row2['s_city']; ?>"id="exampleInputUsername2" placeholder="city">
                          </div>
                        </div>
                      </div>

                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">State</label>
                          <div class="col-sm-9">
                            <input readonly type="text" class="form-control bg-dark" name="state" value="<?php echo $row2['s_state']; ?>"id="exampleInputUsername2" placeholder="state">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pincode</label>
                          <div class="col-sm-9">
                            <input readonly type="number" class="form-control bg-dark" name="pincode" value="<?php echo $row2['s_pincode']; ?>"id="exampleInputUsername2" placeholder="pincode">
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Class</label>
                          <div class="col-sm-9">
                              <input readonly type="text" class="form-control bg-dark" name="pincode" value="<?php echo $row2['cl_name']; ?>"id="exampleInputUsername2" placeholder="pincode">
                            </div>
                        </div>
                        <div class="form-group row w-100">
                        <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <input readonly type="text" class="form-control bg-dark" name="pincode" value="<?php echo $row2['s_gender']; ?>"id="exampleInputUsername2" placeholder="pincode">
                            </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Get Attendance</h4>
                    <form action="view_student.php?s_id=<?php echo $sid ?>" method="POST">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name='date2'>
                      </div>
                      <button type="submit" class="btn btn-primary" name="report">Submit</button>
                      <button type="submit" class="btn btn-danger">Clear</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php
              $start_date = 0;
              $end_date = 0;
              if (isset($_POST['report'])) {
                $start_date = $_POST['date1'];
                $end_date = $_POST['date2'];
              }
            ?>
       
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Attendance</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Sl no </th>
                            <th> Date </th>
                            <th> Class </th>
                            <th> Timing </th>
                            <th> Staff </th>
                            <th> Subject </th>
                            <th> Status </th>
                            <th> Actions </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                            $stmt=$admin->ret("SELECT * FROM `attendance` inner join `student` on student.s_id=attendance.s_id inner join `staff` on staff.st_id=attendance.tr_id inner join `subjects` on subjects.sb_id=attendance.sb_id where `at_date` BETWEEN  '$start_date' AND '$end_date' AND attendance.s_id='$sid' and attendance.tr_id='$stid'");
                           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  
                        ?>
                          <tr>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $row['at_date']; ?></td>
                              <td><?php echo $row['at_class']; ?></td>
                              <td><?php echo $row['at_class_start']; ?> - <?php echo $row['at_class_end']; ?></td>
                              <td><?php echo $row['st_name']; ?></td>
                              <td><?php echo $row['sb_name']; ?></td>
                              <td><?php echo $row['at_status']; ?></td>
                              <td>
                                <div class="mt-1">
                                <a data-toggle="modal" data-target="#exampleModa<?php echo $row['at_id'] ?>" data-whatever="@mdo">
                                  <i class="mdi mdi-border-color text-secondary" style="font-size:25px"></i>
                                </a>
                              </div>
                              </td>
                          </tr>
                          <div class="modal fade" id="exampleModa<?php echo $row['at_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="hidden" name="atid" value="<?php echo $row['at_id'] ?>" id="atid">
                                    <label>
                                      <input type="radio" name="at_id" value="Present" id="check"
                                          onchange="store(event,<?php echo $row['at_id']; ?>)" />
                                      <span>Present</span>
                                    </label>
                                    <label>
                                      <input type="radio" name="at_id" value="Absent" id="checq"
                                          onchange="store(event,<?php echo $row['at_id']; ?>)" />
                                      <span>Absent</span>
                                    </label>
                                  </div>
                                </div>
                                <!-- </form> -->
                            </div>
                          </div>
                        </div>
                        <?php }  ?>
                      </tbody>
                    </table>
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