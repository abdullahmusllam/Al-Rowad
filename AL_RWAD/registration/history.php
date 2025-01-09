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
                <a href="#try"> تفاصيل مراحل التسجيل </a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <div class="card-title animate__animated animate__backInRight"> تفاصيل مراحل التسجيل </div>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Modal -->
                  <div
                    class="modal fade"
                    id="addRowModal"
                    tabindex="-1"
                    role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header border-0">
                          <h5 class="modal-title">
                            <span class="fw-mediumbold"> New</span>
                            <span class="fw-light"> Row </span>
                          </h5>
                          <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p class="small">
                            Create a new row using this form, make sure you
                            fill them all
                          </p>
                          <form>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                  <label>Name</label>
                                  <input
                                    id="addName"
                                    type="text"
                                    class="form-control"
                                    placeholder="fill name" />
                                </div>
                              </div>
                              <div class="col-md-6 pe-0">
                                <div class="form-group form-group-default">
                                  <label>Position</label>
                                  <input
                                    id="addPosition"
                                    type="text"
                                    class="form-control"
                                    placeholder="fill position" />
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Office</label>
                                  <input
                                    id="addOffice"
                                    type="text"
                                    class="form-control"
                                    placeholder="fill office" />
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer border-0">
                          <button
                            type="button"
                            id="addRowButton"
                            class="btn btn-primary">
                            Add
                          </button>
                          <button
                            type="button"
                            class="btn btn-danger"
                            data-dismiss="modal">
                            Close
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  include "../classes/db2.php";
                  //staticDB::insert("login","history",["applicant_id","registration_date","registration_state"],[$applicant_id,$registration_date,"غيرمقبول"]);

                  //$result = staticDB::selectFromTableWhere("login", "applicants", ["applicant_id", "name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "pass"], "pass", "=", "مقبول");
                  $result = staticDB::query("al_rwwad", "SELECT 
 applicants.name AS app_name ,
 history.registration_date AS reg_date ,
 history.registration_state AS reg_state ,
 	history.interview_date as int_date ,
  history.interview_state as int_state ,
  history.evaluation_date as eva_date ,
  history.evaluation_state as eva_state
  
  FROM history  JOIN applicants ON history.applicant_id = applicants.applicant_id ");



                  if (isset($_POST["ok"])) {
                    //header("loaction:fd.php");
                    echo $_POST['hid'];
                    echo $onechecid = $_POST["ok"];
                    echo "<br>", $Interviewers_id = $_POST["selct"];

                    // staticDB::insert("login", "interviews", ["applicant_id", "Interviewers_id"], [$onechecid, $Interviewers_id]);
                  }
                  if (isset($_POST["passchek"])) {
                    $Interviewers_id = $_POST["selctall"];
                    $chekArray = $_POST["chec"];
                    foreach ($chekArray as $onechecid) {
                      staticDB::insert("al_rwwad", "interviews", ["applicant_id", "Interviewers_id"], [$onechecid, $Interviewers_id]);
                    }
                  }


                  ?>
                  <div class="table-responsive">

                    <table
                      id="add-row2"
                      class="display table table-striped table-hover">
                      <thead>
                        <tr>
                          <td> أسم الطالب </td>
                          <td> تاريخ التسجيل </td>
                          <td> حالة التسجيل</td>
                          <td>تاريخ المقابلة </td>
                          <td> حالة المقابلة </td>
                          <td> تاريخ التقييم </td>
                          <td> حالة التقييم </td>


                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <td> أسم الطالب </td>
                          <td> تاريخ التسجيل </td>
                          <td> حالة التسجيل</td>
                          <td>تاريخ المقابلة </td>
                          <td> حالة المقابلة </td>
                          <td> تاريخ التقييم </td>
                          <td> حالة التقييم </td>
                        </tr>
                      </tfoot>

                      <tbody>
                        <?php


                        while ($row = $result->fetch_assoc()) {
                          //  $colorRow=getcolor($row['pass']);
                          // $badgecolor = badgecolor($row['name']);
                        ?>


                          <tr>

                            <td>

                              <?php echo $row['app_name']; ?>




                            </td>
                            <td> <?php echo $row['reg_date']; ?> </td>

                            <td> <?php echo $row['reg_state']; ?> </td>
                            <td> <?php echo $row['int_date']; ?> </td>
                            <td> <?php echo $row['int_state']; ?> </td>

                            <td> <?php echo $row['eva_date']; ?> </td>
                            <td> <?php echo $row['eva_state']; ?> </td>

                          <?php  } ?>
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

      // Add Row2
      $("#add-row2").DataTable({
        pageLength: 5,
      });

      var action =
        '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $("#addRowButton").click(function() {
        $("#add-row2")
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