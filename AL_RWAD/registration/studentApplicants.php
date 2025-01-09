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
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand"> التسجيل</h3>
            <ul class="breadcrumbs mb-3">
              <li class="nav-home animate__animated animate__backInRight">
                <a href="../login/main.php">
                  <i class="icon-home"></i>
                </a>
              </li>
              <li class="separator animate__animated animate__backInRight">
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
            <div class="col-md-12 ">
              <div class="card">
                <div class="card-header">
                  <form method="post" action="../forms/forms.php">
                    <div class="d-flex align-items-center">
                      <div class="card-title animate__animated fadeInDownBig">الطلاب المتقدمين</div>
                    </div>
                  </form>
                </div>
                <?php
                include "../classes/db2.php";
                if (isset($_POST["pass"])) {
                  $applicant_id = $_POST["hid"];
                  staticDB::update("al_rwwad", "applicants", ['pass', 'مقبول', 'interviewrs_state', 'no'], "applicant_id", "=", $applicant_id);
                  //history_id	applicant_id	al_rwwad_date	intervews_rate	residents_rate	registration_date	registration_state	interview_date	Interview_state	
                  //$registration_date=staticDB::selectFromTableWhere("login","applicants",["registration_date"] , "applicant_id","=",$applicant_id);
                  $registration_date = date("Y-m-d");

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
                $result = staticDB::selectFromTable("al_rwwad", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"]);
                if (isset($_POST["search"])) {

                  $select = $_POST["select"];

                  if ($_POST["select"] == "all") {
                    $result = staticDB::selectFromTable("al_rwwad", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"]);
                  } elseif ($_POST["select"] == "bestRate") {
                    $result = staticDB::selectFromTableOrderBy("al_rwwad", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"], "rate", "desc");
                  } elseif ($_POST["select"] == "level11") {
                    $result = staticDB::selectFromTableWhere("al_rwwad", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"], "next_level", "=", "اول ثانوي");
                  } elseif ($_POST["select"] == "level9") {
                    $result = staticDB::selectFromTableWhere("al_rwwad", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"], "next_level", "=", "تاسع");
                  } elseif ($_POST["select"] == "pass") {
                    $result = staticDB::selectFromTableWhere("al_rwwad", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"], "pass", "=", "مقبول");
                  } elseif ($_POST["select"] == "nopass") {
                    $result = staticDB::selectFromTableWhere("al_rwwad", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"], "pass", "=", "غير مقبول");
                  } elseif ($_POST["select"] == "empty") {
                    $result = staticDB::selectFromTableWhere("al_rwwad", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass", "registration_date"], "pass", "=", "");
                  }
                }
                ?>
                <div class="card-body">
                  <div class="table-responsive">
                    <form method="post">
                      <!-- <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fas fa-filter ml-4"></i>
                              </span> -->

                      <input type="submit" name="search" value=" تصفيه  " class="btn btn-info mb-1">
                      <!-- </div> -->
                      <select name="select" class="form-control mb-3 ">
                        <option value="all"> الكل</option>
                        <option value="bestRate"> افضل نسبة </option>
                        <option value="level11"> اول ثانوي</option>
                        <option value="level9"> تاسع</option>
                        <option value="empty"> غير محدد</option>
                        <option value="pass"> مقبول</option>
                        <option value="nopass">غير مقبول</option>
                      </select>
                    </form>
                    <form method="post">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover">

                        <thead>
                          <tr>
                            <td> الاسم </td>
                            <td>العنوان </td>
                            <td>هل تعاني من أي مرض؟ </td>
                            <td>الصف </td>
                            <td>نسبة </td>
                            <td> ماهي المدرسة التي ترغب في الدراسة فيها؟ </td>
                            <td> # </td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          function badgecolor($pass)
                          {
                            $style = "bg-default";
                            if ($pass == "مقبول") {

                              $style = "bg-success";
                            } elseif ($pass == "غير مقبول") {
                              $style = "bg-danger";
                            } elseif ($pass == "") {
                              $style = "bg-primary";
                            }
                            return $style;
                          }
                          while ($row = $result->fetch_assoc()) {
                            //  $colorRow=getcolor($row['pass']);
                            $badgecolor = badgecolor($row['pass']);
                          ?>
                            <tr>
                              <td>
                                <?php
                                if ($row['pass'] == "مقبول" || $row['pass'] == "غير مقبول") {
                                  echo  "";
                                } else { ?>
                                  <input type="checkbox" name="chec[]" value="<?php echo $row['applicant_id']; ?>">
                                <?php }
                                ?>
                    </form>
                    <?php echo $row['name']; ?>
                    <br>
                    <span class="badge <?php echo $badgecolor ?>">
                      <?php if (isset($row['pass'])) {
                              echo $row['pass'];
                            } else {
                              echo  "غير محدد";
                            }  ?>
                    </span>
                    </td>
                    <td> <?php echo $row['directorate'] . " / " .  $row['current_directorate']; ?> </td>
                    <td> <?php echo $row['health']; ?> </td>
                    <td> <?php echo $row['next_level']; ?> </td>
                    <td> <?php echo $row['rate']; ?> </td>
                    <td> <?php echo $row['school_join'];  ?> </td>
                    <td>
                      <a href="applicantDetails.php?id=<?php echo $row['applicant_id']; ?> " title="  تفاصيل">
                        <i class="fas fa-info-circle"></i>
                      </a>
                      <!-- <a class="btn btn-outline-info" href="tables.php?id=<?php echo $row['applicant_id']; ?> "> تفاصيل </a> -->
                      <?php
                            if ($row['pass'] == "مقبول" || $row['pass'] == "غير مقبول") {
                              echo  "";
                            } else { ?>
                        <form method="post">
                          <input type="hidden" name="hid" value="<?php echo $row['applicant_id']; ?>">
                          <input type="hidden" name="registration_date" value="<?php echo $row['registration_date']; ?>">
                          <input class="btn btn-success" type="submit" name="pass" value="مقبول">
                          <input class="btn btn-danger" type="submit" name="nopass" value="غير مقبول">
                        </form>

                    <?php }
                          }
                    ?>
                    </td>
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