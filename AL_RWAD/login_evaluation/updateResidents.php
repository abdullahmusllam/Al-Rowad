<?php
include("../classes/EvaluationCod.php");

if (isset($_GET['id'])) {
  $id_residents = $_GET['id'];

  $resident = DB::select("residents", "residents_id=$id_residents");
  if (mysqli_num_rows($resident) > 0) {
    $rows = $resident->fetch_all();

    foreach ($rows as $row) {
      $id = $row[0];
      $name_resident = $row[1];
      $phone_resident = $row[2];
      $address_resident = $row[3];
    }
  }
}

if (isset($_POST['btnUpdateResidents'])) {
  DB::update_residents();
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
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> التسجيل</h3>
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
                <a href="#try">التسجيل</a>
              </li>
              <li class="separator animate__animated animate__backInRight">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item animate__animated animate__backInRight">
                <a href="#try">الطلاب المتقدمين</a>
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
                  <div class="card-title">بيانات المقيّم</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 col-lg-4">
                      <form action="" method="post">
                        <div class="form-group">
                          <label>الرقم</label>
                          <input type="text" class="form-control" value="<?= htmlspecialchars($id) ?>" name="residents_id" />
                        </div>
                        <div class="form-group">
                          <label>الإسم</label>
                          <input type="text" class="form-control" value="<?= htmlspecialchars($name_resident) ?>" name="name_residents" />
                        </div>
                        <div class="form-group">
                          <label>رقم الجوال</label>
                          <input type="number" class="form-control" value="<?= htmlspecialchars($phone_resident) ?>" name="phone_residents" />
                        </div>
                        <div class="form-group form-inline">
                          <label class="col-md-3 col-form-label">العنوان</label>
                          <div class="col-md-9 p-0">
                            <input type="text" class="form-control input-full" value="<?= htmlspecialchars($address_resident) ?>" name="address_residents" />
                          </div>
                        </div>
                        <div class="card-action">
                          <button name="btnUpdateResidents" class="btn btn-success">حفظ التعديل</button>
                          <a class="btn btn-dark" href="../login_evaluation/Residents.php">إلغاء</a>
                      </form>
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
  </div>
  </div>



  <!-- Custom template | don't include it in your project! -->
  <?php include("../layout/custom_template.php") ?>
  <!-- End Custom template -->
  <!--   Core JS Files   -->
  <?php include("../layout/script.php") ?>
</body>

</html>