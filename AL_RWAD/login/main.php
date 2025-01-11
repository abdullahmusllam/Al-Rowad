<?php
include("../classes/EvaluationCod.php");

$registration = DB::count("applicants", "pass IS NULL");
$row = mysqli_fetch_array($registration);
$registrationCount = $row[0];

$interviewers = DB::count("interviewers", "1");
$row = mysqli_fetch_array($interviewers);
$interviewersCount = $row[0];

$residents = DB::count("residents", "1");
$row = mysqli_fetch_array($residents);
$residentsCount = $row[0];

$students = DB::count("student", "1");
$row = mysqli_fetch_array($students);
$studentsCount = $row[0];
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
          <div
            class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
              <h3 class="fw-bold mb-3">الصفحة الرئيسية</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-primary bubble-shadow-small">
                        <i class="fas fa-file-signature icon"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <div class="card-category">المتقدمين</div>
                        <h4 class="card-title"><?= $registrationCount;?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-info bubble-shadow-small">
                        <i class="fas fa-user-tie icon"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <div class="card-category">المقابلين</div>
                        <h4 class="card-title"><?= $interviewersCount?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-success bubble-shadow-small">
                        <i class="fas fa-tasks icon"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <div class="card-category">المقيّمين</div>
                        <h4 class="card-title"><?=$residentsCount?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-icon">
                      <div
                        class="icon-big text-center icon-secondary bubble-shadow-small">
                        <i class="fas fa-user-friends icon"></i>
                      </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <div class="card-category">طلاب المركز</div>
                        <h4 class="card-title"><?=$studentsCount?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </>
  <!-- Custom template | don't include it in your project! -->
  <?php include("../layout/custom_template.php") ?>
  <!-- End Custom template -->

  <?php include("../layout/script.php") ?>
</body>

</html>