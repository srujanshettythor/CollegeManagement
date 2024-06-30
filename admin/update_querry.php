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

$qid=$_GET['q_id'];
$stmt2=$admin->ret("SELECT * FROM `query` inner join `student` on student.s_id=query.s_id inner join `classes` on classes.cl_id=student.cl_id where query.q_id='$qid'");
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
                      <h5 class="text-center mt-3 mb-2">Register Number : <?php echo $row2['s_register']; ?></h5>
                      <h5 class="text-center mt-3 mb-2">Name : <?php echo $row2['s_name']; ?> - <?php echo $row2['cl_name']; ?></h5>
                      <h5 class="text-center mt-3 mb-2">Email : <?php echo $row2['s_email']; ?></h5>
                    
                  
                    
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Querry Information</h4>
                    <form class="forms-sample" method="post" action="controller/response.php">
                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                        <input type="hidden" name="qid" value="<?php echo $qid; ?>" >
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">title</label>
                          <div class="col-sm-9">
                            <textarea readonly class="form-control bg-dark text-light" name="title"><?php echo $row2['q_title']; ?></textarea>
                            <!-- <input type="text" value="<?php echo $row2['q_title']; ?>" class="form-control" name="registernumber" id="exampleInputUsername2" placeholder="Register number"> -->
                          </div>
                        </div>
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                          <textarea readonly class="form-control bg-dark text-light" name="desc"><?php echo $row2['q_description']; ?></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="d-flex" style="gap:20px">
                        <div class="form-group row w-100">
                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Response</label>
                          <div class="col-sm-9">
                          <textarea required class="form-control bg-dark text-light" name="res"></textarea>
                          </div>
                        </div>
                      </div>

                      
                      <button style="float:right" type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
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