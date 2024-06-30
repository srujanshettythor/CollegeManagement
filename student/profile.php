<?php 
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['s_id'])){
  header('Location:index.php');
}
$sid=$_SESSION['s_id'];
$stmt=$admin->ret("SELECT * FROM `student` inner join `classes` on classes.cl_id=student.cl_id inner join `courses` on courses.cs_id=classes.cs_id WHERE `s_id`='$sid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mahaveera Portal | Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <style type="text/css">
      

body{margin-top:20px;
color: #9b9ca1;
}
.bg-secondary-soft {
    background-color: rgba(208, 212, 217, 0.1) !important;
}
.rounded {
    border-radius: 5px !important;
}
.py-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
}
.px-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
}
.file-upload .square {
    height: 250px;
    width: 250px;
    margin: auto;
    vertical-align: middle;
    border: 1px solid #e5dfe4;
    background-color: #fff;
    border-radius: 5px;
}
.text-secondary {
    --bs-text-opacity: 1;
    color: rgba(208, 212, 217, 0.5) !important;
}
.btn-success-soft {
    color: #28a745;
    background-color: rgba(40, 167, 69, 0.1);
}
.btn-danger-soft {
    color: #dc3545;
    background-color: rgba(220, 53, 69, 0.1);
}
.form-control {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.6;
    color: #29292e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e5dfe4;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 5px;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;

    </style>
  </head>
  <body>
	  <?php include 'header.php'; ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Profile</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="homepage.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
<div class="container col-md-10">
<div class="row">
    <div class="col-12">
      <!-- Page title -->
      <!-- Form START -->
    
        <div class="row mb-5 gx-5">
          <!-- Contact detail -->
          <div class="col-lg-7 mb-5 mb-xxl-0 mt-4">
            <div class="bg-secondary-soft px-4 py-5 rounded">
              <div class="row g-3">
                <h4 class="mb-4 mt-0">Student Profile</h4>
                <!-- First Name -->
                <div class="d-flex">
                  <div class="col-md-6">
                  <label class="form-label">First Name *</label>
                  <input type="text" class="form-control" placeholder="" aria-label="First name" value="<?php echo $row['s_name']; ?>" readonly>
                </div>
                <!-- Last name -->
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Email *</label>
                  <input type="email" class="form-control" id="inputEmail4" readonly value="<?php echo $row['s_email']; ?>">
                </div>
                </div>
                <!-- Phone number -->
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Phone No *</label>
                  <input type="number" class="form-control" id="inputEmail4" readonly value="<?php echo $row['s_phone']; ?>">
                </div>
                <!-- Mobile number -->
                <!-- <div class="col-md-6">
                  <label class="form-label">Father Name *</label>
                  <input type="text" class="form-control" placeholder="" aria-label="P" value="<?php echo $row['s_fathername']; ?>">
                </div> -->
                <!-- Email -->
                
                <!-- Skype -->
                <!-- <div class="col-md-6">
                  <label class="form-label">Mother Name *</label>
                  <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="<?php echo $row['s_Mother name']; ?>">
                </div> -->
                <div class="col-md-6">
                  <label class="form-label">course *</label>
                  <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="<?php echo $row['cs_name']; ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Class *</label>
                  <input type="text" class="form-control" placeholder="" aria-label="Phone number" value="<?php echo $row['cl_name']; ?>" readonly>
                </div>
              </div> <!-- Row END -->
            </div>
          </div>
          <!-- Upload profile -->
          <div class="col-lg-5">
            <div class="bg-secondary-soft text-center px-4 py-5 rounded">
              <div class="row g-3 justify-content-center">
                <h4 class="mb-4 mt-0 text-center">Upload your profile photo</h4>
                <div class="text-center">
                  <!-- Image upload -->
                  <div class="square position-relative display-2 mb-3">
                      <?php if ($row['s_profilepic']=="" || $row['s_profilepic']=="upload/" ) { ?>
                      <img src="images/bv.jpg" alt="aa" style="width:250px;margin-left: 0%;overflow: hidden;object-fit: cover;">
                    <?php } else { ?>
                      <img src="controller/<?php echo $row['s_profilepic']; ?>" alt="aa" style="width:250px;margin-left: 0%;overflow: hidden;object-fit: cover;">
                      <h2><?php echo $row['s_name'] ?></h2>
                      <h2><?php echo $row['s_register'] ?></h2>
                  <?php } ?>
                  </div>
                  <!-- Button -->
                  <form method="post" action="controller/profile.php" enctype="multipart/form-data">
                    <input type="file" id="customFile" name="file" hidden="">
                  <input type="hidden" id="customFile" name="sid" value="<?php echo $sid ?>">
                  <label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
                  <button type="submit" class="btn btn-primary" name="ndp">Update</button>
                  </form>
                  <!-- Content -->
                  <!-- <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p> -->
                </div>
              </div>
            </div>
          </div>
        </div> <!-- Row END -->

        <!-- Social media detail -->
        <div class="row mb-5 gx-5">


          <!-- change password -->
          <div class="col-lg-6">
            <div class="bg-secondary-soft px-4 py-5 rounded">
              <div class="row g-3">
                <h4 class="my-4">Change Password</h4>
                <form method="post" action="controller/profile.php">
                  <div class="d-flex">
                    <div class="col-md-7">
                      <label for="exampleInputPassword1" class="form-label">Old password *</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="op">
                    </div>
                    <div class="col-md-7">
                      <label for="exampleInputPassword2" class="form-label">New password *</label>
                      <input type="text" class="form-control" id="exampleInputPassword2" name="np">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                    <label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
                    <input type="password" class="form-control" id="exampleInputPassword3" name="cp">
                  </div>
                  <button type="submit" class="btn btn-primary mt-3 w-100" name="up">Update</button>
                  </form>
            </div>
          </div>
        </div> <!-- Row END -->
        <!-- button -->
    </div>
  </div>
  </div>
        </div>
      </div>
    </section>		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> June 27, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-5 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> June 27, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Deparments</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Subscribe Us!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>