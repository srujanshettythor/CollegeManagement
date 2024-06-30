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
        <?php include 'includes/sidebar.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php include 'includes/header.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <?php
                          $stmt=$admin->ret("SELECT * FROM `student`");
                          $row=$stmt->fetch(PDO::FETCH_ASSOC);
                          $num=$stmt->rowCount();
                          ?>
                        <div class="d-flex align-items-center align-self-start">
                          <h2 class="mb-0"><?php echo $num; ?></h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Students</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <?php
                          $stmt2=$admin->ret("SELECT * FROM `staff`");
                          $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
                          $num2=$stmt2->rowCount();
                          ?>
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $num2; ?></h3>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Staffs</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <?php
                          $stmt4=$admin->ret("SELECT * FROM `teacher` group by `st_id`");
                          $row4=$stmt4->fetch(PDO::FETCH_ASSOC);
                          $num4=$stmt4->rowCount();
                          ?>
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $num4; ?></h3>
                          <!-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p> -->
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Teachers</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <?php
                          $stmt5=$admin->ret("SELECT * FROM `courses`");
                          $row5=$stmt5->fetch(PDO::FETCH_ASSOC);
                          $num5=$stmt5->rowCount();
                          ?>
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $num5; ?></h3>
                          <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Courses</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Teachers</h4>
                    <?php
                          $stmt5=$admin->ret("SELECT * FROM `teacher` inner join `staff` on staff.st_id=teacher.st_id inner join `subjects` on subjects.sb_id=teacher.sb_id group by teacher.st_id");
                        while($row5=$stmt5->fetch(PDO::FETCH_ASSOC)){
                          ?>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1" style="text-transform:capitalize;"><?php echo $row5['st_name']; ?></h6>
                        <p class="text-muted mb-0">Assigned to <?php echo $row5['sb_name']; ?></p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <!-- <h6 class="font-weight-bold mb-0">$236</h6> -->
                      </div>
                    </div>
                  <?php } ?>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Annoncements</h4>
                      <!-- <p class="text-muted mb-1">Your data status</p> -->
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <?php
                          $stmt6=$admin->ret("SELECT * FROM `announcement`");
                        while($row6=$stmt6->fetch(PDO::FETCH_ASSOC)){
                          ?>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-primary">
                                <img src="controller/<?php echo $row6['an_poster']; ?>" >
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject"><?php echo $row6['an_title']; ?></h6>
                                <p class="text-muted mb-0"><?php echo $row6['an_description']; ?></p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted mt-4">Posted on <?php echo $row6['an_posted_date']; ?></p>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Queries</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> SL no </th>
                            <th> Date </th>
                            <th> Student </th>
                            <th> Title </th>                           
                            <th> Description </th>                           
                            <th> Status </th>                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                            $stmt=$admin->ret("SELECT * FROM `query` inner join `student` on student.s_id=query.s_id order by `q_id` desc LIMIT 5");
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                          <tr>
                          <td> <?php echo  $i++; ?> </td>
                          <td> <?php echo $row['q_posted_date']; ?> </td>
                            <td>
                              <?php if($row['s_profilepic']==""){ ?>
                              <img src="assets/images/staff.jpg" alt="image" />
                              <?php } else { ?>
                                <img src="../student/controller/<?php echo $row['s_profilepic']; ?>" alt="image" />
                                <?php } ?>
                              <span class="pl-2"><?php echo $row['s_name']; ?></span>
                            </td>
                            <td> <?php echo $row['q_title']; ?> </td>
                            <td><textarea class="form-control bg-dark" readonly><?php echo $row['q_description']; ?></textarea></td>
                        
                            <td>
                              <div class="badge badge-outline-success"><?php echo $row['q_status']; ?></div>
                              
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
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