<?php
include("../classes/EvaluationCod.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
$ُEvaluation = DB::select("evaluation", "applicant_id = $id");
if (mysqli_num_rows($ُEvaluation) > 0) {
  $row = $ُEvaluation->fetch_all();
  foreach ($row as $rows) {
    $id_student = $rows[1];
    $id_resident = $rows[2];
    $evaluation_date = $rows[3];
    $behaver_rate = $rows[4];
    $rate = $rows[5];
    $interview_rate = $rows[6];
    $IQ = $rows[7];
    $arabic = $rows[8];
    $science = $rows[9];
    $mathematics = $rows[10];
    $english = $rows[11];
    $total_materials = $rows[12];
  }
  $behaver = $behaver_rate * 10;
}

$getName_students = DB::select("applicants", "applicant_id = $id_student");
if (mysqli_num_rows($getName_students) > 0) {
  $row = $getName_students->fetch_all();

  foreach ($row as $rows) {
    $name_student = $rows[1];
  }
}

$getName_resident = DB::select("residents", "residents_id = $id_resident");
if (mysqli_num_rows($getName_resident) > 0) {
  $row = $getName_resident->fetch_all();

  foreach ($row as $rows) {
    $name_resident = $rows[1];
  }
}

if (isset($_POST['btn_update'])) {
  DB::update_evaluation();
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
<?php include '../layout/head.php'?>
</head>

<body dir="rtl">
  <div class="wrapper">
    <!-- Sidebar -->
    <?php include '../layout/sidebar.php'?>
    <!-- End Sidebar -->
    <div class="main-panel">
    <?php include '../layout/main-header.php'?>
      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> التقيمات</h3>
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
                <a href="Evaluation.php">قائمة التقيمات</a>
              </li>
              <li class="separator animate__animated animate__backInRight">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item animate__animated animate__backInRight">
                <a href="#try"> تعديل تقييم</a>
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
                    <div class="card-title">تعديل تقييم</div>
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
                          <input
                            type="hidden"
                            name="id_students"
                            value="<?= htmlspecialchars($id_student) ?>" />
                        </div>
                        <div class="form-group">
                          <label>نسبة الصف الطالع منه</label>
                          <input
                            readonly
                            type="text"
                            class="form-control"
                            value="<?= htmlspecialchars($rate) ?>"
                            name="rate" />
                        </div>
                        <div class="form-group">
                          <label>اللغة العربية</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="arabic"
                            name="arabic"
                            onkeyup="getTotal_materials()"
                            value="<?= htmlspecialchars($arabic) ?>" />
                        </div>
                        <div class="form-group">
                          <label>English</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="english"
                            name="english"
                            onkeyup="getTotal_materials()"
                            value="<?= htmlspecialchars($english) ?>" />
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label>المقابل</label>
                          <input
                            readonly
                            type="text"
                            class="form-control form-control"
                            value="<?= htmlspecialchars($name_resident) ?>" />
                        </div>
                        <div class="form-group">
                          <label>من المقابلات</label>
                          <input
                            readonly
                            type="text"
                            class="form-control form-control"
                            id="Interviews_rate"
                            name="Interviews_rate"
                            onkeyup="getTotal_materials()"
                            value="<?= htmlspecialchars($interview_rate) ?>" />
                        </div>
                        <div class="form-group">
                          <label>العلوم</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="science"
                            name="science"
                            onkeyup="getTotal_materials()"
                            value="<?= htmlspecialchars($science) ?>" />
                        </div>
                        <div class="form-group">
                          <label>الرياضيات</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="mathematics"
                            name="mathematics"
                            onkeyup="getTotal_materials()"
                            value="<?= htmlspecialchars($mathematics) ?>" />
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label>السلوك</label>
                          <input
                            type="number"
                            class="form-control form-control"
                            id="behaver"
                            value="<?= htmlspecialchars($behaver) ?>"
                            onkeyup="getBehaverRate()" />
                        </div>
                        <div class="form-group">
                          <label>نسبة السلوك</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="behaverRate"
                            name="behaver"
                            value="<?= $behaver_rate ?>"
                            onkeyup="getBehaverRate()" />
                        </div>
                        <div class="form-group">
                          <label>IQ</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="IQ"
                            name="IQ"
                            onkeyup="getTotal_materials()"
                            value="<?= htmlspecialchars($IQ) ?>" />
                        </div>
                        <div class="form-group">
                          <label>مجموع المواد</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="total_materials"
                            name="total_materials"
                            value="<?= htmlspecialchars($total_materials) ?>" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-action">

                    <button name="btn_update" class="btn btn-success">تعديل</button>
                    <a class="btn btn-dark" href="Evaluation.php">الغاء</a>

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

      <!-- footer -->
      <?php // include("../layout/footer.php") 
      ?>
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