<?php

// إعداد معلومات الاتصال بقاعدة البيانات
$host = 'localhost'; // أو عنوان الخادم الخاص بك
$dbname = 'al_rwwad'; // اسم قاعدة البيانات
$username = 'root'; // اسم المستخدم
$password = ''; // كلمة المرور

$k+3;

try {
    // إنشاء اتصال بقاعدة البيانات
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // مصفوفة أرقام الجوال
    $phoneNumbers = [
        '0123456789',
        '0987654321',
        '0112233445',
        // أضف المزيد من الأرقام هنا
    ];

    // دالة لتوليد كلمة مرور عشوائية
    function generatePassword($length = 12) {
        return bin2hex(random_bytes($length / 2)); // توليد كلمة مرور عشوائية
    }

    // مصفوفة لتخزين البيانات
    $userData = [];

    // تهيئة الاستعلام
    $stmt = $pdo->prepare("INSERT INTO accounts (id,username, password) VALUES (:id,:phone_number, :password)");

    foreach ($phoneNumbers  as $k =>  $phoneNumber) {
       
        echo
        $password = generatePassword(12); // توليد كلمة مرور بطول 12 حرف

        // تنفيذ الاستعلام بدون تشفير
        $stmt->execute([
            ':id' => $k+3,
            ':phone_number' => $phoneNumber,
            ':password' => $password // إدخال كلمة المرور مباشرة
        ]);

        // إضافة الرقم وكلمة المرور إلى مصفوفة البيانات
        $userData[$phoneNumber] = $password;
    }

    // حفظ البيانات في ملف JSON
    file_put_contents('user_data.json', json_encode($userData, JSON_PRETTY_PRINT));

    echo "تم رفع البيانات إلى قاعدة البيانات بنجاح. تم حفظ البيانات في user_data.json.";

} catch (PDOException $e) {
    echo "خطأ في الاتصال بقاعدة البيانات: " . $e->getMessage();
}
?>
 