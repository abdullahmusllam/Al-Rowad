<?php
header("Content-Type: application/json");
include "../classes/db2.php";

// Disable error reporting in response
error_reporting(0);

// Function to validate name
function checkName($username,$message)
{
    $countword = explode(" ", $username);
    $word_count = count($countword);
echo $word_count;
    if ($word_count < 3) {
        throw new Exception($message);
    }
    return $username; // Return name if valid
}

// Function to validate phone number
function checkPhone($phone,$message)
{
   // $checkphone = preg_match("/^(00967)?(7)(7|8|3|1|0)([0-9]){7}$/", ($phone));

    $checkphone = preg_match("/^(00967)?(7)(7|8|3|1|0)([0-9]){7}$/", ($phone));
    if( $checkphone ==false){
        echo  $phone;
        throw new Exception("$message");
      
        }
        else{
         
          return $phone;
        }
      }

//$input = json_decode(file_get_contents('php://input'), true);
    
// طباعة المدخلات
//file_put_contents('php://stderr', print_r($input, TRUE));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON input

    $input = json_decode(file_get_contents('php://input'), true);
// طباعة المدخلات
file_put_contents('php://stderr', print_r($input, TRUE));

    try {
        // Validate input data
        if (empty(trim($input['full_name']))) {
            throw new Exception("Please enter your full name.");
        }
        $full_name = checkName(trim($input['full_name']),"The studen name must contain at least 3 words.");

        if (empty(trim($input['phone_number']))) {
            throw new Exception("Phone number is required.");
        }
        $phone_number = checkPhone(trim($input['phone_number']),"phone number not correct");

        if (empty(trim($input['date_of_birth']))) {
            throw new Exception("Please enter your date of birth.");
        }
        $date_of_birth = trim($input['date_of_birth']);

        if (empty(trim($input['place_of_birth']))) {
            throw new Exception("Please enter your place of birth.");
        }
        $place_of_birth = trim($input['place_of_birth']);

        if (empty(trim($input['governorate']))) {
            throw new Exception("Governorate is required.");
        }
        $governorate = trim($input['governorate']);

        if (empty(trim($input['area']))) {
            throw new Exception("Area is required.");
        }
        $area = trim($input['area']);

        if (empty(trim($input['current_residence']))) {
            throw new Exception("Please enter your current residence.");
        }
        $current_residence = trim($input['current_residence']);

        if (empty(trim($input['current_residence_details']))) {
            throw new Exception("Current residence details are required.");
        }
        $current_residence_details = trim($input['current_residence_details']);

        if (empty(trim($input['mobile_number']))) {
            throw new Exception("Mobile number is required.");
        }
        $mobile_number =checkPhone(trim($input['mobile_number']),"whatsapp not correct");

        if (empty(trim($input['health_conditions']))) {
            throw new Exception("Please enter your health conditions.");
        }
        $health_conditions = trim($input['health_conditions']);

        if (empty(trim($input['school_name']))) {
            throw new Exception("School name is required.");
        }
        $school_name = trim($input['school_name']);

        if (empty(trim($input['next_grade']))) {
            throw new Exception("Next grade is required.");
        }
        $next_grade = trim($input['next_grade']);

        if (empty(trim($input['last_grade_percentage']))) {
            throw new Exception("Last grade percentage is required.");
        }
        $last_grade_percentage = trim($input['last_grade_percentage']);

        if (empty(trim($input['guardian_name']))) {
            throw new Exception("Guardian name is required.");
        }
        $guardian_name = checkName(trim($input['guardian_name']),"The guardian name must contain at least 3 words.");

        if (empty(trim($input['relationship']))) {
            throw new Exception("Relationship is required.");
        }
        $relationship = trim($input['relationship']);

        if (empty(trim($input['guardian_occupation']))) {
            throw new Exception("Guardian occupation is required.");
        }
        $guardian_occupation = trim($input['guardian_occupation']);

        if (empty(trim($input['guardian_mobile']))) {
            throw new Exception("Guardian mobile number is required.");
        }
        $guardian_mobile = checkPhone(trim($input['guardian_mobile']),"message: guardian_mobile not coorect");

        if (empty(trim($input['skills_hobbies']))) {
            throw new Exception("Skills and hobbies are required.");
        }
        $skills_hobbies = trim($input['skills_hobbies']);

        if (empty(trim($input['achievements_participations']))) {
            throw new Exception("Achievements and participations are required.");
        }
        $achievements_participations = trim($input['achievements_participations']);

        if (empty(trim($input['reason_for_joining']))) {
            throw new Exception("Reason for joining is required.");
        }
        $reason_for_joining = trim($input['reason_for_joining']);

        if (empty(trim($input['future_ambitions']))) {
            throw new Exception("Future ambitions are required.");
        }
        $future_ambitions = trim($input['future_ambitions']);

        if (empty(trim($input['desired_school']))) {
            throw new Exception("Desired school is required.");
        }
        $desired_school = trim($input['desired_school']);

        $registration_date = date("Y-m-d");

        // Insert data into the database
        
        $trueOrfalse = staticDB::insert(
            "login",
            "applicants",
            [
                "name", "date_of_berth", "plase_of_berth", "directorate", "area", 
                "current_governorate", "current_directorate", "phone", "whatsapp", 
                "health", "graduate_school", "next_level", "rate", 
                "guardian_name", "relationship", "guardian_jop", 
                "guardian_phone", "skills", "achievement", 
                "reason_join", "ambition", "school_join", 
                "registration_date"
            ],
            [
                "$full_name", "$date_of_birth", "$place_of_birth", "$governorate", 
                "$area", "$current_residence", "$current_residence_details", 
                "$phone_number", "$mobile_number", "$health_conditions", 
                "$school_name", "$next_grade", "$last_grade_percentage", 
                "$guardian_name", "$relationship", "$guardian_occupation", 
                "$guardian_mobile", "$skills_hobbies", "$achievements_participations", 
                "$reason_for_joining", "$future_ambitions", "$desired_school", 
                "$registration_date"
            ]
        );

        if ($trueOrfalse == 1) {
            $response = [
                "status" => 200,
                "message" => "Registration successful.",
                "data" => null
            ];
        } else {
            throw new Exception("An error occurred while registering the data.");
        }

    } catch (Exception $e) {
        $response = [
            "status" => 400,
            "message" => $e->getMessage(),
            "data" => null
        ];
    }

    // Return response as JSON
   // echo json_encode($response);
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
} else {
    // If method not allowed
    echo json_encode([
        "status" => 405,
        "message" => "Method not allowed.",
        "data" => null
    ]);
}
function checkphone_yemen($phone,$message)
    {
    $checkphone = preg_match("/^(00967)?(7)(7|8|3|1|0)([0-9]){7}$/", ($phone));
    if( $checkphone ==false){
       
      throw new Exception("$message");
    
      }
      else{
        return $phone;
      }
    }

?>