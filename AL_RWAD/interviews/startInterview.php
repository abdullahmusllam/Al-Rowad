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
                <a href="../index.php">
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
                <a href="interviews.php">المقابلات</a>
              </li>
              <li class="separator animate__animated animate__backInRight">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item animate__animated animate__backInRight">
                <a href=""> تقييم الطالب </a>
              </li>
            </ul>
          </div>
          <?php
          include "../classes/db2.php";
          $id = $_GET["id"];
          // echo $id;
          if (isset($_POST["save"])) {
            $character = $_POST["characterr"];
            $Behavior = $_POST["Behavior"];
            $Interviews_rate = $_POST["Interviews_rate"];
            echo $_POST["Interviews_rate"];;
            $Interviews_state = $_POST["Interviews_state"];
            $creationDate = date("Y-m-d");
            // staticDB::update("login","applicants",['pass','مقبول'] , "applicant_id","=",$applicant_id);
            $message = staticDB::query("al_rwwad", " UPDATE `interviews` SET `character` = '$character', `Behavior` = '$Behavior', `Interviews_rate` = '$Interviews_rate', `Interviews_state` = '$Interviews_state' WHERE `interviews`.`applicant_id` =$id");
            staticDB::query("al_rwwad", " UPDATE `history` SET `interview_date` = '$creationDate', `interview_state` = '$Interviews_state', `evaluation_date` = '' WHERE `history`.`applicant_id` = $id");

            //staticDB::update("login","interviews",["character","$character","Behavior","$Behavior","Interviews_rate","$Interviews_rate","Interviews_state","$Interviews_state"],"interviews.applicant_id","=",$id);
            //staticDB::query("login","UPDATE interviews SET character=$character, Behavior=$Behavior,Interviews_rate=$Interviews_rate,Interviews_state='$Interviews_state'");
            // $sql = "INSERT INTO `interviews`( `dateInterview`, `applicant_id`, `Interviewers_id`, `character`, `Behavior`, `Interviews_rate`, `Interviews_result`)
            //   VALUES ('$Interviews_date','$applicant_id','$Interviewers_id','$character','$Behavior','$Interviews_rate','$Interviews_result')";
            if ($message == TRUE) {
              echo "تم تسجيل الطالب بنجاح!";
              echo '<script type="text/javascript">
              window.location.href = "interviewsResult.php"; 
                    </script>';
              exit;
            } else {
              echo "حدث خطأ أثناء التسجيل: ";
            }
          }
          ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title"> تقييم الطالب</div>
                </div>
                <?php
                $result = staticDB::query("al_rwwad", "SELECT interviewers.name AS int_name , applicants.name AS app_name , applicants.applicant_id as  app_id  FROM interviews  JOIN applicants ON interviews.applicant_id = applicants.applicant_id JOIN interviewers ON interviews.Interviewers_id = interviewers.Interviewers_id	WHERE interviews.applicant_id  = $id");
                while ($row = $result->fetch_assoc()) {
                ?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <div class="container">
                        <div class="container mt-5">
                          <form method="post">
                            <div class="mb-3">
                              <label for="applicant_id" class="form-label">المتقدم</label>
                              <input type="text" class="form-control" name="applicant_id" value="<?php echo $row["app_name"];  ?>" disabled>
                            </div>
                            <div class="mb-3">
                              <label for="Interviewers_id" class="form-label">المقابل</label>
                              <input type="text" class="form-control" name="Interviewers_id" value="<?php echo $row["int_name"]; ?>" disabled>
                            <?php } ?>
                            </div>
                            <div class="mb-3">
                              <label for="characterr" class="form-label">تقييم الشخصية</label>
                              <input type="number" onkeyup="getTotalInterview()" class="form-control" name="characterr" id="character">
                            </div>
                            <div class="mb-3">
                              <label for="Behavior" class="form-label">تقييم السلوك</label>
                              <input type="number" onkeyup="getTotalInterview()" class="form-control" name="Behavior" id="Behavior">
                            </div>
                            <div class="mb-3">
                              <label for="Interviews_rate" class="form-label">تقييم المقابلة</label>
                              <input readonly type="number" class="form-control" id="Interviews_rate" name="Interviews_rate" required>
                            </div>
                            <div class="mb-3">
                              <label for="Interviews_state" class="form-label"> حالة القبول</label>
                              <select name="Interviews_state" class="form-control" required>
                                <option>مقبول</option>
                                <option>غيرمقبول</option>
                              </select>
                            </div>
                            <button style="width: 100%" type="submit" class="btn btn-success" name="save">حفظ</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <!-- Custom template | don't include it in your project! -->
            <div class="custom-template">
              <div class="title">Settings</div>
              <div class="custom-content">
                <div class="switcher">
                  <div class="switch-block">
                    <h4>Logo Header</h4>
                    <div class="btnSwitch">
                      <button
                        type="button"
                        class="selected changeLogoHeaderColor"
                        data-color="dark"></button>
                      <button
                        type="button"
                        class="selected changeLogoHeaderColor"
                        data-color="blue"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="purple"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="light-blue"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="green"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="orange"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="red"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="white"></button>
                      <br />
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="dark2"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="blue2"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="purple2"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="light-blue2"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="green2"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="orange2"></button>
                      <button
                        type="button"
                        class="changeLogoHeaderColor"
                        data-color="red2"></button>
                    </div>
                  </div>
                  <div class="switch-block">
                    <h4>Navbar Header</h4>
                    <div class="btnSwitch">
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="dark"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="blue"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="purple"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="light-blue"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="green"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="orange"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="red"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="white"></button>
                      <br />
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="dark2"></button>
                      <button
                        type="button"
                        class="selected changeTopBarColor"
                        data-color="blue2"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="purple2"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="light-blue2"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="green2"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="orange2"></button>
                      <button
                        type="button"
                        class="changeTopBarColor"
                        data-color="red2"></button>
                    </div>
                  </div>
                  <div class="switch-block">
                    <h4>Sidebar</h4>
                    <div class="btnSwitch">
                      <button
                        type="button"
                        class="selected changeSideBarColor"
                        data-color="white"></button>
                      <button
                        type="button"
                        class="changeSideBarColor"
                        data-color="dark"></button>
                      <button
                        type="button"
                        class="changeSideBarColor"
                        data-color="dark2"></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="custom-toggle">
                <i class="icon-settings"></i>
              </div>
            </div>
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

            let Interviews_rate = document.getElementById('Interviews_rate');
            let Behavior = document.getElementById('Behavior');
            let character = document.getElementById('character');

            function getTotalInterview() {
              let rate = +Behavior.value + +character.value;

              Interviews_rate.value = rate;

            }
          </script>
</body>

</html>