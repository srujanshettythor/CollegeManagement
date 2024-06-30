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
                    <h4 class="card-title">Staff Profile</h4>
                    <?php if($row['st_profilepic']==""){ ?>
                    <img src="assets/images/staff.jpg" alt="abc" style="margin-left:20%;border-radius:10%;width:200px;height:200px;overflow:hidden;object-fit:cover;">
                    <?php } else { ?>
                      <img src="controller/<?php echo $row['st_profilepic']; ?>" alt="abc" style="margin-left:20%;border-radius:10%;width:200px;height:200px;overflow:hidden;object-fit:cover;">
                      <?php } ?>
                    <form method="post" action="controller/bprofile.php" enctype="multipart/form-data">
                      <div class="d-flex mt-3" style="gap:20px">
                        <input class="form-control" type=file name="dp">
                        <button class="btn btn-success" type="submit" name="ndp">Update</button>
                      </div>
                    </form>
                  
                    
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Staff Information</h4>
                    <form class="forms-sample" method="post" action="controller/bprofile.php">
                      <div class="d-flex" style="gap:20px">
                        <input type="hidden" name="stid" value="<?php echo $stid; ?>" >
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"name="name" value="<?php echo $row['st_name']; ?>" id="exampleInputUsername2" placeholder="name">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                        <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select required name="gender" class="form-control text-light">
                              <option value="<?php echo $row['st_gender']; ?>" hidden><?php echo $row['st_gender']; ?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                              </select>
                            </div>
                        </div>
                      </div>
                    
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"name="email" value="<?php echo $row['st_email']; ?>" id="exampleInputUsername2" placeholder="email">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">phone Number</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="phonenumber"value="<?php echo $row['st_phone']; ?>"id="exampleInputUsername2" placeholder="phone number">
                          </div>
                        </div>
                      </div>


                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="address"value="<?php echo $row['st_address']; ?>"id="exampleInputUsername2" placeholder="address">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">City</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="city" value="<?php echo $row['st_city']; ?>"id="exampleInputUsername2" placeholder="city">
                          </div>
                        </div>
                      </div>

                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">State</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="state" value="<?php echo $row['st_state']; ?>"id="exampleInputUsername2" placeholder="state">
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pincode</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="pincode" value="<?php echo $row['st_pincode']; ?>"id="exampleInputUsername2" placeholder="pincode">
                          </div>
                        </div>
                      </div>
                      
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                            <!-- <select name="department" required class="form-control"> -->
                                <!-- <option value="" hidden><?php echo $row['cs_name']; ?></option> -->
                                <input type="text" readonly value="<?php echo $row['cs_name']; ?>" class="form-control bg-dark" name="designation"/>
                              <!-- </select> -->
                            </div>
                          </div>
                          <div class="form-group row w-100">
                          <label class="col-sm-3 col-form-label">Designation</label>
                            <div class="col-sm-9">
                              <input type="text" readonly value="<?php echo $row['st_desig']; ?>" class="form-control bg-dark" name="designation"/>
                            </div>
                          </div>
                        </div>

                      
                      <button style="float:right" type="submit" name="update" class="btn btn-primary mr-2">Update</button>
                      <button style="float:right" class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Change Password</h4>
                      
                    </div>
                    <div class="row p-5" style="display:flex;flex-direction:column;gap:20px">
                      <form method="post" action="controller/bprofile.php">
                      <div class="d-flex" style="gap:30px">
                        <label class="label">New password</label>
                        <input type="text" class="form-control w-100" name="pass1">
                      </div>
                      <div class="d-flex mt-3" style="gap:10px">
                        <label class="label">Confirm password</label>
                        <input type="password" class="form-control w-100" name="pass2">
                      </div>
                      <div class="d-flex mt-3" style="gap:20px;">
                        <button class="btn btn-success" type="submit" style="float:right;" name="up">Update</button>
                    </div>
                      </form>
                      </div>
                    </div>
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