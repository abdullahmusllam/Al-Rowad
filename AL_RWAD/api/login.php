<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
include "../classes/db2.php";

//var_dump($post);
$response = [
    "status" => null,
    "message" => null,
    "data" => null
];

// التحقق من أن الطلب هو من نوع POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    $response["status"] = 405;
    $response["message"] = "Only POST requests are allowed.";
    echo json_encode($response);
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    $response["status"] = 500;
    $response["message"] = "Connection failed: " . $conn->connect_error;
    echo json_encode($response);
    exit;
}

// قراءة البيانات من الطلب
$input = json_decode(file_get_contents("php://input"));

if ($input === null) {
    $response["status"] = 400;
    $response["message"] = "Invalid JSON input: " . json_last_error_msg();
    echo json_encode($response);
    exit;
}

$username = $input->username ?? null;
$password = $input->password ?? null;

// التحقق من وجود بيانات المدخلات
if (!$username || !$password) {
    $response["status"] = 400;
    $response["message"] = "Username and password are required";
    echo json_encode($response);
    exit;
}

// التحقق من المستخدم
$sql = "SELECT * FROM accounts WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // تحقق من كلمة المرور
    if ($password===$user['password']) {
        // إنشاء توكن ثابت
        $token = bin2hex(random_bytes(16)); // توليد توكن عشوائي
      //  echo $user['id'];
        // تخزين التوكن في قاعدة البيانات
        $updateSql = "UPDATE accounts SET token = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("si", $token, $user['id']);
        $updateStmt->execute();
        $iduser=$user['id'];
        echo $iduser;

        $info_stuednt=staticDB::query("login","SELECT * FROM student WHERE student_id = (SELECT student_id FROM accounts WHERE id =987654329)");
while ($row = $info_stuednt->fetch_assoc()) {

    $post[]=$row;
}

        // جلب بيانات الطالب
        // $studentSql = "SELECT * FROM login WHERE id = ?";
        // $studentStmt = $conn->prepare($studentSql);
        // $studentStmt->bind_param("i", $user['id']);
        // $studentStmt->execute();
        // $studentResult = $studentStmt->get_result();
        // $studentData = $studentResult->fetch_assoc();

        // إعداد الاستجابة
        $response["status"] = 200;
        $response["message"] = "Login correct";
        $response["data"] = 
        
        [
            "token" => $token,
            "stuednt_Information" => $post
        ];
    } else {
        $response["status"] = 401;
        $response["message"] = "Invalid password";
    }
} else {
    $response["status"] = 404;
    $response["message"] = "User not found";
}

// إرجاع الاستجابة النهائية
//echo json_encode($response);
echo json_encode($response, JSON_UNESCAPED_UNICODE);
$stmt->close();
$conn->close();
?>