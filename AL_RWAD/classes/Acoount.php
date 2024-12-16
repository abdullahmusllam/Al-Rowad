<?php 
include "db2.php";
class account extends dbh{
public $username;

public $password;


public function __construct($dbname, $table,$username,$password)
{  
    $con=parent::__construct($dbname, $table);
   $this->username = $username;
    $this->password = $password;
   // $this->insertToTable(["userName","password"],["$this->username","$this->password"]);
  
 //   self::$ArticleArray[]=$tempArticle;


}
 public static function ArticleInfo(){
    return self::$ArticleArray;
 }



}
$user_input = 'user1';
//$pass_input = $_POST['password'];

$article1 = new account("articles","accounts","user2","user22");
$result=$article1->selectFromTableWhere(["userName","password"],"userName","=","user1");
if ($result->num_rows > 0) {
    echo 'ok';
   if($article1->selectFromTableWhere(["userName","password"],"password","=","user1")){
    echo 'okkkk';
   }
   header("location:");
        // جلب كلمة المرور المخزنة
        //$result->bind_result($hashed_password);
        //$result->fetch();
    }
// while ($row = $result->fetch_assoc()){

//     echo $row["userName"];
//     echo $row["password"];
// }
//$result = $con->query($sql);
//if ($result->num_rows)
          $user1="user1";
            // while ($post = $result -> fetch_assoc()) {
            //   if (in_array("$user1",$post["userName"])){
            //     echo "okk";
            //    }
            //    else 
            //    echo "flase";
            // //    echo  $post["userName"]."<br>";
            // //    echo  $post["password"];

            // }


// // // إعدادات قاعدة البيانات
// // $host = 'localhost';
// // $username = 'your_db_username';
// // $password = 'your_db_password';
// // $database = 'your_database_name';

// // الاتصال بقاعدة البيانات
// $con= new dbh("articles","accounts");

// // التحقق من الاتصال
// if ($conn->connect_error) {
//     die("فشل الاتصال: " . $conn->connect_error);
// }

// // استلام بيانات المستخدم من النموذج
// //$user_input = $_POST['username'];
// $user_input = $_POST['user1'];
// $pass_input = $_POST['password'];
// $con=$this->con;

// // تحضير الاستعلام
// $stmt = $con->prepare("SELECT password FROM accounts WHERE username = ?");
// $stmt->bind_param("s", $user_input);

// تنفيذ الاستعلام
// $stmt->execute();
// $stmt->store_result();

// التحقق مما إذا كان اسم المستخدم موجودًا
// if ($stmt->num_rows > 0) {
    // جلب كلمة المرور المخزنة
    // $stmt->bind_result($hashed_password);
    // $stmt->fetch();
    //    }
//     // التحقق من كلمة المرور
//     if (password_verify($pass_input, $hashed_password)) {
//         echo "تم تسجيل الدخول بنجاح!";
//     } else {
//         echo "كلمة المرور غير صحيحة.";
//     }
// } else {
//     echo "اسم المستخدم غير موجود.";
// }

// // إغلاق الاتصال
// $stmt->close();
// $conn->close();
// 
      

?>






