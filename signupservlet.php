<?php
session_start();

require_once("connect.php"); //IMPORT DATABASE CONNECTION
require_once("signuppersistence.php"); //IMPORT PERSISTENCE FUNCTIONS
require_once("member.php"); //IMPORT USER CLASS

$error = "";

if (isset($_POST['register'])) {
    $idnumber = $_POST['idnumber']; // ID NUMBER

    if(strlen($idnumber) != 13 && !(validateNumber($idnumber))) { //ADD ANOTHER CONDITION
        $error = "Invalid ID Number";
    }

    $name = $_POST['name']; // NAME
    $surname = $_POST['surname']; // SURNAME
    $username = $_POST['username']; // USERNAME
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; 
    $role = "CUSTOMER";
    $gender = extractGenderFromSAID($idnumber); // GENDER
    $dob = extractDOBFromSAID($idnumber); //DATE OF BIRTH
    $tcs = null;

    if(isset($_POST['tcs'])) {
        $tcs = $_POST['tcs'];

    } else {
        $tcs = "N";

    }

    $image = null; // IMAGE

    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
        // Get the image data
        $image = file_get_contents($_FILES['image']['tmp_name']);
    
        // Process the image data
        // ...
    }

    //TEST ID NUMBER
    $error = textIdNumber($idnumber, $error, $conn);
    
    //TEST USERNAME
    $error = testUsername($username, $error, $conn);

    //validate users input
    if (validateCredentials($name) && validateCredentials($surname)) {
        
        $error = "Invalid name or surname";
    } elseif (validateUsername($username)) {

        $error = "Invalid username";
    } elseif(validateMinLength($name) && validateMinLength($surname) && validateMinLength($username)) {

        $error = "name, surname or username length must be greater than 3 characters";
    }elseif(validateMaxLength($name) && validateMaxLength($surname) && validateMaxLength($username)) {

        $error = "name, surname or username length must be less than 25 characters";
    }

    if(empty($error)) {

        if ($password !== $confirm_password) { //COMPARE PASSWORDS 

            $error = "Passwords do not match";

        } else {

            $mgr = assignAdmin($conn);

            if(!empty($mgr)) {

                $member_object = new Member(0, $idnumber, $image, $name, $surname, $password, $gender, $dob, $role, $mgr, $tcs, $username);

                $flag = createUser($member_object, $conn);

                if($flag === false) {
                    $error = "Sign up was unsuccessful, please try again later!";
                }

                $conn->close();
                header("Location: login.php");
                exit();

            } else {
                $error = "Admin not found, please try again later!";
            }
        }
    }
}

function validateUsername($text) {
    // For username: only letters and numbers are allowed
    if (preg_match('/^[a-zA-Z0-9]+$/', $text)) {

        return false;
    } else {

        return true;
    }
}

function validateCredentials($text) {
    // For name and surname: only letters are allowed
    if (preg_match('/^[a-zA-Z]+$/', $text)) {

        return false;
    } else {

        return true;
    }
}

function validateMinLength($text) {
    if(strlen($text) < 3) {
        return true;
    }

    return false;
}

function validateMaxLength($text) {
    
    if(strlen($text) > 25) {
        return true;
    }

    return false;
}

function extractDOBFromSAID($idNumber) {
    $dob = substr($idNumber, 0, 6); // First 6 digits represent the date of birth
    $dobYear = substr($dob, 0, 2); // Extract year (YY format)
    $dobMonth = substr($dob, 2, 2); // Extract month
    $dobDay = substr($dob, 4, 2); // Extract day
    // Determine the century based on the first two digits of the year
    $century = ($dobYear >= date('y')) ? '19' : '20'; // Assuming anyone born after the current year is born in the 20th century
    $dobYear = $century . $dobYear; // Concatenate century with the year
    $dateOfBirth = $dobYear . '-' . $dobMonth . '-' . $dobDay; // Format as YYYY-MM-DD
    
    return $dateOfBirth;
}

function extractGenderFromSAID($idNumber) {
    $genderDigit = substr($idNumber, 6, 1); // 7th digit represents gender

    return ($genderDigit < 5) ? 'F' : 'M'; // Even numbers represent females, odd numbers represent males
}

function validateNumber($idnumber) {
    // Check if $idnumber contains only numbers
    return preg_match('/^[0-9]+$/', $idnumber) === 1;
}

?>