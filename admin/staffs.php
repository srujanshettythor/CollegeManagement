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
                    <h4 class="card-title">Staffs Details</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Staff Name </th>
                            <th>Department </th>
                            <th>Designation </th>
                            <th>Gender</th>
                            <th>Phoneno</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt=$admin->ret("SELECT * FROM `staff`");
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                          <tr>
                            
                            <td>
                              <?php if($row['st_profilepic']==""){ ?>
                              <img src="assets/images/staff.jpg" alt="image" />
                              <?php } else { ?>
                                <img src="../staff/controller/<?php echo $row['st_profilepic']; ?>" alt="image" />
                                <?php } ?>
                              <span class="pl-2"><?php echo $row['st_name']; ?></span>
                            </td>
                            <td> <?php echo $row['st_dept']; ?> </td>
                            <td><?php echo $row['st_desig']; ?></td>
                            <td><?php echo $row['st_gender']; ?></td>
                            <td><?php echo $row['st_phone']; ?></td>
                            <td><?php echo $row['st_email']; ?></td>
                        
                            <td>
                              <div class="badge badge-outline-success"><?php echo $row['st_status']; ?></div>
                            </td>
                            <td>
                              <div class="d-flex" style="gap:10px">
                                <div>
                                  <a href="staff_profile.php?st_id=<?php echo $row['st_id']; ?>">
                                    <i class="mdi mdi-eye" style="font-size:30px"></i>
                                  </a>
                                </div>

                                
                                
                                <div>
                                  <a onclick="return confirm('Are you sure, you want to delete?')"href="controller/delete_staff.php?st_id=<?php echo $row['st_id']; ?>">
                                    <i class="mdi mdi-delete-forever text-danger" style="font-size:30px"></i>
                                  </a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
                <a href="add_staffs.php">
                <button class="btn btn-rounded btn-success p-2 mt-2" style="width:100px;height:40px">+ Add</button>
                </a>
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