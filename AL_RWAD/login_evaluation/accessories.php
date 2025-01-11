<?php
include "../classes/EvaluationCod.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

// جلب البيانات من قاعدة البيانات للتحقق من وجود ملف PDF
$result = DB::check_for_accessories($id);
$row = mysqli_fetch_array($result);
$accessories = $row[0];

// معالجة رفع الملف في حالة عدم وجوده
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdfFile']) && $accessories == NULL) {
    $uploadDir = "../uploads/"; // المسار الذي يتم فيه حفظ الملفات
    $fileTmpPath = $_FILES['pdfFile']['tmp_name'];
    $fileName = $_FILES['pdfFile']['name'];
    $destination = $uploadDir . $fileName;

    // نقل الملف إلى المسار وحفظ اسمه في قاعدة البيانات
    if (move_uploaded_file($fileTmpPath, $destination)) {
        DB::update_accessories($id, $fileName); // تحديث قاعدة البيانات
        header("Location: " . $_SERVER['PHP_SELF'] . "?id=$id"); // إعادة تحميل الصفحة
        exit;
    } else {
        $uploadError = "حدث خطأ أثناء رفع الملف.";
    }
}
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

    <?php if ($accessories == NULL): ?>
        <!-- عرض نموذج رفع الملف إذا لم يكن الملف موجودًا -->
        <h2 class="mb-4">رفع ملف PDF</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="pdfFile" class="form-label">اختر ملف PDF:</label>
                <input type="file" class="form-control" id="pdfFile" name="pdfFile" accept="application/pdf" required>
            </div>
            <button type="submit" class="btn btn-primary" name="upload">رفع الملف</button>
        </form>
        <?php if (isset($uploadError)): ?>
            <div class="alert alert-danger mt-3"><?php echo $uploadError; ?></div>
        <?php endif; ?>
    <?php else: ?>
        <!-- عرض ملف PDF إذا كان موجودًا -->
        <h2 class="mb-4">عرض ملف PDF</h2>
        <a href="../uploads/<?php echo urlencode($accessories); ?>" target="_blank" class="btn btn-primary">عرض ملف PDF</a>
        <?php endif; ?>
</body>

</html>
