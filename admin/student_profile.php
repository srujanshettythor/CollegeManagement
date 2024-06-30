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

$sid=$_GET['s_id'];
$stmt2=$admin->ret("SELECT * FROM `student` inner join `classes` on classes.cl_id=student.cl_id inner join `courses` on courses.cs_id=classes.cs_id where `s_id`='$sid'");
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
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Profile</h4>
                    <?php if($row2['s_profilepic']==""){ ?>
                    <img src="assets/images/student(female).jpg" alt="abc" style="margin-left:20%;border-radius:10%;width:200px;height:200px;overflow:hidden;object-fit:cover;">
                    <?php } else { ?>
                      <img src="../student/controller/<?php echo $row2['s_profilepic']; ?>" alt="abc" style="margin-left:20%;border-radius:10%;width:200px;height:200px;overflow:hidden;object-fit:cover;">
                      <?php } ?>
                      <h5 class="text-center mt-3 mb-2">Password : <?php echo $row2['s_password']; ?></h5>
                      <h5 class="text-center mt-3 mb-2">Course : <?php echo $row2['cs_name']; ?></h5>
                    <form method="post" action="controller/bstudents.php" enctype="multipart/form-data">
                      <div class="d-flex mt-3" style="gap:0px">
                      <input type="hidden" name="sid" value="<?php echo $sid; ?>" >
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-5">
                              <select name="status" required class="form-control">
                              <option value="" hidden><?php echo $row2['s_status']; ?></option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                              </select>
                            </div>
                        <button class="btn btn-success" type="submit" name="up">Update</button>

                      </div>
                    </form>
                  
                    
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Information</h4>
                    <form class="forms-sample" method="post" action="controller/bstudents.php">
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-75">
                        <input type="hidden" name="sid" value="<?php echo $sid; ?>" >
                          <label for="exampleInputUsername2" class="col-sm-5 col-form-label">Register Number</label>
                          <div class="col-sm-7">
                            <input type="text" readonly value="<?php echo $row2['s_register']; ?>" class="form-control bg-dark" name="registernumber" id="exampleInputUsername2" placeholder="Register number">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"name="name" value="<?php echo $row2['s_name']; ?>" id="exampleInputUsername2" placeholder="name">
                          </div>
                        </div>
                      </div>
                    
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-75">
                          <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Email</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control"name="email" value="<?php echo $row2['s_email']; ?>" id="exampleInputUsername2" placeholder="email">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">phone Number</label>
                          <div class="col-sm-9">
                            <input type="text" pattern="[0-9]{10}" class="form-control" name="phonenumber"value="<?php echo $row2['s_phone']; ?>"id="exampleInputUsername2" placeholder="phone number">
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-75">
                          <label for="exampleInputUsername2" class="col-sm-6 col-form-label">Fathername</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="fathername"value="<?php echo $row2['s_fathername']; ?>" id="exampleInputUsername2" placeholder="Fathername">
                          </div>
                        </div>
                        <div class="form-group row w-90">
                          <label for="exampleInputUsername2" class="col-sm-6 col-form-label">Mothername</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="mothername"value="<?php echo $row2['s_mothername']; ?>"id="exampleInputUsername2" placeholder="Mothername">
                          </div>
                        </div>
                      </div>

                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-75">
                          <label for="exampleInputUsername2" class="col-sm-5 col-form-label">Address</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="address"value="<?php echo $row2['s_address']; ?>"id="exampleInputUsername2" placeholder="address">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">City</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="city" value="<?php echo $row2['s_city']; ?>"id="exampleInputUsername2" placeholder="city">
                          </div>
                        </div>
                      </div>

                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-75">
                          <label for="exampleInputUsername2" class="col-sm-4 col-form-label">State</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="state" value="<?php echo $row2['s_state']; ?>"id="exampleInputUsername2" placeholder="state">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pincode</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="pincode" value="<?php echo $row2['s_pincode']; ?>"id="exampleInputUsername2" placeholder="pincode">
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-75">
                          <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Class</label>
                          <div class="col-sm-8">
                              <select name="class" required class="form-control">
                              <option value="" hidden><?php echo $row2['cl_name']; ?></option>
                              <?php 
                              $st=$admin->ret("SELECT * FROM `classes` where `cl_status`='active'");
                              while($ro=$st->fetch(PDO::FETCH_ASSOC)){
                               ?>
                                <option value="<?php echo $ro['cl_id']; ?>"><?php echo $ro['cl_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row w-100">
                        <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select required name="gender" class="form-control">
                              <option value="" hidden><?php echo $row2['s_gender']; ?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                              </select>
                            </div>
                        </div>
                      </div>
                      <!-- <div class="d-flex" style="gap:10px">
                        <div class="form-group row w-50" style="gap:20px">
                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Class</label>
                          <div class="col-sm-8">
                              <select name="class" required class="form-control">
                              <option value="" hidden><?php echo $row2['cl_name']; ?></option>
                              <?php 
                              $st=$admin->ret("SELECT * FROM `classes` where `cl_status`='active'");
                              while($ro=$st->fetch(PDO::FETCH_ASSOC)){
                               ?>
                                <option value="<?php echo $ro['cl_id']; ?>"><?php echo $ro['cl_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                        </div>
                        
                      </div> -->

                      
                      <button style="float:right" type="submit" name="update" class="btn btn-primary mr-2">Update</button>
                      <button style="float:right" class="btn btn-dark">Cancel</button>
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