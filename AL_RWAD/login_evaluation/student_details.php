<?php
include("../classes/EvaluationCod.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $ُstudent = DB::select("student", "student_id  = $id");
  if (mysqli_num_rows($ُstudent) > 0) {
    while ($rows = $ُstudent->fetch_assoc()) {
      $id_student = $rows["student_id"];
      $name_student = $rows["student_name"];
      $date_of_berth = $rows["date_of_berth"];
      $governorate = $rows["governorate"];
      $directorate = $rows["directorate"];
      $area = $rows["area"];
      $classroom = $rows["classroom"];
      // $classroom = $rows[7];
      $school = $rows["school"];
      $student_phone = $rows["student_phone"];
      $guardian_phone = $rows["guardian_phone"];
    }
  }
}

?>
<?php session_start();

// if (!isset($_SESSION["username"])) {
//   header("Location:../login/index.php");
//   exit;
// } ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../layout/head.php' ?>


</head>

<body dir="rtl">
  <div class="wrapper">
    <!-- Sidebar -->
    <?php include '../layout/sidebar.php' ?>
    <!-- End Sidebar -->

    <div class="main-panel">
      <?php include '../layout/main-header.php' ?>

      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> الكشف العام</h3>
            <ul class="breadcrumbs mb-3">
              <li class="nav-home animate__animated animate__backInRight">
                <a href="../login/main.php">
                  <i class="icon-home"></i>
                </a>
              </li>
              <li class="separator animate__animated animate__backInRight">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item animate__animated animate__backInRight">
                <a href="student_final_table.php">الكشف العام</a>
              </li>
              <li class="separator animate__animated animate__backInRight">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item animate__animated animate__backInRight">
                <a href="#try"> التفاصيل</a>
              </li>
              <!-- <li class="separator">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item">
                <a href="#">Datatables</a>
              </li> -->
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">تفاصيل</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 col-lg-4">
                      <div class="form-group">
                        <label>#</label>
                        <input
                          readonly
                          type="text"
                          class="form-control"
                          value="<?= htmlspecialchars($id_student) ?>" />
                      </div>
                      <div class="form-group">
                        <label>المحافظة</label>
                        <input
                          readonly
                          type="text"
                          class="form-control"
                          id="rate"
                          value="<?= htmlspecialchars($governorate) ?>" />
                      </div>
                      <div class="form-group">
                        <label>الصف الدراسي</label>
                        <input
                          readonly
                          type="text"
                          class="form-control form-control"
                          value="<?= htmlspecialchars($classroom) ?>" />
                      </div>
                      <div class="form-group">
                        <label>جوال ولي الأمر</label>
                        <input
                          readonly
                          type="text"
                          class="form-control form-control"
                          value="<?= htmlspecialchars($guardian_phone) ?>" />
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="form-group">
                        <label>اسم الطالب</label>
                        <input
                          readonly
                          type="text"
                          class="form-control form-control"
                          id=""
                          value="<?= htmlspecialchars($name_student) ?>" />
                      </div>
                      <div class="form-group">
                        <label>المديرية</label>
                        <input
                          readonly
                          type="text"
                          class="form-control form-control"
                          value="<?= htmlspecialchars($directorate) ?>" />
                      </div>
                      <div class="form-group">
                        <label>المدرسة</label>
                        <input
                          readonly
                          type="text"
                          class="form-control form-control"
                          value="<?= htmlspecialchars($school) ?>" />
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="form-group">
                        <label>تاريخ الميلاد</label>
                        <input
                          readonly
                          type="date"
                          class="form-control form-control"
                          value="<?= htmlspecialchars($date_of_berth) ?>" />
                      </div>
                      <div class="form-group">
                        <label>المنطقة</label>
                        <input
                          readonly
                          type="text"
                          class="form-control form-control"
                          value="<?= htmlspecialchars($area) ?>" />
                      </div>
                      <div class="form-group">
                        <label>جوال الطالب</label>
                        <input
                          readonly
                          type="text"
                          class="form-control form-control"
                          id="IQ"
                          value="<?= htmlspecialchars($student_phone) ?>" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      <!-- Custom template | don't include it in your project! -->
      <?php include("../layout/custom_template.php") ?>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <?php include("../layout/script.php") ?>
</body>

</html>