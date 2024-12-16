<?php session_start();

// if (!isset($_SESSION["username"])) {
//   header("Location:../login/index.php");
//   exit;
// } ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../layout/head.php' ?>
  <style>
    .color-box {
      width: 50%;
      /* عرض المربع */
      height: 200px;
      /* ارتفاع المربع */
      background-color: #d1eeaf;
      /* لون المربع */
      transition: background-color 0.3s;
      /* تأثير الانتقال */
      margin: 20px;
      /* مسافة حول المربع */
      font-size: 25px;
      padding: 12px;
    }

    .color-box:hover {
      background-color: #a8ee55;
      /* لون المربع عند التمرير */

    }

    .gg:hover {
      background-color: #a8ee55;
      /* لون المربع عند التمرير */

    }
   
  </style>

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
                <a href="#try">رسالة</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12 ">
              <div class="card">
                <div class="card-header">
                  <form method="post" action="message.php">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title animate__animated animate__bounce">الطلاب المتقدمين</h4>
                    </div>
                    <textarea name="message" class="form-control" rows="7" cols="50">
                      </textarea>
                    <button
                      class="btn btn-primary btn-round ms-auto mt-3"
                      data-bs-toggle="modal"
                      data-bs-target="#addRowModal">
                      <i class="fa fa-plus"></i>
                      تاكيد الرسالة
                    </button>
                  </form>
                </div>
                <div class="color-box">
                  <?php
                  if (isset($_POST["message"])) {
                    $message = $_POST["message"];
                    echo $_POST["message"];
                  }
                  ?>
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
                    $message = $_POST["message"];
                    $url = "https://wa.me/$chekArray?text=" . urlencode($message);
                    //  header("Location: $url");
                    //  exit();
                    echo '<script type="text/javascript">
                 window.location.href = "$url"; 
                 </script>';
                  } else {
                    echo " <div class='alert alert-danger'> اختر  </div>";
                  }
                }
                // $result = staticDB::selectFromTable("login", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"]);
                $result = staticDB::selectFromTableWhere("al_rwwad", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"], "pass", "=", "مقبول");
                ?>
                <div class="card-body">
                  <div class="table-responsive">
                    <form method="post" action="message.php">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover ">
                        <thead>
                          <tr>
                            <td> الاسم </td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($row = $result->fetch_assoc()) {
                          ?>
                            <tr>
                              <td>
                    </form>
                    <a
                      href="https://wa.me/<?php echo $row['whatsapp']; ?>?text=<?php echo $message; ?>"
                      target="_blanke">
                      <span class="badge bg-success  gg">واتساب</span>
                    <?php echo $row['name'];
                          }
                    ?>
                    </a>
                    </tr>
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