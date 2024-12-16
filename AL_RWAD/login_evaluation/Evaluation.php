<?php
include("../classes/EvaluationCod.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  DB::insert_students($id);
}
?>
<?php
session_start();

// if (!isset($_SESSION["username"])) {
//   header("Location:../login/index.php");
//   exit;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include '../layout/head.php'?>
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
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> التقيمات</h3>
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
                <a href="#try">قائمة التقيمات</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title"><span>قائمة التقيمات</span>
                    <a class="btn btn-success float-end" href="interviews_accepts.php"> إضافة تقييم
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php
                    $ُEvaluation = DB::select_evaluation();
                    if (mysqli_num_rows($ُEvaluation) > 0) {
                      $rows = $ُEvaluation->fetch_all();
                    ?>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>المديرية</th>
                            <th>المجموع</th>
                            <th>النتيجة</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($rows  as $row) { ?>
                            <tr>
                              <td><?= htmlspecialchars($row[1]) ?></td>
                              <td><?= htmlspecialchars($row[2]) ?></td>
                              <td><?= htmlspecialchars($row[3]) ?></td>
                              <td><?= htmlspecialchars($row[4]) ?></td>
                              <td><?= htmlspecialchars($row[5]) ?></td>
                              <td>
                                <form method="post">
                                  <a name="addStudents" class="btn btn-success" href="Evaluation.php?id=<?= htmlspecialchars($row[1]) ?>">
                                    إضافة
                                  </a>
                                  <a class="btn btn-warning" href="updateEvaluation.php?id=<?= htmlspecialchars($row[1]) ?>"> تعديل
                                  </a>
                                  <a class="btn btn-secondary" href="EvaluationDetails.php?id=<?= htmlspecialchars($row[1]) ?>">تفاصيل </a>
                                </form>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    <?php
                    } else {
                      echo "لا توجد بيانات للطلاب المقبولين.";
                    }
                    $ُEvaluation->close();
                    ?>
                  </div>
                </div>
              </div>
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
</body>

</html>
