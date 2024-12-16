<?php
include("../classes/EvaluationCod.php");

if (isset($_GET['id'])) {
  $id_students = $_GET['id'];

  //$name_students = DB::select("applicants", "applicant_id=$id_students");
  $students = DB::select("applicants", "applicant_id=$id_students");

  if (mysqli_num_rows($students) > 0) {

    while ($rows_stu = $students->fetch_assoc()) {
      $rate = $rows_stu["rate"];
      $name_student = $rows_stu["name"];
      $id_student = $rows_stu["applicant_id"];
    }
    $rate = $rate * 0.2;
  }

  $interviews_rate = DB::select('interviews', "applicant_id=$id_students");
  if (mysqli_num_rows($interviews_rate) > 0) {
    $row_int = $interviews_rate->fetch_all();

    foreach ($row_int  as $rows_int) {
      $interview_rate = $rows_int[6];
    }
  }
}


if (isset($_POST['btnAddEvaluation'])) {
  DB::insert_evaluation();
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
    <?php include "../layout/sidebar.php" ?>
    <!-- End Sidebar -->

    <div class="main-panel">
      <?php include '../layout/main-header.php' ?>
      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> التسجيل</h3>
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
                <a href="Evaluation.php">التقييمات</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <form method="post">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">إضافة تقييم</div>
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
                            value="<?= htmlspecialchars($name_student) ?>"
                            name="id_students" />
                          <input type="hidden" name="id_students" value="<?= htmlspecialchars($id_student) ?>">
                        </div>
                        <div class="form-group">
                          <label>نسبة الصف الطالع منه</label>
                          <input
                            readonly
                            type="text"
                            class="form-control"
                            id="rate"
                            value="<?= htmlspecialchars($rate) ?>"
                            name="rate"
                            onkeyup="getTotal_materials()" />
                        </div>
                        <div class="form-group">
                          <label>اللغة العربية</label>
                          <input
                            type="number" 
                            class="form-control form-control"
                            id="arabic"
                            name="arabic"
                            onkeyup="getTotal_materials()" />
                        </div>
                        <div class="form-group">
                          <label>English</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="english"
                            name="english"
                            onkeyup="getTotal_materials()" />
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label>المقيّم</label>
                          <select class="form-select form-control" name="id_residents">
                            <?php
                            $name_resident = DB::select("residents", 1);
                            if ($name_resident && mysqli_num_rows($name_resident) > 0) {
                              while ($row = mysqli_fetch_assoc($name_resident)) { ?>
                                <option value="<?= htmlspecialchars($row['residents_id']) ?>"><?= htmlspecialchars($row['name']) ?></option>
                            <?php }
                            } else {
                              echo "<option value=''>لا توجد بيانات</option>";
                            }
                            ?>
                          </select>
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
                            onkeyup="getTotal_materials()" />
                        </div>
                        <div class="form-group">
                          <label>الرياضيات</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="mathematics"
                            name="mathematics"
                            onkeyup="getTotal_materials()" />
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label>السلوك</label>
                          <input
                            type="number"
                            class="form-control form-control"
                            id="behaver"
                            onkeyup="getBehaverRate()" />
                        </div>
                        <div class="form-group">
                          <label>نسبة السلوك</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="behaverRate"
                            name="behaver"
                            onkeyup="getBehaverRate()" />
                        </div>
                        <div class="form-group">
                          <label>IQ</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="IQ"
                            name="IQ"
                            onkeyup="getTotal_materials()" />
                        </div>
                        <div class="form-group">
                          <label>مجموع المواد</label>
                          <input
                            type="text"
                            class="form-control form-control"
                            id="total_materials"
                            name="total_materials" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-action">
                    <button name="btnAddEvaluation" class="btn btn-success">حفظ</button>
                    <a href="interviews_accepts.php" class="btn btn-dark">الغاء</a>
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