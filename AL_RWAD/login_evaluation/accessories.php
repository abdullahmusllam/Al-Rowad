<?php
include "../classes/EvaluationCod.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$result = DB::check_for_accessories($id);
$row = mysqli_fetch_array($result);
$accessories = $row[0];
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <?php include "../layout/head.php" ?>
</head>

<body dir="rtl" class="container mt-5">
    <div class="page-header d-flex align-items-center gap-2">
        <h3 class="fw-bold mb-3 animate__animated animate__rubberBand">الملحقات</h3>
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
                <a href="../login_evaluation/student_final_table.php">
                    <h5>الكشف العام</h5>
                </a>
            </li>
        </ul>
    </div>
    <hr>
    <?php
    if ($accessories == NULL) { ?>
        <h2 class="mb-4">رفع ملف PDF</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="pdfFile" class="form-label">اختر ملف PDF:</label>
                <input type="file" class="form-control" id="pdfFile" name="pdfFile" accept="application/pdf" required>
            </div>
            <button type="submit" class="btn btn-primary" name="upload">رفع الملف</button>
        </form>
    <?php } else { echo "saleh"; }?>
</body>

</html>