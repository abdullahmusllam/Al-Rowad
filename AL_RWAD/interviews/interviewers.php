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

            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> المقابلة
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
                <a href="#try">المقابلين</a>
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
            <div class="col-md-12 ">
              <div class="card">
                <div class="card-header">
                  <form method="post" action="interviewersAdd.php">
                    <div class="d-flex align-items-center">
                      <div class="card-title animate__animated animate__bounce"> المقابلين</div>
                      <button
                        class="btn btn-success btn-round ms-auto"
                        data-bs-toggle="modal"
                        data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        اظافة مقابل
                      </button>
                    </div>
                  </form>
                </div>
                <?php
                include "../classes/db2.php";
                if (isset($_POST["pass"])) {
                  echo $applicant_id = $_POST["hid"];
                  staticDB::update("al_rwwad", "applicants", ['pass', 'مقبول', 'interviewrs_state', 'no'], "applicant_id", "=", $applicant_id);
                  //history_id	applicant_id	login_date	intervews_rate	residents_rate	registration_date	registration_state	interview_date	Interview_state	
                  //$registration_date=staticDB::selectFromTableWhere("login","applicants",["registration_date"] , "applicant_id","=",$applicant_id);
                  echo $registration_date = date("Y-m-d");

                  staticDB::insert("al_rwwad", "history", ["applicant_id", "registration_date", "registration_state",], [$applicant_id, $registration_date, "مقبول"]);
                }
                if (isset($_POST["nopass"])) {
                  echo "hello";
                  echo $applicant_id = $_POST["hid"];
                  staticDB::update("al_rwwad", "applicants", ['pass', 'غير مقبول'], "applicant_id", "=", $applicant_id);
                  $result = staticDB::selectFromTableWhere("al_rwwad", "applicants", ["registration_date"], "applicant_id", "=", $applicant_id);

                  if ($result) {
                    // التعامل مع النتائج
                    while ($row = $result->fetch_assoc()) {
                      $registration_date = date("Y-m-d"); // طباعة قيمة عمود محدد
                    }
                    staticDB::insert("al_rwwad", "history", ["applicant_id", "registration_date", "registration_state"], [$applicant_id, $registration_date, "غيرمقبول"]);
                  }
                }
                if (isset($_POST["passall"])) {
                  if (isset($_POST["chec"])) {

                    $chekArray = $_POST["chec"];
                    $registration_date = date("Y-m-d");
                    foreach ($chekArray as $onechecid) {
                      staticDB::update("al_rwwad", "applicants", ['pass', 'مقبول'], "applicant_id", "=", $onechecid);
                      staticDB::insert("al_rwwad", "history", ["applicant_id", "registration_date", "registration_state", "interviewrs_state"], [$onechecid, $registration_date, "مقبول", "no"]);
                    }
                  } else {
                    echo " <div class='alert alert-danger'> اختر  </div>";
                  }
                }
                if (isset($_POST["nopassall"])) {
                  if (isset($_POST["chec"])) {
                    $registration_date = date("Y-m-d");
                    $chekArray = $_POST["chec"];
                    foreach ($chekArray as $onechecid) {
                      staticDB::update("al_rwwad", "applicants", ['pass', 'غير مقبول'], "applicant_id", "=", $onechecid);
                      staticDB::insert("al_rwwad", "history", ["applicant_id", "registration_date", "registration_state"], [$onechecid, $registration_date, "غيرمقبول"]);
                    }
                  } else {
                    echo " <div class='alert alert-danger'> اختر  </div>";
                  }
                }
                // accounts
                // Interviewers_id
                // name
                // phone
                // address
                $result = staticDB::selectFromTable("al_rwwad", "interviewers", ["Interviewers_id", "name", "phone", "address"]);
                ?>
                <div class="card-body">
                  <div class="table-responsive">
                    <form method="post">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover ">
                        <thead>
                          <tr>
                            <td> الاسم </td>
                            <td> العنوان </td>
                            <td> الهاتف </td>
                            <td> # </td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($row = $result->fetch_assoc()) {
                          ?>
                            <tr>
                              <td> <?php echo $row['name']; ?> </td>
                              <td> <?php echo $row['address']; ?> </td>
                              <td> <?php echo $row['phone']; ?> </td>
                              <td>
                                <a class="btn btn-primary" href="interviewersEdit.php?id=<?php echo $row['Interviewers_id']; ?>">تعديل
                                </a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Custom template | don't include it in your project! -->
    <?php include '../layout/custom_template.php' ?>
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