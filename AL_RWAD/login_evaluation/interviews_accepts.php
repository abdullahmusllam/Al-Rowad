<?php
include("../classes/EvaluationCod.php");
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
    <?php include '../layout/sidebar.php'?>
    <!-- End Sidebar -->
    <div class="main-panel">
    <?php include '../layout/main-header.php'?>
      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> التقيمات
            </h3>
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
                <a href="#try"> تقييم الطلاب</a>
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
                  <div class="card-title"> تقييم الطلاب</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php
                    $id_student = DB::select_accept_interviews();
                    if (mysqli_num_rows($id_student) > 0) {
                      $row = $id_student->fetch_all();
                    ?>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>النسبة</th>
                            <th>النتيجة</th>
                            <th>تقييم</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($row  as $rows) { ?>
                            <tr>
                              <td><?= htmlspecialchars($rows[1]) ?></td>
                              <td><?= htmlspecialchars($rows[3]) ?></td>
                              <td><?= htmlspecialchars($rows[2]) ?></td>
                              <td><?= htmlspecialchars($rows[0]) ?></td>
                              <td>
                                <a href="addEvaluation.php?id=<?= $rows[1] ?>">
                                  <button class="btn btn-success" type="submit" name="btnResidents">تقييم</button>
                                </a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    <?php
                    } else {
                      echo "لا توجد بيانات للطلاب المقبولين.";
                    }
                    ?>
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