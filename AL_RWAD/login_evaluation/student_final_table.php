<?php
include("../classes/EvaluationCod.php");
?>

<?php session_start();

// if (!isset($_SESSION["username"])) {
//   header("Location:../login/index.php");
//   exit;
// } 
?>
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
              <!-- <li class="separator animate__animated animate__backInRight">
                <i class="icon-arrow-right"></i>
              </li> -->
              <!-- <li class="nav-item animate__animated animate__backInRight">
                <a href="#try">الكشف العام</a>
              </li> -->

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
                  <div class="card-title">
                    <span>الكشف العام</span>
                  </div>
                </div>

                <div class="card-body">
                  <div class="row">
                    <?php
                    $Residents = DB::select("student", 1);
                    if (mysqli_num_rows($Residents) > 0) {
                      //$row = $Residents->fetch_all();
                    ?>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>المحافظة</th>
                            <th>المديرية</th>
                            <th>الصف الدراسي</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($rows = $Residents->fetch_assoc()) { ?>
                            <tr>
                              <td><?= htmlspecialchars($rows["student_id"]) ?></td>
                              <td><?= htmlspecialchars($rows["student_name"]) ?></td>
                              <td><?= htmlspecialchars($rows["governorate"]) ?></td>
                              <td><?= htmlspecialchars($rows["directorate"]) ?></td>
                              <td><?= htmlspecialchars($rows["classroom"]) ?></td>

                              <td>
                                <form method="post">
                                <div class="d-flex align-items-center gap-2">
                                  <a href="accessories.php?id=<?= htmlspecialchars($rows["student_id"]) ?>" class="btn btn-primary">
                                    الملحقات
                                  </a>
                                  <a class="btn btn-warning" href="updateStudent.php?id=<?= htmlspecialchars($rows["student_id"]) ?>">
                                    تعديل
                                  </a>
                                  <a href="student_details.php?id=<?= htmlspecialchars($rows["student_id"]) ?>" class="btn btn-secondary">تفاصيل</a>
                                </div>
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
                    // $Residents->close();
                    ?>
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
    </div>
  </div>

  <!-- Custom template | don't include it in your project! -->
  <?php include("../layout/custom_template.php") ?>
  <!-- End Custom template -->

  <?php include("../layout/script.php") ?>
</body>

</html>