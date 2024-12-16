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
                <a href="#">التفاصيل</a>
              </li>
            </ul>
          </div>
          <?php
          $id_stuednt = $_GET['id'];
          include "../classes/db2.php";
          $result = staticDB::selectFromTableWhere("al_rwwad", "applicants", ["*"], "applicant_id", "=", $id_stuednt);

          while ($row = $result->fetch_assoc()) {  ?>

            <form method="post" action="../registration/applicantUpdate.php">
              <input type="hidden" name="id_student" value="<?php echo $row['applicant_id']; ?>">
              <input type="submit" name="edite" value="تعديل" class="btn btn-secondary">
            </form>
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">الاسم</div>
                  </div>
                  <div class="card-body">
                    <div class="card-sub">
                      اسم الطالب والميلاد :
                    </div>
                    <table class="table mt-3">
                      <thead>
                        <tr>
                          <td> الاسم الكامل </td>
                          <td> <?php echo $row['name'];
                                ?> </td>
                        </tr>
                        <tr>
                          <td> تاريخ الميلاد: </td>
                          <td> <?php echo $row['date_of_berth']; ?> </td>
                        </tr>
                        <tr>
                          <td> مكان الميلاد </td>
                          <td> <?php echo $row['plase_of_berth']; ?> </td>
                        </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">التواصل </div>
                  </div>
                  <div class="card-body">
                    <div class="card-sub">
                      أنقر على الرقم ليذهب بك إلى الوتساب أو الهاتف
                    </div>
                    <table class="table mt-3">
                      <thead>
                        <tr>
                          <td>رقم الهاتف:</td>
                          <td> <?php echo $row['phone']; ?> </td>
                        </tr>
                        <tr>
                          <td> الواتساب </td>
                          <td> <a href="https://wa.me/<?php echo $row['whatsapp']; ?>"><?php echo $row['whatsapp']; ?></a> </td>
                        </tr>
                        <tr>
                          </tbody>
                    </table>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <div class="card-title"> معلومات عامه</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped mt-3">
                      <tr>
                        <td>هل تعاني من أي مرض؟ </td>
                        <td> <?php echo $row['health']; ?> </td>
                      </tr>
                      <tr>
                        <td>اسم المدرسة المتخرج منها </td>
                        <td> <?php echo $row['graduate_school']; ?> </td>
                      </tr>
                      <tr>
                        <td>الصف الطالع إليه </td>
                        <td> <?php echo $row['next_level']; ?> </td>
                      </tr>
                      <tr>
                        <td>نسبة آخر صف دراسي </td>
                        <td> <?php echo $row['rate']; ?> </td>
                      </tr>
                    </table>
                    <table
                      class="table table-striped table-striped-bg-black mt-3">
                      <tr>
                        <td> المهارات والمواهب والهوايات لدى الطالب </td>
                        <td> <?php echo $row['skills']; ?> </td>
                      </tr>
                      <tr>
                        <td> أبرز المشاركات والانجازات </td>
                        <td> <?php echo $row['achievement']; ?> </td>
                      </tr>
                      <tr>
                        <td>سبب الالتحاق بالمركز </td>
                        <td> <?php echo $row['reason_join']; ?> </td>
                      </tr>
                      <tr>
                        <td> الطموح</td>
                        <td> <?php echo $row['ambition']; ?> </td>
                      </tr>
                      <tr>
                        <td> المدرسة التي يرغب في الدراسة فيها </td>
                        <td> <?php echo $row['school_join']; ?> </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">العنوان </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                      <tr>
                        <td>المديرية</td>
                        <td> <?php echo $row['directorate']; ?> </td>
                      </tr>
                      <tr>
                        <td>المنطقة</td>
                        <td> <?php echo $row['area']; ?> </td>
                      </tr>
                      <tr>
                        <td>مكان الإقامة الحالي </td>
                        <td> <?php echo $row['current_governorate']; ?> </td>
                      </tr>
                      <tr>
                        <td>مكان الإقامة الحالي / المديرية _ المنطقة </td>
                        <td> <?php echo $row['current_directorate']; ?> </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">معلومات ولي الامر </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <td>الاسم</td>
                      <td> <?php echo $row['guardian_name']; ?> </td>
                      </tr>
                      <tr>
                        <td>العلاقه</td>
                        <td> <?php echo $row['relationship']; ?> </td>
                      </tr>
                      <tr>
                        <td>العمل</td>
                        <td> <?php echo $row['guardian_jop']; ?> </td>
                      </tr>
                      <tr>
                        <td> التواصل</td>
                        <td> <?php echo $row['guardian_phone'];
                            } ?> </td>
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
  <!-- Kaiadmin JS -->
  <!-- <script src="../assets/js/kaiadmin.min.js"></script> -->
  <!-- Kaiadmin DEMO methods, don't include it in your project! -->
  <script src="../assets/js/setting-demo2.js"></script>
  <script>
    $("#displayNotif").on("click", function() {
      var placementFrom = $("#notify_placement_from option:selected").val();
      var placementAlign = $("#notify_placement_align option:selected").val();
      var state = $("#notify_state option:selected").val();
      var style = $("#notify_style option:selected").val();
      var content = {};

      content.message =
        'Turning standard Bootstrap alerts into "notify" like notifications';
      content.title = "Bootstrap notify";
      if (style == "withicon") {
        content.icon = "fa fa-bell";
      } else {
        content.icon = "none";
      }
      content.url = "index.html";
      content.target = "_blank";

      $.notify(content, {
        type: state,
        placement: {
          from: placementFrom,
          align: placementAlign,
        },
        time: 1000,
      });
    });
  </script>
</body>

</html>