<?php   session_start(); 
  //   if (!isset($_SESSION["username"])) {
  //     header("Location:../login/index.php");
  //     exit;
  // }
  ?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>مركز الرواد - التسجيل</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="../assets/img/kaiadmin/favicon.png"
      type="image/x-icon"
    />
    <script src="https://cdn.ckeditor.com/4.13.1/full-all/ckeditor.js"></script>
    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["../assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets/css/demo.css" />
        <link rel="stylesheet" href="../assets/css/input.css" />
  <link rel="stylesheet" href="../assets/css/animate.css" />
<style>
@import url('https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Handjet:wght,ELSH@100..900,4.9&display=swap');
body{

  font-family: "Alexandria", sans-serif;
  font-optical-sizing: auto;
  font-weight: 700;
  font-style: normal;

}
</style>
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
              <h3 class="fw-bold mb-3 animate__animated animate__rubberBand">الادخال</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home animate__animated animate__backInRight">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator animate__animated animate__backInRight">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item animate__animated animate__backInRight">
                  <a href="#">الشروط</a>
                </li>
                
              </ul>
            </div>


<h2 class="text-bg-primary">تعديل المحتوى والشروط</h2>
<h5 class="text-bg-warning text-center">ملاحظة اذا اردت التعديل انسخ المحتوى الموجد وعدل ما تريده</h5>
            <?php 
 include "../classes/db2.php";
 if(isset($_POST["submit"])){
     $content=$_POST["content"];
     staticDB::update("al_rwwad","ckediter",["content","$content"],"id","=",6);
 
 }
 $result=staticDB::selectFromTable("al_rwwad","ckediter",["content"]);
 while($row=$result->fetch_assoc() ){
 echo $row["content"];
 }
 ?>

          <div class="container">
        <div class="box">
            <form method="post">
                <div class="form-group">

                <textarea id="content" name="content" class="form-control"></textarea>
                    <script>
                        CKEDITOR.replace('content');
                </script>
                </div>
                <div class="form-group">
                <input type="submit" name="submit" value="تعديل" class="btn btn-primary">
                </div>
            </form>
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
