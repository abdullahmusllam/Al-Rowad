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
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> المقابلة</h3>
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
                <a href="interviewers.php">المقابلين</a>
              </li>
              <li class="separator animate__animated animate__backInRight">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item animate__animated animate__backInRight">
                <a href="#try">اظافة مقابل </a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12 ">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <div class="card-title animate__animated animate__bounce"> اظافة مقابل</div>
                  </div>
                </div>
                <?php
                include "../classes/db2.php";
                if (isset($_POST['interviewers_name'])) {
                  $interviewers_name = $_POST['interviewers_name'];
                  $phone = $_POST['phone'];
                  $address = $_POST['address'];
                  $conn = staticDB::query("al_rwwad", "INSERT INTO `interviewers`( `name`, `phone`, `address`) VALUES ('$interviewers_name','$phone','$address')");
                  if ($conn === TRUE) {
                    echo "تم تسجيل المقابل بنجاح!";
                    // header("Location: interviewers.php");
                  } else {
                    echo "حدث خطأ أثناء التسجيل: ";
                  }
                  // $conn->close();
                }
                ?>
                <div class="card-body">
                  <div class="table-responsive">
                    <form method="post">
                      <div class="container mt-5">
                        <form method="post">
                          <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" class="form-control" id="name" name="interviewers_name" required>
                          </div>
                          <div class="mb-3">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="number" class="form-control" id="phone" name="phone" required>
                          </div>
                          <div class="mb-3">
                            <label for="address" class="form-label">العنوان</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                          </div>
                          <button style="width: 100%" type="submit" class="btn btn-success">إرسال</button>
                        </form>
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
    <?php include '../layout/custom_template.php'?>

    <!-- End Custom template -->
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <!-- Datatables -->
  <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
  <!-- Kaiadmin JS -->
  <!-- <script src="../assets/js/kaiadmin.min.js"></script> -->
  <!-- Kaiadmin DEMO methods, don't include it in your project! -->
  <script src="../assets/js/setting-demo2.js"></script>
  <script>
    $(document).ready(function() {
      $("#basic-datatables").DataTable({});

      $("#multi-filter-select").DataTable({
        pageLength: 5,
        initComplete: function() {
          this.api()
            .columns()
            .every(function() {
              var column = this;
              var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                .appendTo($(column.footer()).empty())
                .on("change", function() {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());

                  column
                    .search(val ? "^" + val + "$" : "", true, false)
                    .draw();
                });

              column
                .data()
                .unique()
                .sort()
                .each(function(d, j) {
                  select.append(
                    '<option value="' + d + '">' + d + "</option>"
                  );
                });
            });
        },
      });

      // Add Row
      $("#add-row").DataTable({
        pageLength: 5,
      });

      var action =
        '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $("#addRowButton").click(function() {
        $("#add-row")
          .dataTable()
          .fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action,
          ]);
        $("#addRowModal").modal("hide");
      });
    });
  </script>
</body>

</html>