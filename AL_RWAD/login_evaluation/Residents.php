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
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> المقييمين</h3>
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
                <a href="#try">الطلاب المتقدمين</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title">
                  <span>قائمة المقيمين</span>
                  <a class="btn btn-success float-end" href="../login_evaluation/addResidents.php">
                    إضافة مقيّمين
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <?php
                  $Residents = DB::select("residents", 1);
                  if (mysqli_num_rows($Residents) > 0) {
                    $row = $Residents->fetch_all();
                  ?>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>الاسم</th>
                          <th>رقم الجوال</th>
                          <th>العنوان</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($row  as $rows) { ?>
                          <tr>
                            <td><?= htmlspecialchars($rows[0]) ?></td>
                            <td><?= htmlspecialchars($rows[1]) ?></td>
                            <td><?= htmlspecialchars($rows[2]) ?></td>
                            <td><?= htmlspecialchars($rows[3]) ?></td>
                            <td>
                              <form method="post">
                                <a class="btn btn-warning" href="updateResidents.php?id=<?= htmlspecialchars($rows[0]) ?>">
                                  تعديل
                                </a>
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
    </div>
  </div>
  </div>
  <!-- Custom template | don't include it in your project! -->
  <?php include("../layout/custom_template.php") ?>
  <!-- End Custom template -->

  <?php include("../layout/script.php") ?>
</body>

</html>