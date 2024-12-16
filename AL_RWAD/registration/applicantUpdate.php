<?php session_start();
// if (!isset($_SESSION["username"])) {
//   header("Location:../login/index.php");
//   exit;
// }

$id_student = $_SESSION["id_student"];
?>

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
            <h3 class="fw-bold mb-3 animate__animated animate__rubberBand">التسجيل</h3>
            <ul class="breadcrumbs mb-3">
              <li class="nav-home animate__animated animate__backInRight">
                <a href="../index.php">
                  <i class="icon-home "></i>
                </a>
              </li>
              
              <li class="separator animate__animated animate__backInRight">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item animate__animated animate__backInRight">
                <a href="studentApplicants.php">الطلاب المتقدمين</a>
              </li>
              <li class="separator animate__animated animate__backInRight">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item animate__animated animate__backInRight">
                <a href="applicantUpdate.php">تعديل </a>
              </li>
            </ul>
          </div>
          <?php
          include "../classes/db2.php";
          include "../classes/chek.php";

          // $id=$_GET["id"];
          // checkphone("777458414");
          if (isset($_POST['save'])) {
            try {
              $name = chek::checkName4word($_POST['name'], "ادخل اسمك الرباعي");
              //  $name=checkUserName($_POST['name'],"ادخل اسمك الرباعي");
              $phone = chek::checkphone_yemen($_POST['phone'], "رقم الهاتف او الوتساب غير صحيح");
              $date_of_berth = $_POST['date_of_berth'];
              $plase_of_berth = $_POST['plase_of_berth'];
              $directorate = $_POST['directorate'];
              $area = $_POST['area'];

              $current_governorate = $_POST['current_governorate'];
              $current_directorate = $_POST['current_directorate'];
              $whatsapp = $_POST['whatsapp'];
              //$mobile_number = checkphone($_POST['mobile_number']);
              $health = $_POST['health'];
              $graduate_school = $_POST['graduate_school'];

              $next_level = $_POST['next_level'];
              $rate = $_POST['rate'];
              $guardian_name = chek::checkName4word($_POST['guardian_name'], "ولي الامر ادخل اسمك الثلاثي");

              $relationship = $_POST['relationship'];
              $guardian_jop = $_POST['guardian_jop'];
              $guardian_phone = $_POST['guardian_phone'];
              $skills = $_POST['skills'];
              // $email = $_POST['email'];
              $achievement = $_POST['achievement'];

              $reason_join = $_POST['reason_join'];
              $ambition = $_POST['ambition'];
              $school_join = $_POST['school_join'];
              $trueOrfalse = staticDB::update("al_rwwad", "applicants", [
                "name",
                "$name",
                "date_of_berth",
                "$date_of_berth",
                "plase_of_berth",
                "$plase_of_berth",
                "directorate",
                "$directorate",
                "area",
                "$area",
                "current_governorate",
                "$current_governorate",
                "current_directorate",
                "$current_directorate",
                "phone",
                "$phone",
                "whatsapp",
                "$whatsapp",
                "health",
                "$health",
                "graduate_school",
                "$graduate_school",
                "next_level",
                "$next_level",
                "rate",
                "$rate",
                "guardian_name",
                "$guardian_name",
                "relationship",
                "$relationship",
                "guardian_jop",
                "$guardian_jop",
                "guardian_phone",
                "$guardian_phone",
                "skills",
                "$skills",
                "achievement",
                "$achievement",
                "reason_join",
                "$reason_join",
                "ambition",
                "$ambition",
                "school_join",
                "$school_join"
              ], "applicant_id", "=", $id_student);
              if ($trueOrfalse == 1) {
                session_unset();

                echo '<script type="text/javascript">
                               window.location.href = "../registration/datatables.php"; 
                               </script>';
                exit;
              }
            } catch (Exception  $e) {
              echo $e->getMessage();
            }
          }

          if (isset($_post["cancel"])) {

            echo '<script type="text/javascript">
                    window.location.href = "../registration/datatables.php"; 
                    </script>';
            exit;
          }

          if (isset($_POST["id_student"])) {
            $id_student = $_POST["id_student"];
            $_SESSION["id_student"] = $_POST["id_student"];
          }
          $result = staticDB::selectFromTableWhere("al_rwwad", "applicants", ["name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement", "reason_join", "ambition", "school_join"], "applicant_id", "=", $id_student);
          ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">تعديل </div>
                </div>
                <form method="post">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <?php while ($row = $result->fetch_assoc()) { ?>
                            <lable for="">الاسم </lable>
                            <input
                              class="form-control"
                              type="text"
                              name="name"
                              value="<?php echo $row['name']; ?>"
                              Placeholder="ادخل اسمك">
                            <small id="emailHelp2" class="form-text text-muted">من فضلك ادخل اسمك الرباعي</small>
                        </div>
                        <div class="form-group">
                          <lable for="">تاريخ الميلاد:</lable>
                          <input
                            class="form-control"
                            type="date"
                            name="date_of_berth"
                            value="<?php echo $row['date_of_berth']; ?>"
                            Full texts
                            Placeholder>
                        </div>
                        <div class="form-group form-inline">
                          <label
                            for="inlineinput"
                            class="col-md-3 col-form-label">مكان الميلاد</label>
                          <div class="col-md-9 p-0">
                            <input
                              type="text"
                              class="form-control input-full"
                              id="inlineinput"
                              name="plase_of_berth"
                              value="<?php echo $row['plase_of_berth']; ?>"
                              placeholder="المحافظة" />
                          </div>
                        </div>
                        <div class="form-group form-inline">
                          <label for="successInput">المديرية </label>
                          <input
                            type="text"
                            id="successInput"
                            name="directorate"
                            value="<?php echo $row['directorate']; ?>"
                            class="form-control"
                            placeholder="ادخل المديرية" />
                        </div>
                        <div class="form-group form-inline">
                          <label for="errorInput">المنطقة</label>
                          <input
                            type="text"
                            id="errorInput"
                            name="area"
                            value="<?php echo $row['area']; ?>"
                            class="form-control" />
                          <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="disableinput">مكان الإقامة الحالي </label>
                          <input
                            name="current_governorate"
                            value="<?php echo $row['current_governorate']; ?>"
                            type="text"
                            class="form-control"
                            id="disableinput"
                            placeholder="المحافظة" />
                        </div>
                        <div class="form-group">
                          <label for="disableinput"> مكان الإقامة الحالي / المديرية _ المنطقة </label>
                          <input
                            name="current_directorate"
                            value="<?php echo $row['current_directorate']; ?>"
                            type="text"
                            class="form-control"
                            id="disableinput"

                            placeholder="المديرية" />
                        </div>
                        <div class="form-group">
                          <label for="disableinput"> رقم الهاتف </label>
                          <input
                            name="phone"
                            value="<?php echo $row['phone']; ?>"
                            type="text"
                            class="form-control"
                            id="disableinput"
                            placeholder="ادخل رقم الهاتف" />
                        </div>
                        <div class="form-group">
                          <label for="disableinput"> الواتساب</label>
                          <input
                            name="whatsapp"
                            value="<?php echo $row['whatsapp']; ?>"
                            type="text"
                            class="form-control"
                            id="disableinput"
                            placeholder="ادخل رقم الواتساب" />
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">هل تعاني من أي مرض؟ </span>
                            <input
                              name="health"
                              value="<?php echo $row['health']; ?>"
                              type="text"
                              class="form-control"
                              placeholder="لا"
                              aria-describedby="basic-addon1" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2"> المدرسة </span>
                            <input
                              name="graduate_school"
                              value="<?php echo $row['graduate_school']; ?>"
                              type="text"
                              class="form-control"
                              placeholder="اسم المدرسة المتخرج منها "
                              aria-describedby="basic-addon2" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2"> النسبة </span>
                            <input
                              name="rate"
                              value="<?php echo $row['rate']; ?>"
                              type="text"
                              class="form-control"
                              placeholder="نسبة آخر صف دراسي "
                              aria-describedby="basic-addon2" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="defaultSelect">الصف الطالع إليه </label>
                          <select
                            name="next_level"
                            value="<?php echo $row['next_level']; ?>"
                            class="form-select form-control"
                            id="defaultSelect">
                            <option>التاسع</option>
                            <option>أول ثانوي</option>
                            <option>ثاني ثانوي</option>
                            <option>ثالث ثانوي</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <lable for=""> المهارات والمواهب والهوايات </lable>
                          <div class="input-group">
                            <span class="input-group-text">لدي</span>
                            <textarea
                              name="skills"
                              value="<?php echo $row['skills']; ?>"
                              class="form-control"
                              aria-label="With textarea"
                              placeholder="مهارات الطالب"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="defaultSelect"> ماهي المدرسة التي ترغب في الدراسة فيها؟ </label>
                          <select
                            name="school_join"
                            value="<?php echo $row['school_join']; ?>"
                            class="form-select form-control"
                            id="defaultSelect">
                            <option>الفقيد بن حمدة</option>
                            <option> الابداع</option>
                            <option> اكتوبر</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <lable for=""> أبرز المشاركات والانجازات </lable>
                          <div class="input-group">
                            <span class="input-group-text">شاركت</span>
                            <textarea
                              name="achievement"
                              value="<?php echo $row['achievement']; ?>"
                              class="form-control"
                              aria-label="With textarea"
                              placeholder="أبرز المشاركات والانجازات "></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <lable for=""> ما هو طموحك في المستقبل؟ </lable>
                          <div class="input-group">
                            <span class="input-group-text">طموحي</span>
                            <textarea
                              name="ambition"
                              value="<?php echo $row['ambition']; ?>"
                              class="form-control"
                              aria-label="With textarea"
                              placeholder="ما هو طموحك في المستقبل؟ "></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <lable for=""> لماذا تريد الالتحاق بالمركز؟ </lable>
                          <div class="input-group">
                            <span class="input-group-text">لدي</span>
                            <textarea
                              name="reason_join"
                              value="<?php echo $row['reason_join']; ?>"
                              class="form-control"
                              aria-label="With textarea"
                              placeholder="لماذا تريد الالتحاق بالمركز؟ "></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <label class="mb-3"><b> معلومات ولي الامر </b></label>
                        <div class="form-group form-group-default">
                          <label> الاسم </label>
                          <input
                            name="guardian_name"
                            value="<?php echo $row['guardian_name']; ?>"
                            id="Name"
                            type="text"
                            class="form-control"
                            placeholder="اسم ولي الأمر " />
                        </div>
                        <div class="form-group form-group-default">
                          <label> صلة القرابة</label>
                          <input
                            name="relationship"
                            value="<?php echo $row['relationship']; ?>"
                            id="Name"
                            type="text"
                            class="form-control"
                            placeholder="  صلة القرابة " />
                        </div>
                        <div class="form-group form-group-default">
                          <label> المهنة</label>
                          <input
                            name="guardian_jop"
                            value="<?php echo $row['guardian_jop']; ?>"
                            id="Name"
                            type="text"
                            class="form-control"
                            placeholder="مهنة ولي الأمر" />
                        </div>
                        <div class="form-group form-group-default">
                          <label> رقم جوال </label>
                          <input
                            name="guardian_phone"
                            value="<?php echo $row['guardian_phone'];
                                  } ?>"
                            id="Name"
                            type="text"
                            class="form-control"
                            placeholder="  رقم جوال ولي الأمر " />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-action">
                    <div>
                      <button class="btn btn-success" name="save">تعديل</button>
                      <button class="btn btn-dark" name="cancel">الغاء</button>
                    </div>
                </form>
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

  <!-- Chart JS -->
  <script src="../assets/js/plugin/chart.js/chart.min.js"></script>

  <!-- jQuery Sparkline -->
  <script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

  <!-- Chart Circle -->
  <script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

  <!-- Datatables -->
  <script src="../assets/js/plugin/datatables/datatables.min.js"></script>

  <!-- Bootstrap Notify -->
  <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!-- jQuery Vector Maps -->
  <script src="../assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
  <script src="../assets/js/plugin/jsvectormap/world.js"></script>

  <!-- Google Maps Plugin -->
  <script src="../assets/js/plugin/gmaps/gmaps.js"></script>

  <!-- Sweet Alert -->
  <script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

  <!-- Kaiadmin JS -->
  <!-- <script src="../assets/js/kaiadmin.min.js"></script> -->

  <!-- Kaiadmin DEMO methods, don't include it in your project! -->
  <script src="../assets/js/setting-demo2.js"></script>
</body>

</html>