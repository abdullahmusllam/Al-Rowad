<?php
include("../classes/EvaluationCod.php");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

$ُstudent = DB::select("student", "student_id  = $id");
if (mysqli_num_rows($ُstudent) > 0) {
  // $row = $ُstudent->fetch_assoc();
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


if (isset($_POST['btnUpdateStudent'])) {
  DB::update_student();
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
                <a href="../index.php">
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
                <a href="#try"> تعديل بيانات الطالب</a>
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
              <form method="post">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">تعديل بيانات الطالب</div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label>اسم الطالب</label>
                          <input
                            readonly
                            type="text"
                            class="form-control"
                            value="<?= htmlspecialchars($name_student) ?>" />
                          <input type="hidden" name="id_students" value="<?= htmlspecialchars($id_student) ?>">
                        </div>
                        <div class="form-group">
                          <label>المديرية</label>
                          <input
                            readonly
                            type="text"
                            class="form-control"
                            value="<?= htmlspecialchars($directorate) ?>" />
                        </div>
                        <div class="form-group">
                          <label>المدرسة</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            name="school"
                            value="<?= htmlspecialchars($school) ?>" />
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label>تاريخ الميلاد</label>
                          <input
                            readonly
                            type="text"
                            class="form-control form-control"
                            id=""
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
                            type="text"
                            class="form-control form-control"
                            name="student_phone"
                            value="<?= htmlspecialchars($student_phone) ?>" />
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label>المحافظة</label>
                          <input
                            readonly
                            type="text"
                            class="form-control form-control"
                            value="<?= htmlspecialchars($governorate) ?>" />
                        </div>
                        <div class="form-group">
                          <label>الصف الدراسي</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            name="class"
                            value="<?= htmlspecialchars($classroom) ?>"
                            onkeyup="getBehaverRate()" />
                        </div>
                        <div class="form-group">
                          <label>جوال ولي الامر</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            name="guardian_phone"
                            value="<?= htmlspecialchars($guardian_phone) ?>" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-action">
                    <button name="btnUpdateStudent" class="btn btn-success">تعديل</button>
                    <a class="btn btn-dark" href="student_final_table.php">الغاء</a>
                  </div>
                  <?php
                  if (isset($_GET['message'])) {
                    echo '<div class="alert alert-danger">';
                    echo htmlspecialchars($_GET['message']);
                    echo '</div>';
                  } else {
                    echo '';
                  }

                  ?>
                </div>
              </form>

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
  <script src="script.js"></script>
</body>

</html>