<?php
// Include necessary files and libraries
include("connect.php"); // Include your database connection file here

// Error reporting
ini_set("display_errors", "1");
error_reporting(E_ALL);

if(isset($_POST['Submit_btn'])) {
    // File upload
    $image_name = $_FILES['photo']['name'];
    $temp = explode(".", $image_name);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $imagepath = "./files/" . $newfilename;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $imagepath);
    
    
$sign_image_name = $_FILES['receipt']['name'];
$temp1 = explode(".", $sign_image_name);
$newfilename_sign = round(microtime(true)) . 'sign.' . end($temp1);
$imagepath1 = "./signature/" . $newfilename_sign;
move_uploaded_file($_FILES["receipt"]["tmp_name"], $imagepath1);

 
    
    
$admissionNo = $_POST['admission_no'];
$applicantName = $_POST['applicant_name'];
$dateOfBirth = date("Y-m-d", strtotime($_POST['date_of_birth'])); 
$religion = $_POST['religion'];
$caste = $_POST['caste'];
$communicationAddress = $_POST['communication_address'];
$postOffice = $_POST['post_office'];
$district = $_POST['district'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$nationality = $_POST['nationality'];
$mobileNo = $_POST['mobile_no'];
$email = $_POST['email'];
$aadharNumber = $_POST['aadhar_number'];
$blood = $_POST['blood'];
$contactParent = $_POST['contact_parent'];
$occupation = $_POST['occupation'];
$income = $_POST['income'];
$hse = $_POST['hse'];
$yearOfPassing = $_POST['year_of_passing'];

$date_of_birth = date("Y-m-d", strtotime($date_of_birth));
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');



$insertApplication = "INSERT INTO applications (admission_no, photo, applicant_name, date_of_birth, religion, caste, communication_address, post_office, district, state, pincode, nationality, mobile_no, email, aadhar_number, blood, contact_parent, occupation, income, hse, year_of_passing, receipt, created_at, updated_at ) 
VALUES ('$admissionNo', '$newfilename', '$applicantName', '$dateOfBirth', '$religion', '$caste', '$communicationAddress', '$postOffice', '$district', '$state', '$pincode', '$nationality', '$mobileNo', '$email', '$aadharNumber', '$blood', '$contactParent', '$occupation', '$income', '$hse', '$yearOfPassing', '$newfilename_sign', '$created_at', '$updated_at' )";

    if ($conn->query($insertApplication) === true) {
        $application_id = $conn->insert_id;

        $cbse_obtained_mark = $_POST['cbse_obtained_mark'];
        $hse_obtained_mark = $_POST['hse_obtained_mark'];
        $cbse_total = $_POST['cbse_total'];
        $hse_total = $_POST['hse_total'];

        foreach ($cbse_obtained_mark as $subject => $cbse_obtained) {
            $cbse_obtained = $cbse_obtained;
            $hse_obtained = $hse_obtained_mark[$subject];
            $cbse_total_mark = $cbse_total[$subject];
            $hse_total_mark = $hse_total[$subject];

            $insertExamResults = "INSERT INTO mark_details (application_id, subject, cbse_obtained_mark, hse_obtained_mark, cbse_total, hse_total)
            VALUES ('$application_id', '$subject', '$cbse_obtained', '$hse_obtained', '$cbse_total_mark', '$hse_total_mark')";
            $conn->query($insertExamResults);
        }

        echo "Application inserted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>