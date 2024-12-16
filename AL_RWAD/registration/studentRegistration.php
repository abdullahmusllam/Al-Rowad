<?php session_start(); ?>
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

        <h1 class="text-bg-success text-center animate__animated animate__bounceInDown">التسجيل حتى تاريخ 30 يوليو 2024م* 🕖 *اغتنم الفرصة و سارع للالتحاق بالمركز فالمقاعد محدودة</h1>
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3">التسجيل</h3>
            <ul class="breadcrumbs mb-3">
              <li class="nav-home">
                <a href="../index.php" title="الانتقال الى الصفحة الرائسيه">
                  <i class="icon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item">
                <a href="">تقديم طلب</a>
                <!-- </li>
              <li class="separator">
                <i class="icon-arrow-right"></i>
              </li> -->
                <!-- <li class="nav-item">
                <a href="#">Basic Form</a>
              </li> -->
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title animate__animated fadeInDownBig"> تسجيل الطالب في مركز الرواد </div>
                </div>
                <form method="post" id="myForm">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <!-- <lable for="">الاسم </lable> -->
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-user"></i>
                            </span>
                            <input
                              class="form-control"
                              type="text"
                              name="full_name"
                              Placeholder="ادخل اسمك">
                          </div>
                          <small id="emailHelp2" class="form-text text-muted">من فضلك ادخل اسمك الرباعي</small>
                        </div>
                        <div class="invalid-feedback" id="placeOfBirthFeedback" style="display: none;">
                          من فضلك ادخل اسمك الرباعي
                        </div>
                        <div class="form-group">
                          <lable for="">تاريخ الميلاد:</lable>
                          <input
                            class="form-control"
                            type="date"
                            name="date_of_birth"
                            Placeholder>
                        </div>
                        <div class="form-group form-inline">
                          <label
                            for="inlineinput"
                            class="col-md-3 col-form-label">مكان الميلاد</label>
                          <div>
                            <div class="col-md-9 p-0">
                              <input
                                type="text"
                                class="form-control input-full"
                                id="inlineinput"
                                name="place_of_birth"
                                placeholder="المحافظة" />
                              <span class="bottom"></span>
                              <span class="right"></span>
                              <span class="top"></span>
                              <span class="left"></span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group form-inline">
                          <label for="successInput">المديرية </label>
                          <div>
                            <input
                              type="text"
                              id="successInput"
                              name="governorate"
                              class="form-control"
                              placeholder="ادخل المديرية" />
                            <span class="bottom"></span>
                            <span class="right"></span>
                            <span class="top"></span>
                            <span class="left"></span>
                          </div>
                        </div>
                        <div class="form-group form-inline">
                          <label for="errorInput">المنطقة</label>
                          <input
                            type="text"
                            id="errorInput"
                            name="area"
                            value=""
                            class="form-control" />
                          <small id="emailHelp" class="form-text text-muted">المنطقة , الحي</small>
                        </div>
                        <div class="form-group">
                          <label for="disableinput">مكان الإقامة الحالي </label>
                          <div>
                            <input
                              type="text"
                              id="current_residence"
                              name="current_residence"
                              class="form-control"
                              placeholder="المحافظة" />
                            <span class="bottom"></span>
                            <span class="right"></span>
                            <span class="top"></span>
                            <span class="left"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="disableinput"> مكان الإقامة الحالي / المديرية _ المنطقة </label>
                          <input
                            type="text"
                            class="form-control"
                            id="disableinput"
                            name="current_residence_details"
                            placeholder="المديرية" />
                        </div>
                        <div class="form-group">
                          <label for="disableinput"> رقم الهاتف </label>
                          <input
                            type="text"
                            class="form-control"
                            id="disableinput"
                            name="phone_number"
                            placeholder="ادخل رقم الهاتف" />
                        </div>
                        <div class="form-group">
                          <label for="disableinput"> الواتساب</label>
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fab fa-whatsapp"></i>
                            </span>
                            <input
                              type="text"
                              class="form-control"
                              id="disableinput"
                              name="mobile_number"
                              placeholder="ادخل رقم الواتساب" />
                          </div>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input "
                            type="checkbox"
                            value=""
                            id="flexCheckDefault" />
                          <label
                            class="form-check-label"
                            for="flexCheckDefault">
                            <a href="term.php" class="term"> الشروط </a>
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">هل تعاني من أي مرض؟ </span>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="لا"
                              name="health_conditions"
                              aria-describedby="basic-addon1" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2"> المدرسة </span>
                            <input
                              type="text"
                              class="form-control"
                              name="school_name"
                              placeholder="اسم المدرسة المتخرج منها "
                              aria-describedby="basic-addon2" />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2"> النسبة </span>
                            <input
                              type="number"
                              min="70"
                              max="100"
                              class="form-control"
                              name="last_grade_percentage"
                              placeholder="نسبة آخر صف دراسي "
                              aria-describedby="basic-addon2" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="defaultSelect">الصف الطالع إليه </label>
                          <select
                            name="next_grade"
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
                              name="skills_hobbies"
                              class="form-control"
                              aria-label="With textarea"
                              placeholder="مهارات الطالب"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="defaultSelect"> ماهي المدرسة التي ترغب في الدراسة فيها؟ </label>
                          <select
                            name="desired_school"
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
                              name="achievements_participations"
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
                              name="future_ambitions"
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
                              name="reason_for_joining"
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
                            id="Name"
                            type="text"
                            class="form-control"
                            placeholder="اسم ولي الأمر " />
                        </div>
                        <div class="form-group form-group-default">
                          <label> صلة القرابة</label>
                          <input
                            name="relationship"
                            id="Name"
                            type="text"
                            class="form-control"
                            placeholder="  صلة القرابة " />
                        </div>
                        <div class="form-group form-group-default">
                          <label> المهنة</label>
                          <input
                            name="guardian_occupation"
                            id="Name"
                            type="text"
                            class="form-control"
                            placeholder="مهنة ولي الأمر" />
                        </div>
                        <div class="form-group form-group-default">
                          <label> رقم جوال </label>
                          <input
                            name="guardian_mobile"
                            id="Name"
                            type="text"
                            class="form-control"
                            placeholder="  رقم جوال ولي الأمر " />
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  include "../classes/db2.php";
                  include "../classes/chek.php";
                  if (isset($_POST['save'])) {
                    // header("Location:welcom.php");
                    try {
                      $full_name = chek::checkName4word($_POST['full_name'], "ادخل اسمك الرباعي");
                      $phone_number = $_POST['phone_number'];
                      //echo $_POST['phone_number'];
                      $date_of_birth = chek::checnotempty($_POST['date_of_birth'], "  يرجى ادخل تاريخ الميلاد");
                      $place_of_birth = chek::checnotempty($_POST['place_of_birth'], " يرجى ادخل مكان الميلاد");
                      $governorate = chek::checnotempty($_POST['governorate'], "  يرجى ادخل المديرية");
                      $area = chek::checnotempty($_POST['area'], " يرجى ادخل المنطقة");

                      $current_residence = chek::checnotempty($_POST['current_residence'], "  يرجى ادخل مكان الإقامة الحالي");
                      $current_residence_details = chek::checnotempty($_POST['current_residence_details'], "  يرجى ادخل مكان الإقامة الحالي / المديرية _ المنطقة");
                      //$phone_number = $_POST['phone_number'];
                      $mobile_number = $_POST['mobile_number'];
                      $health_conditions = chek::checnotempty($_POST['health_conditions'], "  يرجى ادخل هل تعاني من أي مرض؟");
                      $school_name = chek::checnotempty($_POST['school_name'], "  يرجى ادخل المدرسة");

                      $next_grade = chek::checnotempty($_POST['next_grade'], "  يرجى ادخل النسبة");
                      $last_grade_percentage = chek::checnotempty($_POST['last_grade_percentage'], "  يرجى ادخل الصف الطالع إليه");
                      $guardian_name = chek::checkName4word($_POST['guardian_name'], "ولي الامر ادخل اسمك الثلاثي");
                      //$guardian_name=$_POST['guardian_name'];
                      $relationship = chek::checnotempty($_POST['relationship'], "  يرجى ادخل صلة القرابة");
                      $guardian_occupation = chek::checnotempty($_POST['guardian_occupation'], "  يرجى ادخل المهنة");
                      $guardian_mobile = $_POST['guardian_mobile'];
                      $skills_hobbies = chek::checnotempty($_POST['skills_hobbies'], "  يرجى ادخل المهارات والمواهب والهوايات");
                      // $email = $_POST['email'];
                      $achievements_participations = chek::checnotempty($_POST['achievements_participations'], "  يرجى ادخل أبرز المشاركات والانجازات");

                      $reason_for_joining = chek::checnotempty($_POST['reason_for_joining'], "  يرجى ادخل لماذا تريد الالتحاق بالمركز؟");
                      $future_ambitions = chek::checnotempty($_POST['future_ambitions'], "  يرجى ادخل ما هو طموحك في المستقبل؟");
                      $desired_school = chek::checnotempty($_POST['desired_school'], "  يرجى ادخل ماهي المدرسة التي ترغب في الدراسة فيها؟");
                      $registration_date = date("Y-m-d");
                      $trueOrfalse = staticDB::insert(
                        "al_rwwad",
                        "applicants",
                        ["name", "date_of_berth", "plase_of_berth", "directorate", "area", "current_governorate", "current_directorate", "phone", "whatsapp", "health", "graduate_school", "next_level", "rate", "guardian_name", "relationship", "guardian_jop", "guardian_phone", "skills", "achievement	", "reason_join",    "ambition", "school_join", "registration_date"],
                        ["$full_name", "$date_of_birth",    "$place_of_birth",    "$governorate",    "$area",    "$current_residence",    "$current_residence_details", "$phone_number",    "$mobile_number", "$health_conditions",    "$school_name",    "$next_grade", "	$last_grade_percentage", "$guardian_name", "$relationship",    "$guardian_occupation", "$guardian_mobile",    "$skills_hobbies",    "$achievements_participations", "$reason_for_joining", "$future_ambitions", "$desired_school", $registration_date]
                      );
                      echo '<script type="text/javascript">
                           window.location.href = "welcom.php"; 
                           </script>';
                      exit;
                    } catch (Exception  $e) {
                      echo $e->getMessage();
                    }
                  }
                  ?>
                  <div class="card-action">
                    <button class="btn btn-success" name="save">حفظ</button>
                    <a href="studentRegistration.php" class="btn btn-dark">إلغاء</a>
                  </div>
                </form>
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