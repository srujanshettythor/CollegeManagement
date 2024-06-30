<?php
include '../config.php';
$admin = new Admin();
if (!isset($_SESSION['a_id'])) {
    header('Location:index.php');
}
$aid = $_SESSION['a_id'];
$clid = $_GET['cl_id'];

$stmt = $admin->ret("SELECT * FROM `admin` where `a_id`='$aid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt2 = $admin->ret("SELECT * FROM `classes` where `cl_id`='$clid'");
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
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
                                    <h4 class="card-title">Students of
                                        <?php echo $row2['cl_name']; ?>
                                    </h4>
                                    <div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
        <th>Reg No</th>
        <th>Student</th>
        <?php
        // Fetch subject names from the database and print them as table headers
        $subject_query = $admin->ret("SELECT sb_name FROM subjects INNER JOIN semesters ON subjects.sm_id = semesters.sm_id INNER JOIN classes ON classes.cl_id = semesters.cl_id WHERE classes.cl_id = '$clid'");
        while ($subject_row = $subject_query->fetch(PDO::FETCH_ASSOC)) {
            $subject_name = $subject_row['sb_name'];
            echo "<th>$subject_name</th>";
        }
        ?>
        <th>Total</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
    <?php
    $stmt = $admin->ret("SELECT DISTINCT s_id, m_id FROM `marks` INNER JOIN `subjects` ON subjects.sb_id = marks.sb_id INNER JOIN `semesters` ON semesters.sm_id = subjects.sm_id INNER JOIN `classes` ON classes.cl_id = semesters.cl_id WHERE classes.cl_id = '$clid'");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $student_id = $row['s_id'];
        // Fetch student name from the database using $student_id
        $st = $admin->ret("SELECT * FROM `student` WHERE `s_id`='$student_id'");
        $ro = $st->fetch(PDO::FETCH_ASSOC);
        $student_reg = $ro['s_register'];
        $student_name = $ro['s_name'];

        echo "<tr>";
        echo "<td>$student_reg</td>";
        echo "<td>$student_name</td>";

        $total_marks = 0;
        $marks_count = 0;

        $subject_query = $admin->ret("SELECT sb_id, sb_name FROM subjects INNER JOIN semesters ON subjects.sm_id = semesters.sm_id INNER JOIN classes ON classes.cl_id = semesters.cl_id WHERE classes.cl_id = '$clid'");
        while ($subject_row = $subject_query->fetch(PDO::FETCH_ASSOC)) {
            $subject_id = $subject_row['sb_id'];
            $subject_name = $subject_row['sb_name'];

            $marks_query = $admin->ret("SELECT m_marks_obtained, m_total_marks FROM `marks` WHERE sb_id = '$subject_id' AND s_id = '$student_id'");
            $marks_row = $marks_query->fetch(PDO::FETCH_ASSOC);

            $marks_obtained = isset($marks_row['m_marks_obtained']) ? $marks_row['m_marks_obtained'] : 0;
            $total_marks_subject = isset($marks_row['m_total_marks']) ? $marks_row['m_total_marks'] : 0;

            echo "<td>$marks_obtained / $total_marks_subject</td>";

            $total_marks += $marks_obtained;
            $marks_count++;
        }

        $average_marks = ($marks_count > 0) ? ($total_marks / $marks_count) : 0;
        $status = ($total_marks < ($average_marks * 0.2)) ? 'Fail' : 'Pass';

        echo "<td>$total_marks</td>";
        echo "<td>$status</td>";
        echo "</tr>";
    }
    ?>
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