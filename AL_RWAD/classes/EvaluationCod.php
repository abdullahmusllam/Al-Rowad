<?php
class DB
{
    private static $hostname = 'localhost';
    private static $username = 'root';
    private static $pass = '';
    private static $db = 'al_rwwad';

    public static function connected()
    {
        $conn = new mysqli(self::$hostname, self::$username, self::$pass, self::$db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public static function select($tablename, $condition)
    {
        $conn = self::connected();
        $sql = "SELECT * FROM `$tablename` WHERE $condition";
        try {
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function select_accept_interviews()
    {
        $conn = self::connected();
        $sql = "SELECT 
        interviews.interviews_state,
        interviews.applicant_id,
        interviews.interviews_rate,
        applicants.name 
    FROM 
        interviews
    JOIN 
        applicants ON interviews.applicant_id = applicants.applicant_id
    LEFT JOIN 
        evaluation ON evaluation.applicant_id = interviews.applicant_id 
    WHERE 
        interviews.interviews_state = 'مقبول' AND evaluation.applicant_id IS NULL 
        ORDER BY 
        interviews.interviews_rate DESC;";

        try {
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function insert_residents()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btnAddResidents'])) {
                $name_residents = $_POST['name_residents'];
                $phone_residents = $_POST['phone_residents'];
                $address_residents = $_POST['address_residents'];

                if (!empty($name_residents && $phone_residents && $address_residents)) {
                    $conn = self::connected();
                    $sql = "INSERT INTO `residents` (`residents_id`, `name`, `phone`, `address`) 
                    VALUES (NULL, '$name_residents', '$phone_residents', '$address_residents');";

                    if ($conn->query($sql) === true) {
                        header("location:../login_evaluation/Residents.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    header('location:../login_evaluation/addResidents.php?message="يرجى ملء الحقول"');
                }
                $conn->close();
            }
        }
    }

    public static function update_residents()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btnUpdateResidents'])) {
                $id_residents = $_POST['residents_id'];
                $name_residents = $_POST['name_residents'];
                $phone_residents = $_POST['phone_residents'];
                $address_residents = $_POST['address_residents'];

                if (!empty($name_residents && $phone_residents && $address_residents)) {
                    $conn = self::connected();
                    $sql = "UPDATE `residents` SET `name` = '$name_residents', `phone` = '$phone_residents', 
                    `address` = '$address_residents' WHERE `residents`.`residents_id` = $id_residents ;";

                    if ($conn->query($sql) === true) {
                        header("location:../login_evaluation/Residents.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    header('location:../login_evaluation/updateResidents.php?message="يرجى ملء الحقول"');
                }
            }
            $conn->close();
        }
    }

    public static function select_evaluation()
    {
        $conn = self::connected();
        $sql = "SELECT 
             evaluation.evaluation_id,
             evaluation.applicant_id,
             applicants.name, 
             applicants.directorate,
             evaluation.total, 
             evaluation.result,
             student.applicant_id 
            FROM 
             applicants 
            JOIN 
             evaluation ON evaluation.applicant_id = applicants.applicant_id
            LEFT JOIN 
             student ON student.applicant_id = evaluation.applicant_id
            WHERE 
             applicants.applicant_id = evaluation.applicant_id AND student.applicant_id IS NULL
            ORDER BY `evaluation`.`result` DESC;";
        try {
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (mysqli_sql_exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }
    public static function insert_evaluation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['btnAddEvaluation'])) {
                $id_students = $_POST['id_students'];
                $id_residents = $_POST['id_residents'];
                $behaver = $_POST['behaver'];
                $rate = $_POST['rate'];
                $Interviews_rate = $_POST['Interviews_rate'];
                $IQ = $_POST['IQ'];
                $arabic = $_POST['arabic'];
                $science = $_POST['science'];
                $mathematics = $_POST['mathematics'];
                $english = $_POST['english'];
                $total_materials = $_POST['total_materials'];

                date_default_timezone_set('Asia/Riyadh');
                $today = date('Y-m-d');

                if (
                    !empty($id_students) && !empty($id_residents) && !empty($behaver) &&
                    !empty($rate) && !empty($Interviews_rate) && !empty($IQ) &&
                    !empty($arabic) && !empty($science) && !empty($mathematics) &&
                    !empty($english) && !empty($total_materials)
                ) {

                    $rate = $rate * 0.1;
                    $total_materials_rate = $total_materials / 12.5;

                    $total = $behaver + $rate + $Interviews_rate + $total_materials_rate;

                    if ($total >= 70) {
                        $result = "مقبول";
                    } else {
                        $result = "غير مقبول";
                    }


                    $conn = self::connected();

                    $sql = "INSERT INTO `evaluation` (`evaluation_id`, `applicant_id`, `residents_id`,`evaluation_date`, `behavior`,
                     `rate`, `Interviews_rate`, `IQ`, `arabic`, `science`, `mathematics`, `english`, `total_materials`,
                      `total_materials_rate`, `total`, `result`) VALUES (NULL, '$id_students', '$id_residents','$today', '$behaver', '$rate', '$Interviews_rate', '$IQ',
                       '$arabic', '$science','$mathematics', '$english', '$total_materials', '$total_materials_rate', '$total', '$result')";

                    $sql_update = "UPDATE 
                            `history` SET `evaluation_state` = '$result',
                            `evaluation_date` = '$today' WHERE `history`.`applicant_id` = $id_students; ";

                    if ($conn->query($sql) === true && $conn->query($sql_update) === true) {
                        header('location:evaluation.php');
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    header("location:addEvaluation.php?id=$id_students && message=يرجي ملء الحقول");
                }


                $conn->close();
            }
        }
    }

    public static function update_evaluation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btn_update'])) {
                $id_students = $_POST['id_students'];
                $behaver = $_POST['behaver'];
                $rate = $_POST['rate'];
                $Interviews_rate = $_POST['Interviews_rate'];
                $IQ = $_POST['IQ'];
                $arabic = $_POST['arabic'];
                $science = $_POST['science'];
                $mathematics = $_POST['mathematics'];
                $english = $_POST['english'];
                $total_materials = $_POST['total_materials'];

                date_default_timezone_set('Asia/Riyadh');
                $today = date('Y-m-d');

                if (
                    !empty($behaver) && !empty($rate) && !empty($Interviews_rate) && !empty($IQ) && !empty($arabic) &&
                    !empty($science) && !empty($mathematics) && !empty($english) && !empty($total_materials)
                ) {


                    $rate = $rate * 0.1;
                    $total_materials_rate = $total_materials / 12.5;

                    $total = $behaver + $rate + $Interviews_rate + $total_materials_rate;


                    if ($total >= 70) {
                        $result = "مقبول";
                    } else {
                        $result = "غير مقبول";
                    }

                    $conn = self::connected();


                    $sql = "UPDATE `evaluation` SET `behavior` = '$behaver', `rate` = '$rate', `IQ` = '$IQ', `arabic` = '$arabic', 
                                `science` = '$science', `mathematics` = '$mathematics', `english` = '$english', 
                                `total_materials` = '$total_materials', `total_materials_rate` = '$total_materials_rate', 
                                `total` = '$total', `result` = '$result' 
                            WHERE `applicant_id` = '$id_students'";

                    $sql_update = "UPDATE 
                        `history` SET `evaluation_state` = '$result',
                        `evaluation_date` = '$today' WHERE `history`.`applicant_id` = $id_students; ";

                    if ($conn->query($sql) === true && $conn->query($sql_update)) {
                        header('Location: evaluation.php');
                        exit;
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    header("Location: updateEvaluation.php?id=$id_students&message=يرجى ملء الحقول");
                    exit;
                }
                $conn->close();
            }
        }
    }

