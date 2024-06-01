<?php

require_once("connect.php");
require_once("edit_profilepersistence.php");
require_once("member.php");

$user_id;

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

} else {
    
    header("Location: login.php");
    exit(); // Stop execution if user ID is not provided
}


//GET USER VALUES TO DISPLAY

$member_id = $user_id;
$username = getUsername($member_id, $conn);
$password = getPassword($member_id, $conn);
$name = getName($member_id, $conn);
$surname = getSurname($member_id, $conn);
$image = getImage($member_id, $conn);


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data when form is submitted
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    $image = null; // IMAGE

    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
        // Get the image data
        $image = file_get_contents($_FILES['image']['tmp_name']);
    
        // Process the image data
        // ...
    }

    $error;

    if(validateUsername($username)) {
        
        echo '<p style="color:red; font-size:30px; margin-right:1000px;font-weight: 600;">Invalid username</p>';
        $error = "not empty";
    } elseif(validateMinLength($username) && validateMinLength($name) && validateMinLength($surname)) {
        
        echo '<p style="color:red; font-size:30px; margin-right:1000px;font-weight: 600;">Error, name, surname or username must be more than 3 characters</p>';
        $error = "not empty";
    } elseif(validateMaxLength($username) && validateMaxLength($username) && validateMaxLength($username)) {

        echo '<p style="color:red; font-size:30px; margin-right:1000px;font-weight: 600;">Error, name, surname or username must be less than 25 characters</p>';
        $error = "not empty";
    }

    if(empty($error)) {

        $stmt = updateProfile($member_id, $name, $surname, $username, $password, $image, $conn);

            // Profile updated successfully
            echo '<p style="color:limegreen; font-size:30px; margin-right:1000px;font-weight: 600;">Your Profile Has Been Updated</p>';
        
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

?>