    public static function delete($id, $tablename, $columName, $filename)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['btn_delete'])) {
                $conn = self::connected();
                $sql = "DELETE FROM `$tablename` WHERE `$columName` = $id";
                if ($conn->query($sql) === true) {
                    header("location:../login_evaluation/$filename");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }

    public static function insert_students($id)
    {
        $conn = self::connected();

        $sql_student = "INSERT INTO
             student (applicant_id, student_name, date_of_berth,
             governorate, directorate, area, classroom, school,
              student_phone, guardian_phone) 
        SELECT 
             applicant_id, name, date_of_berth, plase_of_berth,
             directorate, area, next_level, school_join, phone,
             guardian_phone 
        FROM applicants 
        WHERE applicant_id= $id;";

        if (!$conn->query($sql_student)) {
            throw new Exception("error" . $conn->error);
        }

        $student_id = self::select('student', 1);
        if (mysqli_num_rows($student_id) > 0) {
            while ($row = $student_id->fetch_assoc()) {
                $id_student = $row['student_id'];
                $student_number = $row['student_phone'];
            }
        }
        function getPassword($length = 8)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
            $charactersLength = strlen($characters);
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[rand(0, $charactersLength - 1)];
            }
            return $password;
        }
        $Token = uniqid("ALR");
        $password = getPassword();

        $loginSql = "INSERT INTO accounts (username, password, token, student_id,role)
                VALUE ('$student_number', '$password', '$Token', $id_student,'student')";

        if ($conn->query($loginSql) === true) {
            header('location:student_final_table.php');
        } else {

            echo "Error: " . $loginSql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    public static function update_student()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btnUpdateStudent'])) {
                $id_student = $_POST['id_students'];
                $class = $_POST['class'];
                $school = $_POST['school'];
                $student_phone = $_POST['student_phone'];
                $guardian_phone = $_POST['guardian_phone'];

                if (!empty($id_student) && !empty($class) && !empty($school) && !empty($student_phone) && !empty($guardian_phone)) {
                    $conn = Self::connected();
                    $sql = "UPDATE `student` SET `classroom` = '$class', `school` = '$school',
                         `student_phone` = '$student_phone', `guardian_phone` = '$guardian_phone'
                        WHERE `student`.`student_id` = $id_student;";

                    if ($conn->query($sql) === true) {
                        header("location: student_final_table.php");
                        exit;
                    }
                } else {
                    header("Location: updateStudent.php?id=$id_student&message=يرجى ملء الحقول");
                    exit;
                }
                $conn->close();
            }
        }
    }

    public static function inquiries() {}

    public static function update_interviewers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['update_inter'])) {
                $id = $_POST['Intr_id'];
                $name = $_POST['interviewers_name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                if (!empty($name && $phone && $address)) {
                    $conn = self::connected();
                    $sql = "UPDATE `interviewers` SET `name` = '$name', `phone` = '$phone', 
                    `address` = '$address' WHERE `interviewers`.`Interviewers_id` = $id ;";

                    if ($conn->query($sql) === true) {
                        header('location:../interviews/interviewers.php');
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    header('location:../login_evaluation/updateResidents.php?message="يرجى ملء الحقول"');
                }
            }
            $conn->close();
        }
    }

    public static function count($tablename, $condition)
    {
        $conn = self::connected();
        $sql = "SELECT COUNT(*) 
                FROM $tablename
                WHERE $condition;";
        try {
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (mysqli_sql_exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public static function check_for_accessories($id)
    {
        $conn = self::connected();
        $sql = "SELECT accessories
                FROM `student` 
                WHERE student_id = $id";

        try {
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (mysqli_sql_exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public static function update_accessories($id, $accessories)
    {
        $conn = self::connected();
        $sql = "UPDATE `student` SET `accessories` = '$accessories' WHERE `student`.`student_id` = $id;";
        try {
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (mysqli_sql_exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }
}



class createPass extends DB
{
    public $k;

    // public static function createPassword(){
    //       $conn = DB::connected();
    //       $username = DB::select()
    //       function generatePassword($length = 12) {
    //           return bin2hex(random_bytes($length / 2));
    //       }
    //       $password = generatePassword(12);

    //       $sql = "INSERT INTO accounts (username, password) VALUES ( '$username', '$password')";
    //   try {
    //       $result = mysqli_query($conn, $sql);
    //       return $result;
    //   } catch (Exception $e) {
    //       echo "خطأ في الاتصال بقاعدة البيانات: " . $e->getMessage();
    //   }
    // }
}
